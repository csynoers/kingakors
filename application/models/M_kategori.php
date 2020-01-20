<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    public $table = 'kategori';
    public $id = 'id_kategori';
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

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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
        $this->db->delete($this->table);
    }

        function image_compressor($nama_file_upload, $path_asli) {
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

            imagejpeg($tmp_img, $path_asli . "compress_gambar_" . $newfilename, 50);
            unlink($path_asli . $nama_file_upload);
            return 'compress_gambar_' . $newfilename;
        }

    }
