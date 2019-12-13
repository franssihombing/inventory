<div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
       
        <div class="content-body"><!-- Basic Horizontal form layout section start -->

<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registrasi Vendor</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form method="post" action="<?= base_url() ?>admin/addVendor">
                            <div class="form-body">
                                <div class="row">
                                     
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" name="nama_vendor" id="first-name-column" class="form-control" placeholder="Nama Vendor">
                                            <label for="first-name-column">Nama Vendor</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="number" name="nomor_telepon" class="form-control" id="iconLeftDivider" placeholder="Nomor Telepon">
                                            <label for="city-column">Nomor Telepon</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" name="nama_pt" id="first-name-column" class="form-control" placeholder="Nama PT">
                                            <label for="first-name-column">Nama PT</label>
                                        </div>
                                    </div>
                                     
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" name="email" id="country-floating" class="form-control" placeholder="Email">
                                            <label for="country-floating">Email</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" name="alamat" id="last-name-column" class="form-control" placeholder="Alamat">
                                            <label for="last-name-column">Alamat</label>
                                        </div>
                                    </div>
                                  
                                    
                  <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic Floating Label Form section end -->

        </div>
      </div>
    </div>