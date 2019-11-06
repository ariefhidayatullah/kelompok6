<!DOCTYPE html>
<html>
<head>
  <title>Popup Bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
   <div class="navbar-header">
    <a href="" class="navbar-brand">THE KING</a>
   </div>
   <ul class="nav navbar-nav">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Contact Us</a></li>
   </ul>
   <ul class="nav navbar-nav navbar-right">
    <li data-toggle="modal" data-target="#mydaftar"><a href="#"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
    <li data-toggle="modal" data-target="#mylogin"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
   </ul>
  </div>
 </nav>
<!-- Modal daftar -->
<div id="mydaftar" class="modal fade" role="dialog">
  <div class="modal-dialog">

     <script type="text/javascript">
  function Angkasaja(evt){
    var charCode = (evt.which) ?
    evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
      return true;
    }
  }
</script>

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SIGN UP</h4>
      </div>
      <div class="modal-body">
        <form>
     <div class="form-group">
      <h1 class="text-center mb-4">REGISTER NOW</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <p class="form-group">
        <label for="id_user">ID USER<br></label>
        <input type="text" class="form-control" name="id_user" id="id_user" placeholder="ID User" required="">
      </p>
      <p class="form-group">
        <label for="nama_user">USERNAME<br></label>
        <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="nama anda" required="">
      </p>
      <p class="form-group">
        <label for="email">EMAIL<br></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="email anda" required="">
      </p>
      <p class="form-group">
        <label for="password">PASSWORD<br></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="password" required="">
      </p>
      <div class="form-group">
        <label for="nohp_user">NOMOR HP<br></label>
      <input type="text" class="form-control" name="nohp_user" id="nohp_user" placeholder="nomor hp yang aktif" minlength="10" maxlength="12" required="" onkeypress="return Angkasaja(event)"/>
      </div>
    </form>
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <br><button type="submit" class="btn btn-success" name="submit" data-dimiss="submit">DaftarP</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal daftar -->

<!-- Modal login -->
<div id="mylogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pendaftaran Sekolah</h4>
      </div>
      <div class="modal-body">
        <form>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
  </form>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-success" data-dismiss="modal">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Login -->
</body>
</html>