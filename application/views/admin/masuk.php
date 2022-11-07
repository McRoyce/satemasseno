<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sate Mas Seno - Masuk Admin</title>
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
h3, label, p, select, textarea {
    color:#ffff;
}
input[type=text],input[type=password] {
  color: #f0f0f0;
}
input[type=text]:focus, input[type=password]:focus {
  color: #f0f0f0;
}
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
    transition: background-color 5000s ease-in-out 0s;
    -webkit-text-fill-color: #f0f0f0 !important;
}
.wrapper {
  background-color: rgba(0, 50, 90, 0.70);
  padding: 20px 40px 10px 40px;
  margin: 20vh auto;
  position:relative;
  overflow: hidden; 
  border-radius: 20px;
  width: 450px;
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

    <div class="wrapper animate__animated animate__bounceInDown">
            <?php
                if (!empty($this->session->flashdata('success'))) {
                echo "<div class='alert alert-success mx-auto'>
                <i class='fa fa-check-circle fa-beat'></i>".' '.$this->session->flashdata('success')."</div>";
                }
            ?>
            <?php
                if (!empty($this->session->flashdata('msg'))) {
                echo "<div class='alert alert-danger mx-auto'>
                <i class='fa fa-times-circle fa-beat'></i>".' '.$this->session->flashdata('msg')."</div>";
                }
            ?>
                <h3 class="text-center"><span class="underline">Masuk</span></h3>
                <form action="<?php echo base_url().'admin/login/authenticate' ;?>" name="myForm" id="myForm"
                method="POST" class="form-container mx-auto">
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" autocomplete="off"
                            required>
                <label class="input-label" for="username">Nama Pengguna</label><i class="bar"></i>
                <span class="usernamer"></span>
            </div>
            <?php echo form_error('username'); ?>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" autocomplete="off"
                            required>
                <label class="input-label" for="password">Kata Sandi</label><i class="bar"></i>
                <span class="passworder"></span>
            </div>
            <?php echo form_error('password'); ?>
            <div class="text-center">
                <button type="submit" class="btn btn-info">Masuk</button>
                <p style="margin-top:1rem;">Belum punya akun? 
                <a href="<?php echo base_url().'admin/singup/index';?>" style="color:cyan;">Daftar disini!</a></p>
            </div>
        </form>
    </div>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: {
    username: {
        required: true,
        minlength: 6,
        maxlength: 30,
        uname: true,
        }, 
    password: {
        required: true,
        minlength: 8,
        maxlength: 40,
        },
},
    messages: {
    username: {
        required: "Masukkan nama pengguna",
        minlength: "Nama pengguna minimal 6 karakter",
        maxlength: "Nama pengguna maksimal 30 karakter",
        },
    password: {
        required: "Masukkan kata sandi",
        minlength: "Kata sandi minimal 8 karakter",
        maxlength: "Kata sandi maksimal 40 karakter",
        },
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "image" )
            error.appendTo(".imager");
        else if (element.attr("name") == "username" )
            error.appendTo(".usernamer");
        else if (element.attr("name") == "password" )
            error.appendTo(".passworder");
        else
            error.insertAfter(element);
    },
    
  });
    jQuery.validator.addMethod("uname", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/.test(value);
    }, "Masukkan nama pengguna yang valid");
});
</script>

</body>
</html>