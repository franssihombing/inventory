<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">

		<div class="content-body">
			<!-- Basic Horizontal form layout section start -->

			<!-- // Basic multiple Column Form section start -->
			<h4 class="card-title">Surat jalan</h4>



			<div class="row">

				<div class="col-md-12">
					<form method="get" action="">
						<label>Filter Sales Order Number</label><br><br>
                            

                            <div class="col-md-6">
                               <div class="form-label-group">
                                    <input placeholder="Masukan SO Number" required name="so" class="form-control input-tanggal" />
                                    <label>Sales Order Number</label>
                                </div>
                            </div>    
                               


                          
                                  
                            </div>

						<br>

						</div>

						<button id="tampil" class="btn btn-primary" type="submit">
                            <i class='fa fa-eye '></i>
                            Tampilkan
                        </button>

						<a href="<?php echo base_url('admin/suratjalan'); ?>" style="color : #4d5456">Reset Filter</a>
					</form>
                    <br><br>
					<hr />

					<b><?php echo $ket; ?></b><br /><br />
					

                    
                        <a id="cetak" href="<?php echo $url_cetak; ?>" style="color : #fff;"> 
                            <button class='btn btn-danger mb-2'>
                                <i class='fa fa-print '></i> &nbsp;
                                Cetak Surat Jalan
                            </button>
                        </a>
				    

               

                    <section id="basic-datatable">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                        
                                                <div class="table-responsive">
                                                    <table class="table zero-configuration">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th> Tanggal </th>
                                                                <th> SO Number </th>
                                                                <th> Nama Barang </th>
                                                                <th> Quantity </th>
                                                                <th> Satuan </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                                if( ! empty($report)){
                                                                
                                                                foreach($report as $data){
                                                                        $tgl = date('Y-m-d', strtotime($data->tanggal_keluar));
                                                                        
                                                                    echo "<tr>";
                                                                    echo "<td>".$tgl."</td>";
                                                                    echo "<td>".$data->so."</td>";
                                                                    echo "<td>".$data->nama_barang."</td>";
                                                                    echo "<td>".$data->qty_out."</td>";
                                                                    echo "<td>".$data->satuan."</td>";
                                                                    echo "</tr>";
                                                                    
                                                                }
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
					
					

				</div>




			</div>


			

		</div>
	</div>
</div>

