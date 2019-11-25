<?php
  require_once '../core/init.php';
  if (!is_logged_in()) {
    header('Location: login.php');
  }
  include 'includes/head.php';
  include 'includes/navigation.php';

  //Konfirmasi order
  if (isset($_GET['complete']) && $_GET['complete'] == 1) {
    $cart_id = sanitize($_GET['cart_id']);
    $db->query("UPDATE cart SET shipped = 1 WHERE id = '{$cart_id}'");
    $_SESSION['success_flash'] = 'Orderan berhasil dikonfirmasi!';
    header('Location: index.php');
  }

  $txn_id = sanitize($_GET['txn_id']);
  $txnQuery = $db->query("SELECT * FROM transactions WHERE id = '{$txn_id}'");
  $txn = mysqli_fetch_assoc($txnQuery);
  $cart_id = $txn['cart_id'];
  $cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
  $cart = mysqli_fetch_assoc($cartQ);
  $items = json_decode($cart['items'],true);
  $idArray = array();
  $products = array();
  foreach($items as $item){
    $idArray[] = $item['id'];
  }
  $ids = implode(',',$idArray);
  $productQ = $db->query(
    "SELECT i.id as 'id', i.title as 'title', c.id as 'cid', c.category as 'child', p.category as 'parent'
    FROM products i
    LEFT JOIN categories c ON i.categories = c.id
    LEFT JOIN categories p ON c.parent = p.id
    WHERE i.id IN ({$ids})
");
  foreach ($productQ as $produk) {
    foreach($items as $item){
      if ($item['id'] == $produk['id']) {
        $x = $item;
        continue;
      }
    }
    $products[] = array_merge($x,$produk);
  }
?>
<div class="container">
  <h2 class="text-center">Orderan Barang</h2><hr>
  <table class="table table-condensed table-bordered table-striped">
    <thead>
      <th>Quantity</th>
      <th>Title</th>
      <th>Kategori</th>
      <th>Ukuran</th>
    </thead>
    <tbody>
      <?php foreach($products as $produk) : ?>
      <tr>
        <td><?=$produk['quantity'];?></td>
        <td><?=$produk['title'];?></td>
        <td><?=$produk['parent'].'->'.$produk['child'];?></td>
        <td><?=$produk['size'];?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="row">
    <div class="col-md-6">
      <h3 class="text-center">Detail Order</h3>
      <table class="table table-condensed table-striped table-bordered">
        <tbody>
          <tr>
            <td>Sub Total</td>
            <td><?=money($txn['sub_total']);?></td>
          </tr>
          <tr>
            <td>Ongkir</td>
            <td><?=money($txn['tax']);?></td>
          </tr>
          <tr>
            <td>Grand Total</td>
            <td><?=money($txn['grand_total']);?></td>
          </tr>
          <tr>
            <td>Tanggal Order</td>
            <td><?=indonesian_date($txn['txn_date']);?></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="col-md-6">
        <h3 class="text-center">Alamat Pembeli</h3>
        <address>
          <b>Nama Lengkap : </b><?=$txn['full_name'];?><br>
          <b>Alamat : </b><?=$txn['street'];?><br>
          <b>Alamat 2 : </b><?=($txn['street2'] != '')?$txn['street2'].'<br>':'';?>
          <b>Kota / Provinsi / Kodepos : </b><?=$txn['city'].', '.$txn['state'].' '.$txn['zip_code'];?><br>
          <b>Negara : </b><?=$txn['country'];?><br>
        </address>
      </div>
      <div class="pull-right">
        <a href="index.php" class="btn btn-large btn-default">Cancel</a>
        <a href="orders.php?complete=1&cart_id=<?=$cart_id;?>" class="btn btn-large btn-primary">Konfirmasi</a>
      </div>
    </div>
  </div>
<?php include 'includes/footer.php'; ?>
