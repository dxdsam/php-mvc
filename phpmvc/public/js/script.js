$(function() {

	$('.tampilModalUbah').on('click', function() {
		// /console.log('ok');
		$('#formModalLabel').html('Ubah Data Siswa');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/siswa/ubah')
		$('.modal-footer button[type=submit]').html('Ubah Data');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/phpmvc/public/siswa/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#nama').val(data.nama)
				$('#nrp').val(data.nisn)
				$('#email').val(data.kelas)
				$('#id').val(data.id)
			}

		});
	});

	$('.tombolTambahData').on('click', function() {
		$('#formModalLabel').html('Tambah Data Siswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#nama').val()
		$('#nisn').val()
		$('#kelas').val()
		$('#id').val()
	});


});