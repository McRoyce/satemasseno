<head>
    <title>Sate Mas Seno - Daftar Paket Menu</title>
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
ol li {
  margin-left: -1.5rem;
}
</style>

<div class="animate__animated animate__fadeInLeftBig">
    <div class="card">
        <?php if($this->session->flashdata('dish_success') != ""):?>
        <div class="alert alert-success">
            <i class="fa fa-check-circle fa-beat"></i> <?php echo $this->session->flashdata('dish_success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <i class="fa fa-times-circle fa-beat"></i> <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3><span class="underline">Daftar Paket Menu</span></h3>
            </div>
            <div class="form-group">
                <input class="form-control" id="myInput" type="text" autocomplete="off" required>
                <label class="input-label">Cari</label><i class="bar"></i>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="mt-2 btn btn-info" href="#" onClick="window.print();" data-title="Print">
                <i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="text-right">
                <a href="<?php echo base_url().'admin/menu/create_menu';?>"
                class="mt-2 btn btn-info"><i class="fas fa-plus"></i> Buat Paket Menu</a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="my_table" class="table">
                <thead>
                    <tr>
                        <th>Kode Paket Menu</th>
                        <th>Foto Paket Menu</th>
                        <th>Nama Paket Menu</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Ongkos Kirim</th>
                        <th style="width:0;"></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($dishesh)) { ?>
                    <?php foreach($dishesh as $dish) {?>
                    <tr>
                        <?php 
                        $nama = "MNU";
                        $kode = $dish['id_cr'];
                        $kode2 = $dish['id_pm'];
                        $kode = sprintf("%03d", $kode);
                        $kode2 = sprintf("%03d", $kode2);
                        ?>
                        <td><?php echo $nama.$kode.$kode2; ?></td>
                        <td>
                            <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                            <?php if($dish['foto'] != "" && file_exists('./public/uploads/dishesh/thumb/'.$dish['foto'])) { ?>
                                <img class="imgprofile2" height="100" width="100" src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$dish['foto'];?>">
                            <?php } else { ?>
                                <a href="javascript:void(0)" title="No photo icons created by iconixar - Flaticon">
                                <img class="imgprofile2" width="100" src="<?php echo base_url().'assets/images/icons/no-photo2.png';?>"></a>
                            <?php } ?>
                        </td>
                        <td><?php echo $dish['nama_pm']; ?></td>
                        <td><?php echo $dish['deskripsi']; ?></td>
                        <td><?php echo 'Rp'.number_format($dish['harga'],2,",","."); ?></td>

                        <?php $stock=$dish['stok'];
                    	if($stock=="Tersedia") { ?>
                        <td><button type="button" class="btn btn-success btn-block"><i class="fas fa-check-circle fa-beat" aria-hidden="true"></i> Tersedia</button></td> 
                        <?php } ?> <?php if($stock=="Habis") { ?>
                        <td><button type="button" class="btn btn-danger btn-block"><i class="fa fa-times-circle fa-beat" aria-hidden="true""></i> Habis</button></td>
                        <?php } ?>

                        <?php $delivery=$dish['ongkir'];
                        if($delivery=="0") { ?>
                        <td><button type="button" class="btn btn-info btn-block"><i class="fa fa-truck fa-bounce" aria-hidden="true""></i> Gratis Ongkir</button></td>
                        <?php } else { ?>
                        <td><?php echo 'Rp'.number_format($dish['ongkir'],2,",","."); ?></td> 
                        <?php }?>
                        
                        <td>
                            <a href="<?php echo base_url().'admin/menu/edit/'.$dish['id_pm']; ?>"
                                class="btn btn-info btn-block"><i
                                    class="fas fa-edit"></i></a>

                            <a href="javascript:void(0);" onclick="deleteMenu(<?php echo $dish['id_pm']; ?>)"
                                class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>
                    <?php } ?>
                    <?php } else { ?>
                    <tr>
                        <td colspan="8">

<div class="body2 text-center">
<h3 id="h3">Yah, paket menunya gak ada...</h3>
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

<script type="text/javascript">
function deleteMenu(id) {
    if (confirm("Yakin ingin menghapus menu?")) {
        window.location.href = '<?php echo base_url().'admin/menu/delete/';?>' + id;
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
        'columnDefs': [{ 'orderable': false, 'targets': [1,7] }],
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