const flashdata = $('.flashdata').data('flashdata');

if (flashdata) {
  Swal.fire({
    title: 'Batalkan Pemesanan' + flashdata,
    text: 'Berhasil ',
    type: 'success'
  });
}
