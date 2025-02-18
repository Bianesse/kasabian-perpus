function confirmDelete(event, button) {
    event.preventDefault(); // Prevent the default button behavior

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data ini akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            // Find the form and submit it after confirmation
            let form = button.closest('form');
            if (form) {
                form.submit(); // Submit the form
            }
        }
    });
}