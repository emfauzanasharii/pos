<?php 
error_reporting(0);
 ?>

<html >
<head>
    <title>Laporan Laba/rugi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/DataTables/datatables.min.css' ?>">
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/DataTables/css/dataTables.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/DataTables/css/jquery.dataTables.min.css' ?>">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">


<link href=" https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
   
</head>
<body>
<div id="laporan">
<?php 
$row=$jml->row_array();
 ?>

 <h2 align="center">LAPORAN LABA/RUGI BULAN <?php echo $row['bulan']; ?></h2>

<table id="mydata" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
<thead>

    <tr>
        <th style="width:50px;">No</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Harga Pokok</th>
        <th>Harga Jual</th>
        <th>Keuntungan Per Unit</th>
        <th>Item Terjual</th>
        <th>Diskon</th>
        <th>Untung Bersih</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $tgl=$i['jual_tanggal'];  
        $nabar=$i['d_jual_barang_nama'];
        $satuan=$i['d_jual_barang_satuan'];
        $harpok=$i['d_jual_barang_harpok'];
        $harjul=$i['d_jual_barang_harjul'];
        $untung_perunit=$i['keunt'];
        $qty=$i['d_jual_qty'];
        $diskon=$i['d_jual_diskon'];
        $untung_bersih=$i['untung_bersih'];
        $laba+=$untung_bersih;
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:left;"><?php echo $nabar;?></td>
        <td style="text-align:left;"><?php echo $satuan;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($untung_perunit);?></td>
        <td style="text-align:center;"><?php echo $qty;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($diskon);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($untung_bersih);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="9" style="text-align:center;"><b>Total Keuntungan</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($laba);?></b></td>
    </tr>
</tfoot>
</table>

</div>
 <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/DataTables/js/dataTables.bootstrap4.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/DataTables/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>

    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable({
                dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

            });
        } );
    </script>
</body>
</html>