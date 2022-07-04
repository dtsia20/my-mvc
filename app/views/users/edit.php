<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="container">
<main class="form-signin w-100 m-auto">
  <form action =" <?php echo URLROOT ?>/users/edit" method="post">
  <a href="<?php echo URLROOT; ?>/users/info" class="btn btn-light pull-right"><i class="fa fa-arrow-left"></i> Back</a>
    <h1 class="h3 mb-3 fw-normal  pt-4"> Welcome <?php echo $_SESSION['user_name']; ?></h1>

    <p>here you can change your password</p>

    <div class="form-floating  mb-3">
      <input type="password" name="password" class="form-control  <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['password'];?>" id="floatingPassword" placeholder="Password">
      <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
      <label for="floatingPassword">Old password</label>
    </div>
    <div class="form-floating  mb-3">
      <input type="password" name="new_password" class="form-control  <?php echo (!empty($data['new_password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['new_password'];?>" id="floatingPassword2" placeholder="New Password">
      <span class="invalid-feedback"><?php echo $data['new_password_err'];?></span>
      <label for="floatingPassword2">New Password</label>
    </div>
    <div class="form-floating  mb-3">
      <input type="password" name="confirm_new_password" class="form-control  <?php echo (!empty($data['confirm_new_password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['confirm_new_password'];?>" id="floatingPassword3" placeholder="Enter Password again">
      <span class="invalid-feedback"><?php echo $data['confirm_new_password_err'];?></span>
      <label for="floatingPassword3">Enter new password again</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Update password</button>
    
  </form>
</main>


<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>