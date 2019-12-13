<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">

		<div class="content-body">
			<!-- Basic Horizontal form layout section start -->

			<!-- // Basic multiple Column Form section start -->
            <h4 class="card-title">Dashboard Gudang</h4>



			<div class="row">
           
				<div class="col-md-6">
                    <a href="<?php echo base_url('admin/list_barang'); ?>">
                        <div class="card" style="background: linear-gradient(45deg, #6442ec94, #269abd); color: #fff;">
                            <div style="margin : 10px;">
                                <h1 style="color :#fff;" align="center"> <strong> <?php echo $sumb ?> </strong> </h1>
                                <p align="center">Data barang </p>
                            </div>
                        </div>
                    </a>
				</div>

                <div class="col-md-6">
                    <a href="<?php echo base_url('admin/list_vendor'); ?>">
                        <div class="card" style="background: linear-gradient(45deg, #269abd, #6442ec94); color: #fff;">
                            <div style="margin : 10px;">
                                <h1 style="color :#fff;" align="center"> <strong>  <?php echo $sumv ?>  </strong> </h1>
                                <p align="center">Data vendor </p>
                            </div>
                        </div>
                    </a>
				</div>

                <div class="col-md-6">
                    <a href="<?php echo base_url('admin/in'); ?>">
                        <div class="card" style="background: linear-gradient(45deg, #581e8c85, #42aeec); color: #fff;">
                            <div style="margin : 10px;">
                                <h1 style="color :#fff;" align="center"> <strong>  <?php echo $sumi ?>  </strong> </h1>
                                <p align="center">Barang masuk </p>
                            </div>
                        </div>
                    </a>
				</div>

                <div class="col-md-6">
                    <a href="<?php echo base_url('admin/out'); ?>">
                        <div class="card" style="background: linear-gradient(45deg, #42aeec, #581e8c85); color: #fff;">
                            <div style="margin : 10px;">
                                <h1 style="color :#fff;" align="center"> <strong>  <?php echo $sumo ?>  </strong> </h1>
                                <p align="center">Barang keluar </p>
                            </div>
                        </div>
                    </a>
				</div>

                
			</div>


			<!-- // Basic Floating Label Form section end -->

		</div>
	</div>
</div>
