<head>
    <title>Sate Mas Seno - Pembayaran</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
</style>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Pembayaran</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>

<div class="container">
<div class="card col-md-6 mt-3 mx-auto animate__animated animate__fadeInLeftBig">
    <div class="wrapper text-center">

        <?php $payment=$order['pembayaran'];
        if($payment=="bank") { ?>
        <p class="mt-3">Transfer ke salah satu Rekening Bank di bawah</p>
        <div class="row">
            <div class="col-md-6">
                <img height="50" src="<?php echo base_url().'assets/images/BRI_2020.svg';?>">
                <p style="font-size:small;" class="mt-3 mb-0">Atas Nama: <b>SASUKE ADI LEGOWO</b></p>
                <p style="font-size:small;">No. Rekening: <b>034101000743xxx</b></p>
            </div>
            <div class="col-md-6">
                <img height="50" src="<?php echo base_url().'assets/images/Bank_Central_Asia.svg';?>">
                <p style="font-size:small;" class="mt-3 mb-0">Atas Nama: <b>SASUKE ADI LEGOWO</b></p>
                <p style="font-size:small;">No. Rekening: <b>0590319xxx</b></p>
            </div>
        </div>
        <?php } ?> 
        
        <?php if($payment=="qris") { ?>
            <img width="200" src="<?php echo base_url().'assets/images/qris.id-3.png';?>">
            <p class="mt-3">Pindai menggunakan aplikasi M-Banking atau E-Wallet</p>
            <img src="<?php echo base_url().'assets/images/qris.jpg';?>" width="200" height="200">
        <?php } ?>
            <p class="mt-3 mb-0"><b>Nominal Yang Perlu Dibayar</b></p>
            <p class="text-center animate__animated animate__heartBeat animate__infinite animate__slow" style="color: #2ec06f;"><?php echo 'Rp'.number_format($order['harga'],2,",","."); ?></p>
            <p><b>Unggah Bukti Pembayaran</b></p>
            <form id="myForm" name="myForm" action="<?php echo base_url().'orders/payment/'.$order['id_t']; ?>" method="POST" enctype="multipart/form-data">
            <div class="text-center mt-3">
                <div class="input-file-container"> 
                    <input type="file" id="image" name="image" class="form-control
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <label class="btn input-file-trigger liquidinput" for="foto">
                    <i class="fas fa-upload fa-bounce"></i> Unggah Foto</label>
                </div>
                    <p class="file-return"></p>
                    <span class="imager" style="margin-left:-14rem;"></span>
            </div>
            <div class="text-center">
                <button type="submit" class="btn green-button liquidgreen">Kirim</button>
                <a href="<?php echo base_url().'orders/index/'?>" class="btn grey-button liquidgrey">Batal</a>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    var fileInput  = document.querySelector( "#image" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
    button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
        });
        button.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
        });  
        fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
        });  
</script>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: {
    image: {
        required: true,
        accept:"jpg,jpeg,png,gif"
        },
},
    messages: {
    image: {
        required: "Harap unggah bukti pembayaran",
        accept: "Format file harus JPG, JPEG, PNG, GIF"
        },
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "image" )
            error.appendTo(".imager");
        else
            error.insertAfter(element);
    },
  });
});
</script>