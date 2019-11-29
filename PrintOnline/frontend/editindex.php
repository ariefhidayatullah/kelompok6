<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wilayah Based On Select</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-lg-2">&nbsp;</div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="position: static;">
                            <label for="Provinsi">Provinsi</label>
                            <select class="form-control" id="provinsi"></select>
                        </div>
                        <div class="form-group" style="position: static;">
                            <label for="Kabupaten">Kabupaten</label>
                            <select class="form-control" id="kabupaten"></select>
                        </div>
                        <div class="form-group" style="position: static;">
                            <label for="Kecamatan">Kecamatan</label>
                            <select class="form-control" id="kecamatan"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
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
                success: function(result) {
                    for (var i = 0; i < result.length; i++)
                        $("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[
                            i].nama_prov + '</option>');
                }
            });
        });
        $("#provinsi").change(function() {
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
                success: function(result) {
                    for (var i = 0; i < result.length; i++)
                        $("#kabupaten").append('<option value="' + result[i].id_kabkot + '">' + result[
                            i].nama_kabkot + '</option>');
                }
            });
        });
        $("#kabupaten").change(function() {
            var id_kabkot = $("#kabupaten").val();
            var url = 'include/get_kecamatan.php?id_kabkot=' + id_kabkot;
            $("#kecamatan").html('');
            $("#kecamatan").append('<option value="">Pilih</option>');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    for (var i = 0; i < result.length; i++)
                        $("#kecamatan").append('<option value="' + result[i].id_kec + '">' + result[
                            i].nama_kec + '</option>');
                }
            });
        });
    </script>
</body>

</html>