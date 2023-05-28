<?php if(!empty($this->single)): ?>
<a href="<?php echo base_url() ?>pages/new_post">
<button class="btn btn-info new-post"><i class="far fa-edit"></i> Add New Post</button>	
</a>
<?php endif; ?>

<?php $co = 0; if(!empty($posts)): foreach($posts as $p): $co++; ?>

<div  class="singl-post-row d-flex justify-content-between" id="recent-post">

  <div class="image-cover d-none d-sm-block align-self-center">
   <a href="<?php echo base_url() ?>user/<?php echo $p['user_url'] ?>">
   	<img src="<?php echo base_url() ?>upload/users/<?php echo $p['user_image'] ?>" alt=""></a>
  </div>
  <div class="post-detail w-100 align-self-center">
  <a href="<?php echo base_url() ?>post/<?php echo $p['url'] ?>">
    <h2><?php echo $p['title']; ?></h2>
    <p ><?php echo $p['description']; ?> </p>
</a>
  </div>
  <div class="post-count bd-highlight">
    <ul>
      <li class="d-flex align-items-center carfg"><span><?php echo $p['replay_count'] ?>
    <i class="fas fa-caret-down"></i>
    </span></li>
      <li class="scgv d-flex"><i class="far fa-eye"></i> <?php echo $p['count'] ?></li>
      <li class="scgv no-bb d-flex"><i class="far fa-clock"></i> <a class="ageo" datetime="<?php echo $p['created_on'] ?>"></a></li>
    </ul>
  </div>
</div>

<?php  endforeach; endif; ?>
