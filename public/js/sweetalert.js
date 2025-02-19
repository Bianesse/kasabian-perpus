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

function confirmApprove(event, button) {
    event.preventDefault(); // Prevent the default button behavior

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Akun ini akan di approve!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#22c55e ",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya!",
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

function confirmReject(event, button) {
    event.preventDefault(); // Prevent the default button behavior

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Akun ini akan di reject!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya!",
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

function confirmLogout(event, button) {
    event.preventDefault(); // Prevent the default button behavior
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan Logout",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya!",
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

/* function confirmKonfirmasi(event, button) {
    event.preventDefault(); // Prevent the default button behavior
    console.log(button.closest('form'));
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan konfirmasi peminjaman/pengembalian buku ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya!",
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

function confirmTolak(event, button) {
    event.preventDefault(); // Prevent the default button behavior

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan tolak peminjaman/pengembalian buku ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya!",
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

function confirmKembalikan(event, button) {
    event.preventDefault(); // Prevent the default button behavior

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan kembalikan buku ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya!",
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
} */
