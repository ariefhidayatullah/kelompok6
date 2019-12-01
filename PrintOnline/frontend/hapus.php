<?php
require 'function.php';
mysqli_query($conn, "DELETE * FROM keranjang WHERE id_cart = '$_GET[id]'") or die(mysqli_error($conn));
echo "<script>window.location ='cart.php';</script>";
