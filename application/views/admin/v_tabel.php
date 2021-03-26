<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="col-lg-12">
            
            <table class="table table-bordered table-condensed" style="font-size:16px;margin-top:10px; margin-bottom: 45px;">
                <thead>
                    <tr>
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
                    <?php foreach ($this->cart->contents() as $items): 
                        $rowid=$items['rowid'];?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
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
</body>
</html>