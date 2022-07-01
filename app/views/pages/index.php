<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><?php echo $data['title'];?></h1>
        <p class="col-md-8 fs-4"><?php echo $data['description'];?></p>
        <button class="btn btn-primary btn-lg" type="button">Go to posts</button>
      </div>
</div>

<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>