<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="row mb-3">
  <?php echo flash('post-message'); ?>
      <div class="col">
        <h3 class="display-5 fw-bold">Welcome <?php echo $data['user']->name;?></h3>
      </div>

</div>

    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $data['title'];?></h4>
        <div class="bg-light p-2 mb-2">
          Email : <?php echo $data['user']->email; ?>
        </div>
        <hr>
        <a href="<?php echo URLROOT; ?>/users/edit" class="btn btn-dark"><i class="fa fa-pencil"></i> Change Password</a>
    </div>


<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>