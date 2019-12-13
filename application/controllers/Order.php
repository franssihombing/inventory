<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
			$this->load->model('M_data');
		$id = $this->session->userdata('id');
        $data['datauser'] = $this->M_data->find_user($id);
        $data['link'] = 'admin/order';

         $this->parser->parse('base', $data);
	}

	function add_to_cart(){ 
  $data = array(
        'id'      => 'sku_123ABD',
        'product_name' => $this->input->post('product_name'),
        'brand' => $this->input->post('brand') ,
        'litime' => $this->input->post('litime'),
        'price'   => $this->input->post('harga'),
        'satuan'   => $this->input->post('satuan'),
        'qty'     => $this->input->post('quantity'),
        'price'   => $this->input->post('harga'),
        'name'    => $this->input->post('product_name')
);
$this->cart->insert($data);
    echo $this->show_cart(); 
}

function delete_cart(){ 
    $data = array(
        'rowid' => $this->input->post('row_id'), 
        'qty' => 0, 
    );
    $this->cart->update($data);
    echo $this->show_cart();
}

	function show_cart(){ 
    $output = '';
    $no = 0;
    foreach ($this->cart->contents() as $items) {
        $no++;
        $output .='

         <tr>
          <td></td>
          <td class="product-name">'.$items['product_name'].'</td>
          <td class="product-category">'.$items['brand'].'</td>
          <td class="product-category">'.$items['litime'].'</td>
          <td class="product-name">'.$items['qty'].'</td>
          <td class="product-price">'.$items['satuan'].'</td>
           <td class="product-price">'.number_format($items['price']).'</td>
             <td class="product-price">'.number_format($this->cart->total()).'</td>
        </tr>

        ';
    }
    return $output;
}

function load_cart(){ 
    echo $this->show_cart();
}
}
