<style>
.card {
    max-width: 500px;
}
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
</style>

<head>
    <title>Sate Mas Seno - Ubah Kata Sandi</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Ubah Kata Sandi</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>

<div class="container">
    <div class="card mt-4 mx-auto animate__animated animate__fadeInLeftBig">
        <div class="wrapper">
            <?php if($this->session->flashdata('pwd_success') != ""):?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('pwd_success');?>
                </div>
            <?php endif ?>
            <?php if($this->session->flashdata('pwd_error') != ""):?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('pwd_error');?>
            </div>
            <?php endif ?>
            <?php $loggedUser = $this->session->userdata('user');?>
            <form action="<?php echo base_url().'profile/editPassword/'.$loggedUser['id_p']?>" method="POST" id="myForm" name="myForm">
                    <div class="form-group">
                        <input type="password"
                            class="form-control <?php echo (form_error('cPassword') != "") ? 'is-invalid' : '';?>"
                            name="cPassword" id="cPassword" value="<?php echo set_value('cPassword')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="cPassword">Kata Sandi Lama</label><i class="bar"></i>
                        <?php echo form_error('cPassword'); ?>
                        <span class="cPassworder"></span>
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control <?php echo (form_error('nPassword') != "") ? 'is-invalid' : '';?>"
                            name="nPassword" id="nPassword" value="<?php echo set_value('nPassword')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="nPassword">Kata Sandi Baru</label><i class="bar"></i>
                        <?php echo form_error('nPassword'); ?>
                        <span class="nPassworder"></span>
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control <?php echo (form_error('nRPassword') != "") ? 'is-invalid' : '';?>"
                            name="nRPassword" id="nRPassword" value="<?php echo set_value('nRPassword')?>" autocomplete="off"
                            required>
                        <label class="input-label" for="nRPassword">Ulangi Kata Sandi Baru</label><i class="bar"></i>
                        <?php echo form_error('nRPassword'); ?>
                        <span class="nRPassworder"></span>
                    </div>
                    <div class="text-center" style="margin-top:2rem;">
                        <button type="submit" class="btn green-button liquidgreen">Simpan</button>
                        <a href="<?php echo base_url().'profile' ?>" class="btn grey-button liquidgrey" style="text-decoration:none;">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: {
    cPassword: {
        required: true,
        minlength: 8,
        maxlength: 40,
        },
    nPassword: {
        required: true,
        minlength: 8,
        maxlength: 40,
        },
    nRPassword: {
        required: true,
        minlength: 8,
        maxlength: 40,
        equalTo: "#nPassword"
        },
},
    messages: {
    cPassword: {
        required: "Masukkan kata sandi lama",
        minlength: "Kata sandi lama minimal 8 karakter",
        maxlength: "Kata sandi lama maksimal 40 karakter",
        },
    nPassword: {
        required: "Masukkan kata sandi baru",
        minlength: "Kata sandi baru minimal 8 karakter",
        maxlength: "Kata sandi baru maksimal 40 karakter",
        },
    nRPassword: {
        required: "Ulangi kata sandi baru",
        minlength: "Kata sandi baru minimal 8 karakter",
        maxlength: "Kata sandi baru maksimal 40 karakter",
        equalTo: "Kata sandi baru tidak sama",
        },
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "cPassword" )
            error.appendTo(".cPassworder");
        else if (element.attr("name") == "nPassword" )
            error.appendTo(".nPassworder");
        else if (element.attr("name") == "nRPassword" )
            error.appendTo(".nRPassworder");
        else
            error.insertAfter(element);
    },
    
  });
});
</script>
