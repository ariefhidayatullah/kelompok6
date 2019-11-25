<?php
$sql = "SELECT * FROM categories WHERE parent = 0";
$query = $db->query($sql);
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="index.php" class="navbar-brand">Shauntas's Boutique</a>
    <ul class="nav navbar-nav">
      <?php
      foreach ($query as $key) :
        $parent_id = $key['id'];
        $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
        $cquery = $db->query($sql2);
      ?>
      <!--Men cloth -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$key['category'];?> <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <?php foreach ($cquery as $child) : ?>
          <li><a href="category.php?cat=<?=$child['id'];?>"><?=$child['category'];?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php endforeach; ?>
      <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>
    </ul>
  </div>
</nav>
