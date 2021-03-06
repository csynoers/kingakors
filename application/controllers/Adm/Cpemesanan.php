<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpemesanan');
        $this->load->model('M_barang');
        $this->load->model('Mpelanggan');
        $this->load->model('Malamatpen');
        $this->load->model('Mdetailpemesanan');
        $this->load->model('Mpembayaran');
        if ($this->session->userdata('status_login') != 'admin_oke') {
            redirect(base_url('Clogin/login'));
        }
        /* config PAYMENT API */
        $this->server_domain = 'https://api.xendit.co';
        $this->secret_api_key = 'xnd_production_xc2NVAeNio0YeMAWOWE1yXqcfZiMHfG0VfW0GCi4Q7TyW7fihjTegcl1yCTAVZ9';
    }
    public function index()
    {
        $data['pemesanan'] = $this->Mpemesanan->get_pesanan($this->session->userdata('id_pesan'));
        $this->load->view('template/Header');
        $this->load->view('menu_a/Vpemesanan', $data);
        $this->load->view('template/Footer');
    }
    public function detail_pesanan()
    {
        $id                     = $this->uri->segment(4);
        $getDetailRiwayat       = $this->Mpemesanan->getDetailRiwayat($id);
        $pesanan                = $this->Mpemesanan->get_pesanan_where($id);

        $data                   = [];
        $data['pesanan']        = $pesanan[0];
        $data['thead'] = "
            <th>Nama</th>
            <th>Harga Satuan</th>
            <th>Qty</td>
            <th>Subtotal</td>
        ";
        $data['total'] = 0;
        $data['ongkir'] = 0;
        foreach ($getDetailRiwayat->result_array() as $list) {
            $list['hargaText']      = 'Rp.' . number_format($list['harga']);
            $list['subtotal']       = ($list['harga']*$list['jumlah_pesan']);
            $list['subtotalText']   = 'Rp. '.number_format($list['subtotal']);

            $data['total']         += $list['subtotal']; 
            $data['ongkir']        += $list['ongkir'];
            $data['tbody'][] = "
                <tr>
                    <td>{$list['merek']}</td>
                    <td>{$list['hargaText']}</td>
                    <td>{$list['jumlah_pesan']}</td>
                    <td>{$list['subtotalText']}</td>
                </tr>
            ";
        }
        $data['totalText']      = 'Rp. '.number_format($data['total']);
        $data['ongkirText']     = 'Rp. '.number_format($data['ongkir']);
        $data['grandTotal']     = ($data['total']+$data['ongkir']);
        $data['grandTotalText'] = 'Rp. '.number_format($data['grandTotal']);
        $data['tbody'][] = "
            <tr>
                <td></td>
                <td></td>
                <td>Harga Total</td>
                <td>{$data['totalText']}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Harga Ongkir</td>
                <td>{$data['ongkirText']}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td>{$data['grandTotalText']}</td>
            </tr>
        ";
        $data['tbody'] = implode('',$data['tbody']);
        $data['statusPemesanan'] = "
            <tr>
                <td>Status Pesanan</td>
                <td style='width: 100% !important;max-width: none;flex: none;'>: ".strtoupper($data['pesanan']->verifikasi)."</td>
            </tr>
        ";
        $statusPembayaran = ['belum bayar','kadaluarsa'];
        if ( ! in_array($data['pesanan']->verifikasi,$statusPembayaran) ) {
            $statusPesanan = ['pengemasan','dikirim','selesai'];
            $optionsStatusPesanan = [];
            foreach ($statusPesanan as $key => $value) {
                $selected = ($data['pesanan']->verifikasi==$value) ? 'selected disabled' : NULL ;
                $optionsStatusPesanan[] = "<option value='{$value}' {$selected}>".strtoupper($value)."</option>";
            }
            $optionsStatusPesanan = implode('',$optionsStatusPesanan);
            $data['statusPemesanan'] = "
                <tr>
                    <td>Status Pesanan</td>
                    <td style='width: 100% !important;max-width: none;flex: none;'>
                        <form action='".base_url("Adm/Cpemesanan/update-pesanan/{$data['pesanan']->id_pembayaran}")."' method='POST'>  
                            <select name='status' onchange='this.form.submit()'>{$optionsStatusPesanan}</select>
                            <span class='badge badge-warning ml-3'>(* Update status pesanan disini)</span>
                            <input type='hidden' name='id_pesan' value='{$data['pesanan']->id_pesan}'>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td style='width: 100% !important;max-width: none;flex: none;'>
                        ".$this->get_from_invoice( $this->getInvoice($data['pesanan']->external_id) )."
                    </td>
                </tr>
            ";
        }
        $this->load->view('template/Header');
        $this->load->view('menu_a/Vdetailpemesanan', $data);
        $this->load->view('template/Footer');
    }
    public function update_pesanan()
    {
        //data yang akan di ubah dimasukkan ke array
        $data = array(
            'verifikasi' => $this->input->post('status')
        );

        // mengirimkan data primary key dan data yang akan di ubah
        $this->Mpembayaran->update($this->uri->segment(4), $data);
        $_SESSION['pesananBelumDikirim'] = count($this->Mpembayaran->get_verifikasi('pengemasan'));
        redirect(base_url("Adm/Cpemesanan/detail-pesanan/".$this->input->post('id_pesan') ));
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


/* End of file ${TM_FILENAME:cpemesanan.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/cpemesanan/:application/controllers/cpemesanan.php} */
