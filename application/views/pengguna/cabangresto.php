<style>
#h3 {
  text-align: center;
  display: block;
  color: #315a7b;
  position: relative;
  top: 40px;
  font-family: Roboto, sans-serif, FontAwesome;
}
#p {
  text-align: center;
  display: block;
  color: #315a7b;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
  font-size: xx-small !important;
}
h6 {
    color:grey;
    text-transform: uppercase;
    font-size: medium;
    font-weight: lighter;
    margin-bottom: 5px;
}
h5 {
    font-size: large;
    font-weight:500;
    margin-bottom: 5px;
}

.card{
        min-width: 300px;
        max-width: 300px;
    }
</style>

<head>
    <title>Sate Mas Seno - Cabang Resto</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Cabang Resto</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>

<div class="container text-center padding dish-card animate__animated animate__fadeInLeftBig animate__delay-1s">
    <div class="row">
        <?php if(!empty($stores)) { ?>
        <?php foreach($stores as $store) { ?>
        <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4">
                        <?php $status=$store['status'];
                        if($status=="Buka") { ?>
                        <?php } ?> <?php if($status=="Tutup") { ?>
                    <div class="ribbon ribbon-top-right"><span><?php echo $store['status']; ?></span></div>
                        <?php } ?>
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <?php if($store['foto'] != "" && file_exists('./public/uploads/restaurant/thumb/'.$store['foto'])) { ?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/restaurant/thumb/'.$store['foto']; ?>">
                    <?php } else { ?>
                <a href="javascript:void(0)" title="No photo icons created by iconixar - Flaticon">
                <img class="card-img-top" src="<?php echo base_url().'assets/images/icons/no-photo.png';?>"></a>
                    <?php } ?>
                <div class="card-body">
                    <h4 class="card-title mb-0"><?php echo $store['nama_cr']; ?></h4>
                    <p class="card-text"><?php echo $store['tentang']; ?></p>
                <div class="card-body">
                    <h6 class="card-text"><b></i> Kategori</b></h5>
                    <h5 class="card-text"><?php echo $store['nama_k']; ?></h5>
                <br>
                    <h6 class="card-text"><b> Alamat</b></h6>
                    <h5 class="card-text"><?php echo $store['alamat']; ?></h5>
                <br>
                </div>
                </div>

                    <?php $status=$store['status'];
                    if($status=="Buka") { ?>
                <a href="<?php echo base_url().'dish/list/'.$store['id_cr']; ?>" class="custom-btn btn-card text-center">Daftar Paket Menu</a>
                    <?php } ?> <?php if($status=="Tutup") { ?>
                <a href="javascript:()" onclick="warning()" class="custom-btn btn-card2 text-center">Daftar Paket Menu</a>
                    <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>

<div class="container body2 text-center animate__animated animate__fadeInLeftBig">
<h3 id="h3">Cabang restonya gak ada...</h3>
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

        <?php } ?>
    </div>
</div>
<script>
    function deleteOrder(id) {
        if (confirm("Yakin ingin membatalkan pesanan?")) {
        window.location.href = '<?php echo base_url().'orders/deleteOrder/';?>' + id;
        }
    }

    new CircleType(document.getElementById('h3'))
.radius(300);

    new CircleType(document.getElementById('p'))
.dir(-1)
.radius(700);

function warning() {
    alert("Maaf cabang resto sedang tutup")
}
</script>