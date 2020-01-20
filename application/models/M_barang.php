<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_barang extends CI_Model
{

    public $table = 'barang';
    public $id = 'id_barang';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->join("kategori", "barang.id_kategori=kategori.id_kategori");
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
   function get_alls()
   {
       $this->db->order_by($this->id, $this->order);
       return $this->db->get($this->table)->result();
   }

    function get_limit()
    {
        $sql = "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 6";
        return $this->db->query($sql)->result_array();
    }

    //get data by id
    function get_result_by_id_kategori($id)
    {
        $this->db->where("id_kategori", $id);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(barang.id_barang,4) as brg', FALSE);
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');      //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $brg = intval($data->brg) + 1;
        } else {
            //jika kode belum ada
            $brg = 1;
        }
        $kodemax = str_pad($brg, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "BR-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }


    function get_last_barang()
    {
        $sql = "select max(id_barang) as id_brg from barang";
        return $this->db->query($sql)->row();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
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

        imagejpeg($tmp_img, $path_asli . "compress_" . $newfilename, 50);
        unlink($path_asli . $nama_file_upload);
        return 'compress_' . $newfilename;
    }


    function image_compressor2($nama_file_upload, $path_asli)
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
        //$new_height = 150;
        $new_height = ($new_width / $width) * $height;

        $tmp_img = imagecreatetruecolor($new_width, $new_height);

        imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($tmp_img, $path_asli . "compress_gambar2_" . $newfilename, 50);
        unlink($path_asli . $nama_file_upload);
        return 'compress_gambar2_' . $newfilename;
    }
}
