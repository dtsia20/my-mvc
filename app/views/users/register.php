<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="container">
<main class="form-signin w-100 m-auto">
  <form action =" <?php echo URLROOT ?>/users/register" method="post">
    
    <h1 class="h3 mb-3 fw-normal text-center pt-4">Registration Form</h1>
    <div class="form-floating  mb-3">
      <input type="name" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['name'];?>" id="floatingName"  placeholder="Enter your full name">
      <span class="invalid-feedback"><?php echo $data['name_err'];?></span>
      <label for="floatingName">Full name</label>
    </div>
    <div class="form-floating  mb-3">
      <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['email'];?>" id="floatingEmail" placeholder="Enter your email">
      <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
      <label for="floatingEmail">Email</label>
    </div>
    <div class="form-floating  mb-3">
      <input type="password" name="password" class="form-control  <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['password'];?>" id="floatingPassword" placeholder="Password">
      <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating  mb-3">
      <input type="password" name="confirm_password" class="form-control  <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['confirm_password'];?>" id="floatingPassword2" placeholder="Password">
      <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
      <label for="floatingPassword2">Enter password again</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> I agree with the  privacy psolicy of the site
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <a href="<?php echo URLROOT; ?>/users/login" class="w-100 btn btn-light mt-3">Have you an account. Login</a>
    
  </form>
</main>


<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>