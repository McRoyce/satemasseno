<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sate Mas Seno - Daftar Admin</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/fontawesome-free-6.1.1-web/css/all.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/animate.css-4.1.1/animate.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/formadmin.css';?>">
    
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
</head>

<style>
.wrapper {
  background-color: rgba(0, 50, 90, 0.70);
  padding: 20px 40px 10px 40px;
  margin: auto auto;
	position:relative;
  overflow: hidden; 
  border-radius: 20px;
  width: 600px;
  height: auto;
}
@media (max-width: 600px) {
  .wrapper {
    padding: 20px 20px;
  }
}
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
</style>
<div id="background-wrap">
<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>
    <div class="x1">
        <div class="cloud"></div>
    </div>

    <div class="x2">
        <div class="cloud"></div>
    </div>

    <div class="x3">
        <div class="cloud"></div>
    </div>

    <div class="x4">
        <div class="cloud"></div>
    </div>

    <div class="x5">
        <div class="cloud"></div>
    </div>
    <div class="moon">
            <div class="crater crater-1"></div>
            <div class="crater crater-2"></div>
            <div class="crater crater-3"></div>
            <div class="crater crater-4"></div>
            <div class="crater crater-5"></div>
            <div class="shadow"></div>
            <div class="eye eye-l"></div>
            <div class="eye eye-r"></div>
            <div class="mouth"></div>
            <div class="blush blush-1"></div>
            <div class="blush blush-2"></div>
        </div>
        <div class="orbit">
            <div class="rocket">
                <div class="window"></div>
            </div>
        </div>
<p style="bottom:-1rem;position:absolute;font-size:xx-small;">Copyright &copy; <?php echo date("Y"); ?> by Mark Bowley & Vinicius Ferreira</p>
</div>

<body>
<div class="wrapper mx-auto animate__animated animate__bounceInDown">
    <h3 class="text-center"><span class="underline">Mendaftar</span></h3>
        <span></span>
        <form action="<?php echo base_url().'admin/singup/create_admin'; ?>" method="POST" id="myForm" name="myForm"
            style="margin-top: 20px;" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="margin-top:-0.5rem;">
                        <input type="text" class="form-control
                        <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username" id="username"
                            value="<?php echo set_value('username')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="username">Nama Pengguna</label><i class="bar"></i>
                        <span class="usernamer"></span>
                    </div>
                    <div class="form-group" style="margin-top:-0.5rem;">
                        <input type="text" class="form-control
                        <?php echo (form_error('firstname') != "") ? 'is-invalid' : '';?>" name="firstname" id="firstname"
                            value="<?php echo set_value('firstname')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="firstname">Nama Depan</label><i class="bar"></i>
                        <span class="firstnamer"></span>
                    </div>
                    <div class="form-group" style="margin-top:-0.5rem;">
                        <input type="text" class="form-control 
                        <?php echo (form_error('lastname') != "") ? 'is-invalid' : '';?>" name="lastname" id="lastname"
                            value="<?php echo set_value('lastname')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="lastname">Nama Belakang</label><i class="bar"></i>
                        <span class="lastnamer"></spanc>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-top:-0.5rem;">
                        <input type="text" class="form-control
                        <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email" id="email" 
                            value="<?php echo set_value('email')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="email">Email</label><i class="bar"></i>
                        <span class="emailer"></span>
                    </div>
                    <div class="form-group" style="margin-top:-0.5rem;">
                        <input type="text" class="form-control
                        <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" name="phone" id="phone" 
                            value="<?php echo set_value('phone')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="phone">Nomor Telepon</label><i class="bar"></i>
                        <span class="phoner"></span>
                    </div>
                    <div class="form-group" style="margin-top:-0.5rem;">
                        <input type="password" class="form-control
                        <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" name="password" id="password"
                            value="<?php echo set_value('password')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="password">Kata Sandi</label><i class="bar"></i>
                        <span class="passworder"></span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <div class="input-file-container"> 
                    <input type="file" id="image" name="image" placeholder="Enter Image" class="form-control
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <label class="btn input-file-trigger" for="foto">
                        <i class="fas fa-upload fa-bounce"></i> Unggah Foto</label>
                </div>
                    <p class="file-return"></p>
                    <span class="imager" style="margin-left:-14rem;"></span>
            </div>
            <div class="form-group" style="margin-top:-1rem;">
                <textarea id="address" name="address" type="text" class="form-control
                <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>"
                    value="<?php echo set_value('address');?>" autocomplete="off" required></textarea>
                <label class="input-label-textarea" for="address">Alamat</label><i class="bar"></i>
                <span class="addresser"></span>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-info">Buat Akun</button>
                <p style="margin-top:0.5rem;">Sudah daftar? 
                <a href="<?php echo base_url().'admin/login/index';?>" style="color:cyan;">Klik disini!</a></p>
            </div>
        </form>
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
        required: false,
        accept:"jpg,jpeg,png,gif"
        },
    username: {
        required: true,
        minlength: 6,
        maxlength: 30,
        uname: true,
        }, 
    firstname: {
        required: true,
        maxlength: 50,
        fname: true,
    },
    lastname: {
        required: true,
        maxlength: 50,
        lname: true,
    },
    email: {
        required: true,
        maxlength: 70,
        email: true,
    },
    phone: {
        required: true,
        phone: true,
        },
    password: {
        required: true,
        minlength: 8,
        maxlength: 40,
        },
    address: {
        required: true,
        minlength: 10,
        maxlength: 255,
        },
},
    messages: {
    image: {
        accept: "Format file harus JPG, JPEG, PNG, GIF"
        },
    username: {
        required: "Masukkan nama pengguna",
        minlength: "Nama pengguna minimal 6 karakter",
        maxlength: "Nama pengguna maksimal 30 karakter",
        },
    firstname: {
        required: "Masukkan nama depan",
        maxlength: "Nama depan maksimal 50 karakter",
    },
    lastname: {
        required: "Masukkan nama belakang",
        maxlength: "Nama belakang maksimal 50 karakter",
    },
    email: {
        required: "Masukkan email",
        maxlength: "Email maksimal 70 karakter",
        email: "Masukkan email yang valid",
    },
    phone: {
        required: "Masukkan nomor telepon",
        },
    password: {
        required: "Masukkan kata sandi",
        minlength: "Kata sandi minimal 8 karakter",
        maxlength: "Kata sandi maksimal 40 karakter",
        },
    address: {
        required: "Masukkan alamat",
        minlength: "Alamat minimal 10 karakter",
        maxlength: "Alamat maksimal 255 karakter",
        },      
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "image" )
            error.appendTo(".imager");
        else if (element.attr("name") == "username" )
            error.appendTo(".usernamer");
        else if (element.attr("name") == "firstname" )
            error.appendTo(".firstnamer");
        else if (element.attr("name") == "lastname" )
            error.appendTo(".lastnamer");
        else if (element.attr("name") == "email" )
            error.appendTo(".emailer");
        else if (element.attr("name") == "phone" )
            error.appendTo(".phoner");
        else if (element.attr("name") == "password" )
            error.appendTo(".passworder");
        else if (element.attr("name") == "address" )
            error.appendTo(".addresser");
        else
            error.insertAfter(element);
    },
    
  });
    jQuery.validator.addMethod("uname", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/.test(value);
    }, "Masukkan nama pengguna yang valid");

    jQuery.validator.addMethod("fname", function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Nama depan harus menggunakan abjad");

    jQuery.validator.addMethod("lname", function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Nama belakang harus menggunakan abjad");

    jQuery.validator.methods.email = function( value, element ) {   
        return this.optional( element ) || /^.+@.+\..+$/.test( value ); 
    }

    jQuery.validator.addMethod("phone", function (phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/);
    }, "Masukkan nomor telepon yang valid");
   
});
</script>

</body>
</html>