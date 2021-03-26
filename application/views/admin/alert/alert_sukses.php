<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mahakarya Promosindo">
    <meta name="author" content="Mahakarya Promosindo">

    <title>Transaksi Penjualan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
<?php $a=$kembalian; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <h4>Kembalian Uang <b>Rp. <?php echo $a; ?></b></h4>
                    
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <strong>Transaksi Berhasil Silahkan Cetak Faktur Penjualan!</strong>
                    <a class="btn btn-danger" href="<?php echo base_url().'admin/penjualan'?>"><span class="fa fa-backward"></span> Kembali</a>
                    <a class="btn btn-info" href="<?php echo base_url().'admin/penjualan/cetak_faktur'?>" ><span class="fa fa-print"></span> Cetak</a>
                </div>
            </div>
        </div>

        <!-- /.row -->
        <!-- Projects Row -->
       
        

        <!--END MODAL-->

        <hr>

        <!-- Footer -->
       <?php 
        $this->load->view("admin/v_footer");
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    
    <script type="text/javascript">
        document.onkeydown = function(teziger){
   switch(teziger.keyCode){
      case 13:   // KeyCode tombol Enter
      window.location='<?php echo base_url().'admin/penjualan/cetak_faktur'?>'
      break;
      // Menambah fungsi shortcut lain
      case 8:    // KeyCode tombol backspace
      window.location='<?php echo base_url().'admin/penjualan'?>';
      break;
   }
   teziger.preventDefault();    // Menghapus fungsi default tombol
}
    </script>
    
</body>

</html>
