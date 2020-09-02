<?php
class Stock extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_stock',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
	function update_stock_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->input->post('kobar');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$ambilstock=$this->m_barang->stock($kobar);
		$stocklama=$ambilstock->barang_stok;
		$totalstock=$this->input->post('stok')+$stocklama;
		
		$this->m_barang->update_stock_barang($kobar,$harpok,$harjul,$totalstock);
		redirect('admin/stock');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
}