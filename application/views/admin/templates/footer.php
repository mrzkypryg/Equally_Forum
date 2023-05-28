<!-- ######## Chart Row End Here####### -->
<div class="footer-admin no-margin row">
	<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> : Equally - All Rights Reserved</p>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" id="b_url" value="<?php echo base_url() ?>">
<div id="remove" class="modal">
  <div style="width: 350px;margin-top: 120px;" class="modal-dialog" role="document">
    <div class="modal-content remove-model">
      <div class="modal-header">
        <h5 class="modal-title">Are  you sure Want to Remove ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-footer no-padding">
        <div class="row w-100 no-margin">
        	<div id="yes" data-dismiss="modal" class="col-sm-6 vbn vvg">
        		<i class="fa  fa-check"></i> &nbsp; Yes
        	</div>
        	<div data-dismiss="modal" class="col-sm-6 vbn">
        		<i class="fa  fa-times"></i> &nbsp;  No
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="restore" class="modal">
  <div style="width: 350px;margin-top: 120px;" class="modal-dialog" role="document">
    <div class="modal-content remove-model">
      <div class="modal-header">
        <h5 class="modal-title">Are  you sure Want to Restore ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-footer no-padding">
        <div class="row w-100 no-margin">
        	<div id="yes-restore" data-dismiss="modal" class="col-sm-6 vbn vvg">
        		<i class="fa  fa-check"></i> &nbsp; Yes
        	</div>
        	<div data-dismiss="modal" class="col-sm-6 vbn">
        		<i class="fa  fa-times"></i> &nbsp;  No
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/admin/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/js/popper.js"></script>
<script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/axios.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/notify.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vue.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/chart-js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/data-table/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/js/script.js"></script>


<?php
if(!empty($this->vue)){
 foreach ($this->vue as $vue) {  ?>
			<script src="<?php echo base_url() ?>assets/admin/<?php echo $vue;  ?>"></script>
<?php } } ?>

</body>

</html>
