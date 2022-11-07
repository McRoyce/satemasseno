
<style>
.card {
    width: 500px;
}
@media screen and (max-width: 800px) {
    .card {
    padding: 0 0;
    margin: auto auto;
    width: 100%;
  }
}
h6 {
    color:grey;
    text-transform: uppercase;
    font-size: medium;
    font-weight: lighter;
    margin-bottom: 5px;
}
h5 {
    font-size: large;
    font-weight:500;
    margin-bottom: 5px;
}
#p {
    display: block;
    color: #333;
    position: fixed;
    font-family: Roboto, sans-serif, FontAwesome;
    font-size: xx-small;
    top: 0;
}
</style>

<head>
    <title>Sate Mas Seno - Profil Saya</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<body>

<?php $loggedUser = $this->session->userdata('user');?>

<div class="animate__animated animate__fadeInDownBig">
    <h2 class="text-center text-white" style="background:#2ec06f">Profil Saya</h2>
    <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,266.7C240,256,300,192,360,160C420,128,480,128,540,154.7C600,181,660,235,720,250.7C780,267,840,245,900,208C960,171,1020,117,1080,117.3C1140,117,1200,171,1260,181.3C1320,192,1380,160,1410,144L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</div>

<div class="container">
<div class="card mt-4 mx-auto animate__animated animate__fadeInLeftBig">

    <a href="javascript:void(0)">
    <?php
        $images = array(
            "../assets/images/banners/breez20210222-3Y.gif", 
            "../assets/images/banners/marineliner.gif",
            "../assets/images/banners/orangehighway-v3.gif", 
            "../assets/images/banners/samezu0326F9.gif",
        );
    ?>
    <?php
        $random_image = array_rand($images);
    ?>
    <img class="img-banner" title="Animation created by 1041uuu - tumblr" src="<?php echo $images[$random_image]; ?>" />
    </a>

<div class="wrapper">
    <?php if($this->session->flashdata('pwd_success') != ""):?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle fa-beat"></i> <?php echo $this->session->flashdata('pwd_success');?>
    </div>
    <?php endif ?>
    <?php if($this->session->flashdata('pwd_error') != ""):?>
    <div class="alert alert-danger">
        <i class="fa fa-times-circle fa-beat"></i> <?php echo $this->session->flashdata('pwd_error');?>
    </div>
    <?php endif ?>

    <?php if($this->session->flashdata('success') != ""):?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle fa-beat"></i> <?php echo $this->session->flashdata('success');?>
    </div>
    <?php endif ?>
</div>
<div class="profile-card">
    <div class="text-center" style="position: sticky;">
            <?php if($user['foto'] != "" && file_exists('./public/uploads/users/'.$user['foto'])) { ?>
        <img class="img-profile grounded-radiants" height="200" width="200" src="<?php echo base_url().'public/uploads/users/'.$user['foto'];?>">
            <?php } else { ?>
        <a href="javascript:void(0)" title="User icons created by Becris - Flaticon">
        <img class="img-profile grounded-radiants" width="200" src="<?php echo base_url().'assets/images/icons/user.png';?>"></a>
            <?php } ?>
    </div>
    <div class="row profile-info">
        <div class="col-12" >
            <h4><?php echo $user['nama_d'].' '.$user['nama_b'] ?></h4>
            <p class="text-justify"><?php echo $user['alamat'] ?></p>
        </div>
        <div class="col-6" style="margin-top:-1rem;">
            <h6><strong>ID Pengguna</strong></h6>
            <?php 
            $nama = "PEL";
            $kode = $user['id_p'];
            $kode = sprintf("%03d", $kode);
            ?>
            <h5><?php echo $nama.$kode; ?></h5>
        </div>
        <div class="col-6" style="margin-top:-1rem;">
            <h6><strong>Nama Pengguna</strong></h6>
            <h5><?php echo $user['nama_p'] ?></h5>
        </div>
        <div class="col-6" style="margin-top:-1rem;">
            <h6><strong>Email</strong></h6>
            <h5><?php echo $user['email'] ?></h5>
        </div>
        <div class="col-6" style="margin-top:-1rem;">
            <h6><strong>Nomor Telepon</strong></h6>
            <h5><?php echo $user['telepon'] ?></h5>
        </div>
    </div>
</div>
<a href="<?php echo base_url().'profile/edit/'.$user['id_p']; ?>" class="custom-btn btn-card text-center">
<i class="fas fa-edit"></i> Ubah Info Profil</a>
</div>
</div>
