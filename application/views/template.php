<?php  $uid = $this->session->userdata('uid'); ?>


<?php $this->load->view('template/header'); ?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view('template/footer'); ?>