<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
  
  <div class="app-content content">
       <div class="content-overlay"></div>
       <div class="header-navbar-shadow"></div>
       <div class="content-wrapper">
         <div class="content-header row">
           <div class="content-header-left col-md-9 col-12 mb-2">
             <div class="row breadcrumbs-top">
               <div class="col-12">
                 <h2 class="content-header-title float-left mb-0"> Barang Keluar</h2>
                
               </div>
             </div>
           </div>

 </div>
 <!-- Zero configuration table --><br>
 <section id="basic-datatable">
     <div class="row">
         <div class="col-12">
             <div class="card">
                 
                 <div class="card-content">
                     <div class="card-body card-dashboard">
 
                         <div class="table-responsive">
                             <table id="Datainventory" class="table zero-configuration">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th> Sales Order Number </th>
                                         <th> Nama Barang </th>
                                         <th> Quantity </th>
                                         <th> Status </th>
                                         <!-- <th> Lokasi</th> -->
                                         <!-- <th> Tanggal </th> -->
                                         <!-- <th style="text-align : center ;" class='no-sort'>Action</th> -->
                                     </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     
 </section>

 
 <!--/ Scroll - horizontal and vertical table -->
 
         </div>
       </div>
     </div>
 
     <script type="text/javascript" language="javascript" >
 
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
     $(document).ready(function() {
         var dataTable = $('#Datainventory').DataTable( {
             "processing":true,
             "serverSide": true,
             "stateSave" : false,
             "AutoWidth": true,
             "oLanguage": {
                 "sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
                 "sLengthMenu": "Display _MENU_ records per page",
                 "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                 "sInfoFiltered": "(difilter dari _MAX_ total data)",
                 "sZeroRecords": "Pencarian tidak ditemukan",
                 "sEmptyTable": "Data kosong",
                 "sLoadingRecords": "Harap Tunggu...",
                 "oPaginate": {
                     "sPrevious": "<",
                     "sNext": ">"
                 }
             },
             "aaSorting": [[ 0, "desc" ]],
             "columnDefs": [
                 {
                     "targets": 'no-sort',
                     "orderable": false,
                 }
             ],
             "sPaginationType": "simple_numbers",
             "iDisplayLength": 10,
             "aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
             "ajax":{
                 url :"<?php echo site_url('Marketing/get_out'); ?>",
                 type: "POST",
                 error: function(){
                     $(".my-grid-error").html("");
                     $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="12">No data found in the server</th></tr></tbody>');
                     $("#my-grid_processing").css("display","none");
                 }
             }
         } );
     });
 
     $(document).on('click', '#konfirmasi', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
  swal({
      title: "Hapus data?",
      text: "Data akan terhapus !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: "Tidak jadi :)",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        swal("Berhasil!", "Data sudah terhapus", "success");
        window.location.replace(url);
      } else {
        swal("Tidak jadi", "Data tidak jadi di hapus :)", "error");
      }
    });

    });


 
     $(document).on('click', '#YesDelete', function(e){
         e.preventDefault();
         $('#GetModal').modal('hide');
 
         $.ajax({
             url: $(this).data('url'),
             type: "POST",
             cache: false,
             dataType:'json',
             success: function(data){
                  Swal.fire({
   position: 'top-end',
   type: 'success',
   title: 'Data berhasil di hapus',
   showConfirmButton: false,
   timer: 1500
 })
                 $('.content-body').load('<?php echo base_url('master_inventory'); ?>');
             }
         });
     });
 
     $(document).on('click', '#Tambahinventory, #Editinventory, #Detailinventory', function(e){
         e.preventDefault();
         
         if($(this).attr('id') == 'Tambahinventory')
         {
 
             $('.modal-dialog').removeClass('modal-lg');
             $('.modal-dialog').addClass('modal-sm');
             $('#ModalHeader').html('Tambah');
         }
         if($(this).attr('id') == 'Detailinventory')
         {
             $('.modal-dialog').removeClass('modal-lg');
             $('.modal-dialog').addClass('modal-sm');
             $('#ModalHeader').html('Detail');
         }
         if($(this).attr('id') == 'Editinventory')
         {
             $('.modal-dialog').removeClass('modal-lg');
             $('.modal-dialog').addClass('modal-sm');
             $('#ModalHeader').html('Edit');
         }
         
         $('#ModalContent').load($(this).attr('href'));
         $('#GetModal').modal('show');
     });
 
     $(document).on('keyup', '.id_inventory', function(){
         $(this).parent().find('span').html("");
 
         var Kode = $(this).val();
         var Indexnya = $(this).parent().parent().index();
         var Pass = 0;
         $('#TabelTambahinventory tbody tr').each(function(){
             if(Indexnya !== $(this).index())
             {
                 var KodeLoop = $(this).find('td:nth-child(2) input').val();
                 if(KodeLoop !== '')
                 {
                     if(KodeLoop == Kode){
                         Pass++;
                     }
                 }
             }
         });
 
         if(Pass > 0)
         {
             $(this).parent().find('span').html("<font color='red'>Kode sudah ada</font>");
             $('#SimpanTambahinventory').addClass('disabled');
         }
         else
         {
             $(this).parent().find('span').html('');
             $('#SimpanTambahinventory').removeClass('disabled');
 
             $.ajax({
                 url: "<?php echo site_url('master_inventory/ajax-cek-kode'); ?>",
                 type: "POST",
                 cache: false,
                 data: "kodenya="+Kode,
                 dataType:'json',
                 success: function(json){
                     if(json.status == 0){
                         $('#TabelTambahinventory tbody tr:eq('+Indexnya+') td:nth-child(2)').find('span').html(json.pesan);
                         $('#SimpanTambahinventory').addClass('disabled');
                     }
                     if(json.status == 1){
                         $('#SimpanTambahinventory').removeClass('disabled');
                     }
                 }
             });
         }
     });
 </script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
     <script src="<?php echo base_url() ?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
     <script src="<?php echo base_url() ?>app-assets/js/scripts/datatables/datatable.min.js"></script>
 