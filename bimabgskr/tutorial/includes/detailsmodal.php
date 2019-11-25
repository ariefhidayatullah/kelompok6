<?php
require_once '../core/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $db->query($sql);
$products = mysqli_fetch_assoc($result);
$brand_id = $products['brand'];
$sql1 = "SELECT brand FROM brand WHERE id = '$brand_id'";
$brand_query = $db->query($sql1);
$brand = mysqli_fetch_assoc($brand_query);
$sizestring = $products['sizes'];
$size_array = explode(',', $sizestring);
?>

<!-- Details Modal -->
<?php ob_start();?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
      <button class="close" type="button" onclick="CloseModal()" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title text-center"><?=$products['title'];?></h4>
    </div>
    <div class="modal-body">
      <div class="container-fluid">
        <div class="row">
          <span id="modal_errors" class="bg-danger"></span>
          <div class="col-sm-6 fotorama">
            <?php $photos = explode(',',$products['image']);
            foreach ($photos as $photo):
            ?>
              <img src="<?=$photo;?>" alt="<?=$products['title'];?>" class="details img-responsive"/>
            <?php endforeach; ?>
          </div>
          <div class="col-sm-6">
            <h4>Details</h4>
            <p><?= nl2br($products['description']); ?></p>
            <hr>
            <p>Harga : <?=money($products['price']);?></p>
            <p>Brand : <?=$brand['brand'];?></p>
            <form action="add_cart.php" method="post" id="add_product_form">
            <input type="hidden" name="product_id" value="<?=$id;?>">
            <input type="hidden" name="available" id="available" value="">
              <div class="form-group">

                  <label for="quantity">Quantity:</label>
                  <input type="number" name="quantity" id="quantity" class="form-control">
                <div class="col-xs-9"></div>
              </div><br>
              <div class="form-group">
                <label for="size">Size:</label>
                <select name="size" id="size" class="form-control">
                  <option value=""></option>
                  <?php
                  foreach ($size_array as $str) :
                    $string_array = explode(':', $str);
                    $size = $string_array[0];
                    $available = $string_array[1];
                    if($available > 0){
                      echo "<option value='$size' data-available='$available'>$size ($available Tersedia)</option>";
                    }
                  endforeach;
                  ?>
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button class="btn btn-default" onclick="CloseModal()">Close</button>
      <button class="btn btn-warning" onclick="add_to_cart(); return false;"><span class="glyphicon glyphicon-shopping-cart"></span>Add to cart</button>
    </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#size').change(function(){
    var available = $('#size option:selected').data("available");
    $('#available').val(available);
  });

  $(function(){
    $('.fotorama').fotorama({'loop':true,'autoplay':true});
  });

  function CloseModal(){
    $('#details-modal').modal('hide');
    setTimeout(function(){
      $('#details-modal').remove();
      $('.modal-backdrop').remove();
    },500);
  }

</script>
<?php echo ob_get_clean(); ?>
