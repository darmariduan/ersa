    const layanan = $('#layanan-tambah').data('layanan');
    const hapusLayanan = $('#hapus-layanan').data('layanan');
    const editLayanan = $('#edit-layanan').data('layanan');
    const subLayanan = $('#sublayanan-tambah').data('sublayanan');
    
    if (layanan) {
        Swal.fire({
            icon: 'success',
            title: layanan,
            timer: 1500, // Waktu dalam milidetik sebelum SweetAlert tertutup secara otomatis
            showConfirmButton: false
        })
    }
    if (editLayanan) {
        Swal.fire({
            icon: 'success',
            title: editLayanan,
            timer: 1500, // Waktu dalam milidetik sebelum SweetAlert tertutup secara otomatis
            showConfirmButton: false
        })
    }
    if (hapusLayanan) {
        Swal.fire({
            icon: 'success',
            title: hapusLayanan,
            timer: 1500, // Waktu dalam milidetik sebelum SweetAlert tertutup secara otomatis
            showConfirmButton: false
        })
    }


    if (subLayanan) {
        Swal.fire({
            icon: 'success',
            title: subLayanan,
            timer: 1500, // Waktu dalam milidetik sebelum SweetAlert tertutup secara otomatis
            showConfirmButton: false
        })
    }

   

   
