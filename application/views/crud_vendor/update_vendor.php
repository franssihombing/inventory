  <!-- BEGIN: Head-->

  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  	<meta name="description"
  		content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  	<meta name="keywords"
  		content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  	<meta name="author" content="PIXINVENT">
  	<title>Inventory</title>
  	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>app-assets/images/ico/apple-icon-120.png">
  	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>app-assets/images/ico/favicon.ico">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


  	<link rel="stylesheet" href="<?php echo base_url('app-assets/jquery-ui/jquery-ui.min.css'); ?>" />
  	<!-- Load file css jquery-ui -->
  	<script src="<?php echo base_url('app-assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->


  	<!-- BEGIN: Vendor CSS-->
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/vendors.min.css">
  	<!-- END: Vendor CSS-->

  	<!-- BEGIN: Theme CSS-->
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/bootstrap-extended.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/colors.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/components.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/themes/dark-layout.min.css">
  	<link rel="stylesheet" type="text/css"
  		href="<?php echo base_url(); ?>app-assets/css/themes/semi-dark-layout.min.css">

  	<!-- BEGIN: Page CSS-->
  	<link rel="stylesheet" type="text/css"
  		href="<?php echo base_url(); ?>app-assets/css/core/menu/menu-types/vertical-menu.min.css">
  	<link rel="stylesheet" type="text/css"
  		href="<?php echo base_url(); ?>app-assets/css/core/colors/palette-gradient.min.css">
  	<link rel="stylesheet" type="text/css"
  		href="<?php echo base_url(); ?>app-assets/css/pages/knowledge-base.min.css">
  	<link rel="stylesheet" type="text/css"
  		href="<?php echo base_url(); ?>app-assets/css/plugins/forms/wizard.min.css">
  	<!-- END: Page CSS-->

  	<!-- BEGIN: Custom CSS-->
  	<script src="<?php echo base_url(); ?>app-assets/vendors/js/vendors.min.js"></script>

  </head>
  <!-- END: Head-->


  <body>

  <form method="post" action="<?= base_url() ?>admin/updateVendor">

    <div class="form-label-group">
  			<input type="hidden" name="id_vendor_barang" id="last-name-column" class="form-control" value="<?php echo $update->id_vendor_barang ?>">
  		</div>

  		<div class="form-label-group">
  			<input type="text" name="nama_vendor" id="last-name-column" class="form-control" placeholder="Nama Vendor"
  				value="<?php echo $update->nama_vendor ?>">
  			<label> Nama Vendor </label>
  		</div>
  	

          <div class="form-label-group">
  			<input type="text" name="nama_pt" id="last-name-column" class="form-control" placeholder="Nama PT"
  				value="<?php echo $update->nama_pt ?>">
  			<label> Nama PT </label>
  		</div>

          <div class="form-label-group">
  			<input type="text" name="alamat" id="last-name-column" class="form-control" placeholder="Alamat"
  				value="<?php echo $update->alamat ?>">
  			<label> Alamat </label>
  		</div>

          <div class="form-label-group">
  			<input type="text" name="nomor_telepon" id="last-name-column" class="form-control" placeholder=" Nomor telepon"
  				value="<?php echo $update->nomor_telepon ?>">
  			<label> Nomor telepon </label>
  		</div>

          <div class="form-label-group">
  			<input type="text" name="email" id="last-name-column" class="form-control" placeholder="Email"
  				value="<?php echo $update->email ?>">
  			<label> Email </label>
  		</div>


  		<button class="btn btn-success" type="submit"> Update </button>


  	</form>

  </body>


  </html>
