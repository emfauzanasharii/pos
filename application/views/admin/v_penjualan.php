<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

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
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Transaksi
                    <small>Penjualan </small>
                    <!-- <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a> -->
                </h1> 
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-5">
               
            <div class="form-group">
                 <label for="inputUserName" class="col-sm-5 control-label" style="font-size: 20px">Kode Barang</label>
               <div class="col-sm-5">
                    <input type="text" name="kode" id="kode" class="form-control input-md"  required>
                     
                </div>
            </div>
           
           <!--   </form> -->
            </div>
                <div class="col-lg-5">
                   
                <div class="form-group">
                   <div class="col-sm-5" style="margin-left:90%;">

                        <small> F2 Cari Produk </small><input type="text" name="kode_brg" id="kode_brg" class="form-control input-md" placeholder="Masukan Nama/Kode Barang"  required>
                         
                    </div>
                </div>
    
            </div>
            <div class="col-lg-12" style="margin-bottom: 20px;">
                 
                <table>
                   
                    <div id="detail_barang"></div>
                    <div id="tunggu"></div>
                </table>
              
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
            
            <table class="table table-bordered table-condensed" style="font-size:16px;margin-top:10px; margin-bottom: 45px;">
                <thead>
                    <tr>
                        <th style="text-align:center;width: 100px">#</th>
                        <th style="width: 200px;">Kode Barang</th>
                        <th style="width: 300px;">Nama Barang</th>
                        <th style="text-align:center;width: 100px">Satuan</th>
                        <th style="text-align:center;width: 150px">Harga(Rp)</th>
                        <th style="text-align:center;width: 100px">Diskon(Rp)</th>
                        <th style="text-align:center;width: 100px">Qty</th>
                        <th style="text-align:center;width: 150px">Sub Total</th>
                        <th style="text-align:center;width: 200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php 
                        $no=0;
                    foreach ($this->cart->contents() as $items): 
                        $no++;
                        $rowid=$items['rowid'];?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                        <td><?= $no;?></td>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['satuan'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                         <td style="text-align:center;"><?php echo floatval($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                        
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/penjualan/remove/'.$items['rowid'];?>" class="btn btn-danger btn-sm"><span class="fa fa-close"></span> Batal</a>
                        <a  data-toggle="modal" data-target="#Modaltambah<?php echo $rowid; ?>" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span> Ubah Qty</a>
                         </td>
                    </tr>
                    
                    <?php $totalblanja+=$items['sub'];  $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class='alert alert-info TotalBayar'>
                        <h2 align="right">Total Belanja : <span ><?php echo number_format($this->cart->total()); ?></span></h2>
                        <input type="hidden" id='TotalBayarHidden'>
                         <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-lg" style="text-align:right;margin-bottom:10px;" readonly>
                    </div>


            <div class="col-md-12" align="center">
            <form action="<?php echo base_url().'admin/penjualan/simpan_penjualan'?>" method="post">
                <div class="col-md-6">
                     <table style="font-size:20px;" align="left">
                <tr>
                    <th>Donasi(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="donasi" name="donasi" class="donasi form-control input-lg" style="text-align:left;margin-bottom:10px;margin-left: 20px"  onkeypress='return check_int(event)' autocomplete="off"></th>
                    <input type="hidden" id="donasi2" name="donasi2" class="form-control input-lg" style="text-align:left;margin-bottom:10px;">
                </tr>
               
                <tr >
                    <td ><p style="margin-top: 30px;"><b>CTRL</b> = Simpan Transaksi,  <b>Shift</b> = Donasi </p> </td>

                </tr>
                <tr >
                    <td ><p style="margin-top: 5px;"> <b>Alt</b> = Tunai, <b>F2</b> = Cari</p> </td>
                    
                </tr>
               
            </table>
                </div>
                
                <div class="col-md-6">
            <table style="font-size:20px;" align="right">
                <tr class="hidden">
                    
                    <th style="width:240px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:240px;"><input type="text" name="total2"value="<?php echo number_format($this->cart->total());?>" class="form-control input-lg" style="text-align:right;margin-bottom:10px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-lg" style="text-align:right;margin-bottom:10px;margin-left: 20px;" readonly>
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-lg" style="text-align:right;margin-bottom:10px;margin-left: 20px"  onkeypress='return check_int(event)' required autocomplete="off"></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-lg" style="text-align:right;margin-bottom:10px;" required>
                </tr>
                <tr>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="kembalian form-control input-lg" style="text-align:right;margin-bottom:10px;margin-left: 20px;" required readonly></th>
                    <th style="text-align:right;"><input type="hidden" id="kembalian2" name="kembalian2" class="kembalian2 form-control input-lg" style="text-align:right;margin-bottom:10px;margin-left: 20px;" required readonly></th>

                    
                </tr>
               
            </table>
            </div>
            <div>
                 <button type="submit" id="simpan" class="btn btn-success btn-lg btn-block" alig>SIMPAN</button>
            </div>
            </form>
            </div>
          
        </div>
    </div>

        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
     

        

        <!-- ============ MODAL Tambah QTY =============== -->
        <?php foreach ($this->cart->contents() as $items): 
                        $rowid=$items['rowid'];
                        $qty=$items['qty'];
                        ?>
 <div class="modal fade" id="Modaltambah<?php echo $rowid; ?>" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah QTY</h3>
            </div>
                <div class="modal-body">
                    <form action="<?php echo base_url().'admin/penjualan/tambah_qty/'.$rowid;?>" method="post">
                        <div style="text-align: center;">
                        <label>QTY</label>
                        <input type="hidden" step="0.001" name="qty_lama" value="<?php echo $qty; ?>" >
                        <input type="number" step="0.001" name="tambah_qty" value="<?php echo $qty; ?>" >
                        </div>
                    
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button  type="submit" class="btn btn-success btn-sm" aria-hidden="true">Ubah</button>
                    
                </div>
                </form>

            </div>
            </div>
        </div>
    <?php endforeach; ?>
        <!--END MODAL-->

        <hr>

        <!-- Footer -->
       <?php 
       $this->load->view('admin/v_footer');
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
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
                 $('#kembalian2').val(hsl-total);
            })
            
        });
    </script>
       <script type="text/javascript">
        $(function(){
            $('#donasi').on("input",function(){
                var donasi=$('#donasi').val();
                var kembalian2=$('#kembalian2').val();
                $('#kembalian').val(kembalian2-donasi);
            })
            
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            
            
            $("#kode_brg").bind("input",function(){
                var kobar = {kode_brg:$(this).val()};
                setTimeout(function(){
                    $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/penjualan/get_barang';?>",
               data: kobar,
               beforeSend: function(){
                $('#detail_barang').hide();
                $('#tunggu').html('<p style="color:green"><blink>TUNGU....</blink></p>')
               },
               success: function(msg){
                    $('#tunggu').html('');
                    $('#detail_barang').show();
                    $('#detail_barang').html(msg);
               }
            });
                },1500);
                   
            }); 

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#pilih").click();
                }
            });
        });
    </script>
<script type="text/javascript">
     function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
        $(document).ready(function(){
            
            $('#kode').focus();
            $("#kode").on("input",function(){
                var kode = {kode:$(this).val()};
                         $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/penjualan/add_to_cart_kode';?>",
               data: kode,
               beforeSend: function(){
                $('#detail_barang').hide();
                $('#tunggu').html('<p style="color:green"><blink>TUNGU....</blink></p>');
               },
               success: function(msg){
                 
                    window.location.reload();
               }
            });
                  
        }); 
           
        });
    </script>


    <script type="text/javascript">

        $(document).on('keyup', '#jml_uang', function(){

});
        function check_int(evt) {
    var charCode = ( evt.which ) ? evt.which : event.keyCode;
    return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}
$(document).on('keydown', 'body', function(e){
    var charCode = ( e.which ) ? e.which : event.keyCode;

   
    if(charCode == 18) //alt
    {
        $('#jml_uang').focus();
        return false;
    } 
    else if(charCode == 45) //insert
    {
        
        $('#jumlah').focus();
        return false;
    }
    else if(charCode == 16) //shift
    {
        $('#donasi').focus();
        return false;
    }
    else if(charCode == 113) //f2
    {
        $('#kode_brg').focus();
        return false;
    }
    else if(charCode == 116) //f5
    {
        window.location.reload();
        return false;
    }
    else if(charCode == 17) //ctrl
    {
        document.querySelector('form').submit();
    }
});

    </script>
    
    
</body>

</html>
