const gagal         = $('.gagal').data('gagal');
const warning       = $('.warning').data('warning');
const success       = $('.success').data('success');
const error         = $('.error').data('error');
const salah         = $('.salah').data('salah');
const info          = $('.info').data('info');

if( info ) {
    Swal.fire({
        title: 'Info',
        text: info,
        icon: 'info'
    });
}

if( gagal ) {
    Swal.fire({
        title: 'Gagal Masuk',
        text: gagal,
        icon: 'error'
    });
}

if( salah ) {
    Swal.fire({
        title: salah,
        text: '',
        icon: 'error'
    });
}

if( error ) {
    Swal.fire({
        title: 'Error',
        text: error,
        icon: 'error'
    });
}

if( warning ) {
    Swal.fire({
        title: 'Peringatan',
        text: warning,
        icon: 'warning'
    });
}

if( success ) {
    Swal.fire({
        title: 'success',
        text: success,
        icon: 'success'
    });
}

$('.btn-hapus').on('click', function (event) {
    event.preventDefault();
    const objek = $(this).attr('href'); 

    Swal.fire({
        title: 'Apakah Anda Yakin..??',
        text: "Data Akan Di Hapus!!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = objek;
        }
    });
});

$(document).ready(function () {
    $('#tanggal_lahir').bootstrapMaterialDatePicker({
        format: 'DD-MMMM-YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    })
    
    $('#tgl_lahir').bootstrapMaterialDatePicker({
        format: 'DD-MMMM-YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    })
    
    $('#tanggal').bootstrapMaterialDatePicker({
        format: 'dddd, DD-MMMM-YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    })

    $('#masuk_kerja').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    })
    
    $('#pulang_kerja').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    })
})

function tampilkanwaktu() {         
    var waktu = new Date();            
    var sh = waktu.getHours() + "";    
    var sm = waktu.getMinutes() + "";   
    var ss = waktu.getSeconds() + "";  
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
}