<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="container">
    <h1 class="display-3"><?php echo $data['title'];?></h1>
    <p class="lead"><?php echo $data['description'];?></p>
    <p class="version">Version: <strong><?php echo APPVERSION;?></strong></p>
</div>

<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>