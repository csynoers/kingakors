	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	date_default_timezone_set('Asia/jakarta');

	class CKeranjang extends CI_Controller
	{


		public function __construct()
		{
			parent::__construct();
			$this->load->model([
				'Mdetailpemesanan',
				'Mpemesanan',
				'Mpelanggan',
				'Malamatpen',
				'Mkecamatan',
				'Mkota',
				'Mmetpem',
				'Mpembayaran',
				'M_barang',
			]);

			//validasi customer
			if ($this->session->userdata('status_login') != 'customer_oke') {
				redirect(base_url('Clogin/login'));
			}
			
			/* config PAYMENT API */
            $this->server_domain = 'https://api.xendit.co';
            $this->secret_api_key = 'xnd_development_41Bf6WsBwmDg802BKdtNIQ0Vg0wLie3ZaRWxMSgQ3GnVojeH1uQYPITTuJaR4gU';
		}
		public function index()
		{
			$data['keranjang'] = $this->Mdetailpemesanan->get_null_id_pesan($this->session->userdata('id_pelanggan'));
			$data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));

			$alamat_pengiriman = $this->Malamatpen->get_alamat_ready($this->session->userdata('id_pelanggan'));
			$data_peng_kota = $this->Mkota->get_by_id($alamat_pengiriman->kota);
			$data_peng_kec = $this->Mkecamatan->get_by_id($alamat_pengiriman->kecamatan);

			$total_ongkir = 0;
			$total_ongkir = ($data_peng_kec->jarak * $data_peng_kec->harga) + $data_peng_kota->biaya;
			$data['total_ongkir'] = $total_ongkir;
			$data['data_peng_kota']=$data_peng_kota;
			$data['data_peng_kec']=$data_peng_kec;
			$data['alamat'] = $alamat_pengiriman;
			$this->load->view('kerangka/Header', $data);
			$this->load->view('menu_p/Vkeranjangku', $data);
			$this->load->view('kerangka/Footer');
		}

		public function checkout($iddetailpemesanan)
		{
			$data["update"] = "checkout";
			$detailpemesanan = $this->Mdetailpemesanan->get_row_null_id_pesan($iddetailpemesanan);
			$data["data_update"] = $detailpemesanan;

			$alamat_pengiriman = $this->Malamatpen->get_alamat_ready($this->session->userdata('id_pelanggan'));
			$data['alamat_pengiriman'] = $alamat_pengiriman;
			$data['metode_pembayaran'] = $this->Mmetpem->get_all();
			$data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));

			if (@$alamat_pengiriman->id_al_peng != null) {
				$data_peng_kota = $this->Mkota->get_by_id($alamat_pengiriman->kota);
				$data_peng_kec = $this->Mkecamatan->get_by_id($alamat_pengiriman->kecamatan);

				$total_ongkir = 0;
				$total_ongkir = ($data_peng_kec->jarak * $data_peng_kec->harga) + $data_peng_kota->biaya;
				$data['total_ongkir'] = $total_ongkir;

				$this->load->view('kerangka/Header', $data);
				$this->load->view('menu_p/Vcheckoutbarang', $data);
				$this->load->view('kerangka/Footer');
			} else {
				redirect(base_url('Ctm/Calamatpen'));
			}
		}

		public function lakukan_pemesanan_satuan()
		{
			$lastinsert = $this->Mpemesanan->get_last_pesan();

			$no_urut = (int) substr($lastinsert->id_pemesanan, 12, 3);
			$tambah_no_urut = $no_urut + 1;
			$nomor_pesanan = "FNR" . date("mdY") . "-" . sprintf("%03s", $tambah_no_urut);

			// $_REQUEST['nomor_pemesanan'] = $nomor_pesanan;
			// $payment = ;
			$dataMod = [];
			$dataMod['pelanggan'] = $this->Mpelanggan->get_by_id( $this->session->userdata('id_pelanggan') );
			$dataMod['detailPemesanan'] = $this->Mdetailpemesanan->get_by_id( $this->input->post('id_det_pem') );
			$dataMod['barang'] = $this->M_barang->get_by_id($dataMod['detailPemesanan']->id_barang);

			# config payment
			$dataMod['paymentConfig']['id'] = $nomor_pesanan;
			$dataMod['paymentConfig']['amount'] = ( $this->input->post('total_harga_barang')+$this->input->post('ongkir') );
			$dataMod['paymentConfig']['email'] = $dataMod['pelanggan']->email;
			$dataMod['paymentConfig']['keterangan'] = "Pembayaran dengan no pemesanan {$nomor_pesanan}";

			# create invoice
			$dataMod['payment'] = $this->createInvoice(
				$dataMod['paymentConfig']['id'],
				$dataMod['paymentConfig']['amount'],
				$dataMod['paymentConfig']['email'],
				$dataMod['paymentConfig']['keterangan']
			);
			 
			print_r(
				$dataMod
				// $this->createInvoice(
				// 	$nomor_pesanan,
				// 	( $this->input->post('total_harga_barang')+$this->input->post('ongkir') ),
				// 	$pelanggan->email,
				// 	$this->input->post('keterangan')
				// ) 
			);
			die();

			$data = array(
				'id_pesan' => $nomor_pesanan,
				'tgl_pesan' => date('Y-m-d'),
				'id_al_peng' => $this->input->post('id_al_peng'),
				'ongkir' => $this->input->post('ongkir'),
				'total_harga_barang' => $this->input->post('total_harga_barang'),
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'external_id' => $this->session->userdata('id_pelanggan'),
				'invoice_url' => $this->session->userdata('id_pelanggan')
			);
			$insert = $this->Mpemesanan->insert($data);
			$data_id = (object) $insert;

			//update id_pesan
			$data_update_pemesanan = array(
				"id_pesan" => $data_id->id_pesan
			);
			$update_det_pem = $this->Mdetailpemesanan->update_peng($this->input->post('id_det_pem'), $data_update_pemesanan);

			$detailpemesanan = $this->Mdetailpemesanan->get_by_id($this->input->post('id_det_pem'));

			//update stok barang
			$barang = $this->M_barang->get_by_id($detailpemesanan->id_barang);

			//pengurangan stok
			$stokbarang = $barang->stok - $detailpemesanan->jumlah_pesan;
			$data_update_barang = array(
				"stok" => $stokbarang
			);
			$update_barang = $this->M_barang->update($detailpemesanan->id_barang, $data_update_barang);

			$last_insert_pembayaran = $this->Mpembayaran->get_last_pembayaran();

			$no_urut_pembayaran = (int) substr($last_insert_pembayaran->id_pembayaran, 12, 3);
			$tambah_no_urut_pembayaran = $no_urut_pembayaran + 1;
			$id_pembayaran = "BYR" . date("mdY") . "-" . sprintf("%03s", $tambah_no_urut_pembayaran);

			$data_insert_pembayaran = array(
				"id_pembayaran" => $id_pembayaran,
				"id_pesan" => $nomor_pesanan,
				"id_met_pem" => $this->input->post('id_met_pem'),
				"jumlah_uang" => $this->input->post('total_harga'),
				"tgl_bayar" => date("Y-m-d"),
				"verifikasi" => 'belum bayar',
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'kadaluarsa' => time()
			);

			//insert ke pembayaran
			$insert_pembayaran = $this->Mpembayaran->insert($data_insert_pembayaran);

			if ($insert_pembayaran == true) {
				// echo $nomor_pesanan;
				echo json_encode(
					// 'status'=>'sukses',
					$nomor_pesanan
					// 'link' => "Ctm"."\/Cpembayaran"."\/detail_pembayaran"."\/".$nomor_pesanan
				);
			} else {
				echo json_encode(array(
					'status' => 'nosukses'
				));
			}
		}

		public function lakukan_pemesanan()
		{
			$lastinsert = $this->Mpemesanan->get_last_pesan();

			$no_urut = (int) substr($lastinsert->id_pemesanan, 12, 3);
			$tambah_no_urut = $no_urut + 1;
			$nomor_pesanan = "FNR" . date("mdY") . "-" . sprintf("%03s", $tambah_no_urut);

			$data = array(
				'id_pesan' => $nomor_pesanan,
				'tgl_pesan' => date('Y-m-d'),
				'id_al_peng' => $this->input->post('id_al_peng'),
				'ongkir' => $this->input->post('ongkir'),
				'total_harga_barang' => $this->input->post('total_harga_barang'),
				'id_pelanggan' => $this->session->userdata('id_pelanggan')
			);
			$insert = $this->Mpemesanan->insert($data);
			$data_id = (object) $insert;
			$data_pesanan = $this->Mdetailpemesanan->get_null_id_pesan($this->session->userdata('id_pelanggan'));
			$stokbarang = 0;
			foreach ($data_pesanan as $data_pesanan) {

				//update detail barang
				$data_update_pemesanan = array(
					"id_pesan" => $data_id->id_pesan
				);
				$update_det_pem = $this->Mdetailpemesanan->update_peng($data_pesanan->id_det_pem, $data_update_pemesanan);
				//update stok barang
				$barang = $this->M_barang->get_by_id($data_pesanan->id_barang);
				$stokbarang = $barang->stok - $data_pesanan->jumlah_pesan;
				$data_update_barang = array(
					"stok" => $stokbarang
				);
				$update_det_pem = $this->M_barang->update($data_pesanan->id_barang, $data_update_barang);
			}

			$last_insert_pembayaran = $this->Mpembayaran->get_last_pembayaran();

			$no_urut_pembayaran = (int) substr($last_insert_pembayaran->id_pembayaran, 12, 3);
			$tambah_no_urut_pembayaran = $no_urut_pembayaran + 1;
			$id_pembayaran = "BYR" . date("mdY") . "-" . sprintf("%03s", $tambah_no_urut_pembayaran);

			$data_insert_pembayaran = array(
				"id_pembayaran" => $id_pembayaran,
				"id_pesan" => $nomor_pesanan,
				"id_met_pem" => $this->input->post('id_met_pem'),
				"jumlah_uang" => $this->input->post('total_harga'),
				"tgl_bayar" => date("Y-m-d"),
				"verifikasi" => 'belum bayar',
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'kadaluarsa' => time()
			);

			//insert ke pembayaran
			$insert_pembayaran = $this->Mpembayaran->insert($data_insert_pembayaran);
			if ($insert_pembayaran == true) {
				echo json_encode(array(
					'status' => true,
					'id_pesan' => $nomor_pesanan
				));
			} else {
				echo json_encode(array(
					'status' => false
				));
			}
		}

		public function lanjutkan_pembelanjaan()
		{

			$data['update'] = "update";
			$belanja = $this->Mdetailpemesanan->get_null_id_pesan($this->session->userdata('id_pelanggan'));
			$jumlah = 0;
			$harga = 0;
			$sub_total_harga = 0;
			$total_harga = 0;

			foreach ($belanja as $data_belanja) {
				$jumlah = $data_belanja->jumlah_pesan;
				$harga = $data_belanja->harga;
				$sub_total_harga = $jumlah * $harga;
				$total_harga = $total_harga + $sub_total_harga;
				// var_dump($total_harga);
			}
			$data['total_harga'] = $total_harga;
			$alamat_pengiriman = $this->Malamatpen->get_alamat_ready($this->session->userdata('id_pelanggan'));
			$data_peng_kota = $this->Mkota->get_by_id($alamat_pengiriman->kota);
			$data_peng_kec = $this->Mkecamatan->get_by_id($alamat_pengiriman->kecamatan);
			$data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));
			$data['alamat_pengiriman'] = $alamat_pengiriman;
			$data['data_peng_kota']=$data_peng_kota;
			$data['data_peng_kec']=$data_peng_kec;
			$data['metode_pembayaran'] = $this->Mmetpem->get_all();

			if (@$alamat_pengiriman->id_al_peng != null) {

				$data_peng_kota = $this->Mkota->get_by_id(@$alamat_pengiriman->kota);
				$data_peng_kec = $this->Mkecamatan->get_by_id(@$alamat_pengiriman->kecamatan);

				$total_ongkir = 0;
				$total_ongkir = (@$data_peng_kec->jarak * @$data_peng_kec->harga) + @$data_peng_kota->biaya;
				$data['total_ongkir'] = @$total_ongkir;

				$this->load->view('kerangka/Header', $data);
				$this->load->view('menu_p/Vcheckout', $data);
				$this->load->view('kerangka/Footer');
			} else {
				redirect(base_url('Ctm/Cprofil'));
			}
		}

		public function update_action()
		{
			$data_update = array(
				"id_pesan" => $this->input->post('id_pesan'),
				"alamat_lengkap" => $this->input->post('id_al_peng'),
			);

			$this->Mpemesanan->update($this->input->post('id_pesan'), $data_update);
			redirect(base_url("Ctm/Cpemesanan"));
		}

		public function update_alamat_pengiriman()
		{
			$lastinsert = $this->Mpembayaran->get_last_pembayaran();

			$no_urut = (int) substr($lastinsert->id_pembayaran, 12, 3);
			$tambah_no_urut = $no_urut + 1;
			$id_pembayaran = "BYR" . date("mdY") . "-" . sprintf("%03s", $tambah_no_urut);

			$data_update = array(
				"ongkir" => $this->input->post('ongkir'),
				"id_al_peng" => $this->input->post('id_al_peng'),
			);
			// die();

			$data_insert_pembayaran = array(
				"id_pembayaran" => $id_pembayaran,
				"id_pesan" => $this->input->post('id_pesan'),
				"id_met_pem" => $this->input->post('id_met_pem'),
				"jumlah_uang" => $this->input->post('total_harga'),
				"verifikasi" => 'belum bayar',
			);

			//insert ke pembayaran
			$insert = $this->Mpembayaran->insert($data_insert_pembayaran);

			//update pemesanan
			$update = $this->Mpemesanan->update_peng($this->input->post('id_pesan'), $data_update);

			if ($update == true) {
				echo json_encode(array(
					'status' => 'sukses'
				));
			} else {
				echo json_encode(array(
					'status' => 'nosukses'
				));
			}
		}

		public function hitung_ongkir($id_al_peng)
		{
			$id_al_peng;

			$data_peng = $this->Malamatpen->get_by_id($id_al_peng);
			$data_peng_kota = $this->Mkota->get_by_id($data_peng->kota);
			$data_peng_kec = $this->Mkecamatan->get_by_id($data_peng->kecamatan);
			$total_ongkir = 0;
			$total_ongkir = ($data_peng_kec->jarak * $data_peng_kec->harga) + $data_peng_kota->biaya;
			echo json_encode($total_ongkir);
		}

		public function hapus()
		{
			$id = $this->input->post("id");
			$hapus_data = $this->Mdetailpemesanan->delete($id);
			// echo "data terhapus";
			redirect("Ctm/Ckeranjang");
		}

		/* START PAYMENT */
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
		/* END PAYMENT */
	}
