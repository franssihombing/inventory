<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_jalan extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('M_surat');
  }
  
  public function index(){
        if(isset($_GET['so']) && ! empty($_GET['so'])){
           
                $so = $_GET['so'];
                
                $ket = 'Data report SO NUMBER '.$so;
                $url_cetak = 'surat_jalan/cetak?so='.$so;
                $report = $this->M_surat->view_by_so($so);
          
        }else{ 
            $ket = 'Semua Data';
            $url_cetak = 'surat_jalan/cetak';
            $report = $this->M_surat->view_all();
        }

    $this->load->model('M_data');
	$id = $this->session->userdata('id');	
	$data['datauser'] = $this->M_data->find_user($id);
		
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['report'] = $report;
    

    
	$data['link'] = 'admin/surat';
		
    $this->parser->parse('base', $data);
  }
  
  public function cetak(){
        if(isset($_GET['so']) && ! empty($_GET['so'])){
            
                $so = $_GET['so'];


                $ket = 'Data report SO NUMBER '.$so;
                $report = $this->M_surat->view_by_so($so);
         
        }else{ 
            $ket = 'Semua Data report';
            $report = $this->M_surat->view_all();
        }
        
        
		$data = array(
            'ket' => $ket,
            'report' => $report,
            'so' => $so,
			);
	
        
    ob_start();
    $this->load->view('suratjalan/suratjalan', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./app-assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    ob_end_clean();

    $pdf->Output('SuratJalan.pdf', 'D');
  }
}
