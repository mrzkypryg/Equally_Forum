<div id="vu-toppost" class="cat-box top-posts">
  <h6 id="trending-post">Trending Posts <i class="fas fa-globe"></i></h6>
<ul class="form-likk">

<?php if(!empty($top_post)): foreach($top_post as $t): ?>

<li v-for="t in top_post" class="d-flex justify-content-center">
  <div class="bd-highlight w-100" >
  <a href="<?php echo base_url() ?>post/<?php echo $t['url'] ?>"><?php echo $t['title'] ?></a> 
  </div>
  <div class="logoo align-self-center">
    <span ><?php echo $t['replay_count']; ?>
    <i class="fas fa-caret-down"></i>
    </span>
  </div>
 </li>

<?php  endforeach; endif; ?>

 
</ul>
</div>
