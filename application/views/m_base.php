<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<?php $this->load->view('include/head'); ?>
<!-- END: Head-->

<!-- BEGIN: Body-->

<?php $this->load->view('include/body'); ?>

<?php $this->load->view('include/header'); ?>
        
<?php $this->load->view('include/menu_marketing'); ?>

<?php $this->load->view($link); ?>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


  <?php $this->load->view('include/script'); ?>

</body>
<!-- END: Body-->

</html>