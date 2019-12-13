<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_surat extends CI_Model {
    
  public function view_by_so($so){
        $this->db->join ( 'tbl_barang', 'tbl_barang.id_barang = tbl_barang_out.id_barang' , 'left' );
        $this->db->where('status', 'approved'); 
        $this->db->where('so', $so); 
        
        return $this->db->get('tbl_barang_out')->result();
  }
    
    
    public function view_all(){  
        $this->db->join ( 'tbl_barang', 'tbl_barang.id_barang = tbl_barang_out.id_barang' , 'left' );
        $this->db->where('status', 'approved'); 
        return $this->db->get('tbl_barang_out')->result();
    }
        
    
}