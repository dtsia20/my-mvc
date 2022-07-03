<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php';?>

<!-- content  -->

<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light pull-right"><i class="fa fa-arrow-left"></i> Back</a>
<h2 class="mb-4"><?php echo $data['post']->title;?></h2>
<div class="bg-secondary text-white p-2 mb-3">
    written by <?php echo $data['user']->name .' on ' .$data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?> </p>
        
<?php if($data['post']->user_id == $_SESSION['user_id']) :?>
<hr>
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark"><i class="fa fa-pencil"></i> Edit post</a>

<form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post" class="pull-right">
    <input type="submit" value="Delete" class="btn btn-danger pull-right">
</form>

<?php endif; ?>

<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>