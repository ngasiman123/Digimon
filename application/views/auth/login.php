
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
</head>
<title>Login</title>
</head>
<body>
  <div class="container-fluid">
    <form action="<?= base_url(); ?>index.php/auth/login" method="post">
    <div class="row">
      <div class="col-lg-4 grid-margin mx-auto">
        <div class="card mx-auto pt-5 my-auto">
        <?= $this->session->flashdata("msg"); ?>
          <div class="card-body">
              <div class="panel panel-default">
                <div class="panel-heading"><h3>Login user</h3></div>
                <div class="panel-body">
                <label>Username</label>
                <input class="form-control" name="user_name" type="text" autocomplete="off" maxlength="20" required>
                <label>Password</label>
                <input class="form-control" name="password" type="password" required>
                <br>
                <button class="btn btn-success" type="submit">Login</button><br>
              </div>
              </div>
              </div>
        </div>
      </div>
    </div>
  </form>
  </div>
</body>
</html>