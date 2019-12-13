<!DOCTYPE html>
<html lang="en">



<body>

    <br>
    
    <div class="col-md-12 col-12">
            <div class="form-label-group">
                    <img style="width : 100%; height : 250px ; border-radius : 5px ;" src="<?=base_url()?>app-assets/gambar/<?=$detail->gambar?>" alt="gambar">
                    <label> Gambar </label>
            </div>
        </div>

	<div class="col-md-12 col-12">
		<div class="form-label-group">
			<input type="text" disabled value="<?php echo $detail->id_barang ?> " class="form-control" >
			<label> ID Barang </label>
		</div>
    </div>
    

	<div class="col-md-12 col-12">
		<div class="form-label-group">
			<input type="text" disabled value="<?php echo $detail->nama_barang ?> " class="form-control" >
			<label> Nama barang </label>
		</div>
	</div>


	<div class="col-md-12 col-12">
		<div class="form-label-group">
			<input type="text" disabled value="<?php echo $detail->merk ?> " class="form-control" >
			<label> Merek </label>
		</div>
	</div>


	<div class="col-md-12 col-12">
		<div class="form-label-group">
			<input type="text" disabled value="<?php echo $detail->harga ?> " class="form-control" >
			<label> Harga </label>
		</div>
    </div>
    

	<div class="col-md-12 col-12">
		<div class="form-label-group">
			<input type="text" disabled value="<?php echo $detail->nama_vendor ?> " class="form-control" >
			<label> Vendor </label>
		</div>
	</div>

	<div class="col-md-12 col-12">
		<div class="form-label-group">
			<input type="text" disabled value="<?php echo $detail->stock ?> " class="form-control" >
			<label> Stock </label>
		</div>
	</div>

	

</body>


</html>
