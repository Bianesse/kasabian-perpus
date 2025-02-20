function confirmDelete(event, button) {
    event.preventDefault();

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

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
}

function confirmApprove(event, button) {
    event.preventDefault();

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

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
}

function confirmReject(event, button) {
    event.preventDefault();

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

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
}

function confirmBayar(event, button) {
    event.preventDefault();

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Denda ini akan dibayar!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#22c55e ",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
}

function confirmLogout(event, button) {
    event.preventDefault();
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

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
}

function rejectDelete(event, button) {
    event.preventDefault();
    Swal.fire({
        title: "Tidak Boleh",
        text: "Buku ini sedang dipinjam!",
        icon: "warning",
    })
}

/* function confirmKonfirmasi(event, button) {
    event.preventDefault();
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

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
}

function confirmTolak(event, button) {
    event.preventDefault();

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

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
}

function confirmKembalikan(event, button) {
    event.preventDefault();

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

            let form = button.closest('form');
            if (form) {
                form.submit();
            }
        }
    });
} */
