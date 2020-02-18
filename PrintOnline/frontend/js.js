$(document).ready(function () {
    $('.datauser').hide();
    // Validasi Nama Lengkap
    $('#nama_user').on('keyup', function () {
        var regex = /^[a-z A-Z]+$/;
        if (regex.test(this.value) !== true) {
            this.value = this.value.replace(/[^a-zA-Z]+/, '');
        } else if ($(this).val().length < 5) {
            $('.nama_user').text('Anda Yakin Nama Anda Terdiri Dari ' + $(this).val().length + ' Huruf?');
        } else {
            $('.nama_user').text('');
        }
        if ($(this).val().length == 0) {
            $('.nama_user').text('Nama Harus Di isi!');
        }
    });

    // validasi email
    $('#email').on('keyup', function () {
        var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!this.value.match(valid)) {
            $('.email').text('Isi Email dengan Benar!');
            email = false;
        } <
        ?
        php foreach($result1 as $pelanggan): ? >
            else if ($(this).val() == "<?= $pelanggan['email']; ?>") {
                $('.email').text('Email Sudah Terdaftar!');
                $('.email1').text('');
                email = false;
            } <
            ?
        php endforeach; ? >
        else {
            $('.email').text('');
            $('.email1').text('Email dapat digunakan');
            email = true;
        }
    });

    // validasi nohp
    $('#nohp_user').on('keyup', function () {
        var regex = /^[0-9]+$/;
        if (regex.test(this.value) !== true) {
            this.value = this.value.replace(/[^0-9]+/, '');
        } else {
            $('.nohp_user').text('');
        }

        if ($(this).val().length < 12) {
            $('.nohp_user').text('maksimal 12 angka!');
            nohp_user = false;
        } else {
            $('.nohp_user').text('');
            nohp_user = true;
        }

    });

    // validasi kata sandi
    $('#password').on('keyup', function () {
        var regex = /[a-z]/g;
        var upperCaseLetters = /[A-Z]/g;
        var numbers = /[0-9]/g;

        if ($(this).val().length < 8) {
            $('.password').text('Password Minimal 8 digit (huruf besar dan huruf kecil, dan angka)');
            password = false;
        } else {
            if (regex.test(this.value) !== true) {
                $('.password').text('Password harus berisi huruf kecil');
                password = false;
            } else {
                if (upperCaseLetters.test(this.value) !== true) {
                    $('.password').text('Password harus berisi huruf besar');
                    password = false;
                } else {
                    if (numbers.test(this.value) !== true) {
                        $('.password').text('Password harus berisi angka');
                        password = false;
                    } else {
                        $('.password').text('');
                        password = true;
                    }
                }
            }
        }

    });
    $('#password2').on('keyup', function () {
        if ($(this).val() != $('#password').val()) {
            $('.password2').text('Password Tidak Sama');
            password2 = false;
        } else {
            $('.password2').text('');
            password2 = true;
        }
    });

    $('.selanjutnya').on('click', function () {
        if ($('#nama_user').val() === '') {
            $('.nama_user').text('Nama Harus Di isi!');
        } else if ($('#email').val() === '') {
            $('.email').text('Email Harus Di isi!');
        } else if (email == false) {
            $('.email').text('Isi Email dengan Benar!');
        } else if ($('#password').val() === '') {
            $('.password').text('Password Harus Di Isi!');
        } else if ($('#password2').val() === '') {
            $('.password2').text('Password Harus Di Isi!');
        } else if (password2 == false) {
            $('.password2').text('Password Harus sama');
        } else if (password == false) {
            $('.password1').text('Password Minimal 8 Digit (huruf besar dan huruf kecil, dan angka)');
        } else {
            $('.judul').text('Akun Masuk');
            $('.datadiri').hide();
            $('.datauser').show();
        }
    });

    // validasi kode pos
    $('#kodepos').on('keyup', function () {
        var regex = /^[0-9]+$/;
        if (regex.test(this.value) !== true) {
            this.value = this.value.replace(/[^0-9]+/, '');
        } else {
            $('.kodepos').text('');
        }

        if ($(this).val().length < 5) {
            $('.kodepos').text('minimal 5 angka!');
        } else {
            $('.kodepos').text('');
        }

    });


    // Validasi jenis kelamin
    $('#jenis_kelamin').on('keyup', function () {
        var regex = /^[L  P l  p]+$/;
        if (regex.test(this.value) !== true) {
            this.value = this.value.replace(/[^L P]+/, '');
        } else {
            $('.jenis_kelamin').text('');
        }
        if ($(this).val().length == 0) {
            $('.jenis_kelamin').text('laki laki (L) atau perempuan (P)!');
        }
    });


    $("#provinsi").append('<option value="">Pilih</option>');
    $("#kabupaten").html('');
    $("#kecamatan").html('');
    $("#kabupaten").append('<option value="">Pilih</option>');
    $("#kecamatan").append('<option value="">Pilih</option>');
    url = 'include/get_provinsi.php';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            for (var i = 0; i < result.length; i++)
                $("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[
                    i].nama_prov + '</option>');
        }
    });
});
$("#provinsi").change(function () {
    var id_prov = $("#provinsi").val();
    var url = 'include/get_kabupaten.php?id_prov=' + id_prov;
    $("#kabupaten").html('');
    $("#kecamatan").html('');
    $("#kabupaten").append('<option value="">Pilih</option>');
    $("#kecamatan").append('<option value="">Pilih</option>');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            for (var i = 0; i < result.length; i++)
                $("#kabupaten").append('<option value="' + result[i].id_kabkot + '">' + result[
                    i].nama_kabkot + '</option>');
        }
    });
});
$("#kabupaten").change(function () {
var id_kabkot = $("#kabupaten").val();
var url = 'include/get_kecamatan.php?id_kabkot=' + id_kabkot;
$("#kecamatan").html('');
$("#kecamatan").append('<option value="">Pilih</option>');
$.ajax({
    url: url,
    type: 'GET',
    dataType: 'json',
    success: function (result) {
        for (var i = 0; i < result.length; i++)
            $("#kecamatan").append('<option value="' + result[i].id_kec + '">' + result[
                i].nama_kec + '</option>');
    }
});

});
});