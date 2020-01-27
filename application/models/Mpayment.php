<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpayment extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_id_pesan() {
        return $this->db->get_where( 
            'pemesanan' ,
            [ 'external_id' => $this->data['id'] ]
        )->row()->id_pesan;
    }

    public function store_payment($data)
    {
        switch ( $this->data['responseDecode']->status ) {
            case 'PAID':
                // $this->Mpayment->store_
                # code controller paid payment here...
                $this->store_pembayaran_diproses($this->get_id_pesan());
                break;

            case 'EXPIRED':
                # code controller expired payment here...
                $this->store_pembayaran_kadaluarsa($this->get_id_pesan());
                break;
            
            default:
                # code...
                break;
        }
        
    }

    public function store_pembayaran_diproses($id)
    {
        $data = array(
            'verifikasi' => 'diproses',
        );
        
        $this->db->where('id_pesan', $id);
        $this->db->update('pembayaran', $data);
    }
    public function store_pembayaran_kadaluarsa($id)
    {
        $data = array(
            'verifikasi' => 'kadaluarsa',
        );
        
        $this->db->where('id_pesan', $id);
        $this->db->update('pembayaran', $data);
    }
}