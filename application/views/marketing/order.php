
 
    

<script src="<?php echo base_url(); ?>app-assets/js/ajax.js"></script>


<link rel="stylesheet" type="text/css"
    	href="<?php echo base_url() ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css"
    	href="<?php echo base_url() ?>app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css"
    	href="<?php echo base_url() ?>app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css"
    	href="<?php echo base_url() ?>app-assets/css/plugins/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>app-assets/css/pages/data-list-view.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>app-assets/vendors/css/forms/select/select2.min.css">

	<script src="<?php echo base_url(); ?>app-assets/js/ajax.js"></script>


    <div class="app-content content">
    	<div class="content-overlay"></div>
    	<div class="header-navbar-shadow"></div>
    	<div class="content-wrapper">
		<form method="post" action="<?= base_url() ?>Marketing/insert_db">

    		<div class="content-body">
    			<!-- Basic Horizontal form layout section start -->

    			<!-- // Basic multiple Column Form section start -->

			


    			<section id="multiple-column-form">

    				<div class="row match-height">
    					<div class="col-12">

    						<div class="card">
    							<div class="card-header">
    								<h4 class="card-title">Purchase Order </h4>
    							</div>


    							<div class="card-content">
    								<div class="card-body">
    										<div class="form-body">
    											<div class="row">



													<div class="col-md-6 col-12">
    													<div class="form-label-group">
    														<input type="text" name="po[]" value="<?php echo  $po ?>"  id="po" class="form-control" readonly
    															placeholder="PO NUMBER">
    														<label for="first-name-column">PO NUMBER</label>
    													</div>
    												</div>


												
													


													<div class="col-md-6 col-12">
    													<div class="form-label-group">
    														<input type="date" name="tanggal_masuk[]" id="tanggal_keluar" class="form-control"
    															placeholder="Tanggal" value="<?php echo date('Y-m-d'); ?>">
    														<label for="last-name-column">Tanggal Order</label>
    													</div>
    												</div>
												
													<div class="col-md-6 col-12">
    													<div class="form-label-group">
    														<input type="text" required name="" class="form-control"
    															placeholder="Pilih Vendor">
    														<label for="last-name-column"> Pilih Vendor </label>
    													</div>
    												</div>

												

    											</div>
    										</div>
    									
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>



    			</section>
    			


				<div class="row match-height">
    					<div class="col-12">

    						<div class="card">
    							<div class="card-header">
    								
    							</div>


    								<div  class="card-body">
									
    										<div class="form-body">
    											<div class="row">

													
													<div class="col-md-6">
														
														<button type="button" class="btn" onclick="deleteRow('dataTable')"  data-toggle="tooltip" data-placement="top" title="Hapus baris" style="background: #f2f2f2; color: #de4d4d;">
															<i class="feather icon-trash-2"></i> Hapus baris 
														</button>


														<button class="btn" type="button"  onclick="addRow('dataTable')"   data-toggle="tooltip" data-placement="top" title="Tambah baris" style="background: #f2f2f2; color: #1b5c84;">  
															<i class="feather icon-plus"></i> Tambah baris
														</button>


													</div>
													
<input type="hidden" name="satuan[]" value="satuan">
													<table id="dataTable" width="350px" class="table">
														
															<tr>
																<td>
																	<INPUT type="checkbox" name="chk" /> 
																</td>

																<td>	
																	<select name="id_barang[]" id="id_barang"  onchange="autofill();" class="pilihbarang form-control">
																		<option value=""> Pilih barang </option>
																		<?php foreach($detail as $d) { ?>
																			<option value="<?php echo $d->id_barang;?>"> <?php echo $d->nama_barang;?> </option>  
																		<?php }; ?>
																	</select>
																	 
																</td>

																
																<td>
																	<input class="form-control" type="number" id="qty" placeholder="Quantity" name="qty_in[]"> 
																</td>
																
																<td>  <input type="text" name="harga[]" id="harga" class="form-control"	placeholder="Harga"> </td>

																<td>
																	<input type="text"  name="total[]" id="total" class="form-control" placeholder="Total">
																</td>

															</tr>
														</table>

														
														
															<div id="myDiv"></div>


													<div class="col-md-6 col-12">
														
													

														<button class="btn btn-primary" type="submit"> Submit </button>

													</div>


    											</div>
    										</div>
    									</form>
    								</div>
    							</div>
    						</div>
    					</div>
						


    			</section>


    		</div>
    	</div>
	</div>
	
	<script type="text/javascript">
	
</script>
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

$(document).on('input', '#qty', function(){
	var harga = document.getElementById('harga').value;
      var qty = document.getElementById('qty').value;
      var result = parseInt(harga) * parseInt(qty);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
});


    function autofill(){
        var id_barang =document.getElementById('id_barang').value;
        $.ajax({
                       url:"<?php echo base_url();?>marketing/cari",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){ 
                 
               document.getElementById('id_barang').value=val.id_barang;
                document.getElementById('harga').value=val.harga;
                                
                     
                });
            }
                   });
                   
    }

	function autoharga(){
        var id_barang = document.getElementById('mySelect').value;
        $.ajax({
                       url:"<?php echo base_url();?>marketing/cari",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);  
						  

					 
            $.each(hasil, function(key,val){ 
                 
                document.getElementById('hargas').value=val.harga;
                                
                     
                });
            }
                });
                   
    }

	$(document).on('input', '#qty_in', function(){
					var harga = document.getElementById('hargas').value;
					var qty = document.getElementById('qty_in').value;
					var result = parseInt(harga) * parseInt(qty);
					if (!isNaN(result)) {
						document.getElementById('total_out').value = result;
					}
				});

	


</script>

    <script type="text/javascript">

	

	var $pilihbarang = $(".pilihbarang");
	$pilihbarang.select2();

    	$(document).ready(function () {

    		$(".caribarang").select2({
    			ajax: {
    				url: '<?php echo base_url('Admin/cari_barang '); ?>',
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

  
<script>




		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			if (rowCount >= 21) {
				alert("Tidak bisa memohon lebih dari 20 barang");
				return;
			}
			var row = table.insertRow(rowCount);

			
			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "checkbox";
			element1.name = "chkbox[]";
			cell1.appendChild(element1);



			var cell2 = row.insertCell(1);

			var myDiv = document.getElementById("myDiv");
 
			
		
			var selectList = document.createElement("select");
			selectList.setAttribute("class",  "pilihbarang1 form-control");
			selectList.setAttribute("id", "mySelect");
			selectList.setAttribute("onchange", "autoharga();");
			selectList.setAttribute("name", "id_barang[]");
			myDiv.appendChild(selectList);
		
			$.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>Marketing/caricoba',
                async : false,
                dataType : 'json',
                success : function(data){
                    
                    var i;
                    for(var i = 0; i < data.length; i++){
						var option = document.createElement("option");
						option.setAttribute("value", data[i].id_barang);
						option.text = data[i].nama_barang;
						selectList.appendChild(option);
						cell2.appendChild(selectList);
                    }

                }
 
            });

			var $pilihbarang1 = $(".pilihbarang1");
			$(".pilihbarang1").select2({
				placeholder: "Pilih barang",
				allowClear: true
			});
			

			



			var cell3 = row.insertCell(2);
			var element2 = document.createElement("input");
			element2.type = "number";
			element2.name = "qty_in";
			element2.setAttribute("id", "qty_in");
			element2.placeholder = "Quantity";
			element2.className = "form-control";
            cell3.appendChild(element2);
            
            var cell4 = row.insertCell(3);
			var element3 = document.createElement("input");
			element3.type = "text";
			element3.setAttribute("id", "hargas");
			element3.name = "harga[]";
			element3.placeholder = "Harga";
			element3.className = "form-control";
			cell4.appendChild(element3);

			var cell5 = row.insertCell(4);
			var element4 = document.createElement("input");
			element4.type = "text";
			element4.name = "total";
			element4.setAttribute("id", "total_out");
			element4.placeholder = "Total";
			element4.className = "form-control";
			cell5.appendChild(element4);

			

			var cell6 = row.insertCell(5);
			var element5 = document.createElement("input");
			element5.type = "hidden";
			element5.name = "po[]";
			element5.value =  document.getElementById("po").value;
			element5.className = "form-control";
			cell6.appendChild(element5);

			var cell7 = row.insertCell(6);
			var element6 = document.createElement("input");
			element6.type = "hidden";
			element6.name = "tanggal_keluar[]";
			element6.value =  document.getElementById("tanggal_keluar").value;
			element6.className = "form-control";
			cell7.appendChild(element6);





		}

		function deleteRow(tableID) {
			try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;

				for (var i = 0; i < rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if (null != chkbox && true == chkbox.checked) {
						table.deleteRow(i);
						rowCount--;
						i--;
					}

				}
			} catch (e) {
				alert(e);
			}
		}

	</script>