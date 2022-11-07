<head>
    <title>Sate Mas Seno - Ubah Paket Menu</title>
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
    <form id="myForm" name="myForm" action="<?php echo base_url().'admin/menu/edit/'.$dish['id_pm'];?>" method="POST"
        class="card mx-auto" enctype="multipart/form-data">
        <h3 class="text-center"><span class="underline">Ubah Paket Menu</span></h3>
        <div class="avatar-upload2 mt-3">
                <div class="avatar-preview">
                        <?php if($dish['foto'] != "" && file_exists('./public/uploads/dishesh/'.$dish['foto'])) { ?>
                    <img id="imagePreview" src="<?php echo base_url().'public/uploads/dishesh/'.$dish['foto'];?>">
                        <?php } else { ?>
                    <img id="imagePreview" src="<?php echo base_url().'assets/images/icons/no-photo2.png';?>">
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
        <div class="form-group">
            <select name="rname" id="rname"
                class="form-control <?php echo (form_error('rname') != "") ? 'is-invalid' : '';?>">
                <option value="">-Pilih Cabang Resto-</option>
                <?php 
                if (!empty($stores)) { 
                    foreach($stores as $store) {
                ?>
                <option value="<?php echo $store['id_cr'];?>">
                    <?php echo set_select('rname', $store['nama_cr']);?>
                    <?php echo $store['nama_cr'];?>
                </option>
                <?php }
                    }
                ?>
            </select>
            <label class="input-label">Cabang Resto</label><i class="bar"></i>
            <span class="rnamer"></span>
            <?php echo form_error('rname');?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control 
                    <?php echo (form_error('name') != "") ? 'is-invalid' : '';?>" name="name" id="name"
                        value="<?php echo set_value('name', $dish['nama_pm']); ?>" autocomplete="off"
                            required>
                        <label class="input-label" for="name">Nama Paket Menu</label><i class="bar"></i>
                    <span class="namer"></span>
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                    <select class="form-control" name="stock" id="stock"
                        class="<?php echo (form_error('stock') != "") ? 'is-invalid' : '';?>">
                        <option value="">-Pilih Stok Menu-</option>
                        <option value="Tersedia" <?php echo $dish['stok'] == "Tersedia" ? "selected" : "";?>>Tersedia</option>
                        <option value="Habis" <?php echo $dish['stok'] == "Habis" ? "selected" : "";?>>Habis</option>
                    </select>
                    <label class="input-label">Stok Menu</label><i class="bar"></i>
                    <span class="stocker"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="Price" class="form-control 
                    <?php echo (form_error('price') != "") ? 'is-invalid' : '';?>" id="price" name="price"
                        value="<?php echo set_value('price', $dish['harga']); ?>" autocomplete="off"
                            required>
                        <label class="input-label" for="price">Harga</label><i class="bar"></i>
                    <span class="pricer"></span>
                    <?php echo form_error('price'); ?>
                </div>
                <div class="form-group">
                    <input type="Price" class="form-control 
                        <?php echo (form_error('delivery') != "") ? 'is-invalid' : '';?>" id="delivery" name="delivery"
                        value="<?php echo set_value('delivery', $dish['ongkir']); ?>" autocomplete="off"
                            required>
                        <label class="input-label" for="delivery">Ongkos Kirim</label><i class="bar"></i>
                    <span class="deliveryer"></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <p class="text-center">Deskripsi</p>
                    <textarea type="text" id="about" name="about" class="form-control 
                    <?php echo (form_error('about') != "") ? 'is-invalid' : '';?>" autocomplete="off"
                            required><?php echo set_value('about', $dish['deskripsi']); ?></textarea>
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
    function previewFile() {
  var preview = document.querySelector('div.avatar-upload2 img');
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