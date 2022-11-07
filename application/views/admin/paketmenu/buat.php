<head>
    <title>Sate Mas Seno - Buat Paket Menu</title>
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
    <form action="<?php echo base_url().'admin/menu/create_menu';?>" method="POST" id="myForm" name="myForm"
        class="card mx-auto" enctype="multipart/form-data">
        <h3 class="text-center"><span class="underline">Buat Paket Menu</span></h3>
        <div class="form-group">
            <select name="rname" id="rname"
                    class="form-control <?php echo (form_error('rname') != "") ? 'is-invalid' : '';?>">
                <option value="">-Pilih Cabang Resto-</option>
                <?php 
                if (!empty($stores)) { 
                    foreach($stores as $store) {
                ?>
                <option value="<?php echo $store['id_cr'];?>">
                    <?php echo set_select('rname');?>
                    <?php echo $store['nama_cr'];?>
                </option>
                <?php }
                    }
                ?>
            </select>
            <label class="input-label">Cabang Resto</label><i class="bar"></i>
            <?php echo form_error('rname');?>
            <span class="rnamer"></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control  
                    <?php echo (form_error('name') != "") ? 'is-invalid' : '';?>" name="name" id="name"
                        value="<?php echo set_value('name'); ?>" autocomplete="off"
                            required>
                    <label class="input-label" for="name">Nama Paket Menu</label><i class="bar"></i>
                    <?php echo form_error('name'); ?>
                    <span class="namer"></span>
                </div>
                <div class="form-group">
                    <select class="form-control" name="stock" id="stock"
                        class="<?php echo (form_error('stock') != "") ? 'is-invalid' : '';?>">
                        <option value="">-Pilih Stok Paket Menu-</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Habis">Habis</option>
                    </select>
                    <label class="input-label">Stok Paket Menu</label><i class="bar"></i>
                    <span class="stocker"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control 
                    <?php echo (form_error('price') != "") ? 'is-invalid' : '';?>" id="price" name="price"
                        value="<?php echo set_value('price'); ?>" autocomplete="off"
                            required>
                    <label class="input-label" for="price">Harga</label><i class="bar"></i>
                    <?php echo form_error('price'); ?>
                    <span class="pricer"></span>
                </div>
                <div class="form-group">
                    <input type="Price" class="form-control 
                        <?php echo (form_error('delivery') != "") ? 'is-invalid' : '';?>" id="delivery" name="delivery"
                        value="<?php echo set_value('ongkir'); ?>" autocomplete="off"
                            required>
                        <label class="input-label" for="delivery">Ongkos Kirim</label><i class="bar"></i>
                    <span class="deliveryer"></span>
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
                    <p class="text-center">Deskripsi</p>
                    <textarea type="text" class="form-control 
                    <?php echo (form_error('about') != "") ? 'is-invalid' : '';?>" id="about" name="about"
                        value="<?php echo set_value('about'); ?>" autocomplete="off"
                            required></textarea>
                    <div class="invalid-feedback error-msg">Masukkan deskripsi</div>
                    <span class="abouter"></span>
                </div>
            </div>
        </div>
        <div class="text-center" style="margin-top:2rem;">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="<?php echo base_url().'admin/menu/index'?>" class="btn btn-secondary">Batal</a>
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
    rname: "required",
    name: {
        required: true,
        maxlength: 50,
        }, 
    price: {
        required: true,
        number: true,
        },
    stock: "required",
    delivery: "required",
    about: {
        required: true,
        minlength: 10,
        maxlength: 255,
        }, 
},
    messages: {
    image: {
        accept: "Format file harus JPG, JPEG, PNG, GIF"
        },
    rname: {
        required: "Pilih cabang resto",
    }, 
    name: {
        required: "Masukkan nama paket menu",
        maxlength: "Nama paket menu maksimal 50 karakter",
        },
    price: {
        required: "Masukkan harga",
        number: "Harga harus menggunakan angka",
        },
    stock: {
        required: "Pilih stok paket menu",
        },   
    delivery: {
        required: "Pilih ongkos kirim",
        },   
    about: {
        required: "Masukkan deskripsi",
        minlength: "Deskripsi minimal 10 karakter",
        maxlength: "Deskripsi maksimal 255 karakter",
        },
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "image" )
            error.appendTo(".imager");
        else if (element.attr("name") == "rname" )
            error.appendTo(".rnamer");
        else if (element.attr("name") == "name" )
            error.appendTo(".namer");
        else if (element.attr("name") == "price" )
            error.appendTo(".pricer");
        else if (element.attr("name") == "stock" )
            error.appendTo(".stocker");
        else if (element.attr("name") == "delivery" )
            error.appendTo(".deliveryer");
        else if (element.attr("name") == "about" )
            error.appendTo(".abouter");
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

tinymce.init({
    selector:'#about'
})
</script>