<div class="cat-box">
  <h6>Categories <i class="fas fa-list"></i></h6>
<ul>
<?php if(!empty($category)): foreach($category as $c): ?>
<li >
  <a href="<?php echo $c['url'] ?>" >
  <?php echo $c['name']; ?><span class="badge badge-primary badge-pill"> <?php echo $c['post']; ?></span>
   </a>
 </li>

<?php  endforeach; endif; ?>

</ul>
</div>
