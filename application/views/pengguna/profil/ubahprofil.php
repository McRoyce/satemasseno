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

<head>
    <title>Sate Mas Seno - Ubah Profil</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Ubah Profil</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>
<div class="container">
    <div class="card mt-4 mx-auto animate__animated animate__fadeInLeftBig">
        <div class="wrapper">
            <?php if($this->session->flashdata('success') != ""):?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success');?>
                </div>
            <?php endif ?>
            <?php $loggedUser = $this->session->userdata('user');?>
            <form action="<?php echo base_url().'profile/edit/'.$loggedUser['id_p']?>" method="POST" id="myForm" name="myForm" enctype="multipart/form-data">
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
                    <div class="col-md-12" style="margin-top:-2rem;">
                        <div class="form-group">
                            <input type="text" name="username" id="username"
                                class="form-control <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>"
                                value="<?php echo set_value('username', $user['nama_p']);?>" autocomplete="off"
                                required>
                            <label class="input-label" for="username">Nama Pengguna</label><i class="bar"></i>
                            <?php echo form_error('username'); ?>
                            <span class="usernamer"></span>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top:-2rem;">
                        <div class="form-group">
                            <input type="text" name="firstname" id="firstname"
                                class="form-control <?php echo (form_error('firstname') != "") ? 'is-invalid' : '';?>"
                                name="firstname" value="<?php echo set_value('firstname', $user['nama_d'])?>" autocomplete="off"
                            required>
                            <label class="input-label" for="firstname">Nama Depan</label><i class="bar"></i>
                            <?php echo form_error('firstname'); ?>
                            <span class="firstnamer"></span>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top:-2rem;">
                        <div class="form-group">
                            <input type="text" name="lastname" id="lastname"
                                class="form-control <?php echo (form_error('lastname') != "") ? 'is-invalid' : '';?>"
                                value="<?php echo set_value('lastname', $user['nama_b'])?>" autocomplete="off"
                            required>
                            <label class="input-label" for="lastname">Nama Belakang</label><i class="bar"></i>
                            <?php echo form_error('lastname'); ?>
                            <span class="lastnamer"></span>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top:-2rem;">
                        <div class="form-group">
                            <input type="text" name="email" id="email"
                                class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>"
                                value="<?php echo set_value('email', $user['email'])?>" autocomplete="off"
                            required>
                            <label class="input-label" for="email">Email</label><i class="bar"></i>
                            <?php echo form_error('email'); ?>
                            <span class="emailer"></span>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top:-2rem;">
                        <div class="form-group">
                            <input type="text" name="phone" id="phone"
                                class="form-control <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>"
                                value="<?php echo set_value('phone', $user['telepon'])?>"  autocomplete="off"
                            required>
                            <label class="input-label" for="phone">Nomor Telepon</label><i class="bar"></i>
                            <?php echo form_error('phone'); ?>
                            <span class="phoner"></span>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:-2rem;">
                        <div class="form-group">                        
                            <textarea name="address" id="address" type="text"
                                class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>" autocomplete="off"
                                required><?php echo set_value('address', $user['alamat']);?></textarea>
                            <label class="input-label-textarea" for="address">Alamat</label><i class="bar"></i>
                            <?php echo form_error('address'); ?>
                            <span class="addresser"></span>
                        </div>
                    <div class="col-md-12 text-right" style="margin-top:-1.5rem;">
                        <a href="<?php echo base_url().'profile/editPassword/'.$user['id_p']; ?>">
                        <i class="fas fa-key"></i> Ubah Kata Sandi</a>
                    </div>
                        </div>
                    <div class="col-md-12 text-center" style="margin-top:-2rem;margin-bottom:-1rem;">
                        <button type="submit" class="btn green-button liquidgreen">Simpan</button>
                        <a href="<?php echo base_url().'profile' ?>" class="btn grey-button liquidgrey">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
</script>
