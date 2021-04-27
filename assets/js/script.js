$(document).ready(function() {
	$('#dosen').on('change', function() {
		const nidn = $(this).val();
		const url = $(this).data('url');	

		$('#makul').html('');
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {nidn: nidn},
			success: data => {
				if (data.length == 0) {
					alert('Mata Kuliah tidak ada!');
				}

				$.each(data, function(i, val) {
					$('#makul').append(`
						<option value="${val.kode_makul}">${val.nama_makul}</option>
					`);					 
				});			
			},			
		});		
	});
});