<?php
require_once 'core/init.php';
$full_name = sanitize($_POST['full_name']);
$email = sanitize($_POST['email']);
$street = sanitize($_POST['street']);
$street2 = sanitize($_POST['street2']);
$city = sanitize($_POST['city']);
$state = sanitize($_POST['state']);
$zip_code = sanitize($_POST['zip_code']);
$country = sanitize($_POST['country']);
$tax = sanitize($_POST['tax']);
$sub_total = sanitize($_POST['sub_total']);
$grand_total = sanitize($_POST['grand_total']);
$cart_id = sanitize($_POST['cart_id']);
$description = sanitize($_POST['description']);
$txn_date = date("Y-m-d H:i:s");
//menyesuaikan persediaan
$itemQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
$iresults = mysqli_fetch_assoc($itemQ);
$items = json_decode($iresults['items'],true);
foreach($items as $item){
  $newSizes = array();
  $item_id = $item['id'];
  $productQ = $db->query("SELECT * FROM products WHERE id = '{$item_id}'");
  $product = mysqli_fetch_assoc($productQ);
  $sizes = sizesToArray($product['sizes']);
  foreach ($sizes as $size) {
    if ($size['size'] == $item['size']) {
      $q = $size['quantity'] - $item['quantity'];
      $newSizes[] = array('size' => $size['size'],'quantity' => $q);
    }else{
      $newSizes[] = array('size' => $size['size'],'quantity' => $size['quantity']);
    }
  }
  $sizeString = sizesToString($newSizes);
  $db->query("UPDATE products SET sizes = '{$sizeString}' WHERE id = '{$item_id}'");
}

$db->query("UPDATE cart SET paid = 1 WHERE id = '{$cart_id}'");
$db->query("INSERT INTO transactions
  (cart_id,full_name,email,street,street2,city,state,zip_code,country,sub_total,tax,grand_total,description,txn_date) VALUES
  ($cart_id,'$full_name','$email','$street','$street2','$city','$state','$zip_code','$country',$sub_total,$tax,$grand_total,'$description','$txn_date')");

$domain = ($_SERVER['HTTP_HOST'] != "localhost")? '.'.$_SERVER['HTTP_HOST']:false;
setcookie(CART_COOKIE,'',1,"/",$domain,false);
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerpartial.php';
?>
  <h1 class="text-center text-success">Terima Kasih :)</h1>
  <p> Kartu anda berhasil ditagih <strong><?=money($grand_total);?></strong>.</p>
  <p>Anda telah menerima email, Silahkan cek spam jika anda tidak menerima email dari kami
  Selain itu anda dapat mencetak halaman ini sebagai tanda terima.</p>
  <p>Nomor tanda terima anda : <strong><?=$cart_id;?></strong></p>
  <p>Pesanan anda akan dikirim ke alamat dibawah ini.</p>
  <address>
    <?=$full_name;?><br>
    <?=$street;?><br>
    <?=(($street2 != '')?$street2.'<br>':'');?>
    <?=$city. ', '.$state.' '.$zip_code;?>
    <?=$country;?><br>
  </address>
<?php
include 'includes/footer.php';
?>
