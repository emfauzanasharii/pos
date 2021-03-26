
<?php
class Penjualan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->library('cart');
        $this->load->model('m_kategori');
        $this->load->model('m_barang');
        $this->load->model('m_suplier');
        $this->load->model('m_penjualan');
    }
    function index(){
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $data['data']=$this->m_barang->tampil_barang();
        $this->load->view('admin/v_penjualan',$data);
    }else{
        echo "Halaman tidak ditemukan";
    }
    }
    function get_barang(){
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $kobar=$this->input->post('kode_brg');
        // var_dump($kobar);
        // die();
        if (!empty($kobar)) {
            $x=$this->m_barang->get_barang($kobar)->result();
           
            $i['data']=json_encode($x);
            // print_r($i);
            // die();
        $this->load->view('admin/v_detail_barang_jual',$i);
        }
        

    }else{
        echo "Halaman tidak ditemukan";
    }
    }

    function add_to_cart_kode(){
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $kobar=$this->input->post('kode');
        // $pecah_kode=explode(" ", $kobar);
        // $kode=$pecah_kode[1];
        // $qty=$pecah_kode[0];
        $qty=1;
//         print_r($kode);
// die();
        $produk=$this->m_barang->get_barang_kode($kobar);
       
// var_dump($produk);
// die();
        $i=$produk->row_array();
        $data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'harpok'   => $i['barang_harpok'],
               'price'    => $i['barang_harjul'],
               'disc'     => 0,
               'qty'      => $qty,
               'amount'   => $i['barang_harjul']
            );
 // var_dump($data);
 // die();
        $masuk=$this->cart->insert($data);

        redirect('admin/penjualan');
    }else{
        echo "Halaman tidak ditemukan";
    }
    }



    function add_to_cart(){
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $kobar=$this->input->post('kode_brg');
        $produk=$this->m_barang->get_barang($kobar);

        $i=$produk->row_array();
        $data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'harpok'   => $i['barang_harpok'],
               'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => floatval($this->input->post('qty')),
               'amount'   => str_replace(",", "", $this->input->post('harjul'))
            );
 
        $masuk=$this->cart->insert($data);

        redirect('admin/penjualan');
    }else{
        echo "Halaman tidak ditemukan";
    }
    }
    function remove(){
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $row_id=$this->uri->segment(4);
        $this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
        redirect('admin/penjualan');
    }else{
        echo "Halaman tidak ditemukan";
    }
    }
    function tambah_qty($rowid){
        $rowid=$rowid;
        $qty=$this->input->post('tambah_qty');
        // print_r($rowid);
        // die();
        $up=array(
            'rowid'=> $rowid,
            'qty'=>$qty
            );
        $this->cart->update($up);
        redirect('admin/penjualan');
    }

    function simpan_penjualan(){
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $total=$this->input->post('total');
        $jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
        $donasi=$this->input->post('donasi');
        $kembalian=$jml_uang-$total-$donasi;
        if(!empty($total) && !empty($jml_uang)){
            if($jml_uang < $total){
                echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
                redirect('admin/penjualan');
            }else{
                $nofak=$this->m_penjualan->get_nofak();
                $this->session->set_userdata('nofak',$nofak);
                
                $order_proses=$this->m_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
                if ($donasi !=NULL) {
                  if ($order_proses) {
                    $no_nota=$nofak;
                //     print_r($nofak);
                // die();
                    $donasi_proses=$this->m_penjualan->simpan_donasi($no_nota,$donasi);
                }
                if($donasi_proses){
                    $this->cart->destroy();
                    $x['kembalian']=$kembalian;
                    // print_r($x);
                    // die();
                    $this->session->unset_userdata('tglfak');
                    $this->session->unset_userdata('suplier');
                    $this->load->view('admin/alert/alert_sukses',$x);   
                }else{
                    redirect('admin/penjualan');
                }
                }else{
                    if($order_proses){
                    $this->cart->destroy();
                    $x['kembalian']=$kembalian;
                    // print_r($x);
                    // die();
                    $this->session->unset_userdata('tglfak');
                    $this->session->unset_userdata('suplier');
                    $this->load->view('admin/alert/alert_sukses',$x);   
                }else{
                    redirect('admin/penjualan');
                }
                }
               
            }
            
        }else{
            echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
            redirect('admin/penjualan');
        }

    }else{
        echo "Halaman tidak ditemukan";
    }
    }

    function cetak_faktur(){
        $x=$this->m_penjualan->cetak_faktur();
        $item=$x->num_rows();
        // print_r($x);
  //               die();

 $this->load->library('escpos');
 
        // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector("print_a");
 
        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);

            function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4)
            {
                // Mengatur lebar setiap kolom (dalam satuan karakter)
                $lebar_kolom_1 = 6;
                $lebar_kolom_2 = 4;
                $lebar_kolom_3 = 6;
                $lebar_kolom_4 = 8;

                // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
                $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
                $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
                $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
                $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);

                // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
                $kolom1Array = explode("\n", $kolom1);
                $kolom2Array = explode("\n", $kolom2);
                $kolom3Array = explode("\n", $kolom3);
                $kolom4Array = explode("\n", $kolom4);

                // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
                $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));

                // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
                $hasilBaris = array();

                // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
                for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                    // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                    $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                    $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

                    // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                    $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
                    $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);

                    // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                    $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
                }

                // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
                return implode("\n", $hasilBaris) .  "\n";
            }
            function buatBarisKolom($kolom1, $kolom2, $kolom3, $kolom4)
            {
                // Mengatur lebar setiap kolom (dalam satuan karakter)
                $lebar_kolom_1 = 4;
                $lebar_kolom_2 = 3;
                $lebar_kolom_3 = 9;
                $lebar_kolom_4 = 12;

                // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
                $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
                $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
                $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
                $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);

                // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
                $kolom1Array = explode("\n", $kolom1);
                $kolom2Array = explode("\n", $kolom2);
                $kolom3Array = explode("\n", $kolom3);
                $kolom4Array = explode("\n", $kolom4);

                // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
                $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));

                // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
                $hasilBaris = array();

                // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
                for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                    // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                    $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                    $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

                    // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                    $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
                    $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);

                    // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                    $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
                }

                // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
                return implode("\n", $hasilBaris) .  "\n";
            }
           
try {
    

             // Membuat judul
            $printer->initialize();
            $printer->pulse();
            $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_WIDTH);
            $printer -> setPrintLeftMargin(70);
            $printer->text("ZAMMY MART \n");
            $printer -> setPrintLeftMargin(0);
            $printer -> setPrintLeftMargin(45);
            $printer->selectPrintMode(Escpos\Printer::MODE_FONT_B);
            $printer->text("Soropadan Condongcatur");
            $printer->text("\n");
            $printer->text("\n");
            $printer->text("\n");
 $b=$x->row_array();
            // Data transaksi
            $printer-> setPrintLeftMargin(0);
            $printer->text("No. Nota   : ".$b['jual_nofak'] );
            $printer->text("\n");
            date_default_timezone_set('Asia/Jakarta');
            $printer->text("Waktu      : " . date('d-m-Y H:i:s'));
            $printer->text("\n"); 
            $printer->text("Total Item : ".$item );
            $printer->text("\n");

            // Membuat tabel
            // $nama = $this->input->post('nama[]');
            // $harga = $this->input->post('harga[]');
            // $qyt = $this->input->post('qyt[]');
            // $total = $this->input->post('total[]');
            // $keterangan = $this->input->post('keterangan');

            $printer->text("-------------------------------\n");
            // $printer->text(buatBaris4Kolom("Barang", "qty", "Harga", "Subtotal"));
            $printer->text("-------------------------------\n");

foreach ($x->result_array() as $i) {
        $kobar=$i['d_jual_barang_id'];
        $nabar=$i['d_jual_barang_nama'];
        $satuan=$i['d_jual_barang_satuan'];
        
        $harjul=$i['d_jual_barang_harjul'];
        $qty=$i['d_jual_qty'];
        $diskon=$i['d_jual_diskon'];
        $total=$i['d_jual_total'];
        $donasi=$i['donasi'];
                $printer->text($nabar);
                $printer->text("\n");
                $printer->text(buatBaris4Kolom($qty." ".$satuan,"x",number_format($harjul),number_format( $total)));
               
            }
            $b=$x->row_array();
            $total_harga=number_format($b['jual_total']);
            $tunai=number_format($b['jual_jml_uang']);
            $kembali=number_format($b['jual_kembalian']);
            $printer->text("-------------------------------\n");
            $printer->text(buatBarisKolom(" "," ","Total", "Rp.".$total_harga));
            $printer->text("\n");
            $printer->text(buatBarisKolom(" "," ","Cash", "Rp.".$tunai));
            $printer->text("\n");
            $printer->text(buatBarisKolom(" "," ","Donasi","Rp.".$donasi));
            $printer->text("\n");
            if ($donasi !=Null) {
               $printer->text(buatBarisKolom(" "," ","Kembali","Rp.".$kembali));
            $printer->text("\n");
            }else{
                $printer->text(buatBarisKolom(" "," ","Kembali","Rp.".$kembali));
            $printer->text("\n");
            }
            
           

            // Pesan penutup
            $printer->initialize();
            $printer->setJustification(Escpos\Printer::JUSTIFY_LEFT);

            // $printer->text("Keterangan : " . $keterangan . "\n");
            $printer->text("Terima kasih telah berbelanja\n");
            $prit_status=true;
            $printer->feed(4);// mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)

            } catch (Exception $e) {
    
} finally{
     echo "<!DOCTYPE html>
          <html>
          <head>
              <meta http-equiv='refresh' content='0;url=http://localhost/zammy_pos/admin/penjualan'>
          </head>
          <body>
          
          </body>
          </html>";
    $printer->close();
}
            
         

        /* Name of shop */
//        $printer->initialize();
//         $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_WIDTH);
//        $printer -> setPrintLeftMargin(70);
//         $printer->text("ZAMMY MART \n");
//         $printer->selectPrintMode();
//         $printer -> setPrintLeftMargin(50);
//         $printer->text("Soropadan Condongcatur \n");
//         $printer->text("\n");
// //item
// $printer -> setPrintLeftMargin(0);
// foreach ($x->result_array() as $i) {
//         $kobar=$i['d_jual_barang_id'];
//         $nabar=$i['d_jual_barang_nama'];
//         $satuan=$i['d_jual_barang_satuan'];
        
//         $harjul=$i['d_jual_barang_harjul'];
//         $qty=$i['d_jual_qty'];
//         $diskon=$i['d_jual_diskon'];
//         $total=$i['d_jual_total'];

//         $printer->text($nabar);
//          $printer->text("\n");
        
//          $printer->text($qty."  (".$satuan.")   ");
//          $printer -> setPrintLeftMargin(0);
         
//          $printer->text(number_format($harjul)."     ");
       
//           $printer->text(number_format($total));
//           $printer->text("\n");
//           $printer->feed();

//     }

// $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_WIDTH);
//        $printer -> setPrintLeftMargin(50);
//         $printer->text("Terimakasih \n");
//         $printer -> setPrintLeftMargin(0);
//         $printer->text("Telah Berbelanja");


//          $printer->feed(4);// mencetak 2 baris kosong, agar kertas terangkat ke atas
//         $printer->close();

// redirect('admin/penjualan');

        // $this->load->view('admin/laporan/v_faktur',$x);
        
    
    }


}