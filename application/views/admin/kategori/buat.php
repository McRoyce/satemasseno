<head>
    <title>Sate Mas Seno - Buat Kategori</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
</style>

<div class="col-md-8 card mx-auto animate__animated animate__fadeInLeftBig">
    <h3 class="text-center"><span class="underline">Buat Kategori</span></h3>
    <form action="<?php echo base_url().'admin/category/create_category';?>" class="container" method="POST" id="myForm">
        <div class="form-group mt-5">
            <input type="text" id="category" class="form-control" name="category"
                autocomplete="off" required>
            <label class="input-label" for="category">Kategori</label><i class="bar"></i>
            <?php echo form_error('category'); ?>
            <span class="categorier"></span>
        </div>
        <div class="text-center" style="margin-top:2rem;">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a class="btn btn-secondary" href="<?php echo base_url().'admin/category/index';?>">Batal</a>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: {
    category: {
        required: true,
        maxlength: 50,
        }
},
    messages: {
    category: {
        required: "Masukkan nama kategori",
        maxlength: "Nama kategori maksimal 50 karakter",
        }, 
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "category" )
            error.appendTo(".categorier");
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