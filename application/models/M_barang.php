<?php
class M_barang extends CI_Model{

	var $table = 'tbl_barang'; //nama tabel dari database
    var $column_order = array(null, 'barang_id','barang_nama','barang_harpok','barang_harjul','kategori_nama','barang_stok',null); //field yang ada di table user
    var $column_search = array('barang_id','barang_nama'); //field yang diizin untuk pencarian 
    var $order = array('barang_nama' => 'asc'); // default order 

public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
        $this->db->join('tbl_kategori', 'barang_kategori_id=kategori_id');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->join('tbl_kategori', 'barang_kategori_id=kategori_id');
        $this->db->where('barang_id',$id);
        $query = $this->db->get();

        return $query->row();
    }
    public function delete_by_id($id)
    {
        $this->db->where('barang_id', $id);
        $this->db->delete($this->table);
    }



	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}
    public function update_barang($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

	// function update_barang($id_brg,$kobar,$nabar,$kat,$satuan,$harpok,$harjul,$min_stok){
	// 	$user_id=$this->session->userdata('idadmin');
	// 	$hsl=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$id_brg'");
	// 	return $hsl;
	// }
	function update_stock_barang($kobar,$harpok,$harjul,$totalstock){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_harpok='$harpok',barang_harjul='$harjul',barang_stok='$totalstock',barang_tgl_last_update=NOW(),barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}

	function stock($kobar){
		$hsl=$this->db->query("SELECT barang_stok FROM tbl_barang where barang_id='$kobar'");
		return $hsl->row();
	}


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id ='$kobar' or barang_nama like '%$kobar%'order by barang_id");
		return $hsl;
	}
    function get_barang_kode($kode){
        $hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id ='$kode'");
        return $hsl;
    }

	function detail_barang($id){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id='$id'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

}