<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/jakarta');

    class Criw extends CI_Controller
    {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpelanggan');
        $this->load->model('Mpemesanan');
        $this->load->model('Mdetailpemesanan');
        $this->load->model('Malamatpen');
        /* config PAYMENT API */
        $this->server_domain = 'https://api.xendit.co';
        $this->secret_api_key = 'xnd_production_xc2NVAeNio0YeMAWOWE1yXqcfZiMHfG0VfW0GCi4Q7TyW7fihjTegcl1yCTAVZ9';
    }

    public function index()
    {
        $data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));
        $data['pelanggan'] = $this->Mpelanggan->get_all_by_id($this->session->userdata('id_pelanggan'));
        $data['pemesanan'] = $this->Mpemesanan->get_riwayat($this->session->userdata('id_pelanggan'));
        $this->load->view('kerangka/Header', $data);
        $this->load->view('menu_p/Vriw_pesan', $data);
        $this->load->view('kerangka/Footer');
    }


        public function getDetailRiwayat()
        {
        $id = $this->input->get('id_pesan');
        $data = $this->Mpemesanan->getDetailRiwayat($id);
        $pesanan = $this->Mpemesanan->get_pesanan_where($id);
        // $out=var_dump($pesanan);
        $out = "
                <div class='row'>
                    <div class='col-12 col-md-8'>
                    <table class='table table-hover'>
                        <tr style='background-color:#f5f7fa!important; text-align:center'>
                        <th>
                            <td colspan='2'>Nama</td>
                            <td>Harga Satuan</td>
                            <td>Qty</td>
                        </th>
                        </tr>
                ";
        $i = 1;
        $hargaBrg = "";
        $ongKir = "";
        foreach ($data->result_array() as $list) {
            $out .= "
                <tr>
                    <td>{$i}</td>
                    <td class='cart_product_img'>
                        <a href='#'><img style='height:81px;max-width:100%;' src='" . base_url() . "assets/uploads/{$list['gambar']}' alt='Product'></a>
                    </td>
                    <td class='cart_product_desc'>
                        <h5>{$list['merek']}</h5>
                    </td>
                    <td class='price'>
                        <span>Rp." . number_format($list['harga']) . "</span>
                    </td>
                    <td class='qty'>
                        <div class='qty-btn d-flex'>
                            <p>{$list['jumlah_pesan']}</p>
                        </div>
                    </td>
                </tr>
            ";
            $jml = $i;
            $i += 1;
            $hargaBrg = $list['total_harga_barang'];
            $ongKir = $list['ongkir'];
        }
        $out .= "
        </table>
        </div>
        <div class='col-12 col-md-4'>
            <div class='card' style='background-color:#f5f7fa!important'>
            <div class='card-body '>
                <div class='card-title' style='font-size:20px;text-align:center'><span>Cart Total</span></div>
                <table class='table'>
                <tr class=''>
                    <td>Harga Barang</td>
                    <td>: Rp." . number_format($hargaBrg) . "</td>
                </tr>
                <tr class=''>
                    <td>Harga OngKir</td>
                    <td>: Rp." . number_format($ongKir) . "</td>
                </tr>
                <tr class=''>
                    <td>Harga Total</td>
                    <td>: Rp." . number_format($hargaBrg + $ongKir) . "</td>
                </tr>
                </table>
            </div>
            </div>
        </div>
        </div>
        ";
        $out .= '<hr>
        <div class="row">
            <div class="col-12">
            <h1>Status transaksi : </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
            <table class="table table-bordered table-hover">
                <tr style="background-color:#f5f7fa!important; text-align:center">
                    <th>Nama Pembeli</th>
                    <th>Alamat Pembeli</th>
                    <th>Total Pembelian</th>
                    <th>Total Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pembelian</th>
                </tr>
                ';
        foreach ($pesanan as $key) {
            $metodePembayaran= "-";
            if ( $key->verifikasi=='pengemasan' || $key->verifikasi=='dikirim' || $key->verifikasi=='selesai' ) {
                $metodePembayaran = $this->get_from_invoice( $this->getInvoice($key->external_id) );
            }
            if ( $key->verifikasi=='belum bayar' ) {
                $metodePembayaran= '<a href="'.$key->invoice_url.'" target="_blank" class="btn-outline-primary border p-2">Bayar Sekarang</a>';
            }
            // print_r($key);
            $out .= '<tr>
                <td>' . $key->nama_pel . '</td>
                <td>' . $key->alamat_lengkap . '</td>
                <td class="text-center">' . $jml . '</td>
                <td>Rp.' . number_format($key->jumlah_uang) . '</td>
                <td class="text-center">'.$metodePembayaran.'</td>
                <td>' . $key->tgl_pesan . '</td>
                </tr>';
        }
        $out .= '
            </table>
            </div>
        </div>
        ';
        echo $out;
        // echo json_encode($this->Mpemesanan->getDetailRiwayat($id));
        }

        function getInvoice ($invoice_id) {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $end_point = $this->server_domain.'/v2/invoices/'.$invoice_id;

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }

        public function get_from_invoice($response)
        {
            return $response['payment_method'].'('.$response['bank_code'].') '.date("d F Y & H:i:s", strtotime($response['paid_at']));
                // echo '<pre>';
                // print_r($response['payment_channel']);
                // print_r($response['payment_channel']);
                // echo '</pre>';
        }
    }
