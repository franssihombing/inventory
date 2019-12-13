<!DOCTYPE html>
<html lang="en">

<head>
<!-- 
	<script src="<?php echo base_url(); ?>app-assets/js/jquery.js"></script> -->

</head>


<body>
	<form method="post" action="<?= base_url() ?>admin/updateProductDb" enctype="multipart/form-data">

		<div class="form-label-group">
			<input type="hidden" name="id_barang" id="last-name-column" class="form-control"
				value="<?php echo $update->id_barang ?>">
		</div>

		<input type="hidden" name="filelama"  value="<?=$update->gambar?>">
		
		<div class="col-md-12 col-12">
			<div class="form-label-group">
				<img style="width : 100%; height : 250px ; border-radius : 5px ;"
					src="<?=base_url()?>app-assets/gambar/<?=$update->gambar?>" alt="gambar">

			</div>
		</div>


		<div class="col-md-12 col-12">
			<div class="form-label-group">
				<input type="file" name="gambar" value="<?php echo $update->gambar ?>" 
					class="form-control" placeholder="Gambar">
				<label> Update gambar </label>
			</div>
		</div>


		<div class="form-label-group">
			<input type="text" name="nama_barang" id="last-name-column" class="form-control" placeholder="Nama barang"
				value="<?php echo $update->nama_barang ?>">
			<label> Nama barang </label>
		</div>


		<div class="form-label-group">
			<input type="text" name="merk" id="last-name-column" value="<?php echo $update->merk ?>"
				class="form-control" placeholder="Merk">
			<label> Merk </label>
		</div>

		<div class="form-label-group">
			<input type="text" name="harga" id="last-name-column" value="<?php echo $update->harga ?>"
				class="form-control" placeholder="Harga">
			<label> Harga </label>
		</div>

		<div class="form-label-group">
			<input type="number" name="stock" id="last-name-column" value="<?php echo $update->stock ?>"
				class="form-control" placeholder="Stock">
			<label> Stok </label>
		</div>

		<div class="form-label-group">
			<select name="id_vendor_barang" class="form-control">
				<option value=" <?php echo $update->id_vendor_barang;?>"> <?php echo $update->nama_vendor;?> </option>

				<?php foreach($d_vendor as $v) { ?>
				<option value=" <?php echo $v->id_vendor_barang;?>">
					<?php echo $v->nama_vendor;?>
				</option>
				<?php }; ?>

			</select>
		</div>



		<button class="btn btn-success" type="submit"> Update </button>


	</form>

	
	<script>
	
	function bacaGambar(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
          $('#gambar_nodin').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
   }
}

</script>

</body>


</html>
