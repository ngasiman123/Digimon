
<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/bootstrap.min.css">
  <script src="<?php echo base_url(); ?>assets/vendors/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
  <style type="text/css">
    .bg-login{
      /*background: #bdc3c7;*/
      margin-top: 5%;
      background-image: url("<?php echo base_url();?>/assets/images/ss.jpg");
      background-repeat:no-repeat;
      background: linear-gradient(to right, #f1f2f6 , #747d8c, #a4b0be); /* Standard syntax */
      background: -webkit-linear-gradient(left, #f1f2f6 , #747d8c, #a4b0be); /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(right, #f1f2f6, #747d8c, #a4b0be); /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(right, #f1f2f6, #747d8c, #a4b0be); /* For Firefox 3.6 to 15 */
    }
    .form-control{
      border:0.5px solid #bdc3c7;
    }
    .panel-heading{
      background: linear-gradient(to right, #00e4d0 , #5983e8); /* Standard syntax */
      background: -webkit-linear-gradient(left, #00e4d0 , #5983e8); /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(right, #00e4d0, #5983e8); /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(right, #00e4d0, #5983e8); /* For Firefox 3.6 to 15 */
      color: #ffffff;

    }
    .container-fluid{

    }
    .btn-style{
      background: linear-gradient(to right, #00e4d0 , #5983e8); /* Standard syntax */
      background: -webkit-linear-gradient(left, #00e4d0 , #5983e8); /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(right, #00e4d0, #5983e8); /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(right, #00e4d0, #5983e8); /* For Firefox 3.6 to 15 */
      color: #ffffff;
    }
    .btn-style:hover{
      background: linear-gradient(to right, #5983e8,#00e4d0); /* Standard syntax */
      background: -webkit-linear-gradient(left, #5983e8,#00e4d0); /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(right,#5983e8,#00e4d0); /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(right,#5983e8,#00e4d0); /* For Firefox 3.6 to 15 */
      color: #ffffff;
    }
    .img{
      height: 150px;
      width: 500px;
    }
  </style>
</head>
<title>Login</title>
</head>
<body class="bg-login">
  <div class="container-fluid">
    <form action="<?= base_url(); ?>auth/login" method="post">
    <div class="row">
      <div class="col-lg-4 grid-margin mx-auto">
        <div class="mx-auto pt-2 mt-5 my-auto">
          <div class="card-body">
              <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-white">Login user</h3></div>
                <div class="panel-body">
                <img src="<?php echo base_url(); ?>/assets/images/PTss.jpg" class="img-thumbnail img">

                  <?= $this->session->flashdata("msg"); ?>
                <label for="usr">Username</label>
                <input class="form-control" id="user_name" name="user_name" type="text" autocomplete="off" maxlength="20" required>
                <label for="pass">Password</label>
                <input class="form-control" id="password" name="password" type="password" required>
                <br>
                <button class="btn btn-success btn-style" type="submit">Login</button><br>
                <p></p>
              </div>
            </div>
          </div>
          <div class="panel-body">
            
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>/assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>/assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>/assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="<?php echo base_url();?>/assets/js/dashboard.js"></script> -->
  <!-- End custom js for this page-->

</body>
</html>
