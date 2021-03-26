<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Printnota extends CI_Controller {
 
        function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        
        $this->load->model('m_laporan');
    }

public function index(){

    $x['data']=$this->m_laporan->print_nota();
    // print_r($x);
    // die();

    $this->load->view('admin/v_printnota', $x);
}

public function lihat($nonota){
    $x['data']=$this->m_laporan->cetak_nota($nonota);
    $this->load->view('admin/laporan/v_faktur',$x);
}

    function cetak($nonota){
        $x=$this->m_laporan->cetak_nota($nonota);
        $item=$x->num_rows();
  //       print_r($item);
        // die();
        // print_r($x);
        // die();


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
            // $printer->pulse();
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
            if ($donasi!=Null) {
                $printer->text(buatBarisKolom(" "," ","Donasi","Rp.".$donasi));
            $printer->text("\n");
            }else{
                $printer->text(buatBarisKolom(" "," ","Donasi","Rp."."0"));
            $printer->text("\n");
            }
            $printer->text(buatBarisKolom(" "," ","Kembali","Rp.".$kembali));
            $printer->text("\n");

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
              <meta http-equiv='refresh' content='0;url=http://localhost/zammy_pos/welcome'>
          </head>
          <body>
          
          </body>
          </html>";
    $printer->close();
}

}
}