					<?php 
						error_reporting(0);
						// $b=$brg->row_array();
					?>
					
					<table class="table table-striped  table-bordered" style="font-size:16px;" id="mydata">
						<thead>
						<tr>
		                    <th style="text-align:center;width:40px;">No</th>
                            <th style="text-align:center;width: 100px;">Kode Barang</th>
                            <th style="text-align:center;width: 150px;">Nama Barang</th>
                            <th  style="text-align:center;width: 150px;">Satuan</th>
                            <th style="text-align:center;width: 150px;">Harga (Eceran)</th>
                            <th style="text-align:center;width: 150px;">Stok</th>
                            <th style="width:300px;text-align:center;">Aksi</th>
		                </tr>
		                </thead>
		                <tbody>
		                	<?php 
							$no=0;
                            $brg=json_decode($data);
                        foreach ($brg as $a):
                            $no++;
                            $id=$a->barang_id;
                            $nm=$a->barang_nama;
                            $satuan=$a->barang_satuan;
                            $harpok=$a->barang_harpok;
                            $harjul=$a->barang_harjul;
                            $harjul_grosir=$a->barang_harjul_grosir;
                            $stok=$a->barang_stok;
                            $min_stok=$a->barang_min_stok;
							 ?>
						<tr>
							<td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $nm;?></td>
                            <td style="text-align:center;"><?php echo $satuan;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                            <td style="text-align:center;"><?php echo $stok;?></td>
                            <td style="text-align:center;">
                            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
                            <input type="hidden" name="kode_brg" value="<?php echo $id?>">
                            <input type="hidden" name="nabar" value="<?php echo $nm;?>">
                            <input type="hidden" name="satuan" value="<?php echo $satuan;?>">
                            <input type="hidden" name="stok" value="<?php echo $stok;?>">
                            <input type="hidden" name="harjul" value="<?php echo number_format($harjul);?>">
                            <label style="font-size: 12px;">Diskon</label>
                            <input type="number" name="diskon" value="0" style="width: 100px;">
                            <label style="font-size: 12px;">QTY</label>
                            <input type="number" step="0.001" name="qty" id="jumlah" value="1" max="<?php echo $stok; ?>" required style="width: 100px;">
                                <button type="submit" class="btn btn-md btn-info" id="pilih" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                            </form>
                            </td>
		                 
						</tr>
					<?php endforeach; ?>
						</tbody>
						<br>
					</table>
			
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


					