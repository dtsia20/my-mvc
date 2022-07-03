<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="container">
    <main class="form-signin w-100 m-auto">
        <form action =" <?php echo URLROOT ?>/users/login" method="post">
            <?php flash('login_message'); ?>
            <h1 class="h3 mb-1 fw-normal text-center pt-4">Please sign in</h1>
            <p class="text-center mb-4">Please enter your crendentials to login</p>

            <div class="form-floating  mb-3">
                <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['email'];?>" id="floatingEmail" placeholder="Enter your email">
                <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                <label for="floatingEmail">Email</label>
            </div>
                <div class="form-floating  mb-3">
                <input type="password"  name="password" class="form-control  <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['password'];?>" id="floatingPassword" placeholder="Password">
                <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">

            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <a href="<?php echo URLROOT; ?>/users/register" class="w-100 btn btn-light mt-3">New user? Register here</a>
            
        </form>
    </main>

<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>    