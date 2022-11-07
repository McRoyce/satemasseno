<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>"/>
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/fontawesome-free-6.1.1-web/css/all.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/animate.css-4.1.1/animate.min.css';?>">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aoscss"/>
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/styleuser.css'; ?>"/>
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/komi.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/snorlax.css'; ?>">
    
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/circletype.min.js';?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aosjs"></script>
</head>

<body>
    <nav class="animate__animated animate__fadeInDownBig">
        <div class="logo">
            <img src="<?php echo base_url().'assets/images/logo.png';?>" alt="logo">
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'home/index';?>"><span>Beranda</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'restaurant/index';?>"><span>Cabang Resto</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'about/index';?>"><span>Tentang Kami</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'contacts/index';?>"><span>Hubungi Kami</span></a>
            </li>
            <hr>
                <?php $user = $this->session->userdata('user'); 
                if(empty($user)) {
                ?>
            <li class="nav-item">
                <a class="btn login-button liquidlogin" href="<?php echo base_url().'login/index';?>">Masuk</a>
            <li class="nav-item">
                <a class="btn register-button liquidregister" href="<?php echo base_url().'singup/index'?>">Daftar</a>
            </li>
                <?php } else {?>
            <br>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'profile/';?>"><span>
                    <?php if ($user['foto'] != "" && file_exists('./public/uploads/users/thumb/'.$user['foto'])) { ?>
                        <img class="img-nav" height="20" width="20" src="<?php echo base_url().'public/uploads/users/thumb/'.$user['foto'];?>">
                    <?php } else { ?>
                        <i class="fa fa-user-circle"></i>
                    <?php } ?>
                <?php echo ucfirst($user['nama_p']); ?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'orders/';?>"><span><i class="fas fa-shopping-bag"></i> Pesanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);" onclick="logout()"><span><i class="fas fa-sign-out"></i> Keluar</span></a>
            </li>
                <?php } ?>
        </ul>
    </nav>
</body>

    <script>
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});

function logout() {
    if (confirm("Yakin ingin keluar dari pengguna?")) {
        window.location.href = '<?php echo base_url().'login/logout';?>';
    }
}
    </script>