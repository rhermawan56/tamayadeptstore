var btnDeleteEmployee = document.getElementsByClassName('btnDeleteEmployee')
var mycache = localStorage

// for click delete

for (let index = 0; index < btnDeleteEmployee.length; index++) {
    const element = btnDeleteEmployee[index];
    $(element).click(function () {
        Swal.fire({
            icon: 'error',
            title: 'Hapus Karyawan?',
            text: 'Apakah anda yakin akan menghapus data karyawan?',
            showCancelButton: true,
            cancelButtonText: 'Tidak!',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    idUser: $(this).attr('data-user'),
                    idEmployee: $(this).attr('data-employee')
                }

                // fetch('/employee/delete?idEmployee='+data['idEmployee']+'&idUser='+data['idUser'])
                //     .then(response => response.json())
                //     .then(data => console.log(data))

                $.ajax({
                    method: "GET",
                    url: "/employee/delete",
                    data: {
                        user_id: data['idUser'],
                        employee_id: data['idEmployee']
                    },
                    beforeSend: function () {
                        console.log('untuk animasi loading')
                    }
                })
                    .done(function (data) {
                        if (data['status_user'] == true && data['status_user'] == data['status_employee']) {
                            localStorage['status'] = data['message_success']
                            localStorage['status_io'] = 'Sukses '
                            localStorage['status_bootstrap'] = 'alert-success'
                            localStorage['data'] = data['status_user']
                            location.reload()
                        } else {
                            console.log(data)
                            localStorage['status'] = data['message_fail']
                            localStorage['status_io'] = 'Gagal '
                            localStorage['status_bootstrap'] = 'alert-danger'
                            localStorage['data'] = data['status_user']
                            location.reload()
                        }
                    });
            }
        })
    })
}
// end for click delete

// click button Edit Data Login
$('#btnEditLogin').click(function () {
    Swal.fire({
        icon: 'question',
        title: 'Ubah Data Login',
        text: 'Apakah anda akan mengubah data login?',
        showCancelButton: true,
        cancelButtonText: 'Tidak!',
        confirmButtonText: 'Ya',
    }).then((result) => {
        if (result.isConfirmed) {
            const user_id = $('#btnEditLogin').attr('data-id')
            $(location).attr('href', '/employee/edit-login/'+user_id)
        }
    })
})
// end click button Edit Data Login

$(function () {
    if (mycache['status'] != null) {
        $('#messageDelete').show()
        $('#messageDelete').addClass(mycache['status_bootstrap'])
        $('#messageDelete strong').html(mycache['status_io'])
        $('#messageDelete span').html(mycache['status'])
        setTimeout(() => {
            delete mycache.status
            delete mycache.status_bootstrap
            delete mycache.status_io
        }, 1000);
    }

    $.ajaxSetup({
        headers: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    });
})
