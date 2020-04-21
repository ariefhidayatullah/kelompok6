<div class="row">
      <div class="col-lg-10 offset-1">
        <div class="card o-hidden border-0 shadow-lg bg-gradient-light">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">selamat datang admin!</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan username anda..." autofocus>
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan password anda">
                    </div>
                    <div class="text-center">
                      <input type="submit" name="login" class="btn btn-user btn-primary btn-block" value="login"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>