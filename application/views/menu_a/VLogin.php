<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Page !</h1>
                </div>

                <?= $this->session->flashdata('message') ?>

                <form class="user" method="post" action="<?php echo base_url('Clogin/login_action') ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" name="username" value="<?= set_value('username') ?>" aria-describedby="emailHelp" placeholder="Enter Username">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <p>Member baru ? silahkan <a href="<?php echo base_url("Clogin/register"); ?>">Registrasi </p>
                  <!-- <a class="small" href="<?= base_url('auth/registration') ?>">Create an Account!</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
