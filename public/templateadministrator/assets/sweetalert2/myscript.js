const flash = $('.flash').data('flas1');
	if(flash){
		Swal.fire({
			icon: 'warning',
			text: flash,
			})
	}

    $('.tombol').on('click', function(e){
        e.preventDefault();
        const nana=$(this).attr('href');
        Swal({

                title: 'Apakah Anda Yakin?',
                text: "Data Akan Dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
            }).then((result) => {
                if (result.value) {
                    document.location.href = nana;
                    }
            })
        })

    