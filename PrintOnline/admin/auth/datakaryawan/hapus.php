<?php
require 'function.php';

mysqli_query($conn, "DELETE FROM karyawan WHERE id_krw = '$_GET[id]'") or die(mysqli_error($conn));
echo "<script>window.location ='datakaryawan.php';</script>";
