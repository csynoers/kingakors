<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpembayaran extends CI_Model
{

    public $table = 'pembayaran';
    public $id = 'id_pembayaran';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function jumlah_pemasukan($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_pembayaran($id)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('pemesanan', 'pembayaran.id_pesan = pemesanan.id_pesan');
        $this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan');
        return $this->db->get()->result();
    }

    // get data by id
    function get_join_by_id($id, $join)
    {
        $this->db->from('pembayaran');
        $this->db->join('pemesanan', 'pembayaran.id_pesan = pemesanan.id_pesan');
        $this->db->join('metode_pembayaran', 'pembayaran.id_met_pem = metode_pembayaran.id_met_pem');
        // $this->db->where('pembayaran.id_pembayaran', $id);

        if ($join == 'pemesanan') {
            $this->db->where('pemesanan.id_pesan', $id);
        } else if ($join == 'metode_pembayaran') {
            $this->db->where('metode_pembayaran.id_met_pem', $id);
        } else {
            $this->db->where('pembayaran.id_pembayaran', $id);
        }

        if ($id != null) {
            return $this->db->get()->row();
        } else {
            return $this->db->get()->result();
        }
    }

    // get last insert
    function get_last_pembayaran()
    {
        $sql = "select max(id_pembayaran) as id_pembayaran from pembayaran";
        return $this->db->query($sql)->row();
    }

    // insert data
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
        // return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }

    function image_compressor($nama_file_upload, $path_asli)
    {
        // $path_asli = './assets/uploads/';
        $direktori = $path_asli . $nama_file_upload;
        $temp = explode(".", $nama_file_upload);
        $newfilename = $temp[0] . '.' . end($temp);
        if (end($temp) == 'jpg' || end($temp) == 'jpeg' || end($temp) == 'JPG') {
            $img = imagecreatefromjpeg($direktori);
        } else {
            $img = imagecreatefrompng($direktori);
        }
        $width = imagesx($img);
        $height = imagesy($img);

        $new_width = 1000;
        $new_height = ($new_width / $width) * $height;

        $tmp_img = imagecreatetruecolor($new_width, $new_height);

        imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($tmp_img, $path_asli . "compress_pembayaran_" . $newfilename, 50);
        unlink($path_asli . $nama_file_upload);
        return 'compress_pembayaran_' . $newfilename;
    }

    public function get_detail_pembayaran($id_pembayaran)
    {
        return $this->db->query("SELECT * FROM `pembayaran` LEFT JOIN pemesanan ON pemesanan.id_pesan=pembayaran.id_pesan LEFT JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan LEFT JOIN alamat_pengiriman ON alamat_pengiriman.id_pelanggan=pelanggan.id_pelanggan WHERE 1 AND pembayaran.id_pembayaran='{$id_pembayaran}' AND alamat_pengiriman.status='ready'")->result();
    }
    public function get_verifikasi($verifikasi){
        return $this->db->query("SELECT * FROM `pembayaran` WHERE 1 AND verifikasi='{$verifikasi}'")->result();
    }
}
