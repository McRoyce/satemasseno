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

<div class="col-md-8 mx-auto animate__animated animate__fadeInLeftBig">
<div class="card mx-auto">
    <h3 class="text-center"><span class="underline">Proses Pesanan</span></h3>
        <div class="col-md-12 row mt-3">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
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
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Nama Pengguna</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['nama_p'] ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Nama Paket Menu</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['nama_pm'] ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Deskripsi</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['deskripsi'] ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Kode Cab Resto</b></p><p><b>:</b></p>
            </div>
                <?php 
                $nama = "CAB";
                $kode = $order['id_cr'];
                $kode = sprintf("%03d", $kode);
                ?>
            <div class="col-md-6">
                <p><?php echo $nama.$kode; ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Tanggal Acara</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <?php $aDate = strtotime($order['acara']); ?>
                <p><?php echo date('d-m-Y',$aDate) ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Harga</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo 'Rp'.number_format($order['harga'],2,",","."); ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Waktu Pemesanan</b></p><p><b>:</b></p>
            </div>
            <?php $cDate = strtotime($order['date']); ?>
            <div class="col-md-6">
                <p><?php echo date('d-m-Y h:i:s',$cDate) ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Alamat</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['alamat']; ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
                <p><b>Nomor Telepon</b></p><p><b>:</b></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $order['telepon']; ?></p>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6 d-flex justify-content-between" style="margin-right:-1rem;margin-bottom:-1rem;">
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
<h6 class="text-center mt-3">Proses Pesanan</h6>
    <form id="myForm" name="myForm" method="post" action="<?php echo base_url().'admin/orders/updateOrder/'.$order['id_t']; ?>">
        <div class="form-group">
            <select class="form-control" name="status" id="status"
                class="<?php echo (form_error('status') != "") ? 'is-invalid' : '';?>">
                <option value="">-Pilih Status Pesanan-</option>
                <option value="in process" <?php echo $order['status'] == "in process" ? "selected" : "";?>>Diproses</option>
                <option value="deliver" <?php echo $order['status'] == "deliver" ? "selected" : "";?>>Dikirim</option>
                <option value="closed" <?php echo $order['status'] == "closed" ? "selected" : "";?>>Selesai</option>
                <option value="rejected" <?php echo $order['status'] == "rejected" ? "selected" : "";?>>Dibatalkan</option>
            </select>
            <label class="input-label">Ubah Status Pesanan</label><i class="bar"></i>
            <span class="statuser"></span>
        </div>
        <div class="form-group">
            <textarea type="text" name="receipt" id="receipt"
                class="form-control <?php echo (form_error('receipt') != "") ? 'is-invalid' : '';?>" autocomplete="off"
                 required><?php echo set_value('receipt', $order['resi']); ?></textarea>
            <label class="input-label-textarea" for="name">Masukkan Resi</label><i class="bar"></i>
            <span class="receipter"></span>
        </div>
        <div class="text-center" style="margin-top:2rem;">
            <button class="btn btn-info" type="submit">Kirim</button>
            <a href="<?php echo base_url().'admin/orders/';?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
</div>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: {
    status: {
        required: true,
    },
    receipt: {
        required: false,
        minlength: 10,
        maxlength: 255,
        },
},
    messages: {
    status: {
        required: "Pilih status pesanan"
        },
    receipt: {
        minlength: "Resi minimal 10 karakter",
        maxlength: "Resi maksimal 255 karakter",
        },
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "status" )
            error.appendTo(".statuser");
        else if (element.attr("name") == "receipt" )
            error.appendTo(".receipter");
        else
            error.insertAfter(element);
    },
    
  });
   
});

$(window).on('beforeunload', function(){
    return "Pemesanan anda belum selesai dan akan hilang, yakin ingin keluar?";
});

// Form Submit
$(document).on("submit", "form", function(event){
// disable unload warning
    $(window).off('beforeunload');
});
</script>
