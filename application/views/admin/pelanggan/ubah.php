<head>
    <title>Sate Mas Seno - Ubah Pelanggan</title>
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
    <form action="<?php echo base_url().'admin/user/edit/'.$user['id_p']; ?>" method="POST"
        class="card mx-auto" id="myForm" enctype="multipart/form-data">
        <h3 class="text-center"><span class="underline">Ubah Pelanggan</span></h3>
            <div class="avatar-upload mt-3">
                <div class="avatar-preview">
                        <?php if($user['foto'] != "" && file_exists('./public/uploads/users/'.$user['foto'])) { ?>
                    <img id="imagePreview" src="<?php echo base_url().'public/uploads/users/'.$user['foto'];?>">
                        <?php } else { ?>
                    <img id="imagePreview" src="<?php echo base_url().'assets/images/icons/user.png';?>">
                        <?php } ?>
                </div>
                <div class="form-group">
                    <input type='file' id="image" name="image" class="form-control
                        <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>" onchange="previewFile()">
                        <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <label for="image"> <i class="fa-solid fa-camera"></i></label>
                </div>
            </div>        
            <div class="text-center">
                <span class="imager" style="margin-left:-14rem;"></span>
            </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="username" class="form-control
                    <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username"
                        value="<?php echo set_value('username', $user['nama_p'])?>" autocomplete="off"
                            required>
                    <label class="input-label" for="username">Nama Pengguna</label><i class="bar"></i>
                    <?php echo form_error('username'); ?>
                    <span class="usernamer"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="firstname" class="form-control
                    <?php echo (form_error('firstname') != "") ? 'is-invalid' : '';?>" name="firstname"
                        value="<?php echo set_value('firstname', $user['nama_d'])?>" autocomplete="off"
                            required>
                    <label class="input-label" for="firstname">Nama Depan</label><i class="bar"></i>
                    <?php echo form_error('firstname'); ?>
                    <span class="firstnamer"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="lastname" class="form-control 
                    <?php echo (form_error('lastname') != "") ? 'is-invalid' : '';?>" name="lastname"
                        value="<?php echo set_value('lastname', $user['nama_b'])?>" autocomplete="off"
                            required>
                    <label class="input-label" for="lastname">Nama Belakang</label><i class="bar"></i>
                    <?php echo form_error('lastname'); ?>
                    <span class="lastnamer"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" id="email" class="form-control
                    <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email" 
                        value="<?php echo set_value('email', $user['email'])?>" autocomplete="off"
                            required>
                    <label class="input-label" for="email">Email</label><i class="bar"></i>
                    <?php echo form_error('email'); ?>
                    <span class="emailer"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="phone" class="form-control
                    <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" name="phone" 
                        value="<?php echo set_value('phone', $user['telepon'])?>" autocomplete="off"
                            required>
                    <label class="input-label" for="phone">Nomor Telepon</label><i class="bar"></i>
                    <?php echo form_error('phone'); ?>
                    <span class="phoner"></span>
                </div>
                <div class="form-group">
                    <input type="password" id="password" class="form-control
                    <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" name="password"
                        value="<?php echo set_value('password', $user['sandi'])?>" autocomplete="off"
                            required>
                    <label class="input-label" for="password">Kata Sandi</label><i class="bar"></i>
                    <?php echo form_error('password'); ?>
                    <span class="passworder"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea name="address" id="address" type="text" class="form-control
            <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>" autocomplete="off"
                            required><?php echo set_value('address', $user['alamat']);?></textarea>
            <label class="input-label-textarea" for="address">Alamat</label><i class="bar"></i>
            <?php echo form_error('address'); ?>
            <span class="addresser"></span>
        </div>
        <div class="text-center" style="margin-top:2rem;">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="<?php echo base_url().'admin/user/index'; ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
    function previewFile() {
  var preview = document.querySelector('div.avatar-upload img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
 }
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