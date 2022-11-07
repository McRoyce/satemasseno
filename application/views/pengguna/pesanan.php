<style>
#h3 {
  text-align: center;
  display: block;
  color: #554684;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
}
#p {
  text-align: center;
  display: block;
  color: #554684;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
  font-size: xx-small !important;
}
#h32 {
  text-align: center;
  display: block;
  color: #554684;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
}
#p2 {
  text-align: center;
  display: block;
  color: #554684;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
  font-size: xx-small !important;
}
</style>

<head>
    <title>Sate Mas Seno - Pesanan Saya</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Pesanan Saya</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>

<div class="wrapper mt-4">
    <div class="card animate__animated animate__fadeInLeftBig">
    	<div class="wrapper mt-2">
                <?php if($this->session->flashdata('success_msg') != ""):?>
            <div class="alert alert-success">
				<i class="fa fa-check-circle fa-beat"></i> <?php echo $this->session->flashdata('success_msg');?>
            </div>
                <?php endif ?>
                <?php if($this->session->flashdata('error_msg') != ""):?>
            <div class="alert alert-danger">
				<i class="fa fa-times-circle fa-beat"></i> <?php echo $this->session->flashdata('error_msg');?>
            </div>
            <?php endif ?>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Paket Menu</th>
                        <th>Tanggal Acara</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Waktu Pemesanan</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($orders)) {?>
                    <?php foreach($orders as $order) { ?>
                    <?php $status=$order['status']; 
                            if($status=="" or $status=="NULL" or $status=="in process" or $status=="deliver" or $status=="rejected") { ?>
                    <tr>
                        <?php 
                        $nama = "TRS";
                        $kode = $order['id_t'];
                        $kode = sprintf("%03d", $kode);
                        ?>
                        <?php $cDate = strtotime($order['date']); ?>
                        
                        <td>
                          <a href="<?php echo base_url().'orders/detail/'.$order['id_t']; ?>">
                            <?php echo $nama.$kode.date('dmy',$cDate) ?>
                          </a>
                        </td>
                        <td>
                          <a href="<?php echo base_url().'orders/detail/'.$order['id_t']; ?>">
                            <?php echo $order['nama_pm']; ?>
                          </a>
                        </td>
                        <?php $aDate = strtotime($order['acara']); ?>
                        <td><?php echo date('d-m-Y',$aDate) ?></td>
                        <td><?php echo 'Rp'.number_format($order['harga'],2,",","."); ?></td>
                        <?php if($status=="" or $status=="NULL") { ?>
                        <td> <button type="button" class="btn grey-button liquidgrey"><i class="fas fa-clock fa-spin" aria-hidden="true"></i> Menunggu</button></td>
                        <?php } if($status=="in process") { ?>
                        <td> <button type="button" class="btn yellow-button liquidyellow"><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Diproses</button></td>
                        <?php } if($status=="deliver") { ?>
                        <td> <button type="button" class="btn blue-button liquidblue"><i class="fas fa-truck fa-bounce" aria-hidden="true"></i> Dikirim</button></td>
                        <?php }?>
                        <?php if($status=="rejected") { ?>
                        <td> <button type="button" class="btn red-button liquidred"> <i class="fas fa-times-circle fa-beat" aria-hidden="true"></i> Dibatalkan</button>
                        </td>
                        <?php } ?>
                        <?php $cDate = strtotime($order['date']); ?>
                        <td><?php echo date('d-m-Y h:i:s',$cDate) ?></td>
                        <td>
							<form id="myForm" name="myForm" method="post" action="<?php echo base_url().'orders/updateOrder/'.$order['id_t']; ?>"
              onSubmit="return confirm('Yakin ingin membatalkan pesanan?')">
							<?php if($status=="" or $status=="NULL") { ?>
                <a href="<?php echo base_url().'orders/payment/'.$order['id_t']; ?>" class="btn green-button liquidgreen"><i class="fa fa-credit-card"></i> Bayar</a>
                            	<button type="submit" name="status" value="rejected" class="btn red-button liquidred"><i class="fa fa-ban"></i> Batal</button>
							<?php } if($status=="in process") { ?>
								<a href="javascript:void(0);" onclick="paywarning()" class="btn grey-button liquidgrey"><i class="fa fa-credit-card "></i> Bayar</a>
                            	<a href="javascript:void(0);" onclick="delprocess()" class="btn grey-button liquidgrey"><i class="fa fa-ban"></i> Batal</a>
							<?php } if($status=="deliver") { ?>
								<a href="javascript:void(0);" onclick="paywarning()" class="btn grey-button liquidgrey"><i class="fa fa-credit-card"></i> Bayar</a>
                            	<a href="javascript:void(0);" onclick="deldeliver()" class="btn grey-button liquidgrey"><i class="fa fa-ban"></i> Batal</a>
							<?php } if($status=="rejected") { ?>
                            	<a href="javascript:void(0);" onclick="deleteOrder(<?php echo $order['id_t']; ?>)" class="btn red-button liquidred"><i class="fas fa-trash-alt"></i> Hapus</a>
							<?php } ?>
							</form>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    <?php } else { ?>
                    <tr>
                    <td colspan="7">

<div class="body2 text-center">
<h3 id="h3">Belum ada pesanan nih...</h3>
  <div class="komi" style="bottom:3rem">
    <div class="komi-head">
    <div class="komi-hair-back">
      <div class="komi-hair-back-1"></div>
    </div>
    <div class="komi-ear komi-ear-left"></div>
    <div class="komi-ear komi-ear-right"></div>
    <div class="komi-cat-ear komi-cat-ear-left">
      <div class="komi-cat-ear-fur"></div>
    </div>
    <div class="komi-cat-ear komi-cat-ear-right">
      <div class="komi-cat-ear-fur"></div>
    </div>
      <div class="komi-hair-strand"></div>
      <div class="komi-face"></div>
    <div class="komi-hair-bangs">
      <div class="komi-hair-bangs-1"></div>
      <div class="komi-hair-bangs-2"></div>
      <div class="komi-hair-bangs-3"></div>
    </div>
    <div class="komi-face-inner">
      <div class="komi-eye komi-eye-left">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-eye komi-eye-right">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-blush komi-blush-left"></div>
      <div class="komi-blush komi-blush-right"></div>
    </div>
  </div>
  <div class="komi-panel">
    <div class="komi-hair-extension"></div>
    <div class="komi-body">
      <div class="komi-neck">
        <div class="komi-neck-shadow"></div>
        <div class="komi-collar komi-collar-left"></div>
        <div class="komi-collar komi-collar-right"></div>
        <div class="komi-bow">
          <div class="komi-bow-top">
            <div class="komi-bow-top-shadow"></div>
          </div>
          <div class="komi-bow-bottom"></div>
        </div>
      </div>
      <div class="komi-shirt">
        <div class="komi-shirt-sleeves"></div>
        <div class="komi-shirt-sleeves-shadow"></div>
      </div>
    </div>
  </div>
  <p id="p" style="margin-bottom:-5rem">Copyright &copy; <?php echo date("Y"); ?> by tiffany choong</p>
  <div class="komi-zigzag komi-zigzag-1"></div>
  <div class="komi-zigzag komi-zigzag-2"></div>
  <div class="komi-zigzag komi-zigzag-3"></div>
  <div class="komi-zigzag komi-zigzag-4"></div>
  <div class="komi-zigzag komi-zigzag-5"></div>
  <div class="komi-zigzag komi-zigzag-6"></div>
  <div class="komi-zigzag komi-zigzag-7"></div>
  <div class="komi-zigzag komi-zigzag-8"></div>
  <div class="komi-zigzag komi-zigzag-9"></div>
  <div class="komi-zigzag komi-zigzag-10"></div>
  <div lang="ja" class="komi-buruburu">
    <span class="komi-buruburu-character komi-buruburu-character-1">
      ブ
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-2">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-3">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-4">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-5">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-6">
      ル
    </span>
  </div>
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

<div class="wrapper">
<div class="text-center mt-5 animate__animated animate__fadeInLeftBig">
    <h2><span class="underline">Riwayat Pesanan</span></h2>
</div>
    <div class="card mt-4 animate__animated animate__fadeInLeftBig">
		<div class="wrapper mt-2">
                <?php if($this->session->flashdata('error') != ""):?>
            <div class="alert alert-danger">
				<i class="fa fa-times-circle fa-beat"></i> <?php echo $this->session->flashdata('error');?>
            </div>
            <?php endif ?>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Paket Menu</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Waktu Pesanan</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($orders)) {?>
                    <?php foreach($orders as $order) { ?>
                    <?php $status=$order['status']; 
                        if($status=="closed") { ?>
                    <tr>
                        <?php 
                        $nama = "TRS";
                        $kode = $order['id_t'];
                        $kode = sprintf("%03d", $kode);
                        ?>
                        <?php $cDate = strtotime($order['date']); ?>
                        <td><?php echo $nama.$kode.date('dmy',$cDate) ?></td>
                        <td><?php echo $order['nama_pm']; ?></td>
                        <td><?php echo 'Rp'.number_format($order['harga'],2,",","."); ?></td>
                        <td><a class="btn green-button liquidgreen"><i class="fas fa-check-circle fa-beat" aria-hidden="true"></i> Selesai</a>
                        <?php $cDate = strtotime($order['date']); ?>
                        <td><?php echo date('d-m-Y h:i:s',$cDate) ?></td>
                        <td><a href="<?php echo base_url().'orders/invoice/'.$order['id_t']; ?>" class="btn blue-button liquidblue"><i class="fas fa-file-alt"></i> Invoice</a></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    <?php } else { ?>
                    <tr>
                        <td colspan="6">

<div class="body2 text-center">
<h3 id="h32">Belum ada pesanan nih...</h3>
  <div class="komi" style="bottom:3rem">
    <div class="komi-head">
    <div class="komi-hair-back">
      <div class="komi-hair-back-1"></div>
    </div>
    <div class="komi-ear komi-ear-left"></div>
    <div class="komi-ear komi-ear-right"></div>
    <div class="komi-cat-ear komi-cat-ear-left">
      <div class="komi-cat-ear-fur"></div>
    </div>
    <div class="komi-cat-ear komi-cat-ear-right">
      <div class="komi-cat-ear-fur"></div>
    </div>
      <div class="komi-hair-strand"></div>
      <div class="komi-face"></div>
    <div class="komi-hair-bangs">
      <div class="komi-hair-bangs-1"></div>
      <div class="komi-hair-bangs-2"></div>
      <div class="komi-hair-bangs-3"></div>
    </div>
    <div class="komi-face-inner">
      <div class="komi-eye komi-eye-left">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-eye komi-eye-right">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-blush komi-blush-left"></div>
      <div class="komi-blush komi-blush-right"></div>
    </div>
  </div>
  <div class="komi-panel">
    <div class="komi-hair-extension"></div>
    <div class="komi-body">
      <div class="komi-neck">
        <div class="komi-neck-shadow"></div>
        <div class="komi-collar komi-collar-left"></div>
        <div class="komi-collar komi-collar-right"></div>
        <div class="komi-bow">
          <div class="komi-bow-top">
            <div class="komi-bow-top-shadow"></div>
          </div>
          <div class="komi-bow-bottom"></div>
        </div>
      </div>
      <div class="komi-shirt">
        <div class="komi-shirt-sleeves"></div>
        <div class="komi-shirt-sleeves-shadow"></div>
      </div>
    </div>
  </div>
  <p id="p2" style="margin-bottom:-5rem">Copyright &copy; <?php echo date("Y"); ?> by tiffany choong</p>
  <div class="komi-zigzag komi-zigzag-1"></div>
  <div class="komi-zigzag komi-zigzag-2"></div>
  <div class="komi-zigzag komi-zigzag-3"></div>
  <div class="komi-zigzag komi-zigzag-4"></div>
  <div class="komi-zigzag komi-zigzag-5"></div>
  <div class="komi-zigzag komi-zigzag-6"></div>
  <div class="komi-zigzag komi-zigzag-7"></div>
  <div class="komi-zigzag komi-zigzag-8"></div>
  <div class="komi-zigzag komi-zigzag-9"></div>
  <div class="komi-zigzag komi-zigzag-10"></div>
  <div lang="ja" class="komi-buruburu">
    <span class="komi-buruburu-character komi-buruburu-character-1">
      ブ
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-2">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-3">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-4">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-5">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-6">
      ル
    </span>
  </div>
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

<script>
	function deleteOrder(id) {
        if (confirm("Yakin ingin menghapus pesanan?")) {
        window.location.href = '<?php echo base_url().'orders/deleteOrder/';?>' + id;
        }
    }
    new CircleType(document.getElementById('h3'))
  .radius(300);

    new CircleType(document.getElementById('p'))
  .dir(-1)
  .radius(700);

    new CircleType(document.getElementById('h32'))
  .radius(300);

    new CircleType(document.getElementById('p2'))
  .dir(-1)
  .radius(700);

  	function delprocess() {
    alert("Pesanan sedang diproses, tidak dapat dibatalkan")
}
	function deldeliver() {
    alert("Pesanan sedang dikirim, tidak dapat dibatalkan")
}
	function paywarning() {
    alert("Pesanan telah dibayar")
}
</script>