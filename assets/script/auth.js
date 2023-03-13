const registration = $('.registration').data('registration');

if (registration) {
    Swal.fire({
        icon: 'success',
        title: 'Pendaftaran Berhasil',
        text: registration,
      })
}