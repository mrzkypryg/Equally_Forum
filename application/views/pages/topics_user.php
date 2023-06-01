<div class="body-content">
	<div class="container">
		<div class="row">
			<div>
				<div class="post-user bd-highlight row no-margin align-items-center">
					<div class="detail-user d-flex align-items-center">
						<div class="user-image">
							<img src="<?php echo base_url() ?>assets/images/dummy.png" alt="">
							</a>
						</div>
						<div class="user-name w-100 ">
							<b>
								<?php echo $single['name'] ?>
							</b>			
						</div>
					</div>
					<div class="post-detail post-detail-big-sing">
						<h2>
							<?php echo $single['title']; ?>
						</h2>
						<?php echo $single['description'] ?>
					</div>
					<div class="post-info-detail">
						<ul>
							<?php if(!empty($edit)): ?>
							<li>
								<a href="<?php echo base_url() ?>topic/edit/<?php echo $single['id'] ?>">
									<i class="fas fa-edit"></i><small>Edit</small>
								</a>
							</li>
							<?php endif; ?>
							<li>
								<i class="fas fa-eye"></i> 
								<small><?php echo $single['count'] ?></small>
							</li>
							<li>
								<i class="fas fa-clock"></i> 
								<small><?php echo $single['date_post'] ?> </small>
							</li>
						</ul>
					</div>
				</div>
				<!--DISQUS FOR DISCUSSION POST-->
				<br>
				<div>
					<div id="disqus_thread" style="padding:20px"></div>
				<script>
					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://equally.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="pid" value="<?php echo $this->post_id ?>">
</div>

