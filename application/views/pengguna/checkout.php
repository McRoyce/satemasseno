<head>
    <title>Sate Mas Seno - Checkout</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
ol li {
  margin-left: -1.5rem;
}
</style>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Checkout</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg> 
</div>

<div class="container">
    <div class="row animate__animated animate__fadeInLeftBig">
        <div class="col-md-8">
        <div class="card table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="10%"></th>
                            <th>Paket Menu</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if($this->cart->total_items() > 0) { 
                    foreach($cartItems as $item) { ?>
                        <tr>
                            <td>
                            <?php $image = $item['image'];?>
                                <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                                <?php if($item['image'] != "" && file_exists('./public/uploads/dishesh/thumb/'.$item['image'])) { ?>
                            <img class="imgs" width="100" height="100" src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$item['image']; ?>">
                                <?php } else { ?>
                            <a href="javascript:void(0)" title="No photo icons created by iconixar - Flaticon">
                            <img class="imgs" width="100" src="<?php echo base_url().'assets/images/icons/no-photo.png';?>"></a>
                                <?php } ?>
                            </td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['desc']; ?></td>
                            <td><?php echo 'Rp'.number_format($item['price'],2,",","."); ?></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="3">Ongkos Kirim</td>
                            <td><?php echo 'Rp'.number_format($item['delivery'],2,",","."); ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="4">
                                <p>Keranjang belanja kosong</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>>
                            <td class="text-right" colspan="3"><b>Total</b></td>
                            <?php  if($this->cart->total_items() > 0) { ?>
                            <td class="text-left"><b><?php echo 'Rp'.number_format($this->cart->total()+$item['delivery'],2,",","."); ?></b></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
        <div class="wrapper">
            <h6 style="font-size:small;">Ketentuan Pemesanan</h6>
            <ol style="text-align:justify;font-size:small;">
                <li>Pesanan ini merupakan Pre-Order, lakukan pemesanan minimal 5 hari sebelum Hari-H acara.</li>
                <li>Pesanan ini dalam bentuk kemasan per porsi tanpa nasi dan kotak makanan.</li>
                <li>Harap cantumkan tanggal acara minimal 5 hari sebelum Hari-H acara agar pesanan sampai sebelum Hari-H.</li>
                <li>Setiap 1 pesananan hanya dapat memesan 1 paket menu untuk acara.</li>
                <li>Pengiriman kami menggunakan jasa Paxel agar makanan tetap beku ketika dalam perjalanan.</a></li>
                <li>Jangkauan pengiriman hanya area Pulau Jawa dan Bali selain itu kami pesanan akan kami tolak.</li>
                <li>Harap cantumkan nomor Whatsapp/Telepon yang dapat dihubungi.</li>
                <li>Untuk aqiqah kami akan menghubungi Whatsapp/Telepon anda untuk informasi anak dan video aqiqah.</li>
                <li>Jika pesanan tidak sesuai dengan ketentuan, kami berhak membatalkan pesanan tersebut.</li>

            </ol>
            <div class="text-left">
                <a href="<?php echo base_url().'home'; ?>" class="btn grey-button liquidgrey"><i class="fas fa-angle-left"></i></a>
            </div>
        </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="card">
        <div class="wrapper">
            <form id="myForm" name="myForm" action="<?php echo base_url().'checkout/index';?>" method="POST"
                class="form-container" style="width:100%" onSubmit="return confirm('Pastikan data pesanan sudah benar, yakin ingin pesan?')">
                <div class="form-group">
                    <textarea name="address" type="text"
                        class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>"
                        autocomplete="off" required><?php echo set_value('address', $user['alamat']);?></textarea>
                    <label class="input-label-textarea" for="address">Alamat</label><i class="bar"></i>
                    <span class="addresser"></span>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" id="phone"
                        class="form-control <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>"
                        value="<?php echo set_value('phone', $user['telepon'])?>" autocomplete="off"
                        required>
                    <label class="input-label" for="phone">Nomor Telepon</label><i class="bar"></i>
                    <?php echo form_error('phone'); ?>
                    <span class="phoner"></span>
                    </div>
                <div class="form-group">
	                <select class="form-control" name="payment" id="payment">
                        <option value=''>-Pilih pembayaran-</option>
		                <option value='qris'>Transfer QRIS</option>
                        <option value='bank'>Transfer Bank</option>
	                </select>
                    <label class="input-label">Pembayaran</label><i class="bar"></i>
                    <span class="paymenter"></span>
                </div>
                <div class="form-group">
                    <input type="date" name="dating" id="dating"
                    min="<?=date('Y-m-d',strtotime('now +5 day'));?>" autocomplete="off"
                        required>
                    <label class="input-label">Tanggal Acara</label><i class="bar"></i>
                    <span class="datinger"></span>
                </div>
                <div class="form-group">
                    <textarea name="note" id="note" type="text" value="<?php echo set_value('note');?>"
                        class="form-control" autocomplete="off" required="true"></textarea>
                    <label class="input-label-textarea" for="note">Catatan</label><i class="bar"></i>
                    <span class="noter"></span>
                </div>
                <div class="text-center" style="margin-top:2rem;">
                    <button type="submit" name="placeOrder" class="btn green-button liquidgreen">Pesan Sekarang</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: {
    address: {
        required: true,
        minlength: 10,
        maxlength: 255,
        },
    phone: {
        required: true,
        phone: true,
        },
    payment: {
        required: true,
    },
    dating: {
        required: true,
        },
    note: {
        required: false,
        minlength: 5,
        maxlength: 255,
        },
},
    messages: {
    address: {
        required: "Masukkan alamat",
        minlength: "Alamat minimal 10 karakter",
        maxlength: "Alamat maksimal 255 karakter",
        },
    phone: {
        required: "Masukkan nomor telepon",
        },
    payment: {
        required: "Pilih pembayaran",
    },
    dating: {
        required: "Pilih tanggal acara",
        },
    note: {
        minlength: "Catatan minimal 5 karakter",
        maxlength: "Catatan maksimal 255 karakter",
        },
},
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "image" )
            error.appendTo(".imager");
        else if (element.attr("name") == "address" )
            error.appendTo(".addresser");
        else if (element.attr("name") == "phone" )
            error.appendTo(".phoner");
        else if (element.attr("name") == "payment" )
            error.appendTo(".paymenter");
        else if (element.attr("name") == "dating" )
            error.appendTo(".datinger");
        else if (element.attr("name") == "note" )
            error.appendTo(".noter");
        else
            error.insertAfter(element);
    },
    
  });

  jQuery.validator.addMethod("phone", function (phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/);
    }, "Masukkan nomor telepon yang valid");
   
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