<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('M_data');
		$this->load->model('M_purchase');
		
		if ($this->session->userdata('username') != "marketing") {
			redirect('secure/login');
		}

	}

	public function index(){
		$id = $this->session->userdata('id');
		
		$data = array(
			'sumb' => $this->M_data->sumb(),
			'sumv' => $this->M_data->sumv(),
			'sumi' => $this->M_data->sumi(),
			'sumo' => $this->M_data->sumo(),
			'datauser' => $this->M_data->find_user($id)
			);
		
			$data['link'] = 'marketing/index';
		
        $this->parser->parse('m_base', $data);
	}



	// BARANG 
	public function list_barang(){
		$id = $this->session->userdata('id');
        $data['datauser'] = $this->M_data->find_user($id);
        $data['link'] = 'marketing/list_barang';
        
        $this->parser->parse('m_base', $data);
	}

	
	public function addProductDb(){

		  
		  $config['upload_path'] = './app-assets/gambar';
		  $config['allowed_types'] = 'jpg|png|jpeg|gif';
		  $config['max_size'] = '10000'; 
		  $config['max_width'] = '4480'; 
		  $config['max_height'] = '4480'; 
		  $config['file_name'] = $_FILES['gambar']['name'];
	
		  $this->upload->initialize($config);
		  
	
			if (!empty($_FILES['gambar']['name'])) {
				if ( $this->upload->do_upload('gambar') ) {
					$gambar = $this->upload->data();
					$data = array(
						'id_vendor_barang' => $this->input->post('id_vendor_barang'),
						'nama_barang' => $this->input->post('nama_barang'),
						'merk' => $this->input->post('merk'),
						'link' => $this->input->post('link'),
						'harga' => $this->input->post('harga'),
						'stock' => $this->input->post('stock'),
						'gambar' => $gambar['file_name'],
								);
								$this->M_data->addProduct($data); 
								redirect('marketing/list_barang');
							}else {
				  $error = $this->upload->display_errors();
				  $data['errors'] = $error; 
				  
				  
				$id = $this->session->userdata('id');
				$data['datauser'] = $this->M_data->find_user($id);
				$data['d_vendor'] = $this->M_data->cobv();
				  $data['link'] = 'crud_barang/tambah_data';
				  $this->parser->parse('m_base', $data);
				}
			}else {
			  echo "tidak masuk";
			}

	}



	
	public function updateProductDb(){

  
		$path = './app-assets/gambar/';
  
		$id = $this->input->post('id_barang');
  
		
		$config['upload_path'] = './app-assets/gambar';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '10000';
		$config['max_width'] = '4480';
		$config['max_height'] = '4480';
		$config['file_name'] = $_FILES['gambar']['name'];
  
		$this->upload->initialize($config);
  
		  if (!empty($_FILES['gambar']['name'])) {
			  if ( $this->upload->do_upload('gambar') ) {
				  $gambar = $this->upload->data();
				  $data = array(
					'id_vendor_barang' => $this->input->post('id_vendor_barang'),
					'nama_barang' => $this->input->post('nama_barang'),
					'merk' => $this->input->post('merk'),
					'harga' => $this->input->post('harga'),
					'stock' => $this->input->post('stock'),
					'gambar'       => $gambar['file_name'],
							  );

  
				$this->M_data->updateProduct($id,$data); 
				redirect('marketing/list_barang');
			}else {
				$error = $this->upload->display_errors();
				$data['errors'] = $error; 
				
				
			  $id = $this->session->userdata('id');
			  $data['datauser'] = $this->M_data->find_user($id);
			  $data['d_vendor'] = $this->M_data->cobv();
				$data['link'] = 'marketing/list_barang';
				$this->parser->parse('m_base', $data);
			  }
		  }else {
			$data = array(
				'id_vendor_barang' => $this->input->post('id_vendor_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'merk' => $this->input->post('merk'),
				'harga' => $this->input->post('harga'),
				'stock' => $this->input->post('stock'),
				'gambar'  => $this->input->post('filelama'),
						  );


			$this->M_data->updateProduct($id,$data); 
			redirect('marketing/list_barang');
		  }
	}



	public function tambah_data(){
		$id = $this->session->userdata('id');

		$data['datauser'] = $this->M_data->find_user($id);
		
		$data['d_vendor'] = $this->M_data->cobv();
		
        $data['link'] = 'crud_barang/tambah_data';

        $this->parser->parse('m_base', $data);
	}

	public function detail_barang($id){
 
 
		$detail = $this->M_data->get_detail_barang($id);
		$data['detail'] = $detail;
		$this->load->view('crud_barang/detail_barang', $data);
 
	}

	public function update_barang($id){
 
 
		$update = $this->M_data->get_detail_barang($id);
		$data['d_vendor'] = $this->M_data->cobv();

		$data['update'] = $update;
		$this->load->view('crud_barang/update_barang', $data);
 
	}

	function delete($id){
		$where = array('id_barang_out' => $id);
		$this->M_data->hapus_data($where,'tbl_barang_out');
		redirect('marketing/list_barang');
	}



	// AKHIR BARANG


	// ___________________________________________


	// VENDOR 


	public function list_vendor(){
		$id = $this->session->userdata('id');
        $data['datauser'] = $this->M_data->find_user($id);
        $data['link'] = 'marketing/list_vendor';
        
        $this->parser->parse('m_base', $data);
	}

	
	public function tambahvendor(){
		$id = $this->session->userdata('id');
        $data['datauser'] = $this->M_data->find_user($id);
        $data['link'] = 'crud_vendor/addvendor';
        
        $this->parser->parse('m_base', $data);
	}

	public function addVendor(){
		
		
		$data = array(
				'id_vendor_barang' => $this->input->post('id_vendor_barang'),
				'nama_vendor' => $this->input->post('nama_vendor'),
				'nama_pt' => $this->input->post('nama_pt'),
				'alamat' => $this->input->post('alamat'),
				'nomor_telepon' => $this->input->post('nomor_telepon'),
				'email' => $this->input->post('email')
				);
		
			

		$this->M_data->addVendor($data); 
		
	
		redirect('marketing/list_vendor');
	}

	
	public function detail_vendor($id){
 
 
		$detail = $this->M_data->get_detail_vendor($id);
		$data['detail'] = $detail;
		$this->load->view('crud_vendor/detail_vendor', $data);
 
	}

	public function update_Vendor($id){
 
 
		$update = $this->M_data->get_detail_vendor($id);
		$data['d_vendor'] = $this->M_data->cobv();

		$data['update'] = $update;
		$this->load->view('crud_vendor/update_vendor', $data);
 
	}

	public function updateVendor(){
		
		$id = $this->input->post('id_vendor_barang');

		$data = array(
				'nama_vendor' => $this->input->post('nama_vendor'),
				'nama_pt' => $this->input->post('nama_pt'),
				'alamat' => $this->input->post('alamat'),
				'nomor_telepon' => $this->input->post('nomor_telepon'),
				'email' => $this->input->post('email'),
				);
		

		$this->M_data->updateVendor($id,$data); 
		
	
		redirect('marketing/list_vendor');
	}

	function delete_vendor($id){
		$where = array('id_vendor_barang' => $id);
		$this->M_data->hapus_vendor($where,'tbl_vendor_barang');
		redirect('marketing/list_vendor');
	}





	// AHKHIR VENDOR


	// ___________________________________________


	// MEREK 

	public function merek(){
		$id = $this->session->userdata('id');
		
		$data = array(
			'datauser' => $this->M_data->find_user($id),
			'link' => 'marketing/merek',
			'detail' =>  $this->M_data->cobv()
			);

        
        $this->parser->parse('m_base', $data);
	}

	public function addMerek(){
		
		
		$data = array(
				'id_merek' => $this->input->post('id_merek'),
				'id_vendor_barang' => $this->input->post('id_vendor_barang'),
				'nama_merek' => $this->input->post('nama_merek'),
				'deskripsi' => $this->input->post('deskripsi'),
				);
		
			

		$this->M_data->addMerek($data); 
		
	
		redirect('marketing/merek');
	}

	public function update_merek($id){
 
 
		$update = $this->M_data->get_detail_merek($id);
		$data['d_vendor'] = $this->M_data->cobv();

		$data['update'] = $update;
		$this->load->view('crud_merek/update_merek', $data);
 
	}

	public function updateMerek(){
		
		$id = $this->input->post('id_merek');

		$data = array(
				'nama_merek' => $this->input->post('nama_merek'),
				'id_vendor_barang' => $this->input->post('id_vendor_barang'),
				'deskripsi' => $this->input->post('deskripsi'),
				);
		

		$this->M_data->updateMerek($id,$data); 
		
	
		redirect('marketing/merek');
	}


	public function detail_merek($id){
 
 
		$detail = $this->M_data->get_detail_merek($id);
		$data['detail'] = $detail;
		$this->load->view('crud_merek/detail_merek', $data);
 
	}


	function delete_merek($id){
		$where = array('id_merek' => $id);
		$this->M_data->hapus_merek($where,'tbl_merek');
		redirect('marketing/merek');
	}


	// AKHIR MEREK


	// ___________________________________________


	// BARANG MASUK

	public function in(){
		$id = $this->session->userdata('id');

	
		$data = array(
			'datauser' => $this->M_data->find_user($id),
			'detail' =>  $this->M_data->coba()
			);
		

		$data['link'] = 'marketing/in';


        $this->parser->parse('m_base', $data);
	}

	public function detail_in($id){
 
 
		$detail = $this->M_data->get_detail_in($id);
		$data['detail'] = $detail;
		$this->load->view('detail_in', $data);
 
	}



	// AKHIR BARANG MASUK



	// ___________________________________________



	// BARANG KELUAR


	
	public function addissuing(){
		$data = array(
				'id_barang' => $this->input->post('id_barang'),
				'qty_out' => $this->input->post('qty_out'),
				'tanggal' => $this->input->post('tanggal'),
				'lokasi' => $this->input->post('lokasi'),
				'keterangan' => $this->input->post('keterangan')
				);


				// $qty_out = $this->input->post('qty_out');

		$this->M_data->addissuing($data); 
		// $this->M_data->kurangstock($qty_out); 
		
	
		redirect('marketing/out');
	}

	
	public function out(){
		$id = $this->session->userdata('id');
		
		$data = array(
			'datauser' => $this->M_data->find_user($id),
			'detail' =>  $this->M_data->coba()
			);


		$data['link'] = 'marketing/out';
		
		

        $this->parser->parse('m_base', $data);
	}

	
	public function detail_out($id){
 
 
		$detail = $this->M_data->get_detail_out($id);
		$data['detail'] = $detail;
		$this->load->view('detail_out', $data);
 
	}


	// AKHIR BARANG KELUAR


	// ___________________________________________


	// ORDER

	public function addOrder(){
		
		
		$data = array(
			'id_barang' => $this->input->post('id_barang'),
			'po' => $this->input->post('po'),
			'qty_in' => $this->input->post('qty_in'),
			'satuan' => $this->input->post('satuan'),
			'harga' => $this->input->post('harga'),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'total' => $this->input->post('total')
			);

			// $qty_in = $this->input->post('qty_in');

		// $this->M_data->tambahstock($qty_in);
	
			

		$this->M_data->addOrder($data); 
		
	
		redirect('marketing/order');
	}


	function insert_db() {
   
		$nm = $this->input->post('po');
		$result = array();
		foreach($nm AS $key => $val){
		 $result[] = array(
		  "po"  => $_POST['po'][$key],
		  "id_barang"  => $_POST['id_barang'][$key],
		  "qty_in"  => $_POST['qty_in'][$key],
		  "satuan"  => $_POST['satuan'][$key],
		  "harga"  => $_POST['harga'][$key],
		  "total"  => $_POST['total'][$key],
		  "tanggal_masuk"  => $_POST['tanggal_masuk'][$key],
		 );
		}            
		
		$test= $this->db->insert_batch('tbl_barang_in', $result);
			
			if($test){
			redirect('marketing/purchase');   
			}else{
			echo "gagal di input";
			}
	   
	  }

	  function request_barang() {
   
		$nm = $this->input->post('so');
		$result = array();
		foreach($nm AS $key => $val){
		 $result[] = array(
		  "so"  => $_POST['so'][$key],
		  "id_barang"  => $_POST['id_barang'][$key],
		  "qty_out"  => $_POST['qty_out'][$key],
		  "satuan"  => $_POST['satuan'][$key],
		  "harga"  => $_POST['harga'][$key],
		  "total"  => $_POST['total'][$key],
		  "status"  => $_POST['status'][$key],
		  "tanggal_keluar"  => $_POST['tanggal_keluar'][$key],
		 );
		}            
		
		$test= $this->db->insert_batch('tbl_barang_out', $result);
			
			if($test){
			redirect('marketing/request');   
			}else{
			echo "gagal di input";
			}
	   
	  }
	  
	public function purchase(){
		$id = $this->session->userdata('id');


		$data = array(
			'datauser' => $this->M_data->find_user($id),
			'link' => 'marketing/order',
			'detail' =>  $this->M_data->coba(),
			'po' => $this->M_data->buat_po(),
			);
	

         $this->parser->parse('m_base', $data);
	}

	public function request(){
		$id = $this->session->userdata('id');


		$data = array(
			'datauser' => $this->M_data->find_user($id),
			'link' => 'marketing/request',
			'detail' =>  $this->M_data->coba(),
			'so' => $this->M_data->buat_so(),
			);
	

         $this->parser->parse('m_base', $data);
	}

	public function cari(){

        $id_barang=$_GET['id_barang'];
        $cari =$this->M_data->cari($id_barang)->result();
        echo json_encode($cari);
	} 
	

	// PO JSON
	public function pojson(){

		$po = $this->M_data->buat_po();
        echo json_encode($po);
	} 


	public function caricoba(){

        $cari =$this->M_data->caricoba()->result();
        echo json_encode($cari);
	} 


	// AKHIR ORDER


	// ___________________________________________

	
	// REPORT


	public function report(){
		$id = $this->session->userdata('id');
        $data['datauser'] = $this->M_data->find_user($id);
        $data['link'] = 'marketing/report';
        
        $this->parser->parse('m_base', $data);
	}


	// AKHIR REPORT



	// ___________________________________________



	public function cari_barang()
	{
      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->M_data->cari_barang($searchTerm);

      echo json_encode($response);
	}


	

	
	
	


	public function get_datainventory_json(){

		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_barang($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['nama_barang'];
            // $nestedData[]	= $row['merk'];
            $nestedData[]	= $row['harga'];
			$nestedData[]	= $row['nama_vendor'];
			$nestedData[]	= $row['stock'];
		$nestedData[]   ="
			
            <button id='Detailinventory' href='".site_url('Marketing/detail_barang/'.$row['id_barang'])."' class='btn btn-info mb-2'><i class='fa fa-eye'></i></button>
        
        ";

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}

	public function get_in(){

		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_barang_in($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['po'];
			$nestedData[]	= $row['nama_barang'];
			$nestedData[]	= $row['qty_in'];
			$nestedData[]	= $row['satuan'];
			$nestedData[]	= $row['status'];
		// 	$nestedData[]   ="
		// 	<div style='text-align : center ;' aria-label='Basic example'>
		// 		<button id='Detailinventory' href='".site_url('Admin/detail_in/'.$row['id_order'])."' class='btn btn-info mb-2'>
		// 			<i class='fa fa-eye '></i>
		// 		</button>
		// 	</div>
        // ";

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}

	public function get_out(){

		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_barang_out($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['so'];
			$nestedData[]	= $row['nama_barang'];
			$nestedData[]	= $row['qty_out'];
			if ($row['status'] == "pending" ) {
				$nestedData[]   ="
					<div data-toggle='tooltip' data-placement='top' title='Status Pending''><i style='color : orange ;' class='fa fa-star-half'>  </i> Pending </div>
					";
			}

			else {
				$nestedData[]   ="
					<div data-toggle='tooltip' data-placement='top' title='Status Approved'><i style='color : green ;' class='fa fa-star'>  </i> Approved </div>
				";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}

	public function get_vendor(){

		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_vendor($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['nama_vendor'];
			$nestedData[]	= $row['nama_pt'];
			$nestedData[]	= $row['alamat'];
			$nestedData[]   ="
				<button id='Detailinventory' href='".site_url('Marketing/detail_vendor/'.$row['id_vendor_barang'])."' class='btn btn-info mb-2'>
					<i class='fa fa-eye '></i>
				</button>
        ";

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}


	public function get_order(){

		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_order($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['nama_barang'];
			$nestedData[]	= $row['qty_in'];
			$nestedData[]	= $row['satuan'];
			$nestedData[]	= $row['harga'];
			$nestedData[]	= $row['total'];
			$nestedData[]	= $row['tanggal_masuk'];
	

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}


	public function get_merek(){

		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_merek($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['nama_merek'];
			$nestedData[]	= $row['nama_vendor'];

			$nestedData[]   ="
			<div style='text-align : center ;' aria-label='Basic example'>
				<button id='Detailinventory' href='".site_url('Marketing/detail_merek/'.$row['id_merek'])."' class='btn btn-info mb-2'>
					<i class='fa fa-eye '></i>
				</button>
				
      		  </div>
        ";

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}

	
		public function reportpurchase(){
			if(isset($_GET['po']) && ! empty($_GET['po'])){
			
					$po = $_GET['po'];
					
					$ket = 'Data report PO NUMBER '.$po;
					$url_cetak = 'marketing/cetak?po='.$po;
					$report = $this->M_purchase->view_by_po($po);
			
			}else{ 
				$ket = 'Semua Data';
				$url_cetak = 'marketing/cetak';
				$report = $this->M_purchase->view_all();
			}

		$this->load->model('M_data');
		$id = $this->session->userdata('id');	
		$data['datauser'] = $this->M_data->find_user($id);
			
			
		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['report'] = $report;
		

		
		$data['link'] = 'marketing/purchase';
			
		$this->parser->parse('m_base', $data);
	}
	
	public function cetak(){
			if(isset($_GET['po']) && ! empty($_GET['po'])){
				
					$po = $_GET['po'];


					$ket = 'Data report PO NUMBER '.$po;
					$report = $this->M_purchase->view_by_po($po);
			
			}else{ 
				$ket = 'Semua Data report';
				$report = $this->M_purchase->view_all();
			}
			
			
			$data = array(
				'ket' => $ket,
				'report' => $report,
				'po' => $po,
				);
		
			
		ob_start();
		$this->load->view('purchase/reportpurchase', $data);
		$html = ob_get_contents();
			ob_end_clean();
			
			require_once('./app-assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		ob_end_clean();

		$pdf->Output('PurchaseOrder.pdf', 'D');
	}

	
}


