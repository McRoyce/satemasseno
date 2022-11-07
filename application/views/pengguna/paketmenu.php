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
.card{
        min-width: 300px;
        max-width: 300px;
    }
ol li {
  margin-left: -1rem;
}
</style>

<head>
    <title>Sate Mas Seno - Daftar Paket Menu</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Daftar Paket Menu</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>

<div class="container dish-card animate__animated animate__fadeInLeftBig animate__delay-1s">
    <div class="row">
        <?php if(!empty($dishesh)) { ?>
        <?php foreach($dishesh as $dish) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4">
                    <?php $stock=$dish['stok'];
                    if($stock=="Tersedia") { ?>
                    <?php } ?> 
                    <?php if($stock=="Habis") { ?>
                <div class="ribbon ribbon-top-right"><span><?php echo $dish['stok']; ?></span></div>
                    <?php } ?>

                    <?php $delivery=$dish['ongkir'];
                    if($delivery=="0") { ?>
                <div class="ribbon-top-left"><span>Gratis Ongkir</span></div>
                    <?php } ?> 

                <div class="card-price"><b><?php echo 'Rp'.number_format($dish['harga'],2,",","."); ?></b></div>
                    <?php $image = $dish['foto'];?>
                 <div class="image">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <?php if($dish['foto'] != "" && file_exists('./public/uploads/dishesh/thumb/'.$dish['foto'])) { ?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$dish['foto']; ?>">
                    <?php } else { ?>
                <a href="javascript:void(0)" title="No photo icons created by iconixar - Flaticon">
                <img class="card-img-top" src="<?php echo base_url().'assets/images/icons/no-photo.png';?>"></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center"><?php echo $dish['nama_pm']; ?></h4>                 
                    <p class="text-left"><?php echo $dish['deskripsi']; ?></p>
                </div>
                    <?php $stock=$dish['stok'];
                    if($stock=="Tersedia") { ?>
                <a href="<?php echo base_url().'Dish/addToCart/'.$dish['id_pm']; ?>" class="custom-btn btn-card text-center">
                    Pesan Sekarang</a>
                    <?php } ?> <?php if($stock=="Habis") { ?>
                <a href="javascript:()" onclick="warning()" class="custom-btn btn-card2 text-center">
                    Pesan Sekarang</a>
                    <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>

<div class="body2 text-center animate__animated animate__fadeInLeftBig">
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

        <?php } ?>
</div>
</div>

    <div class="row mt-5 mx-auto">
        <div class="col-md-6" data-aos="fade-right">
            <ol style="text-align:justify;font-size:medium">
                <h6>Ketentuan pemesanan catering dan pesta</h6>
                <li>Untuk catering dan pesta kita hanya mengirim dalam bentuk sate dan bumbu tanpa kotak dan nasi.</li>
                <li>Pemesanan dilakukan 3 hari sebelum Hari-H dan pilih paket catering dan pesta.</li>
                <li>Untuk custom jumlah pesanan pilih menu harga per porsi dan masukkan jumlah porsi lalu tambahkan catatan (catering/pesta).</li>
                <li>Lalu tambahkan pada catatan yaitu: Pesanan untuk catering dan pesta.</li>
            </ol>
         </div>
         <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
             <ol style="text-align:justify;font-size:medium">
                 <h6>Ketentuan pemesanan aqiqah</h6>
                 <li>Untuk Aqiqah kita hanya mengirim dalam bentuk sate dan bumbu tanpa kotak dan nasi.</li>
                 <li>Pemesanan dilakukan 3 hari sebelum Hari-H dan pilih paket aqiqah.</li>
                 <li>Setelah melakukan pembayaran Kami akan menghubungi nomor anda.</li>
                 <li>Kirim data diri anak yang akan aqiqah beserta foto via Whatsapp/Email.</li>
                 <li>Video aqiqah akan kami kirim via Whatsapp/Email.</li>
            </ol>
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
        alert("Maaf paket menu tidak tersedia, silahkan pesan paket menu lainnya")
    }
</script>

<script>
  AOS.init();
</script>