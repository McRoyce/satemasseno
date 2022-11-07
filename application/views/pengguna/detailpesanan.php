<head>
    <title>Sate Mas Seno - Proses Pesanan</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
ol {
  margin-left: -1.5rem;
  margin-top: -1rem;
}
</style>

<head>
    <title>Sate Mas Seno - Detail Pesanan</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Detail Pesanan</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>

<div class="col-md-8 mx-auto animate__animated animate__fadeInLeftBig">
    <div class="detail-card mx-auto">
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>No. Pesanan</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <?php 
                $nama = "TRS";
                $kode = $order['id_t'];
                $kode = sprintf("%03d", $kode);
                ?>
                <?php $cDate = strtotime($order['date']); ?>
                <p><?php echo $nama.$kode.date('dmy',$cDate) ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Nama Paket Menu</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['nama_pm'] ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Deskripsi</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['deskripsi'] ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Tanggal Acara</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <?php $aDate = strtotime($order['acara']); ?>
                <p><?php echo date('d-m-Y',$aDate) ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Harga</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo 'Rp'.number_format($order['harga'],2,",","."); ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Waktu Pemesanan</b></p><p><b>:</b></p>
            </div>
            <?php $cDate = strtotime($order['date']); ?>
            <div class="col-md-6">
                <p><?php echo date('d-m-Y h:i:s',$cDate) ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Alamat</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['alamat']; ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Nomor Telepon</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['telepon']; ?></p>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-3rem;">
                <p><b>Catatan</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                    <?php $catatan=$order['catatan'];
					if($catatan=="" or $catatan=="NULL") { ?>
                <p>-</p>
                    <?php } else { ?>
                <p><?php echo $order['catatan']; ?></p>
                    <?php } ?>
            </div>
        </div>
        <div class="col-md-12 row" style="margin-bottom:-4rem;">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Resi</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
            <?php $resi=$order['resi'];
					if($resi=="" or $resi=="NULL") { ?>
                <p>-</p>
                    <?php } else { ?>
                <p><?php echo $order['resi']; ?></p>
                    <?php } ?>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Bukti Pembayaran</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                <?php if($order['transfer'] != "" && file_exists('./public/uploads/payment/'.$order['transfer'])) { ?>
                    <img height="400" width="300" src="<?php echo base_url().'public/uploads/payment/'.$order['transfer'];?>">
                <?php } else { ?>
                    <a href="javascript:void(0)" title="No photo icons created by iconixar - Flaticon">
                    <img width="100" src="<?php echo base_url().'assets/images/icons/no-photo2.png';?>"></a>
                <?php } ?>
            </div>
        </div>
        <a href="<?php echo base_url().'orders' ?>" class="btn grey-button liquidgrey">
                <i class="fas fa-angle-left"></i></a>
    </div>
</div>

<div class="wrapper">
<div class="text-center mt-3 animate__animated animate__fadeInLeftBig">
    <h2><span class="underline">Cek Resi</span></h2>
</div>
    <div class="col-md-6 card mx-auto text-center mt-4 animate__animated animate__fadeInLeftBig">
        <div class="widgetCekPengiriman wrapper" data-kurir="paxel">
            <form class="frCP" action="https://www.cekpengiriman.com/cek-resi" method="get" target="_blank">
                <div class="mt-1">
                    <img width="150" src="<?php echo base_url().'assets/images/logo-purple.svg';?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="resi" class="iT" minlength="5" required="">
                    <label class="input-label"> Masukkan Nomor Resi</label><i class="bar"></i>
                    <input class="valueKurir" type="hidden" name="kurir" value="paxel">
                    <button class="btn green-button liquidgreen" style="margin-top:1rem;margin-bottom:-1rem;">
                        <span class="sI"> Cari</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>