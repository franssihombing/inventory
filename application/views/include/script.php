<!-- BEGIN: Vendor JS-->
 
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->

    <script src="<?php echo base_url('app-assets/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Load file plugin js jquery-ui -->
    <!-- <script>
    	$(document).ready(function () { // Ketika halaman selesai di load
    		$('.input-tanggal').datepicker({
    			dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
    		});
    		$('#form-tanggal, #form-bulan, #form-tahun')
    	.hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
    		$('#filter').change(function () { // Ketika user memilih filter
    			if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
    				$('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
    				$('#form-tanggal').show(); // Tampilkan form tanggal
    			} else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
    				$('#form-tanggal').hide(); // Sembunyikan form tanggal
    				$('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
    			} else { // Jika filternya 3 (per tahun)
    				$('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
    				$('#form-tahun').show(); // Tampilkan form tahun
    			}
    			$('#form-tanggal input, #form-bulan select, #form-tahun select').val(
    			''); // Clear data pada textbox tanggal, combobox bulan & tahun
    		})
    	})

    </script> -->
    
      <script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/core/app.min.js"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/scripts/components.min.js"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/scripts/customizer.min.js"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/scripts/footer.min.js"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/scripts/forms/wizard-steps.min.js"></script>
    
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url(); ?>app-assets/js/scripts/pages/faq-kb.min.js"></script>
    <!-- END: Page JS-->

 <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
    <!-- END: Custom CSS-->
    

 <div class="modal fade" id="GetModal" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalHeader"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" id="ModalContent">
                   
                  </div>
                
                </div>
              </div>
            </div>