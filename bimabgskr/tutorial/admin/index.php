<?php
require_once '../core/init.php';
if(!is_logged_in()){
  header('Location: login.php');
}
include 'includes/head.php';
include 'includes/navigation.php';

$txnQuery = "SELECT t.id, t.cart_id, t.full_name, t.description, t.txn_date, t.grand_total, c.items, c.paid, c.shipped
             FROM transactions t
             LEFT JOIN cart c ON t.cart_id = c.id
             WHERE c.paid = 1 AND c.shipped = 0
             ORDER BY t.txn_date";
$query = $db->query($txnQuery);
?>
<div class="container">
  <div class="col-md-12">
    <h3 class="text-center">Orderan Masuk</h3><hr>
    <table class="table table-condensed table bordered table-striped">
      <thead>
        <th></th><th>Nama</th><th>Deskripsi</th><th>Total</th><th>Tanggal</th>
      </thead>
      <tbody>
        <?php foreach($query as $q): ?>
        <tr>
          <td><a href="orders.php?txn_id=<?=$q['id'];?>" class="btn btn-xs btn-info">Detail</a></td>
          <td><?=$q['full_name'];?></td>
          <td><?=$q['description'];?></td>
          <td><?=money($q['grand_total']);?></td>
          <td><?=indonesian_date($q['txn_date']);?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="row">
    <!--Penjualan Perbulan-->
    <?php
      $thisYr = date("Y");
      $lastYr = $thisYr - 1;
      $thisYrQ = $db->query("SELECT grand_total, txn_date FROM transactions WHERE YEAR(txn_date) = '{$thisYr}'");
      $lastYrQ = $db->query("SELECT grand_total, txn_date FROM transactions WHERE YEAR(txn_date) = '{$lastYr}'");
      $current = array();
      $last = array();
      $currentTotal = 0;
      $lastTotal = 0;

      foreach($thisYrQ as $year){
        $month = date("m",strtotime($year['txn_date']));
        if (!array_key_exists($month,$current)) {
          $current[(int)$month] = $year['grand_total'];
        }else{
          $current[(int)$month] += $year['grand_total'];
        }
        $currentTotal += $year['grand_total'];
      }

      foreach($lastYrQ as $last){
          $month = date("m",strtotime($last['txn_date']));
          if (!array_key_exists($month,$current)) {
            $last[(int)$month] = $last['grand_total'];
          }else{
            $last[(int)$month] += $last['grand_total'];
          }
          $lastTotal += $last['grand_total'];
      }
    ?>
    <div class="col-md-4">
      <h3 class="text-center">Penjualan Perbulan</h3><hr>
      <table class="table table-condensed table-striped table-bordered">
        <thead>
          <th></th>
          <th><?=$lastYr;?></th>
          <th><?=$thisYr;?></th>
        </thead>
        <tbody>
          <?php for($i = 1; $i <= 12; $i++):
            $dt = DateTime::createFromFormat('!m',$i)
          ?>
          <tr<?=(date("m") == $i)?' class="info"':'';?>>
            <td><?=$dt->format("F");?></td>
            <td><?=(array_key_exists($i,$last))?money($last[$i]):money(0);?></td>
            <td><?=(array_key_exists($i,$current))?money($current[$i]):money(0);?></td>
          </tr>
          <?php endfor; ?>
          <tr>
            <td>Total</td>
            <td><?=money($lastTotal);?></td>
            <td><?=money($currentTotal);?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Persediaan -->
    <?php
    $iQuery = $db->query("SELECT * FROM products WHERE deleted = 0");
    $lowItems = array();
    foreach($iQuery as $produk){
      $item = array();
      $sizes = sizesToArray($produk['sizes']);
      foreach($sizes as $size){
        if ($size['quantity'] <= $size['threshold']) {
          $cat = get_category($produk['categories']);
          $item = array(
            'title' => $produk['title'],
            'size' => $size['size'],
            'quantity' => $size['quantity'],
            'threshold' => $size['threshold'],
            'category' => $cat['parent'] . ' ~ '.$cat['child']
          );
          $lowItems[] = $item;
        }
      }
    }
    ?>
    <div class="col-md-8">
      <h3 class="text-center">Persediaan Rendah</h3><hr>
      <table class="table table-condensed table-striped table-bordered">
        <thead>
          <th>Produk</th>
          <th>Kategori</th>
          <th>Ukuran</th>
          <th>Quantity</th>
          <th>Permulaan</th>
        </thead>
        <tbody>
          <?php foreach($lowItems as $item): ?>
          <tr<?=($item['quantity'] == 0)?' class="danger"':'';?>>
            <td><?=$item['title'];?></td>
            <td><?=$item['category'];?></td>
            <td><?=$item['size'];?></td>
            <td><?=$item['quantity'];?></td>
            <td><?=$item['threshold'];?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'includes/footer.php';?>
