<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Nota extends CI_Controller {
 
    public function cetak() {
    	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		
		$this->load->model('m_penjualan');
	}

	$x=$this->m_penjualan->cetak_faktur();
	print_r($x);
	die();
        // me-load library escpos
//         $this->load->library('escpos');
 
//         // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
//         $connector = new Escpos\PrintConnectors\WindowsPrintConnector("print_a");
 
//         // membuat objek $printer agar dapat di lakukan fungsinya
//         $printer = new Escpos\Printer($connector);

//         /* Name of shop */
//        $printer->initialize();
//         $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_WIDTH);
//        $printer -> setPrintLeftMargin(70);
//         $printer->text("ZAMMY MART \n");
//         $printer->selectPrintMode();
//         $printer -> setPrintLeftMargin(50);
//         $printer->text("Soropadan Condongcatur \n");
//         $printer->text("\n");
// 		$printer->feed();
// //item





//          $printer->feed(2);// mencetak 2 baris kosong, agar kertas terangkat ke atas
//         $printer->close();

    }
  }