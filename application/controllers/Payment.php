<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Payment extends CI_Controller {
        function __construct () {
            parent::__construct();
            $this->load->Model('Mpayment');
            // echo $this->internet_check();
            /* create config mode debuging SET $this->debug to TRUE OR FALSE*/
            $this->debug = FALSE ;

            $this->data = [];

            /* config PAYMENT API */
            $this->server_domain = 'https://api.xendit.co';
            $this->secret_api_key = 'xnd_development_41Bf6WsBwmDg802BKdtNIQ0Vg0wLie3ZaRWxMSgQ3GnVojeH1uQYPITTuJaR4gU';
        }

        function internet_check(){
            $connected = @fsockopen("www.google.com", 80);
            if ($connected){
                $is_conn = 'Internet anda tersedia selamat anda dapat menjalankan controller payment'; //jika koneksi tersambung
                // $is_conn = true; //jika koneksi tersambung
                fclose($connected);
            }else{
                $is_conn = 'Maaf Internet anda tidak tersedia saat ini anda tidak dapat menjalankan controller payment'; //jika koneksi gagal
                // $is_conn = false; //jika koneksi gagal
            }
            return $is_conn;
        }

        public function index()
        {
            echo "
                <form action='".base_url('payment/store')."' method='post'>
                    <input type='text' placeholder='ID' name='id' required>
                    <input type='text' placeholder='Amount' name='amount' required>
                    <input type='email' placeholder='Email' name='email' required><br><br>
                    <textarea name='keterangan' required placeholder='keterangan pembayaran'></textarea><br><br>
                    <input type='submit' value='create invoice'>
                </form>
            ";
        }

        public function store()
        {
            $this->data = [];
            if ( $this->debug ) {
                $this->data['post'] = $this->input->post();
                $this->data['response'] = $this->createInvoice($this->input->post('id'),$this->input->post('amount'),$this->input->post('email'),$this->input->post('keterangan'));
                $this->debug();

            } else {
                echo 'halaman payment store';
            }
        }

        public function update ()
        {        
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $this->data                     = [];
                $this->data['response']         = file_get_contents("php://input");
                $this->data['responseDecode']   = json_decode($this->data['response']);

                # get data id for WHERE condition to change field tabel in your database
                $this->data['id']               = $this->data['responseDecode']->id;

                $this->Mpayment->data = $this->data;

                $this->Mpayment->store_payment();

                // switch ( $this->data['responseDecode']->status ) {
                //     case 'PAID':
                //         $this->Mpayment->store_
                //         # code controller paid payment here...
                //         break;

                //     case 'EXPIRED':
                //         # code controller expired payment here...
                //         break;
                    
                //     default:
                //         # code...
                //         break;
                // }
                
                print_r("\n\{$this->data['response']} contains the updated invoice data \n\n");
                print_r($this->data['response']);
                print_r("\n\nUpdate your database with the invoice status \n\n");

            } else {
                print_r("Cannot ".$_SERVER["REQUEST_METHOD"]." ".$_SERVER["SCRIPT_NAME"]);

            }
        }

        protected function debug()
        {
            echo '<pre>';
            print_r($this->data);
            echo '</pre>';
        }

        function createInvoice ($external_id, $amount, $payer_email, $description, $invoice_options = null) {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $end_point = $this->server_domain.'/v2/invoices';

            $data['external_id'] = $external_id;
            $data['amount'] = (int)$amount;
            $data['payer_email'] = $payer_email;
            $data['description'] = $description;

            if ( is_array($invoice_options) ) {
                foreach ( $invoice_options as $key => $value ) {
                    $data[$key] = $value;
                }
            }

            $payload = json_encode($data);

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
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
    }
?>