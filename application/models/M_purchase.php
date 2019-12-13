<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_purchase extends CI_Model {
    
  public function view_by_po($po){
        $this->db->join ( 'tbl_barang', 'tbl_barang.id_barang = tbl_barang_in.id_barang' , 'left' );
        $this->db->where('po', $po); 
        
        return $this->db->get('tbl_barang_in')->result();
  }
    
    
    public function view_all(){  
        $this->db->join ( 'tbl_barang', 'tbl_barang.id_barang = tbl_barang_in.id_barang' , 'left' );
        // $this->db->where('status', 'confirm'); 
        return $this->db->get('tbl_barang_in')->result();
    }
        
    
}