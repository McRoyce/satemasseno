<head>
    <title>Sate Mas Seno - Daftar Pesanan</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
#h3 {
  text-align: center;
  display: block;
  color: #7ba7ca;
  position: relative;
  top: 40px;
  font-family: Roboto, sans-serif, FontAwesome;
}
#p {
  text-align: center;
  display: block;
  color: #7ba7ca;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
  font-size: xx-small !important;
}
</style>

<div class="animate__animated animate__fadeInLeftBig">
    <div class="card">
        <?php if($this->session->flashdata('success') != ""):?>
        <div class="alert alert-success">
            <i class="fa fa-check-circle fa-beat"></i> <?php echo $this->session->flashdata('success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <i class="fa fa-times-circle fa-beat"></i> <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <h3><span class="underline">Daftar Pesanan</span></h3>
            </div>
            <div class="form-group">
                <input class="form-control" id="myInput" type="text" autocomplete="off" required>
                <label class="input-label">Cari</label><i class="bar"></i>
            </div>
        </div>
            <div class="align-items-left">
                <a class="mt-2 btn btn-info" href="#" onClick="window.print();" data-title="Print">
                <i class="fa fa-print"></i> Cetak</a>
            </div>
        <div class="table-responsive">
            <table id="my_table" class="table">
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Paket Menu</th>
                        <th>Kode Cab Resto</th>
                        <th>Tanggal Acara</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Waktu Pemesanan</th>
                        <th>Pembayaran</th>
                        <th style="width:0;"></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($orders)) {?>
                    <?php foreach($orders as $order) { ?>
                    <tr>
                        <?php 
                        $nama = "TRS";
                        $kode = $order['id_t'];
                        $kode = sprintf("%03d", $kode);
                        ?>
                        <?php $cDate = strtotime($order['date']); ?>
                        <td><?php echo $nama.$kode.date('dmy',$cDate) ?></td>
                        <td><?php echo $order['nama_p']; ?></td>
                        <td><?php echo $order['nama_pm']; ?></td>

                        <?php 
                        $nama = "CAB";
                        $kode = $order['id_cr'];
                        $kode = sprintf("%03d", $kode);
                        ?>
                        <td><?php echo $nama.$kode; ?></td>
                        
                        <?php $aDate = strtotime($order['acara']); ?>
                        <td><?php echo date('d-m-Y',$aDate) ?></td>
                        <td><?php echo 'Rp'.number_format($order['harga'],2,",","."); ?></td>

                        <?php $status=$order['status'];
						if($status=="" or $status=="NULL") { ?>
                        <td> <button type="button" class="btn btn-secondary btn-block"><i class="fas fa-clock fa-spin" aria-hidden="true"></i> Menunggu</button></td>
                        <?php } if($status=="in process") { ?>
                        <td> <button type="button" class="btn btn-warning btn-block"><span class="fas fa-spinner fa-pulse"aria-hidden="true"></span> Diproses</button></td>
                        <?php } if($status=="deliver") { ?>
                        <td> <button type="button" class="btn btn-info btn-block"><i class="fa fa-truck fa-bounce" aria-hidden="true"></i> Dikirim</button></td>
                        <?php } if($status=="closed") { ?>
                        <td> <button type="button" class="btn btn-success btn-block"><i class="fas fa-check-circle fa-beat" aria-hidden="true"></i> Selesai</button>
                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                        <td> <button type="button" class="btn btn-danger btn-block"><i class="fa fa-times-circle fa-beat" aria-hidden="true""></i> Dibatalkan</button>
                        </td>
                        <?php } ?>
                        
                        <?php $cDate = strtotime($order['date']); ?>
                        <td><?php echo date('d-m-Y h:i:s',$cDate) ?></td>
                        <td>
                            <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                            <?php if($order['transfer'] != "" && file_exists('./public/uploads/payment/thumb/'.$order['transfer'])) { ?>
                                <img class="imgprofile2" height="100" width="100" src="<?php echo base_url().'public/uploads/payment/thumb/'.$order['transfer'];?>">
                            <?php } else { ?>
                                <a href="javascript:void(0)" title="No photo icons created by iconixar - Flaticon">
                                <img class="imgprofile2" width="100" src="<?php echo base_url().'assets/images/icons/no-photo2.png';?>"></a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url().'admin/orders/processOrder/'.$order['id_t'];?>"
                                class="btn btn-info btn-block"><i class="fas fa-arrow-right"></i></a>
                            <a href="javascript:void(0);" onclick="deleteOrder(<?php echo $order['id_t']; ?>)"
                                class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } else {?>
                    <tr>
                        <td colspan="10">

<div class="body2 text-center">
<h3 id="h3">Yah, pesanannya gak ada...</h3>
<div class="container2">
	<input id="flute" type="checkbox" class="poke-flute-control">
	<label for="flute" class="poke-flute">
		<div class="poke-flute-stick">
			<div class="poke-flute-ball"></div>
			<div class="poke-flute-holes"></div>
		</div>
		<div class="poke-flute-music-note"></div>
	</label>
	<div class="snor">
		<div class="snor-head-container">
			<div class="snor-head"></div>
			<div class="snor-ears">
				<div class="snor-ear snor-ear-left"></div>
				<div class="snor-ear snor-ear-right"></div>
			</div>
			<div class="snor-face">
				<div class="snor-eye snor-eye-left"></div>
				<div class="snor-eye snor-eye-right"></div>
				<div class="snor-mouth">
					<div class="snor-mouth-inner"></div>
				</div>
				<div class="snor-blush snor-blush-left"></div>
				<div class="snor-blush snor-blush-right"></div>
			</div>
		</div>
		<div class="snor-bubble"></div>
		<div class="snor-body"></div>
		<div class="snor-arm-container snor-arm-left">
			<div class="snor-arm"></div>
			<div class="snor-arm-claws"></div>
		</div>
		<div class="snor-arm-container snor-arm-right">
			<div class="snor-arm"></div>
			<div class="snor-arm-claws"></div>
		</div>
		<div class="snor-foot-container snor-foot-left">
			<div class="snor-foot"></div>
			<div class="snor-foot-toes"></div>
		</div>
		<div class="snor-foot-container snor-foot-right">
			<div class="snor-foot"></div>
			<div class="snor-foot-toes"></div>
		</div>
	    </div>
    </div>
<p id="p">Copyright &copy; <?php echo date("Y"); ?> by tiffany choong</p>
</div>
</div>

                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function deleteOrder(id) {
    if (confirm("Yakin ingin menghapus pesanan?")) {
        window.location.href = '<?php echo base_url().'admin/orders/deleteOrder/';?>' + id;
    }
}

$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready( function () {
    $('#my_table').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [8,9] }],
        'aaSorting': [[1, 'desc']],
        "order": [],
        searching: false, 
        lengthChange: false,  
        "info": false,
        language: {
    'paginate': {
      'previous': '<i class="fa fa-angle-left"></i>',
      'next': '<i class="fa fa-angle-right"></i>'
    }
  }});
});

    new CircleType(document.getElementById('h3'))
  .radius(300);

    new CircleType(document.getElementById('p'))
  .dir(-1)
  .radius(700);
</script>