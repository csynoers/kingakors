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
    $id       = $this->uri->segment(4);
    $data     = $this->Mpemesanan->getDetailRiwayat($id);
    $pesanan  = $this->Mpemesanan->get_pesanan_where($id);
    
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
        if ( $key->verifikasi=='diproses' ) {
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
  }
  public function update_pesanan()
  {
    print_r($this->uri->segment(4));
  }
}


/* End of file ${TM_FILENAME:cpemesanan.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/cpemesanan/:application/controllers/cpemesanan.php} */
