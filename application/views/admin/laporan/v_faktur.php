<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Faktur Penjualan Barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>

</head>
<body onload="window.print()">
<div id="laporan" style="width: 150px;">
<table align="center" style="width:500px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:200px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    
</tr>
                       
</table>
<?php 
    $b=$data->row_array();
?>
<h1 align="center">Zammy Mart</h1>
<table border="0" style="width:250px;border:none; font-size: 12px;" align="center">
        <tr>
            <th style="text-align:left;">No Struk</th>
            <th style="text-align:left;">: <?php echo $b['jual_nofak'];?></th>
           <!--  <th style="text-align:left;">Total</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_total']).',-';?></th> -->
        </tr>
        <tr>
            <th style="text-align:left;">Tanggal</th>
            <th style="text-align:left;">: <?php echo $b['jual_tanggal'];?></th>
           <!--  <th style="text-align:left;">Tunai</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_jml_uang']).',-';?></th> -->
        </tr>
        <tr>
            <th style="text-align:left;">Keterangan</th>
            <th style="text-align:left;">: <?php echo $b['jual_keterangan'];?></th>
           <!--  <th style="text-align:left;">Kembalian</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_kembalian']).',-';?></th> -->
        </tr>

</table>

<hr style="width:250px;" align="left">
<table border="0" style="width:250px;margin-bottom:20px;border:none;font-size: 12px;">

<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $kobar=$i['d_jual_barang_id'];
        $nabar=$i['d_jual_barang_nama'];
        $satuan=$i['d_jual_barang_satuan'];
        
        $harjul=$i['d_jual_barang_harjul'];
        $qty=$i['d_jual_qty'];
        $diskon=$i['d_jual_diskon'];
        $total=$i['d_jual_total'];
?>
    <tr>
        <!-- <td style="text-align:center;"><?php echo $kobar;?></td> -->
        <td style="text-align:left;"><?php echo $nabar;?></td>
      
        <td style="text-align:right;"><?php echo number_format($harjul);?></td>
        <td style="text-align:center;">(<?php echo  $qty." ".$satuan;?>)</td>

        <td style="text-align:right;"><?php echo number_format($total);?></td>
    </tr>
   
<?php }?>
</tbody>

</table>
<hr style="width:250px;" align="left">
<table border="0" style="width:200px;border:none;font-size: 12px;">
    
        <tr>
            <!-- <th style="text-align:left;">No Faktur</th>
            <th style="text-align:left;">: <?php echo $b['jual_nofak'];?></th> -->
            <th style="text-align:left;">Total</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_total']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Tunai</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_jml_uang']).',-';?></th>
        </tr>
        <tr>
            <!-- <th style="text-align:left;">Keterangan</th>
            <th style="text-align:left;">: <?php echo $b['jual_keterangan'];?></th> -->
            <th style="text-align:left;">Kembalian</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_kembalian']).',-';?></th>
        </tr>

</table>
<table align="center" style="width:300px; border-top:double; :none;margin-top:5px;margin-bottom:20px;">
  <h2 align="center">Terimakasih Telah Berbelanja</h2>

</table>

<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br></th>
        <th><br></th>
    </tr>
  
</table>
</div>
</body>
</html>