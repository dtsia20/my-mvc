<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="container">
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light pull-right"><i class="fa fa-arrow-left"></i> Back</a>
    <main class="form-signin w-100 m-auto">
        <h2 class="mb-4 text-center">Add a post</h2>
        <form action =" <?php echo URLROOT ?>/posts/add" method="post">
            <div class="form-floating mb-3">
                <input type="text" name="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['title'];?>" id="title" placeholder="Enter the title">
                <span class="invalid-feedback"><?php echo $data['title_err'];?></span>
                <label for="title">Title</label>
            </div>
                <div class="form-floating  mb-3">
                <textarea style="height:300px" name="body" class="form-control  <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['body'];?>" id="body" placeholder="please insert the text of the post"></textarea>
                <span class="invalid-feedback"><?php echo $data['body_err'];?></span>
                <label for="body">Body:</label>
            </div>

            <div class="checkbox mb-3">

            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Add post</button>
            
        </form>
    </main>

<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>   