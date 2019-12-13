<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {
		
public function checkleveluser($username, $password){
 
      if($username && $password) {
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['id_user'] : false);
    }
    else {
        return false;
    }
                                
}
	

public function buat_po()   {
	$this->db->select('RIGHT(tbl_barang_in.po,3) as po', FALSE);
	$this->db->order_by('po','DESC');    
	$this->db->limit(1);    
	$query = $this->db->get('tbl_barang_in');        
	if($query->num_rows() <> 0){      
	 //jika po ternyata sudah ada.      
	 $data = $query->row();      
	 $po = intval($data->po) + 1;    
	}
	else {      
	 //jika po belum ada      
	 $po = 1;    
	}
	$pomax = str_pad($po, 3, "0", STR_PAD_LEFT); 
	$pojadi = "PO-2019-".$pomax;   
	return $pojadi;  
}

public function buat_so()   {
	$this->db->select('RIGHT(tbl_barang_out.so,3) as so', FALSE);
	$this->db->order_by('so','DESC');    
	$this->db->limit(1);    
	$query = $this->db->get('tbl_barang_out');        
	if($query->num_rows() <> 0){      
	 //jika so ternyata sudah ada.      
	 $data = $query->row();      
	 $so = intval($data->so) + 1;    
	}
	else {      
	 //jika so belum ada      
	 $so = 1;    
	}
	$somax = str_pad($so, 3, "0", STR_PAD_LEFT); 
	$sojadi = "SO-2019-".$somax;   
	return $sojadi;  
}


function tampil_data(){ 
	return $this->db->get('tbl_barang');
 }
  
 function cari($id){
	 $query= $this->db->get_where('tbl_barang',array('id_barang'=>$id));
	 return $query;
 }

 function caricoba(){
	$query= $this->db->get_where('tbl_barang');
	return $query;
}




	public function sumb(){
		$sql = "SELECT COUNT(id_barang) AS sumb FROM tbl_barang ";
        $query = $this->db->query($sql);
		return $query->row()->sumb;
	}

	public function sumv(){
		$sql = "SELECT COUNT(id_vendor_barang) AS sumb FROM tbl_vendor_barang ";
        $query = $this->db->query($sql);
		return $query->row()->sumb;
	}

	public function sumi(){
		$sql = "SELECT COUNT(id_order) AS sumb FROM tbl_barang_in ";
        $query = $this->db->query($sql);
		return $query->row()->sumb;
	}

	public function sumo(){
		$sql = "SELECT COUNT(id_barang_out) AS sumb FROM tbl_barang_out ";
        $query = $this->db->query($sql);
		return $query->row()->sumb;
	}



public function find_user($id)
	{
		$sql = "SELECT * FROM `tbl_user` WHERE `id_user` = '$id' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function find_barang($id){
		$sql = "SELECT * FROM `tbl_barang` WHERE `id_barang` = '$id' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function addVendor($data){
		$this->db->insert('tbl_vendor_barang', $data);
	}
	function addProduct($data){
		$this->db->insert('tbl_barang', $data);
	}

	function updateProduct($id,$data){
		$this->db->where('id_barang', $id);

		$this->db->update('tbl_barang', $data);
	}

	function updateMerek($id,$data){
		$this->db->where('id_merek', $id);

		$this->db->update('tbl_merek', $data);
	}

	function updateVendor($id,$data){
		$this->db->where('id_vendor_barang', $id);

		$this->db->update('tbl_vendor_barang', $data);
	}

	// function tambahstock($qty_in){
		
	// 	$id = $this->input->post('id_barang');

	// 	$sql = "UPDATE `tbl_barang` SET `stock` = `stock`+$qty_in  WHERE `id_barang` = '$id'";
	// 	$query = $this->db->query($sql);
	// 	return $query;
	// }

	function addissuing($data){

		$this->db->insert('tbl_barang_out', $data);

	}

	function addOrder($data){

		$this->db->insert('tbl_barang_in', $data);

	}

	function addMerek($data){

		$this->db->insert('tbl_merek', $data);

	}

	// function kurangstock($qty_out){
		
	// 	$id = $this->input->post('id_barang');

	// 	$sql = "UPDATE `tbl_barang` SET `stock` = `stock`-$qty_out  WHERE `id_barang` = '$id'";
	// 	$query = $this->db->query($sql);
	// 	return $query;
	// }
	
function cari_barang($searchTerm=""){

     // Fetch users
     $this->db->select('*');
     $this->db->where("nama_barang like '%".$searchTerm."%' ");
     $fetched_records = $this->db->get('tbl_barang');
     $users = $fetched_records->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array("id_barang"=>$user['id_barang'], "text"=>$user['nama_barang']);
     }
     return $data;
  }


  public function get_detail_out($id = NULL){
	$query = $this->db->join ( 'tbl_barang', 'tbl_barang.id_barang = tbl_barang_out.id_barang' , 'left' );
	$query = $this->db->get_where('tbl_barang_out' , array('id_barang_out' => $id))->row();
	return $query;
}

public function get_detail_merek($id = NULL){
	$query = $this->db->join ( 'tbl_vendor_barang', 'tbl_vendor_barang.id_vendor_barang = tbl_merek.id_vendor_barang' , 'left' );
	$query = $this->db->get_where('tbl_merek' , array('id_merek' => $id))->row();
	return $query;
}

public function get_detail_in($id = NULL){
	$query = $this->db->join ( 'tbl_barang', 'tbl_barang.id_barang = tbl_barang_in.id_barang' , 'left' );
	$query = $this->db->get_where('tbl_barang_in' , array('id_order' => $id))->row();
	return $query;
}

public function get_detail_barang($id = NULL){
	$query = $this->db->join ( 'tbl_vendor_barang', 'tbl_vendor_barang.id_vendor_barang = tbl_barang.id_vendor_barang' , 'left' );
	$query = $this->db->get_where('tbl_barang' , array('id_barang' => $id))->row();
	return $query;
}

public function get_detail_vendor($id){
	$query = $this->db->get_where('tbl_vendor_barang' , array('id_vendor_barang' => $id))->row();
	return $query;
}




public function coba() {
	$this->db->select('*');
	$this->db->from('tbl_barang');
	$query = $this->db->get();
	return $query->result();
}

public function cobv() {
	$this->db->select('*');
	$this->db->from('tbl_vendor_barang');
	$query = $this->db->get();
	return $query->result();
}

function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
}


function confirm_so($id){


		$sql = "UPDATE `tbl_barang_out` SET `status` = 'approved'  WHERE `id_barang_out` = '$id'";
		$query = $this->db->query($sql);
		return $query;



}



function hapus_merek($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
}


function hapus_vendor($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
}




public function fetch_data_barang($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_barang`,
				b.`nama_vendor`,
				a.`nama_barang`,
				a.`gambar`,
				a.`merk`,
				a.`link`,
				a.`stock`,
				a.`harga`,
                a.`harga_transport`,
                a.`ppn_modal`,
				a.`up_persen`
			FROM
				`tbl_barang` AS a
				LEFT JOIN `tbl_vendor_barang` AS b ON a.`id_vendor_barang` = b.`id_vendor_barang`
				, (SELECT @row := 0) r WHERE 1=1
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nama_barang` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0   => 'nomor',
            1   => 'a.`nama_barang`',
            2   => 'a.`merk`',
            3   => 'a.`harga`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}
	




public function fetch_data_barang_in($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
		$sql = "
		SELECT
			(@row:=@row+1) AS nomor,
			a.`id_order`,
			a.`id_barang`,
			a.`status`,
			a.`po`,
			b.`nama_barang`,
			a.`qty_in`,
			a.`satuan`,
			a.`harga`,
			a.`total`
		FROM
			`tbl_barang_in` AS a
			LEFT JOIN `tbl_barang` AS b ON a.`id_barang` = b.`id_barang`
			, (SELECT @row := 0) r WHERE 1=1";


	$data['totalData'] = $this->db->query($sql)->num_rows();

		
	if( ! empty($like_value))
	{
		$sql .= " AND ( ";
		$sql .= "
			b.`nama_barang` LIKE '%".$this->db->escape_like_str($like_value)."%'
		";
		$sql .= " ) ";
	}

	$data['totalFiltered']	= $this->db->query($sql)->num_rows();

	$columns_order_by = array(
		0   => 'nomor',
		1   => 'a.`nama_vendor`',
		2   => 'a.`nama_pt`',
		3   => 'a.`alamat`'
	);

	$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
	$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

	$data['query'] = $this->db->query($sql);
	return $data;
	}
	



	public function fetch_data_barang_out($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
		{
			$sql = "
				SELECT
					(@row:=@row+1) AS nomor,
					a.`id_barang_out`,
					a.`id_barang`,
					a.`so`,
					b.`nama_barang`,
					a.`qty_out`,
					a.`tanggal_keluar`,
					a.`satuan`,
					a.`total`,
					a.`status`,
					a.`harga`
				FROM
					`tbl_barang_out` AS a
					LEFT JOIN `tbl_barang` AS b ON a.`id_barang` = b.`id_barang`
					, (SELECT @row := 0) r WHERE 1=1
			";

			$data['totalData'] = $this->db->query($sql)->num_rows();

			if( ! empty($like_value))
			{
				$sql .= " AND ( ";
				$sql .= "
					b.`nama_barang` LIKE '%".$this->db->escape_like_str($like_value)."%'
				";
				$sql .= " ) ";
			}

			$data['totalFiltered']	= $this->db->query($sql)->num_rows();

			$columns_order_by = array(
				0   => 'nomor',
				1   => 'a.`qty_out`',
				2   => 'a.`tanggal`',
				3   => 'a.`lokasi`'
			);

			$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
			$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

			$data['query'] = $this->db->query($sql);
			return $data;
		}


	

public function fetch_vendor($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
		{
			$sql = "
				SELECT
					(@row:=@row+1) AS nomor,
					a.`id_vendor_barang`,
					a.`nama_vendor`,
					a.`nama_pt`,
					a.`alamat`,
					a.`nomor_telepon`,
					a.`email`
				FROM
					`tbl_vendor_barang` AS a ";

			$data['totalData'] = $this->db->query($sql)->num_rows();

			if( ! empty($like_value))
			{
				$sql .= " AND ( ";
				$sql .= "
					a.`nama_vendor` LIKE '%".$this->db->escape_like_str($like_value)."%'
				";
				$sql .= " ) ";
			}

			$data['totalFiltered']	= $this->db->query($sql)->num_rows();

			$columns_order_by = array(
				0   => 'nomor',
				1   => 'a.`nama_vendor`',
				2   => 'a.`nama_pt`',
				3   => 'a.`alamat`'
			);

			$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
			$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

			$data['query'] = $this->db->query($sql);
			return $data;
		}

		public function fetch_order($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
		{
			$sql = "
				SELECT
					(@row:=@row+1) AS nomor,
					a.`id_order`,
					a.`id_barang`,
					b.`nama_barang`,
					a.`qty_in`,
					a.`satuan`,
					a.`harga`,
					a.`total`,
					a.`tanggal_masuk`
				FROM
					`tbl_barang_in` AS a
					LEFT JOIN `tbl_barang` AS b ON a.`id_barang` = b.`id_barang`
					, (SELECT @row := 0) r WHERE 1=1";


			$data['totalData'] = $this->db->query($sql)->num_rows();

			if( ! empty($like_value))
			{
				$sql .= " AND ( ";
				$sql .= "
					b.`nama_barang` LIKE '%".$this->db->escape_like_str($like_value)."%'
				";
				$sql .= " ) ";
			}


			$data['totalFiltered']	= $this->db->query($sql)->num_rows();

			$columns_order_by = array(
				0   => 'nomor',
				1   => 'b.`nama_barang`',
				2   => 'a.`qty_in`',
				3   => 'a.`harga`'
			);

			$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
			$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

			$data['query'] = $this->db->query($sql);
			return $data;
		}


		public function fetch_data_merek($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
		{
			$sql = "
				SELECT
					(@row:=@row+1) AS nomor,
					a.`id_merek`,
					a.`id_vendor_barang`,
					b.`nama_vendor`,
					a.`nama_merek`,
					a.`deskripsi`
				FROM
					`tbl_merek` AS a 
					LEFT JOIN `tbl_vendor_barang` AS b ON a.`id_vendor_barang` = b.`id_vendor_barang`
					, (SELECT @row := 0) r WHERE 1=1";

			$data['totalData'] = $this->db->query($sql)->num_rows();

			if( ! empty($like_value))
			{
				$sql .= " AND ( ";
				$sql .= "
					b.`nama_barang` LIKE '%".$this->db->escape_like_str($like_value)."%'
				";
				$sql .= " ) ";
			}

			$data['totalFiltered']	= $this->db->query($sql)->num_rows();

			$columns_order_by = array(
				0   => 'nomor',
				1   => 'a.`nama_merek`',
				2   => 'a.`deskripsi`',
				3   => 'a.`id_vendor_barang`'
			);

			$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
			$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

			$data['query'] = $this->db->query($sql);
			return $data;
		}
}
