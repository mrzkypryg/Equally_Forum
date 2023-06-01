<?php if(!empty($this->single)): ?>
<a href="<?php echo base_url() ?>pages/new_topic">
<button class="btn btn-info new-forum"><i class="far fa-edit"></i> Add New Post</button>	
</a>
<?php endif; ?>

<?php $co = 0; if(!empty($posts)): foreach($posts as $p): $co++; ?>

<div  class="user-post-section d-flex justify-content-between" id="recent-post">

  <div class="image-cover d-none d-sm-block align-self-center">
   	<img src="assets/images/favicon.png" alt=""></a>
  </div>
  <div class="post-detail w-100 align-self-center">
  <a href="<?php echo base_url() ?>topic/<?php echo $p['url'] ?>">
    <h2><?php echo $p['title']; ?></h2>
    <p ><?php echo $p['description']; ?> </p>
</a>
  <hr>
  <p style="margin-bottom:-20px">
    <i class="fas fa-eye"></i> <?php echo $p['count'] ?>
    <i class="fas fa-clock"></i> <?php echo $p['date_post'] ?></a>
  </p>
 
  </div>

</div>

<?php  endforeach; endif; ?>
