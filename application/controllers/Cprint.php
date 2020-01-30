<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cprint extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpelanggan');
        $this->load->model('Malamatpen');
        $this->load->model('Mpemesanan');
        $this->load->model('M_barang');
        $this->load->model('M_kategori');
        if ($this->session->userdata('status_login') != 'admin_oke') {
            redirect(base_url('Clogin/login'));
        }
    }

    public function print_barang()
    {
        $data['kodeunik'] = $this->M_barang->buat_kode();
        $data['barang'] = $this->M_barang->get_all();
        $data['kategori'] = $this->M_kategori->get_all();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-barang.pdf";
        $this->pdf->load_view('print/laporan_barang', $data);
    }

    public function print_penjualan()
    {
        $from = $this->input->post("from");
        $to = $this->input->post("to");
        if ($from == "" || $to == "") {
            $data['a'] = "";
            $data['b'] = "";
            $data['penjualan'] = $this->Mpemesanan->get_pesanan_fix();
        } else {
            $data['a'] = $from;
            $data['b'] = $to;
            $data['penjualan'] = $this->Mpemesanan->get_pesanan_fix($from, $to);
        }
        // var_dump($data['penjualan']);
        // die;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-barang.pdf";
        $this->pdf->load_view('print/laporan_penjualan', $data);
    }

    public function print_struct()
    {
        $id = $this->input->post('id_pesan');
        $data = $this->Mpemesanan->getDetailRiwayat($id);
        $pesanan = $this->Mpemesanan->get_pesanan_where($id);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Struct-Pembelian.pdf";
        $this->pdf->load_view('print/struct_pemesanan', $data);
    }
    public function print_member()
    {
        $data['pelanggan'] = $this->Mpelanggan->get_pelanggan();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-member.pdf";
        $this->pdf->load_view('print/laporan_pelanggan', $data);
    }
}
