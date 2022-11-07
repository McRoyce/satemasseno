<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/styleadmin.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free-6.1.1-web/css/all.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/animate.css-4.1.1/animate.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/syncro.css';?>">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
    <link href="<?php echo base_url().'assets/css/datatables.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/komi.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/snorlax.css'; ?>">

    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/datatables.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/tinymce/js/tinymce/tinymce.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/tinymce/js/tinymce/plugins/table/plugin.dev.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/tinymce/js/tinymce/plugins/paste/plugin.dev.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/chart.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/syncro.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/circletype.min.js';?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

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
</div>

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
                    <a id="home" class="nav-link" href="<?php echo base_url().'admin/home/';?>"><span><i class="fas fa-dashboard"></i> Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a id="order" class="nav-link" href="<?php echo base_url().'admin/orders/';?>"><span><i class="fas fa-clipboard-list"></i> Pesanan</span></a>
                </li>
                <li class="nav-item">
                    <a id="user" class="nav-link" href="<?php echo base_url().'admin/user/';?>"><span><i class="fas fa-users"></i> Pelanggan</span></a>
                </li>
                <li class="nav-item">
                    <a id="admin" class="nav-link" href="<?php echo base_url().'admin/admin/';?>"><span><i class="fas fa-headset"></i> Admin</span></a>
                </li>
                <li class="nav-item">
                    <a id="menu" class="nav-link" href="<?php echo base_url().'admin/menu/';?>"><span><i class="fas fa-utensils"></i> Paket Menu</span></a>
                </li>
                <li class="nav-item">
                    <a id="res" class="nav-link" href="<?php echo base_url().'admin/store/';?>"><span><i class="fas fa-store"></i> Cabang Resto</span></a>
                </li>
                <li class="nav-item">
                    <a id="cat" class="nav-link" href="<?php echo base_url().'admin/category/';?>"><span><i class="fas fa-list"></i> Kategori</span></a>
                </li>
                <li class="nav-item">
                    <a id="order" class="nav-link" href="javascript:void(0);" onclick="logout()"><span><i class="fas fa-sign-out"></i> Keluar</span></a>
                </li>
        </ul>
    </nav>

<?php $admin = $this->session->userdata('admin'); ?>
<div class="row d-flex justify-content-between" style="margin-left: 1.5rem;margin-right:1.5rem">
    <div class="d-flex justify-content-between animate__animated animate__fadeInLeftBig animate__delay-1s">
        <div class="img">
            <?php if($admin['foto'] != "" && file_exists('./public/uploads/admins/thumb/'.$admin['foto'])) { ?>
            <img class="imgprofile" height="35" width="35" src="<?php echo base_url().'public/uploads/admins/thumb/'.$admin['foto'];?>">
            <?php } else { ?>
            <a href="javascript:void(0)" title="User icons created by Becris - Flaticon">
            <img class="imgprofile" width="35" src="<?php echo base_url().'assets/images/icons/user.png';?>"></a>
            <?php } ?>
        </div>
        <div style="margin-left: 0.5rem;">
            <h6 class="mb-0" style="font-size: medium;"><b><?php echo ucfirst($admin['nama_a']); ?></b></h6>
            <?php 
            $nama = "ADM";
            $kode = $admin['id_a'];
            $kode = sprintf("%03d", $kode);
            ?>
            <h6 style="font-size: small;"><?php echo $nama.$kode; ?></h6>
        </div>
    </div>
    <div class="animate__animated animate__fadeInRightBig animate__delay-1s">
        <h6 id="time" class="time mb-0" style="font-size: small;"></h6>
        <h6 id="date" class="date mb-0" style="font-size: small;"></h6>
    </div>
</div>

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
    if (confirm("Yakin ingin keluar dari admin?")) {
        window.location.href = '<?php echo base_url().'admin/login/logout';?>';
    }
}
</script>

<script>
    var today = new Date();
var day = today.getDate();
var month = today.getMonth() + 1;

function appendZero(value) {
    return "0" + value;
}

function theTime() {
    var d = new Date();
    document.getElementById("time").innerHTML = d.toLocaleTimeString("sg-SG");
}

if (day < 10) {
    day = appendZero(day);
}

if (month < 10) {
    month = appendZero(month);
}

today = day + "/" + month + "/" + today.getFullYear();

document.getElementById("date").innerHTML = today;

var myVar = setInterval(function () {
    theTime();
}, 1000);
</script>