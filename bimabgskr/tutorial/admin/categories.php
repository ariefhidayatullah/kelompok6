<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/tutorial/core/init.php';
  if(!is_logged_in()){
    login_error_redirect();
  }
  include 'includes/head.php';
  include 'includes/navigation.php';

  $sql = "SELECT * FROM categories WHERE parent = 0";
  $result = $db->query($sql);
  $errors = array();
  $category = '';
  $post_parent = '';

  //Proses edit
  if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    $edit_id = sanitize($edit_id);
    $edit_sql = "SELECT * FROM categories WHERE id = '$edit_id'";
    $edit_result = $db->query($edit_sql);
    $edit_category = mysqli_fetch_assoc($edit_result);

  }
  //Proses Hapus
  if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete_id = (int)$_GET['delete'];
    $delete_id = sanitize($delete_id);
    $sql = "SELECT * FROM categories WHERE id = '$delete_id'";
    $category = mysqli_fetch_assoc($result);
    $result = $db->query($sql);
    if ($category == 0) {
      $sql = "DELETE FROM categories WHERE id = '$delete_id'";
      $db->query($sql);
    }
    $sqldel = "DELETE FROM categories WHERE id = '$delete_id'";
    $db->query($sqldel);
    header('Location: categories.php');
  }

  //Proses Form
  if (isset($_POST) && !empty($_POST)) {
    $post_parent = sanitize($_POST['parent']);
    $category = sanitize($_POST['category']);
    $sqlform = "SELECT * FROM categories WHERE category = '$category' AND parent = '$post_parent'";
    if (isset($_GET['edit'])) {
      $id = $edit_category['id'];
      $sqlform = "SELECT * FROM categories WHERE category = '$category' AND parent = '$post_parent' AND id != '$id'";
    }
    $fresult = $db->query($sqlform);
    $count = mysqli_num_rows($fresult);
    //jika kategori kosong
    if ($category == null) {
      $errors[] .= 'Kategori tidak boleh kosong';
    }

    //Jika kategori sudah ada didalam database
    if ($count > 0) {
      $errors[] .= '<b>'.$category. '</b> sudah ada didalam database';
    }

    //Display error atau update data
    if(!empty($errors)){
      //display errors
      $display = display_errors($errors); ?>
      <script>
        $(document).ready(function(){
          $('#error').html('<?=$display; ?>');
        });
      </script>
    <?php
    }else{
      //update database
      $updatesql = "INSERT INTO categories (category, parent) VALUES ('$category','$post_parent')";
      if (isset($_GET['edit'])) {
        $updatesql = "UPDATE categories SET category = '$category', parent = '$post_parent' WHERE id = '$edit_id'";
      }
      $db->query($updatesql);
      echo "<script>alert('SUKSES!');
            window.location='categories.php';</script>";
    }
  }

  $category_value = '';
  $parent_value = 0;
  if (isset($_GET['edit'])) {
    $category_value = $edit_category['category'];
    $parent_value = $edit_category['parent'];
  }else{
    if (isset($_POST)) {
      $category_value = $category;
      $parent_value = $post_parent;
    }
  }
?>
<div class="container">
  <h2 class="text-center">Kategori</h2><hr>
  <div class="row">

    <!-- Form kategori -->
    <div class="col-md-6">
      <form class="form" action="categories.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'')?>" method="post">
        <legend><?=((isset($_GET['edit']))?'Edit':'Tambah')?> Kategori</legend>
        <div id="error"></div>
        <div class="form-group">
          <label for="parent">Induk Kategori</label>
          <select class="form-control" name="parent" id="parent">
            <option value="0"<?=(($parent_value == 0)?'selected="selected"':'');?>>Induknya</option>
            <?php foreach ($result as $parent) : ?>
              <option value="<?=$parent['id'];?>"<?=(($parent_value == $parent['id'])?' selected="selected"':'');?>><?=$parent['category'];?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="category">Kategori</label>
          <input type="text" name="category" class="form-control" id="category" value="<?=$category_value;?>">
        </div>
        <div class="form-group">
          <input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Tambah')?> Kategori" class="btn btn-success">
          <?php if(isset($_GET['edit'])) : ?>
            <a href="categories.php" class="btn btn-default">Cancel</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <div class="col-md-6">
      <!-- Tabel kategori -->
      <table class="table table-bordered">
        <thead>
          <th>Kategori</th><th>Induk Kategori</th><th></th>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM categories WHERE parent = 0";
            $result = $db->query($sql);
            foreach ($result as $hasil) :
            $parent_id = (int)$hasil['id'];
            $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
            $rresult = $db->query($sql2);
          ?>
            <tr class="bg-primary">
              <td><?=$hasil['category'];?></td>
              <td>Induk Kategori</td>
              <td>
                <a href="categories.php?edit=<?=$hasil['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="categories.php?delete=<?=$hasil['id'];?>" class="btn btn-xs btn-default"
                  onclick="return confirm('Yakin akan menghapus data ini');"><span class="glyphicon glyphicon-remove-sign"></span></a>
              </td>
            </tr>
            <?php foreach($rresult as $child) : ?>
              <tr class="bg-info">
                <td><?=$child['category'];?></td>
                <td><?=$hasil['category'];?></td>
                <td>
                  <a href="categories.php?edit=<?=$child['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                  <a href="categories.php?delete=<?=$child['id'];?>" class="btn btn-xs btn-default"
                    onclick="return confirm('Yakin akan menghapus data ini');"><span class="glyphicon glyphicon-remove-sign"></span></a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
