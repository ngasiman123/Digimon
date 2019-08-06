<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mx-auto">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <img src="<?= base_url('assets/img/sakurafilter.jpg') ?>" class="col-lg-6 d-none d-lg-block"></img>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Dulu</h1>
                  </div>
                  <form  method="POST" action="<?= base_url('Auth/login');?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="user" name="user" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Login</button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
