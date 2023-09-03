const dark = document.getElementById('sun')
const mode = dark.classList
const change = document.querySelector('html')
// console.log(change);
const isDark = localStorage.getItem('darkMode') === 'true'
if (isDark) {
    mode.remove('fa-sun');
    mode.add('fa-moon');
    change.classList.add('dark');
}
function DarkMode() {
    if (mode.contains('fa-sun')) {
        mode.remove('fa-sun');
        mode.add('fa-moon');
        change.classList.add('dark');
        mode.remove('text-orange-500');
        localStorage.setItem('darkMode', 'true');
    } else {
        mode.remove('fa-moon');
        mode.add('fa-sun');
        change.classList.remove('dark');
        mode.add('text-orange-500');
        localStorage.setItem('darkMode', 'false');
    }
}
function SideDown(event) {
    event.preventDefault();
    const dropdown = document.getElementById('dropdown');
    dropdown.classList.toggle('hidden');
}
document.addEventListener("DOMContentLoaded", function () {
    const deleteButton = document.querySelectorAll(".deleteButton");
    deleteButton.forEach(element => {
        console.log(element);
        element.addEventListener("click", function (event) {
            const deleteForm = event.target.closest('form')
            event.preventDefault(); // Mencegah tindakan default form
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data ini akan di hapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Data berhasil di hapus',
                        'success'
                    )
                    deleteForm.submit(); // Mengirim form untuk melakukan DELETE request
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        "Cancelled",
                        "Berhasil membatalkan penghapusan data",
                        "error"
                    );
                }
            });
        });

    });


    const logoutForm = document.querySelector('#formLogout')
    logoutForm.addEventListener('submit', (e) => {
        e.preventDefault()

        Swal.fire({
            title: 'Apakah anda ingin logout?',
            text: "Ingat token anda untuk login kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    text: 'Logout berhasil'
                }
                )
                logoutForm.submit()
            }
        })
    })


    const status = document.querySelectorAll('.statusButton')
    status.forEach(e => {
        e.addEventListener('click', function (event) {
            const form = event.target.closest('form')
            event.preventDefault();
            Swal.fire({
                title: "Apakah project ini sudah terselesaikan ? ",
                text: "Project ini akan di tandai dengan status Terselesaikan",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Terselesaikan",
                cancelButtonText: "Cancel",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Terselesaikan!',
                        'Berhasil menandai project',
                        'success'
                    )
                    form.submit(); // Mengirim form untuk melakukan DELETE request
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        "Cancelled",
                        "Project belum terselesaikan",
                        "error"
                    );
                }
            });
        })
    })

});