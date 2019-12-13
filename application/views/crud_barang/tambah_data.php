<link rel="stylesheet" type="text/css"
	href="<?php echo base_url() ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url() ?>app-assets/vendors/css/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url() ?>app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url() ?>app-assets/css/plugins/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>app-assets/css/pages/data-list-view.min.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url() ?>app-assets/vendors/css/forms/select/select2.min.css">
<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">


	


		<div class="content-body">

		<?php form_close();
			if(isset($errors)):
				echo "<div class='alert alert-danger'>".$errors."</div>";
			endif; ?>	
			<!-- Basic Horizontal form layout section start -->

			<!-- // Basic multiple Column Form section start -->
			<section id="multiple-column-form">
				<div class="row match-height">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Tambah data</h4>
							</div>
							<div class="card-content">
								<div class="card-body">

								<form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>admin/addProductDb">


										<div class="form-body">
											<div class="row justify-content-center">

												<div class="col-9">

													
													
													<div class="col-md-12 col-12">
														<div class="form-label-group">
															<input type="text" required name="nama_barang" id="last-name-column"
																class="form-control" placeholder="Nama barang">
															<label> Nama barang </label>
														</div>
													</div>

													<div class="col-md-12 col-12">
														<div class="form-label-group">
															<input type="text" required name="harga" id="last-name-column"
																class="form-control" placeholder="Harga">
															<label> Harga barang </label>
														</div>
													</div>


													<div class="col-md-12 col-12">
														<div class="form-label-group">
															<input type="text" required name="merk" id="last-name-column"
																class="form-control" placeholder="Merk">
															<label> Merk </label>
														</div>
													</div>

													<div class="col-md-12 col-12">
														<div class="form-label-group">
															<input type="text" required name="link" id="last-name-column"
																class="form-control" placeholder="Link pembelian barang">
															<label> Link pembelian </label>
														</div>
													</div>

													<div class="col-md-12 col-12">
														<div class="form-label-group">
															<input type="number" required name="stock" id="last-name-column"
																class="form-control" placeholder="Stock">
															<label> Stock </label>
														</div>
													</div>

													<div class="col-md-12 col-12">
														<div class="form-label-group">
															<input type="file" required name="gambar" require id="last-name-column"
																class="form-control" placeholder="Gambar">
															<label> Gambar </label>
														</div>
													</div>

													<div class="col-md-12 col-12">
														<div class="form-label-group">
															<select name="id_vendor_barang"  class="form-control">
																<option value=""> Pilih Vendor </option>

																<?php foreach($d_vendor as $v) { ?>
																	<option value=" <?php echo $v->id_vendor_barang;?>"> 
																		<?php echo $v->nama_vendor;?> 
																	</option>  
																<?php }; ?>

															</select>
														</div>
													</div>

													<button class="btn btn-primary" type="submit"> Add data  </button>
								
												</div>

											</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>



			</section>
			<section id="data-list-view" class="data-list-view-header">





			</section>

			<!-- // Basic Floating Label Form section end -->

		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/js/scripts/forms/select/form-select2.min.js"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<!-- END: Page Vendor JS-->
<script src="<?php echo base_url(); ?>app-assets/js/scripts/ui/data-list-view.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {

		$(".caribarang").select2({
			ajax: {
				url: '<?php echo base_url('
				Admin / cari_barang '); ?>',
				type: "POST",
				dataType: 'json',
				delay: 250,
				data: function (params) {
					return {
						searchTerm: params.term // search term
					};
				},
				processResults: function (response) {
					return {
						results: response
					};
				},
				cache: true
			},

			placeholder: 'Search for a repository',
			minimumInputLength: 1
		});

	});

</script>

<script type="text/javascript">
	$(document).ready(function () {

		$('.add_cart').click(function () {
			var product_id = 1;
			var product_name = document.getElementById("nama_barang").value;
			var quantity = document.getElementById("qty").value;
			var satuan = document.getElementById("satuan").value;
			var litime = document.getElementById("litime").value;
			var brand = document.getElementById("brand").value;
			var harga = document.getElementById("harga").value;
			var total = document.getElementById("total").value;
			$.ajax({
				url: "<?php echo site_url('order/add_to_cart');?>",
				method: "POST",
				data: {
					product_id: product_id,
					product_name: product_name,
					satuan: satuan,
					quantity: quantity,
					litime: litime,
					brand: brand,
					harga: harga,
					total: total
				},
				success: function (data) {
					$('#detail_cart').html(data);
					document.getElementById("FormData").reset();
				}
			});
		});


		$('#detail_cart').load("<?php echo site_url('order/load_cart');?>");


		$(document).on('click', '.romove_cart', function () {
			var row_id = $(this).attr("id");
			$.ajax({
				url: "<?php echo site_url('order/delete_cart');?>",
				method: "POST",
				data: {
					row_id: row_id
				},
				success: function (data) {
					$('#detail_cart').html(data);
				}
			});
		});
	});

</script>
