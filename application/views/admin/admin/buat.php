<head>
    <title>Sate Mas Seno - Buat Admin</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
</style>

<div class="col-md-8 mx-auto animate__animated animate__fadeInLeftBig">
    <form action="<?php echo base_url().'admin/admin/create_admin'; ?>" method="POST"
        class="card mx-auto" id="myForm" enctype="multipart/form-data">
        <h3 class="text-center"><span class="underline">Buat Admin</span></h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control
                    <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username" id="username"
                        value="<?php echo set_value('username')?>" autocomplete="off"
                            required>
                    <label class="input-label" for="username">Nama Pengguna</label><i class="bar"></i>
                    <?php echo form_error('username'); ?>
                    <span class="usernamer"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control
                    <?php echo (form_error('firstname') != "") ? 'is-invalid' : '';?>" name="firstname" id="firstname"
                        value="<?php echo set_value('firstname')?>" autocomplete="off"
                            required>
                    <label class="input-label" for="firstname">Nama Depan</label><i class="bar"></i>
                    <?php echo form_error('firstname'); ?>
                    <span class="firstnamer"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control 
                    <?php echo (form_error('lastname') != "") ? 'is-invalid' : '';?>" name="lastname" id="lastname"
                        value="<?php echo set_value('lastname')?>" autocomplete="off"
                            required>
                    <label class="input-label" for="lastname">Nama Belakang</label><i class="bar"></i>
                    <?php echo form_error('lastname'); ?>
                    <span class="lastnamer"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control
                    <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email" id="email" 
                        value="<?php echo set_value('email')?>" autocomplete="off"
                            required>
                    <label class="input-label" for="email">Email</label><i class="bar"></i>
                    <?php echo form_error('email'); ?>
                    <span class="emailer"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control
                    <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" name="phone" id="phone" 
                        value="<?php echo set_value('phone')?>" autocomplete="off"
                            required>
                    <label class="input-label" for="phone">Nomor Telepon</label><i class="bar"></i>
                    <?php echo form_error('phone'); ?>
                    <span class="phoner"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control
                    <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" name="password" id="password"
                        value="<?php echo set_value('password')?>" autocomplete="off"
                            required>
                    <label class="input-label" for="password">Kata Sandi</label><i class="bar"></i>
                    <?php echo form_error('password'); ?>
                    <span class="passworder"></span>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <div class="input-file-container"> 
                <input type="file" id="image" name="image" class="form-control
                <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                <label class="btn input-file-trigger" for="foto">
                    <i class="fas fa-upload fa-bounce"></i> Unggah Foto</label>
            </div>
                <p class="file-return"></p>
                <span class="imager" style="margin-left:-14rem;"></span>
        </div>
        <div class="form-group">
            <textarea name="address" type="text" id="address" class="form-control
            <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>"
                value="<?php echo set_value('address');?>" autocomplete="off"
                            required></textarea>
            <label class="input-label-textarea" for="address">Alamat</label><i class="bar"></i>
            <?php echo form_error('address'); ?>
            <span class="addresser"></span>
        </div>
        <div class="text-center" style="margin-top:2rem;">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="<?php echo base_url().'admin/admin/index'; ?>" class="btn btn-secondary">Batal</a>
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

$(window).on('beforeunload', function(){
    return "Pemesanan anda belum selesai dan akan hilang, yakin ingin keluar?";
});

// Form Submit
$(document).on("submit", "form", function(event){
// disable unload warning
    $(window).off('beforeunload');
});
</script>