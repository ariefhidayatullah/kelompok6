<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/tutorial/core/init.php';
if(!is_logged_in()){
  login_error_redirect();
}
include 'includes/head.php';
include 'includes/navigation.php';

if (isset($_GET['delete'])) {
  $delID = (int)$_GET['delete'];
  $delID = sanitize($delID);
  $delSql = "UPDATE products SET deleted = 1 WHERE id = '$delID'";
  $db->query($delSql);
  header('Location: products.php');
}

$dbpath = '';
if (isset($_GET['add']) || isset($_GET['edit'])) {
  $brandQ = $db->query("SELECT * FROM brand ORDER BY brand");
  $parentQ = $db->query("SELECT * FROM categories WHERE parent = 0 ORDER BY category");
  $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
  $brand = ((isset($_POST['brand']) && !empty($_POST['brand']))?sanitize($_POST['brand']):'');
  $parent = ((isset($_POST['parent']) && !empty($_POST['parent']))?sanitize($_POST['parent']):'');
  $category = ((isset($_POST['child']) && !empty($_POST['child']))?sanitize($_POST['child']):'');
  $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):'');
  $list_price = ((isset($_POST['list_price']))?sanitize($_POST['list_price']):'');
  $price = preg_replace("/[^0-9]/", "", $price);
  $list_price = preg_replace("/[^0-9]/", "", $list_price);
  $description = ((isset($_POST['description']))?sanitize($_POST['description']):'');
  $sizes = ((isset($_POST['sizes']) && $_POST['sizes'] != '')?sanitize($_POST['sizes']):'');
  $sizes = rtrim($sizes,',');
  $saved_image = '';

  if (isset($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    $edit_id = sanitize($edit_id);
    $productresults = $db->query("SELECT * FROM products WHERE id = '$edit_id'");
    $products = mysqli_fetch_assoc($productresults);
    if (isset($_GET['delete_image'])) {
      $imgi = (int)$_GET['imgi'] - 1;
      $images = explode(',',$products['image']);
      $image_url = $_SERVER['DOCUMENT_ROOT'].$images[$imgi];
      unlink($image_url);
      unset($images[$imgi]);
      $imageString = implode(',',$images);
      $db->query("UPDATE products SET image = '{$imageString}' WHERE id = '{$edit_id}'");
      header('Location: products.php?edit='.$edit_id);
    }
    $category = ((isset($_POST['child']) && $_POST['child'] != '')?sanitize($_POST['child']):$products['categories']);
    $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$products['title']);
    $brand = ((isset($_POST['brand']) && $_POST['brand'] != '')?sanitize($_POST['brand']):$products['brand']);
    $parentResult = $db->query("SELECT * FROM categories WHERE id = '$category'");
    $pQ = mysqli_fetch_assoc($parentResult);
    $parent = ((isset($_POST['parent']) && $_POST['parent'] != '')?sanitize($_POST['parent']):$pQ['parent']);
    $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):money($products['price']));
    $list_price = ((isset($_POST['list_price']))?sanitize($_POST['list_price']):money($products['last_price']));
    $price = preg_replace("/[^0-9]/", "", $price);
    $list_price = preg_replace("/[^0-9]/", "", $list_price);
    $description = ((isset($_POST['description']))?sanitize($_POST['description']):$products['description']);
    $sizes = ((isset($_POST['sizes']) && $_POST['sizes'] != '')?sanitize($_POST['sizes']):$products['sizes']);
    $sizes = rtrim($sizes,',');
    $saved_image = (($products['image'] != '')?$products['image']:'');
    $dbpath = $saved_image;
  }

  if (!empty($sizes)) {
    $sizeString = sanitize($sizes);
    $sizeString = rtrim($sizeString,',');
    $sizesArray = explode(',',$sizeString);
    $sArray = array();
    $qArray = array();
    $tArray = array();
    foreach ($sizesArray as $ss) {
      $s = explode(':',$ss);
      $sArray[] = $s[0];
      $qArray[] = $s[1];
      $tArray[] = $s[2];
    }
  }else{
    $sizesArray = array();
  }

  if ($_POST) {
    $errors = array();
    $required = array('title', 'brand', 'parent', 'child', 'sizes');
    $allowed = array('png','jpg','jpeg','gif');
    $photoName = array();
    $uploadPath = array();
    $tmpLoc = array();
    foreach ($required as $field) {
      if ($_POST[$field] == '') {
        $errors[] = 'Form tidak boleh ada yang kosong!';
        break;
      }
    }
    var_dump($_FILES['photo']);
    $photoCount = count($_FILES['photo']['name']);
      if ($photoCount > 0) {
        for ($i=0; $i < $photoCount; $i++) { echo $i;
          $name = $_FILES['photo']['name'][$i];
          $nameArray = explode('.',$name);
          $fileName = $nameArray[0];
          $fileExt = $nameArray[1];
          $mime = explode('/',$_FILES['photo']['type'][$i]);
          $mimeType = $mime[0];
          $mimeExt = $mime[1];
          $tmpLoc[] = $_FILES['photo']['tmp_name'][$i];
          $fileSize = $_FILES['photo']['size'][$i];
          $uploadName = md5(microtime().$i).'.'.$fileExt;
          $uploadPath[] = BASEURL.'images/products'.$uploadName;
          if ($i != 0) {
            $dbpath .= ',';
          }
          $dbpath .= '/tutorial/images/products'.$uploadName;
          if ($mimeType != 'image') {
            $errors[] = 'File harus berupa gambar';
          }
          if (!in_array($fileExt, $allowed)) {
            $errors[] = 'Gambar harus berekstensi png, jpg, jpeg atau gif';
          }
          if ($fileSize > 15000000) {
            $errors[] = 'Ukuran file tidak boleh lebih dari 15MB.';
          }
          if ($fileExt != $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg')) {
            $errors[] = 'Errors 404 ! Ulangi upload dengan benar';
      }
    }
  }
    if (!empty($errors)) {
      echo display_errors($errors);
    }else{
      if($photoCount > 0){
        //Upload file dan tambah ke dalam database
        for ($i=0; $i < $photoCount; $i++) {
          move_uploaded_file($tmpLoc[$i], $uploadPath[$i]);
        }
      }
      $insertSql = "INSERT INTO products (title, price, last_price, brand, categories, sizes, image, description)
      VALUES ('$title', '$price', '$list_price', '$brand', '$category', '$sizes', '$dbpath', '$description')";
      if (isset($_GET['edit'])) {
        $insertSql = "UPDATE products SET title = '$title', price = '$price', last_price = '$list_price',
        brand = '$brand', categories = '$category', sizes = '$sizes', image = '$dbpath', description = '$description'
        WHERE id = '$edit_id'";
      }
      $db->query($insertSql);
      header('Location: products.php');
    }
  }
  ?>

  <div class="container">
    <h2 class="text-center"><?=((isset($_GET['edit']))?'Edit ':'');?>Products</h2><hr>
    <form action="products.php?<?=((isset($_GET['edit']))?'edit='.$edit_id:'add=1');?>" method="post" enctype="multipart/form-data">
      <div class="form-group col-md-3">
        <label for="title">Title*:</label>
        <input type="text" name="title" class="form-control" id="title" value="<?=$title;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="brand">Brand:*</label>
        <select class="form-control" name="brand" id="brand">
          <option value=""<?=(($brand == '')?' selected':'');?>></option>
          <?php foreach ($brandQ as $b) : ?>
            <option value="<?=$b['id'];?>"<?=(($brand == $b['id'])?' selected':'');?>>
              <?=$b['brand'];?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="parent">Parent Category*:</label>
        <select class="form-control" id="parent" name="parent">
          <option value=""<?=(($parent == '')?' selected':'');?>></option>
          <?php foreach ($parentQ as $p) : ?>
            <option value="<?=$p['id'];?>"<?=(($parent == $p['id'])?' selected':'');?>><?=$p['category'];?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="child">Child Category*:</label>
        <select class="form-control" id="child" name="child">
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="price">Price*:</label>
        <input type="text" id="price" name="price" class="form-control" value="<?=((isset($_GET['edit']))?money($price):'');?>">
      </div>
      <div class="form-group col-md-3">
        <label for="listprice">List Price*:</label>
        <input type="text" id="list_price" name="list_price" class="form-control" value="<?=((isset($_GET['edit']))?money($list_price):'');?>">
      </div>
      <div class="form-group col-md-3">
        <label>Quantity & Sizes*:</label>
        <button class="btn btn-default form-control" onclick="$('#sizesModal').modal('toggle'); return false;">Quantity & Sizes</button>
      </div>
      <div class="form-group col-md-3">
        <label for="sizes">Sizes & Qty Preview</label>
        <input type="text" class="form-control" name="sizes" id="sizes" value="<?=$sizes;?>" readonly>
      </div>
      <div class="form-group col-md-6">
        <?php if($saved_image != '') : ?>
          <?php
            $imgi = 1;
            $images = explode(',',$saved_image);
          ?>
          <?php foreach($images as $image): ?>
          <div class="saved-image col-md-4">
            <img src="<?=$image;?>" alt="saved image"><br>
            <a href="products.php?delete_image=1&edit=<?=$edit_id;?>&imgi=<?=$imgi;?>" class="btn btn-xs btn-danger">Delete Image</a>
          </div>
          <?php
          $imgi++;
          endforeach; ?>
        <?php else: ?>
          <label for="photo">Products Photo*:</label>
          <input type="file" name="photo[]" id="photo" class="form-control" multiple>
        <?php endif; ?>
      </div>
      <div class="form-group col-md-6">
        <label for="description">Description*:</label>
        <textarea name="description" class="form-control" id="description" rows="6"><?=$description;?></textarea>
      </div>
      <div class="form-group pull-right" style="margin-right: 14px;">
        <a href="products.php" class="btn btn-default">Cancel</a>
        <input type="submit" class="btn btn-success" value="<?=((isset($_GET['edit']))?'Edit':'');?> Product">
      </div><div class="clearfix"></div>
    </form>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="sizesModal" tabindex="-1" role="dialog" aria-labelledby="sizesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="sizesModalLabel">Size & Quantity</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <?php for($i=1; $i <= 12; $i++) : ?>
              <div class="form-group col-md-2">
                <label for="size<?=$i;?>">Size:</label>
                <input type="text" name="size<?=$i;?>" id="size<?=$i;?>" value="<?=((!empty($sArray[$i-1]))?$sArray[$i-1]:'');?>" class="form-control">
              </div>
              <div class="form-group col-md-2">
                <label for="qty<?=$i;?>">Quantity:</label>
                <input type="number" name="qty<?=$i;?>" id="qty<?=$i;?>" value="<?=((!empty($qArray[$i-1]))?$qArray[$i-1]:'');?>" min="0" class="form-control">
              </div>
              <div class="form-group col-md-2">
                <label for="threshold<?=$i;?>">Threshold:</label>
                <input type="number" name="threshold<?=$i;?>" id="threshold<?=$i;?>" value="<?=((!empty($tArray[$i-1]))?$tArray[$i-1]:'');?>" min="0" class="form-control">
              </div>
            <?php endfor; ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="updateSizes();$('#sizesModal').modal('toggle');return false;">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <?php
}else{
  $sql = "SELECT * FROM products WHERE deleted = 0";
  $presult = $db->query($sql);
  if (isset($_GET['featured'])) {
    $id = (int)$_GET['id'];
    $featured = (int)$_GET['featured'];
    $fsql = "UPDATE products SET featured = '$featured' WHERE id = '$id'";
    $db->query($fsql);
    header('Location: products.php');
  }
  ?>
  <div class="container">
    <h2 class="text-center">Products</h2>
    <a href="products.php?add=1" class="btn btn-success pull-right" style="margin-top: -35px;">Tambah Produk</a><div class="clearfix"></div>
    <hr>
    <table class="table table-bordered table-condensed table-striped">
      <thead>
        <th></th><th>Produk</th><th>Harga</th><th>Kategori</th><th>Fitur</th><th>Terjual</th>
      </thead>
      <tbody>
        <?php foreach ($presult as $produk) :
          $childID = $produk['categories'];
          $catSql = "SELECT * FROM categories WHERE id = '$childID'";
          $result = $db->query($catSql);
          $child = mysqli_fetch_assoc($result);
          $parentID = $child['parent'];
          $pSql = "SELECT * FROM categories WHERE id = '$parentID'";
          $presult = $db->query($pSql);
          $parent = mysqli_fetch_assoc($presult);
          $category = $parent['category'].'->'.$child['category'];
          ?>
          <tr>
            <td>
              <a href="products.php?edit=<?=$produk['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
              <a href="products.php?delete=<?=$produk['id'];?>" class="btn btn-xs btn-default" onclick="return confirm('Yakin akan menghapus data ini ?');">
                <span class="glyphicon glyphicon-remove"></span>
              </a>
            </td>
            <td><?=$produk['title'];?></td>
            <td><?=money($produk['price']);?></td>
            <td><?=$category;?></td>
            <td>
              <a href="products.php?featured=<?=(($produk['featured'] == 0)?'1':'0');?>&id=<?=$produk['id'];?>" class="btn btn-xs btn-default"
              title="<?=(($produk['featured'] == 0)?'Klik Untuk Menampilkan Produk':'Klik Untuk Tidak Menampilkan Produk Ini');?>">
                <span class="glyphicon glyphicon-<?=(($produk['featured'] == 1)?'minus':'plus');?>"></span>
              </a>
              &nbsp; <?=(($produk['featured'] == 1)?'Ditampilkan':'Tidak Ditampilkan');?>
            </td>
            <td>0</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php } include 'includes/footer.php'; ?>
  <script type="text/javascript">
    $('document').ready(function(){
      get_child_options('<?=$category;?>');
    });
  </script>
<!--Sendok ini akan bengkok, bengkok, bengkok atuh euy tulungan sakali ewang,bengkok bengkoookkk maneh teh atuh-->
