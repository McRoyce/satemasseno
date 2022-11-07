<head>
    <title>Sate Mas Seno - Buat Cabang Resto</title>
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
    <form action="<?php echo base_url().'admin/store/create_restaurant';?>" method="POST"
        class="card mx-auto" id="myForm" name="myForm" enctype="multipart/form-data">
        <h3 class="text-center"><span class="underline">Buat Cabang Resto</span></h3>
                <div class="form-group">
                    <select name="c_name" id="c_name"
                        class="form-control <?php echo (form_error('c_name') != "") ? 'is-invalid' : '';?>">
                    <option value="">-Pilih Kategori-</option>
                    <?php 
                    if (!empty($cats)) { 
                        foreach($cats as $cat) {
                    ?>
                    <option value="<?php echo $cat['id_k'];?>">
                        <?php echo set_select('c_name', $cat['nama_k']);?>
                        <?php echo $cat['nama_k'];?>
                    </option>
                    <?php }
                        }
                    ?>
                    </select>
                    <label class="input-label">Kategori</label><i class="bar"></i>
                    <?php echo form_error('c_name'); ?>
                    <span class="c_namer"></span>
                </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="res_name" id="res_name" class="form-control
                    <?php echo (form_error('res_name') != "") ? 'is-invalid' : '';?>"
                    value="<?php echo set_value('res_name');?>" autocomplete="off"
                            required>
                    <label class="input-label">Nama Cabang Resto</label><i class="bar"></i>
                    <?php echo form_error('res_name');?>
                    <span class="res_namer"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control" name="status" id="status"
                        class="<?php echo (form_error('status') != "") ? 'is-invalid' : '';?>">
                        <option value="">-Pilih Status-</option>
                        <option value="Buka">Buka</option>
                        <option value="Tutup">Tutup</option>
                    </select>
                    <label class="input-label">Status</label><i class="bar"></i>
                    <?php echo form_error('status');?>
                    <span class="statuser"></span>
                </div>
            </div>
            <div class="col-md-12">
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
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea type="text" name="about" id="about" class="form-control form-control-danger
                    <?php echo (form_error('about') != "") ? 'is-invalid' : '';?>"
                        value="<?php echo set_value('about');?>" autocomplete="off"
                            required></textarea>
                    <label class="input-label-textarea">Tentang</label><i class="bar"></i>
                    <?php echo form_error('about');?>
                    <span class="abouter"></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="address" id="address" type="text" class="form-control
                    <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>" 
                        value="<?php echo set_value('address');?>" autocomplete="off"
                            required></textarea>
                    <label class="input-label-textarea">Alamat</label><i class="bar"></i>
                    <?php echo form_error('address');?>
                    <span class="addresser"></span>
                    </div>
                </div>
            </div>
                <div class="text-center" style="margin-top:2rem;">
                    <input type="submit" id="btn" name="submit" class="btn btn-info" value="Simpan">
                    <a href="<?php echo base_url().'admin/store/index'?>" class="btn btn-secondary">Batal</a>
                </div>
            </div>
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
    c_name: "required",
    res_name: {
        required: true,
        maxlength: 50,
        }, 
    status: "required",
    about: {
        required: true,
        minlength: 10,
        maxlength: 255,
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
    c_name: {
        required: "Pilih kategori",
    }, 
    res_name: {
        required: "Masukkan nama cabang resto",
        maxlength: "Nama cabang resto maksimal 50 karakter",
        },
    status: {
        required: "Pilih status",
        },   
    about: {
        required: "Masukkan tentang",
        minlength: "Tentang minimal 10 karakter",
        maxlength: "Tentang maksimal 255 karakter",
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
        else if (element.attr("name") == "c_name" )
            error.appendTo(".c_namer");
        else if (element.attr("name") == "res_name" )
            error.appendTo(".res_namer");
        else if (element.attr("name") == "status" )
            error.appendTo(".statuser");
        else if (element.attr("name") == "about" )
            error.appendTo(".abouter");
        else if (element.attr("name") == "address" )
            error.appendTo(".addresser");
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