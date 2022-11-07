<head>
    <title>Sate Mas Seno - Daftar Kategori</title>
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
        <?php if($this->session->flashdata('cat_success') != ""):?>
        <div class="alert alert-success">
            <i class="fa fa-check-circle fa-beat"></i> <?php echo $this->session->flashdata('cat_success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <i class="fa fa-times-circle fa-beat"></i> <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>        
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <h3><span class="underline">Daftar Kategori</span></h3>
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
                    <a href="<?php echo base_url().'admin/category/create_category';?>"
                    class="mt-2 btn btn-info"><i class="fas fa-plus"></i> Buat Kategori</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="my_table" class="table">
                    <thead>
                        <tr>
                            <th style="width:15%;">Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th style="width:0;"></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if(!empty($cats)) { ?>
                        <?php foreach($cats as $cat) {?>
                        <tr>
                            <?php 
                            $nama = "KAT";
                            $kode = $cat['id_k'];
                            $kode = sprintf("%03d", $kode);
                                ?>
                            <td><?php echo $nama.$kode; ?></td>
                            <td><?php echo $cat['nama_k']; ?></td>
                            <td>
                                <a href="<?php echo base_url().'admin/category/edit/'.$cat['id_k']?>"
                                    class="btn btn-info btn-block"><i
                                        class="fas fa-edit"></i></a>
                                <a href="javascript:void(0);" onclick="deleteCat(<?php echo $cat['id_k']; ?>)"
                                    class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i></a>

                            </td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="3">

<div class="body2 text-center">
<h3 id="h3">Yah, kategorinya gak ada...</h3>
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
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
function deleteCat(id) {
    if (confirm("Yakin ingin menghapus kategori?")) {
        window.location.href = '<?php echo base_url().'admin/category/delete/';?>' + id;
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
        'columnDefs': [{ 'orderable': false, 'targets': 2 }],
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