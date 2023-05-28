<div class="body-content">
	<div class="container">
		<div class="row">
			<div id="vupost" class="col-lg-8 col-md-12">
				<div class="single-post bd-highlight row no-margin align-items-center">
					<div class="user-deail d-flex align-items-center">
						<div class="user-image">
						<a href="<?php echo base_url() ?>user/<?php echo $single['user_url'] ?>">
							<img src="<?php echo base_url() ?>upload/users/<?php echo $single['user_image'] ?>" alt="">
							</a>
						</div>
						<div class="user-name w-100 ">
						<a href="<?php echo base_url() ?>user/<?php echo $single['user_url'] ?>">
							<b>
							<?php echo $single['name'] ?></b>
							<p>
								<?php echo $single['desig'] ?>
							</p>
							</a>
						</div>
						<div class="timing">
							<div class="needs_to_be_rendered" datetime="<?php echo $single['created_on'] ?>"></div>
						</div>
					</div>
					<div class="post-detail post-detail-big-sing">
						<h2>
							<?php echo $single['title']; ?>
						</h2>
						<?php echo $single['description'] ?>
					</div>
					<div class="lik-detail">
						<ul>
							<?php if(!empty($edit)): ?>
							<li>
								<a href="<?php echo base_url() ?>post/edit/<?php echo $single['id'] ?>">
									<i class="fas fa-edit"></i> <small>Edit</small>
								</a>
							</li>
							<?php endif; ?>

							<li><i class="fas fa-eye"></i> <small>
									<?php echo $single['count'] ?></small></li>
							<li><i class="fas fa-retweet"></i> <small>
									<?php echo $single['replay_count'] ?></small></li>

						</ul>
					</div>
				</div>

				<div class="replay-btn ">
					<button onclick="show_replay()" class="btn btn-light btn-sm">
						<i class="fa fa-plus"></i> Add your Reply</button>
				</div>
	

				<?php if(!empty($this->single)){ ?>  
				<div id="replay_post" class="post-replay hid">
					<h4 class="replay-head">Post Your Reply</h4>
					<div class="replay-text">
						<textarea class="form-control form-control-sm" name="" id="summernote"></textarea>
						<div class="post-replay-btn ">
							<button v-on:click="addReplay()" class="btn btn-info btn-sm">Post Replay</button>
						</div>
					</div>
				</div>
				<?php }else{ ?>
					<div id="replay_post" class="post-replay replay-relay hid">
						<h6>Please Login or Signup to add Reply</h6>
						<button onclick="show_login()" type="button" class="btn btn-sm btn-info"><i class="fas fa-unlock-alt"></i> login or Sign Up</button>	
					</div>
				<?php } ?>	

				<div class="all-replayies row no-margin">
					<h4 class="replay-head">All Replies</h4>


					<div v-for="(r, i) in replay" class="single-replay d-flex w-100 align-items-center">
					<?php if(!empty($this->single)){ ?>
						<div class="lik-box ">
							<i v-if="r.is=='yes'" v-on:click="addUnLik(i)" class="fas text-danger fa-heart"></i>
							<i v-if="r.is=='no'" v-on:click="addLike(i)" class="fas fa-heart"></i><br>
							{{r.lik_count}}
						</div>
					<?php }else{ ?>
						<div class="lik-box ">
							<i v-if="r.is=='yes'"  class="fas text-danger fa-heart"></i>
							<i v-if="r.is=='no'"  class="fas fa-heart"></i><br>
							{{r.lik_count}}
						</div>	

					 <?php } ?>
						<div class="message w-100">
							<span v-html="r.replay"></span>
							<div class="reply-user-det">
								By : {{r.name}}

								<ul class="reply-control">

									<li v-if="r.edit == 1" v-on:click="editReplay(i)"><i class="fas fa-edit"></i> Edit</li>
									<li v-if="r.edit == 1" v-on:click="deletePost(i)"><i class="far fa-trash-alt"></i> Delete</li>

									<li><i class="far fa-clock"></i> {{timeAgo(r.time)}}</li>
								</ul>

							</div>
						</div>

					</div>
				</div>

				<div id="edit-replay" class="modal" tabindex="-1" role="dialog">
					<div class="modal-dialog edit-model" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Replay</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<textarea id="edit-sumer" class="form-control form-control-sm" cols="30" rows="10"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
								<button v-on:click="saveReplay()" type="button" class="btn btn-sm btn-primary">Save Replay</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-8">
				
			<?php $this->load->view('pages/section/post_category'); ?>
			
			<?php $this->load->view('pages/section/forum_statistics'); ?>

			<?php $this->load->view('pages/section/trending_posts'); ?>
		
			</div>
		</div>
	</div>
	<input type="hidden" id="pid" value="<?php echo $this->post_id ?>">
</div>

