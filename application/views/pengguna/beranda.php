<style>
.navbar {
  padding: 0.1rem !important;
  background: #2ec06f;
  display: block;
}
b {
  display: inline-block;
  position: relative;
  font-weight:bold;
 }

 b::after {
  box-sizing: border-box;
  content: "";
  position: absolute;
  width: 100%;
  height: 110%;
  background-color: #2ec06f;
  top: 0;
  right: 0;
  border-left: 3px solid white;
  animation: cursor 0.5s linear infinite, typing 1s steps(10) forwards 1;
  animation-delay: 2s;
 }

 @keyframes cursor {
  0% {
   border-color: white;
  }
  50% {
   border-color: white;
  }
  65% {
   border-color: transparent;
  }
  75% {
   border-color: transparent;
  }
  90% {
   border-color: white;
  }
  100% {
   border-color: white;
  }

 }

 @keyframes typing {
  to {
   width: 0;
  }
 }

</style>

<head>
    <title>Sate Mas Seno - Beranda</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<section class="banner animate__animated animate__fadeInDownBig">
  <div class="content">
    <div class="general-info">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    </div>
    <div class="principal animate__animated animate__fadeInLeftBig animate__delay-1s">
        <?php $user = $this->session->userdata('user'); 
        if(empty($user)) { ?>
            <h1 class="display-4">Selamat Datang</h1>
            <h1 class="display-4">Di Sate Mas Seno</h1>
        <?php } else {?>
            <h1 class="display-4">Selamat Datang, <b><?php echo ucfirst($user['nama_p']); ?>&nbsp;</b></h1>
            <h1 class="display-4">Di Sate Mas Seno</h1>
        <?php } ?>
            <p class="display-4">Pemesanan sate khusus untuk acara catering dan aqiqah dalam bentuk frozen food #1 di Indonesia</p>
        <div>
            <a href="<?php echo base_url().'restaurant/index'?>" class="btn login-button liquidlogin">Pesan Sekarang</a>
            <a href="#cara" class="btn register-button liquidregister">Cara Pemesanan</a>
        </div>
    </div>
    <picture class="principal animate__animated animate__fadeInRightBig animate__delay-1s">
        <svg id="circle" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><path fill="#ffff" d="M39.3,-69.4C52.3,-60.5,65,-52.7,73.6,-41.4C82.1,-30,86.3,-15,85.8,-0.3C85.3,14.4,80,28.8,72,41C63.9,53.2,53.2,63.3,40.7,70.9C28.3,78.5,14.1,83.7,-0.3,84.2C-14.7,84.6,-29.3,80.4,-41.8,72.8C-54.3,65.2,-64.6,54.3,-71.3,41.6C-78,28.9,-80.9,14.4,-82.8,-1.1C-84.6,-16.6,-85.3,-33.1,-78.6,-45.7C-71.8,-58.2,-57.7,-66.8,-43.3,-74.8C-29,-82.9,-14.5,-90.5,-0.7,-89.3C13.2,-88.1,26.3,-78.2,39.3,-69.4Z" transform="translate(100 100)" /></svg>
        <a href="javascript:void(0)" title="Satay icons created by Freepik - Flaticon">
        <img id="icon" src="<?php echo base_url().'assets/images/icons/satay.png';?>"></a>
    </picture>
  </div>
</section>

<div id="cara"></div>
<div class="container text-center" data-aos="fade-up">
    <h2><span class="underline">Cara Pemesanan</span></h2>
    <div class="row text-center padding mt-5">
        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
            <a href="javascript:void(0)" title="Restaurant icons created by Freepik - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/cafe.png';?>" height="100"></a>
            <h4 class="mt-3">Pilih Cabang Resto</h4>
            <p>Pilihlah cabang resto kami (kami juga memiliki cabang jajanan untuk pemesanan acara)</p>
        </div>
        <div class="col-md-4" data-aos="fade-right" data-aos-delay="200">
            <a href="javascript:void(0)" title="Spoon icons created by Freepik - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/fork.png';?>" height="100"></a>
            <h4 class="mt-3">Pilih Paket Menu</h4>
            <p>Pilihlah paket menu yang akan dipesan sesuai dengan acara anda</p>
        </div>
        <div class="col-md-4" data-aos="fade-right" data-aos-delay="300">
            <a href="javascript:void(0)" title="Grocery store icons created by Freepik - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/checkout.png';?>" height="100"></a>
            <h4 class="mt-3">Lakukan Checkout</h4>
            <p>Masukkan alamat, nomor yang dapat dihubungi, beserta tanggal acara</p>
        </div>
        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
            <a href="javascript:void(0)" title="Online payment icons created by Freepik - Flaticons">
            <img src="<?php echo base_url().'assets/images/icons/cashless-payment.png';?>" height="100"></a>
            <h4 class="mt-3">Lakukan Pembayaran</h4>
            <p>Transfer uang sesuai pembayaran lalu kirimkan bukti transfer ke kami</p>
        </div>
        <div class="col-md-4" data-aos="fade-right" data-aos-delay="200">
            <a href="javascript:void(0)" title="Chef icons created by Freepik - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/cooking.png';?>" height="100"></a>
            <h4 class="mt-3">Pesanan Diproses</h4>
            <p>Kami akan memproses pesanan dan akan mengirimnya sebelum acara anda mulai</p>
        </div>
        <div class="col-md-4" data-aos="fade-right" data-aos-delay="300">
            <a href="javascript:void(0)" title="Tick icons created by Freepik - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/check.png';?>" height="100"></a>
            <h4 class="mt-3">Pesanan Selesai</h4>
            <p>Selamat menikmati hidangan kami dan semoga acara anda berjalan lancar</p>
        </div>
    </div>
</div>

<div id="faq"></div>
<div class="container text-center" data-aos="fade-up">
    <h2><span class="underline">Tanya Jawab</span></h2>
    <div data-aos="fade-right" data-aos-delay="100">
        <div class="accordion-item mt-5">
            <div class="item-header">
                <h4 class="item-question">
                    Berapa lama proses pengerjaan pesanan?
                </h4>
                <div class="item-icon">
                    <i class='fa fa-angle-down'></i>
                </div>
            </div>
            <div class="item-content">
                <p class="item-answer">
                    <ol class="text-left">
                        <li>Untuk porsi banyak seperti aqiqah atau catering membutuhkan waktu 1-2 hari.</li>
                        <li>Setelah pesanan siap kami akan langsung kirimkan.</li>
                    </ol>
                </p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="item-header">
                <h4 class="item-question">
                    Bagaimana cara pembayaran pesanan?
                </h4>
                <div class="item-icon">
                    <i class='fa fa-angle-down'></i>
                </div>
            </div>
            <div class="item-content">
                <p class="item-answer">
                    <ol class="text-left">
                        <li>Pembayaran kami menggunakan transfer Bank dan QRIS. Selengkapnya untuk <a href="https://qris.id/"> QRIS</a>.</li>
                        <li>Setelah melakukan transfer, unggah foto bukti transfer pada halaman pembayaran.</li>
                    </ol>
                </p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="item-header">
                <h4 class="item-question">
                    Bagaimana ketentuan pengiriman?
                </h4>
                <div class="item-icon">
                    <i class='fa fa-angle-down'></i>
                </div>
            </div>
            <div class="item-content">
                <p class="item-answer">
                    <ol class="text-left">
                        <li>Untuk jangkauan pengiriman kami hanya sesuai jangkauan pengiriman Paxel lihat<a href="https://paxel.co/id/berita-dan-promo/area-jangkauan-paxel"> disini</a>, di luar itu tidak bisa.</li>
                        <li>Pengiriman kami menggunakan jasa Paxel. Selengkapnya untuk <a href="https://paxel.co/"> Paxel</a>.</li>
                        <li>Menu yang bertanda "Gratis Ongkir" pelanggan tidak perlu membayar ongkir.</li>
                        <li>Untuk waktu pengiriman kurang lebih 1 hari.</li>
                    </ol>
                </p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="item-header">
                <h4 class="item-question">
                    Cara untuk pemesanan catering?
                </h4>
                <div class="item-icon">
                    <i class='fa fa-angle-down'></i>
                </div>
            </div>
            <div class="item-content">
                <p class="item-answer">
                    <ol class="text-left">
                        <li>Untuk catering dan pesta kita hanya mengirim dalam bentuk Frozen Food tanpa kotak dan nasi.</li>
                        <li>Pemesanan dilakukan minimal 5 hari sebelum Hari-H.</li>
                        <li>Untuk custom paket harap hubungi kami agar dibuatkan paket custom.</li>
                    </ol>
                </p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="item-header">
                <h4 class="item-question">
                    Cara untuk pemesanan aqiqah?
                </h4>
                <div class="item-icon">
                    <i class='fa fa-angle-down'></i>
                </div>
            </div>
            <div class="item-content">
                <p class="item-answer">
                    <ol class="text-left">
                        <li>Untuk Aqiqah kita hanya mengirim dalam bentuk Frozen Food tanpa kotak dan nasi.</li>
                        <li>Pemesanan dilakukan 5 hari sebelum Hari-H.</li>
                        <li>Kami akan mengontak anda untuk data diri anak yang akan Aqiqah via Whatsapp/Telepon.</li>
                    </ol>
                </p>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    const accordionBtns = document.querySelectorAll(".item-header");

accordionBtns.forEach((accordion) => {
  accordion.onclick = function () {
    this.classList.toggle("active");

    let content = this.nextElementSibling;
    console.log(content);

    if (content.style.maxHeight) {
      //this is if the accordion is open
      content.style.maxHeight = null;
    } else {
      //if the accordion is currently closed
      content.style.maxHeight = content.scrollHeight + "px";
      console.log(content.style.maxHeight);
    }
  };
});

</script>

<script>
    $(document).ready(function(){
        var url = window.location.href;
        if(url.search('inapp=true') === true){
            $('header').css('display', 'none');
        }
    });
</script>

<script>
  AOS.init();
</script>