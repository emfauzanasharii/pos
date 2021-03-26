<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		// $this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	 function get_data_barang()
    {
        $list = $this->m_barang->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->barang_id;
            $row[] = $field->barang_nama;
            $row[] = $field->barang_satuan;
            $row[] = $field->barang_harpok;
            $row[] = $field->barang_harjul;
            $row[] = $field->kategori_nama;
            $row[] = $field->barang_stok;
            $row[] ='<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="edit_barang('."'".$field->barang_id."'".')"><i class="fa fa-pencil"></i> Update</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_barang('."'".$field->barang_id."'".')"><i class="fa fa-trash"></i> Delete</a>';

 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_barang->count_all(),
            "recordsFiltered" => $this->m_barang->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function ajax_edit($id)
	{
		$data = $this->m_barang->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_delete($id)
	{
		$this->m_barang->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	function tambah_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');

		// var_dump($nabar);
		// die();
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$stok,$min_stok);
		echo json_encode(array("status" => TRUE));
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_barang(){
	if($this->session->userdata('akses')=='1'){
		$id_brg=$this->input->post('id_brg');

		$data=array(
				'barang_id'=>$this->input->post('kobar'),
				'barang_nama'=>$this->input->post('nabar'),
				'barang_satuan'=>$this->input->post('satuan'),
				'barang_harpok'=>$this->input->post('harpok'),
				'barang_harjul'=>$this->input->post('harjul'),
				'barang_stok'=>$this->input->post('stok'),
				'barang_min_stok'=>$this->input->post('min_stok'),
				'barang_kategori_id'=>$this->input->post('kategori'),
		);

		// $id_brg=$this->input->post('id_brg');
		// $kobar=
		// $nabar=$this->input->post('nabar');
		// $kat=$this->input->post('kategori');
		// $satuan=$this->input->post('satuan');
		// $harpok=str_replace(',', '', $this->input->post('harpok'));
		// $harjul=str_replace(',', '', $this->input->post('harjul'));
		// $stok=$this->input->post('stok');
		// $min_stok=$this->input->post('min_stok');
		// // var_dump($id_brg);
		// // var_dump($kobar);
		// // die();
		$this->m_barang->update_barang(array('barang_id'=>$this->input->post('id_brg')), $data);
		echo json_encode(array("status" => TRUE));
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}