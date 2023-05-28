<?php


    $id = $this->session->userdata('admin');
    if(!$id){
    	header('Location:'.base_url().'admin/login');
       die;
    }

?>


<?php $this->load->view('admin/templates/header'); ?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view('admin/templates/footer'); ?>
