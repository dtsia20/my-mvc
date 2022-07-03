<!-- Get header -->
<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!-- content  -->
<div class="row mb-3">
  <?php echo flash('post-message'); ?>
      <div class="col-md-8">
        <h1 class="display-5 fw-bold"><?php echo $data['title'];?></h1>
      </div>
      <div class="col-md-4">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right" >
        <i class="fa fa-plus"></i> Add new post</a>
      </div>
</div>

<?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title;?></h4>
        <div class="bg-light p-2 mb-2">
            written by <?php echo $post->name .' on ' .$post->postCreated; ?>
        </div>
        <p class="card-text"><?php echo $post->body; ?></p>
        <a href="<?php echo URLROOT;?>/posts/show/<?php echo $post->postId;?>" class="btn btn-dark">Read more</a>
    </div>
<?php endforeach; ?>

<!-- Get footer -->
<?php require_once APPROOT .'/views/inc/footer.php'; ?>