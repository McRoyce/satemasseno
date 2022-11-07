<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sate Mas Seno - Hubungi Kami</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
    .card{
        max-width: 600px;
}
    .error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
</style>

<body>
<section class="banner animate__animated animate__fadeInDownBig">
  <div class="content">
    <div class="general-info">
    <svg id="svg2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    </div>
    <div class="principal animate__animated animate__fadeInLeftBig animate__delay-1s">
            <h1 class="display-4">Hubungi Kami</h1>
            <p class="display-4">Tanyakan kepada kami terkait hal pemesanan <br>
            dan juga kami menerima kritik dan saran dari anda</p>
        <div>
            <a href="#tanya" class="btn wgreen-button liquidwgreen">Tanya Sekarang</a>
        </div>
    </div>
    <picture class="animate__animated animate__fadeInRightBig animate__delay-1s">
        <svg id="circle" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><path fill="#ffff" d="M39.3,-69.4C52.3,-60.5,65,-52.7,73.6,-41.4C82.1,-30,86.3,-15,85.8,-0.3C85.3,14.4,80,28.8,72,41C63.9,53.2,53.2,63.3,40.7,70.9C28.3,78.5,14.1,83.7,-0.3,84.2C-14.7,84.6,-29.3,80.4,-41.8,72.8C-54.3,65.2,-64.6,54.3,-71.3,41.6C-78,28.9,-80.9,14.4,-82.8,-1.1C-84.6,-16.6,-85.3,-33.1,-78.6,-45.7C-71.8,-58.2,-57.7,-66.8,-43.3,-74.8C-29,-82.9,-14.5,-90.5,-0.7,-89.3C13.2,-88.1,26.3,-78.2,39.3,-69.4Z" transform="translate(100 100)" /></svg>
        <a href="javascript:void(0)" title="Customer service icons created by Freepik - Flaticon">
        <img id="icon4" src="<?php echo base_url().'assets/images/icons/call-center-agent.png';?>"></a>
        <a href="javascript:void(0)" title="Call center agent icons created by Freepik - Flaticon">
        <img id="icon5" src="<?php echo base_url().'assets/images/icons/call-center-agent2.png';?>"></a>
    </picture>
  </div>
</section>

<div id="tanya" style="bottom:0.5rem;position:relative"></div>
<div class="container" data-aos="fade-right">
<div class="text-center">
    <h2><span class="underline">Mulai Percakapan</span></h2>
</div>
<div class="card mt-5 mx-auto">
    <div id="contact-us" class="wrapper">

        <?php if($this->session->flashdata('msg') != ""):?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle fa-beat"></i> <?php echo $this->session->flashdata('msg');?>
    </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
    <div class="alert alert-danger">
		<i class="fa fa-times-circle fa-beat"></i> <?php echo $this->session->flashdata('error');?>
    </div>
        <?php endif ?>

    <p class="text-center mx-auto"></p>
    <form name="contact-form" action="<?php echo base_url().'contacts/sendMail'; ?>" id="myForm" method="POST">
        <div class="row">
            <div class="col-md-6" style="margin-top:-2rem;">
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control" required <?php set_value("name");?> >
                    <label class="input-label" for="name">Nama Lengkap</label><i class="bar"></i>
                    <span class="namer"></span>
                </div>
            </div>
            <div class="col-md-6" style="margin-top:-2rem;">
                <div class="form-group">
                    <input type="text" id="email" name="email" class="form-control" required <?php set_value("email");?> >
                    <label class="input-label" for="email">Email</label><i class="bar"></i>
                    <span class="emailer"></span>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:-2rem;">
                <div class="form-group">
                    <input type="text" id="subject" name="subject" class="form-control" required <?php set_value("subject");?> >
                    <label class="input-label" for="subject">Subjek</label><i class="bar"></i>
                    <span class="subjecter"></span>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:-2rem;">
                <div class="form-group">
                    <textarea type="text" id="message" name="message"
                        class="form-control" required><?php set_value("message");?></textarea>
                    <label class="input-label-textarea" for="message">Isi Pesan</label><i class="bar"></i>
                    <span class="messager"></span>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn green-button liquidgreen" type="submit">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position:relative;margin-bottom:-8px;"><path fill="#2ec06f" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
<section class="banner">
  <div class="content">
    <div class="general-info">
        <svg id="svg2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    </div>
    <picture class="text-center text-white" data-aos="fade-right">
        <a href="javascript:void(0)" title="Customer service icons created by Freepik - Flaticon">
        <img id="icon6" src="<?php echo base_url().'assets/images/icons/hotline.png';?>" height="70"></a>
        <p class="mt-3 mb-0" style="font-size:1.5em;font-weight:300;">
            Ingin mengobrol suara dengan kami?</p>
        <h4>Hubungi: 089514561111</h4>
    </picture>
    <picture class="text-center text-white" data-aos="fade-right" data-aos-delay="100">
        <a href="javascript:void(0)" title="Mail icons created by Freepik - Flaticon">
        <img id="icon6" src="<?php echo base_url().'assets/images/icons/mail.png';?>" height="70"></a>
        <p class="mt-3 mb-0" style="font-size:1.5em;font-weight:300;">
            Ingin mengirim pesan beserta lampiran file?</p>
        <h4>Kirim ke: satemasseno@gmail.com</h4>
    </picture>
  </div>
</section>

<div class="col-12 text-center mt-5" data-aos="fade-up">
    <h2><span class="underline">Sosial Media</span></h2>
</div>
<div class="container-fluid padding mt-3">
    <div class="row text-center padding">
        <div class="col-xs-1 col-sm-6 col-md-3" data-aos="fade-right" data-aos-delay="100">
            <a href="javascript:void(0)" title="Facebook icons created by Pixel perfect - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/facebook.png';?>" height="70"></a>
            <h4 class="mt-3">Sate Mas Seno</h4>
        </div>
        <div class="col-xs-1 col-sm-6 col-md-3" data-aos="fade-right" data-aos-delay="200">
            <a href="javascript:void(0)" title="Instagram icons created by Pixel perfect - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/instagram.png';?>" height="70"></a>
            <h4 class="mt-3">@satemasseno</h4>
        </div>
        <div class="col-xs-1 col-sm-6 col-md-3" data-aos="fade-right" data-aos-delay="300">
            <a href="javascript:void(0)" title="Whatsapp icons created by Pixel perfect - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/whatsapp.png';?>" height="70"></a>
            <h4 class="mt-3">089514561111</h4>
        </div>
        <div class="col-xs-1 col-sm-6 col-md-3" data-aos="fade-right" data-aos-delay="400">
            <a href="javascript:void(0)" title="Tiktok icons created by Freepik - Flaticon">
            <img src="<?php echo base_url().'assets/images/icons/tik-tok.png';?>" height="70"></a>
            <h4 class="mt-3">satemasseno</h4>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: { 
    name: {
        required: true,
        maxlength: 50,
        fname: true,
    },
    email: {
        required: true,
        maxlength: 70,
        email: true,
    },
    subject: {
        required: true,
        },
    message: {
        required: true,
        minlength: 10,
        maxlength: 255,
        },
},
    messages: {
    name: {
        required: "Masukkan nama lengkap",
        maxlength: "Nama lengkap maksimal 50 karakter",
    },
    email: {
        required: "Masukkan email",
        maxlength: "Email maksimal 70 karakter",
        email: "Masukkan email yang valid",
    },
    subject: {
        required: "Masukkan subjek",
        },
    message: {
        required: "Masukkan isi pesan",
        minlength: "isi pesan minimal 10 karakter",
        maxlength: "isi pesan maksimal 255 karakter",
        },      
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "name" )
            error.appendTo(".namer");
        else if (element.attr("name") == "email" )
            error.appendTo(".emailer");
        else if (element.attr("name") == "subject" )
            error.appendTo(".subjecter");
        else if (element.attr("name") == "message" )
            error.appendTo(".messager");
        else
            error.insertAfter(element);
    },
    
  });
    jQuery.validator.addMethod("fname", function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Nama lengkap harus menggunakan abjad");

    jQuery.validator.methods.email = function( value, element ) {   
        return this.optional( element ) || /^.+@.+\..+$/.test( value ); 
    }
});
</script>

<script>
  AOS.init();
</script>

</body>