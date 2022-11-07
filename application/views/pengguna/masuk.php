<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sate Mas Seno - Masuk</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/fontawesome-free-6.1.1-web/css/all.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/animate.css-4.1.1/animate.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/formuser.css';?>">

    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
</head>

<style>
.wrapper {
  background-color: rgba(255, 255, 255);
  padding: 20px 40px 10px 40px;
  margin: 20vh auto;
  position:relative;
  overflow: hidden; 
  border-radius: 20px;
  width: 450px;
  height: auto;
}
@media (max-width: 600px) {
  .wrapper {
    padding: 20px 20px;
  }
}
.error-msg {
    color: red;
    position: absolute;
    font-size: smaller;
}
</style>

<div id="background-wrap">
<section>
<svg id="sea" width="127px" height="199px" viewBox="0 0 127 199" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> 
    <defs>
        <linearGradient x1="0%" y1="57.2855017%" x2="100%" y2="41.2823838%" id="sea-linearGradient-1">
            <stop stop-color="#EE5C18" offset="0%"></stop>
            <stop stop-color="#F8702E" offset="100%"></stop>
        </linearGradient>
        <linearGradient x1="93.1640625%" y1="26.858724%" x2="10.016276%" y2="77.1484375%" id="sea-linearGradient-2">
            <stop stop-color="#F8702E" offset="0%"></stop>
            <stop stop-color="#EE5C18" offset="100%"></stop>
        </linearGradient>
        <circle id="sea-path-3" cx="17" cy="19" r="14"></circle>
        <filter x="-3.6%" y="-7.1%" width="114.3%" height="114.3%" filterUnits="objectBoundingBox" id="sea-filter-4">
            <feOffset dx="1" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
            <feGaussianBlur stdDeviation="0.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
            <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.2 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
        </filter>
    </defs>
    <g id="sea-Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="sea-Sea" transform="translate(-0.000000, 1.000000)">
            <g id="sea-Boat" transform="translate(4.000000, 0.000000)">
                <path d="M56.800509,2 L66.194719,0 C89.1122159,44.7695578 102.77354,76.9781964 107.178691,96.6259157 C114.428043,128.959249 110.467351,162.75061 95.2966176,198 L18.3044003,197 C3.27668543,161.779389 -0.684005754,128.32136 6.42232676,96.6259157 C13.5286593,64.930471 30.3213867,33.3884991 56.800509,2 Z" id="sea-Shadow" fill="#338BAF"></path>
                <path d="M7,178 C3.13400675,178 0,174.865993 0,171 C0,168.929627 0.898824688,167.069185 2.32754807,165.787602 C2.11274093,164.725183 2,163.625758 2,162.5 C2,153.387302 9.38730163,146 18.5,146 C27.6126984,146 35,153.387302 35,162.5 C35,171.612698 27.6126984,179 18.5,179 C15.6433792,179 12.9563094,178.274066 10.6132037,176.996612 C9.55843235,177.63352 8.32201414,178 7,178 Z" id="sea-RP-Shadow-water" fill="#338BAF"></path>
                <path d="M66.800509,2 C93.1366123,32.7506105 109.92934,64.2925824 117.178691,96.6259157 C124.428043,128.959249 120.467351,162.083944 105.296618,196 L28.3044003,196 C13.2766854,161.446055 9.31599425,128.32136 16.4223268,96.6259157 C23.5286593,64.930471 40.3213867,33.3884991 66.800509,2 Z" id="sea-Inside-right" fill="#DCCEC8"></path>
                <path d="M69.2311984,3 C90.3151803,33.3333333 104.481847,64.6666667 111.731198,97 C118.98055,129.333333 116.313883,162.833333 103.731198,197.5 L26.7311984,197.5 C11.7766044,161.946055 7.85247365,128.32136 14.9588062,96.6259157 C22.0651387,64.930471 40.1559361,33.7218324 69.2311984,3 Z" id="sea-Outside-left" fill="#E2D5CF"></path>
                <path d="M80.8807042,21.1315806 C82.0112385,22.7137673 82.852189,23.9009837 83.4035554,24.6932297 C99.7764298,48.2190437 110.701475,72.1966057 116.178691,96.6259157 C123.428043,128.959249 119.467351,162.083944 104.296618,196 L49,196 L51.5,29 L80.8807042,21.1315806 Z" id="sea-Deck-Shadow-right" fill="#A88A7E"></path>
                <path d="M67.5,33.5 L68.5136719,196 L28.3044003,196 C13.2766854,161.446055 9.31599425,128.32136 16.4223268,96.6259157 C20.897473,76.6660068 29.2139843,56.766961 41.3718607,36.9287784 C41.7872721,36.2509456 42.6170695,35.3156717 43.861253,34.1229567 L67.5,33.5 Z" id="sea-Deck-Shadow-left" fill="#A88A7E"></path>
                <path d="M32.439063,51.0292969 L68.694719,50.9439832 L66.8340375,192 L28.4310234,192 C13.4033085,160.112722 9.44261737,128.32136 16.5489499,96.6259157 C18.7217574,86.9348268 24.0184618,71.7359539 32.439063,51.0292969 Z" id="sea-Deck-left" fill="#CBAA9D"></path>
                <path d="M53.5914091,192 L53,50.9495342 L86.89666,50.8697715 C87.3929814,51.6118741 87.7404429,52.1788795 87.9390443,52.5707874 C95.2961537,67.0888578 100.639669,81.7739006 103.969591,96.6259157 C111.218943,128.959249 107.258252,160.75061 92.0875178,192 L53.5914091,192 Z" id="sea-Deck-right" fill="#CBAA9D"></path>
                <polygon id="sea-Top-Deck" fill="#E1C3B7" points="66.6057899 2 99.5 49 34 49"></polygon>
                <path d="M69,2 C79.3560897,15.60179 86.8560897,25.9351233 91.5,33 C96.1439103,40.0648767 99.310577,45.39821 101,49 L93.5,49 C89.2995927,41.4467581 85.4662594,34.9467581 82,29.5 C78.5337406,24.0532419 72.867074,16.2199086 65,6 L69,2 Z" id="sea-Top-Deck-Shadow" fill="#C3A69B"></path>
                <path d="M68.5,2 C73.5,8 79.3338877,15.1115983 85.5,24 C92.9087072,34.6795924 99.5,47.5 100.5,49 L97.5,49 C93.2995927,41.4467581 87.9662594,32.9467581 84.5,27.5 C81.0337406,22.0532419 74.867074,14.7199086 67,4.5 L68.5,2 Z" id="sea-Top-Deck-Inside" fill="#DCCEC8"></path>
                <path d="M54.8473595,141.934851 C80.6157865,137.311617 91.5,141.666667 87.5,155 C81.5,175 82,181.5 73,178 C67,175.666667 67.6666667,168.5 75,156.5 C82,146.166667 77.3333333,142.666667 61,146 C44.6666667,149.333333 42.6157865,147.978284 54.8473595,141.934851 Z" id="sea-RP-Shadow-Tail" fill-opacity="0.5" fill="#A88A7E"></path>
                <path d="M40.2285714,178 C54.7142114,178 65,163.721176 65,152.418605 C65,141.116033 54.2284972,134 39.7428571,134 C25.2572171,134 14,146.232312 14,157.534884 C14,168.837455 25.7429314,178 40.2285714,178 Z" id="sea-RP-Shadow-Body" fill-opacity="0.5" fill="#A88A7E"></path>
                <g id="sea-Body" transform="translate(13.000000, 132.000000)">
                    <g id="sea-Tail" transform="translate(35.990969, 5.149352)">
                        <path d="M7.85639081,1.78549926 C33.6248178,-2.83773464 44.5090313,1.51731508 40.5090313,14.8506484 C34.5090313,34.8506484 35.0090313,41.3506484 26.0090313,37.8506484 C20.0090313,35.5173151 20.675698,28.3506484 28.0090313,16.3506484 C35.0090313,6.01731508 30.3423646,2.51731508 14.0090313,5.85064841 C-2.32430205,9.18398174 -4.37518221,7.82893203 7.85639081,1.78549926 Z" id="sea-Path-Copy" fill="#FDF0DC"></path>
                        <path d="M22.0844449,30.0857613 C23.0552633,32.8492649 27.2161705,36.375749 32.8532025,37.5080017 C31.3204686,39.0732024 29.2997889,39.1303875 26.0090313,37.8506484 C22.8339054,36.6158772 21.52571,34.0275815 22.0844449,30.0857613 Z M36.4506174,29.2359557 C32.2979429,29.5157405 27.9723796,28.1530827 23.4739277,25.1479823 C24.1348086,23.4651912 25.0119238,21.6256301 26.1052734,19.6292992 C28.3067582,21.049495 30.1080109,21.9566114 31.5090313,22.3506484 C33.1962757,22.8251859 35.4639892,22.8821024 38.3121718,22.5213978 C37.6076129,25.0761635 37.0077845,27.3098212 36.4506174,29.2359557 Z M40.97637,13.0206448 C39.4583146,14.4224393 37.6366513,15.475186 35.5090313,15.8506484 C34.1607834,16.0885745 31.9382752,15.8266886 28.8415068,15.0649906 C30.3235468,12.6583399 31.0947715,10.6680239 31.1551808,9.09404256 C36.6033562,9.71567147 39.2388404,8.00482481 39.0616335,3.96150258 C41.1466538,6.10850986 41.7848993,9.12822393 40.97637,13.0206448 Z M26.0888899,0.0157915688 C26.6424315,1.01279069 26.6489995,2.59094908 26.1085942,4.75026675 C24.5145026,4.56289537 22.5430484,4.59655066 20.1942316,4.8512326 C20.2937349,3.36328788 19.8611471,1.83672672 18.896468,0.271549106 C21.5250999,0.046860205 23.9225738,-0.0383923073 26.0888899,0.0157915688 Z" id="sea-Combined-Shape" fill="#9E1B00"></path>
                    </g>
                    <path d="M27,43 C41.9116882,43 52.5,29.045695 52.5,18 C52.5,6.954305 41.4116882,-2.48689958e-14 26.5,-2.48689958e-14 C11.5883118,-2.48689958e-14 3.55271368e-15,11.954305 3.55271368e-15,23 C3.55271368e-15,34.045695 12.0883118,43 27,43 Z" id="sea-Oval" fill="url(#sea-linearGradient-1)"></path>
                </g>
                <path d="M66.800509,2 C93.1366123,32.7506105 109.92934,64.2925824 117.178691,96.6259157 C124.428043,128.959249 120.467351,162.083944 105.296618,196 L28.3044003,196 C13.2766854,161.446055 9.31599425,128.32136 16.4223268,96.6259157 C23.5286593,64.930471 40.3213867,33.3884991 66.800509,2 Z" id="sea-Rim" stroke="#F2E8E4" stroke-width="3"></path>
            </g>
            <g id="sea-RedPanda" transform="translate(0.000000, 143.566162)">
                <g id="sea-Head" transform="translate(0.000000, 0.433838)">
                    <g id="sea-Oval">
                        <use fill="black" fill-opacity="1" filter="url(#sea-filter-4)" xlink:href="#sea-path-3"></use>
                        <use fill="url(#sea-linearGradient-2)" fill-rule="evenodd" xlink:href="#sea-path-3"></use>
                    </g>
                    <ellipse id="sea-Oval" fill="#FDF0DC" cx="4.5" cy="20" rx="4.5" ry="6"></ellipse>
                    <ellipse id="sea-Oval" fill="#494949" cx="2.5" cy="20.5" rx="1.5" ry="2.5"></ellipse>
                    <circle id="sea-Oval" fill="#494949" cx="9.5" cy="16.5" r="1.5"></circle>
                    <circle id="sea-Oval-Copy" fill="#494949" cx="9.5" cy="23.5" r="1.5"></circle>
                    <path d="M17.1235794,11.5661621 C19.4557171,11.5661621 22.284668,9.32758586 22.284668,6.56616211 C22.284668,3.80473836 19.4557171,1.56616211 17.1235794,1.56616211 C16.9320874,1.56616211 16.6524503,1.59905197 16.284668,1.66483169 C17.2418999,3.13456716 17.7205158,4.67653914 17.7205158,6.29074762 C17.7205158,7.95449123 17.3015729,9.69273117 16.4636871,11.5054674 C16.7539578,11.5459306 16.9739219,11.5661621 17.1235794,11.5661621 Z" id="sea-Oval-Copy-4" fill="#FDF0DC" transform="translate(19.284668, 6.566162) rotate(-46.000000) translate(-19.284668, -6.566162) "></path>
                    <path d="M17.1235794,11.5661621 C19.4557171,11.5661621 22.284668,9.32758586 22.284668,6.56616211 C22.284668,3.80473836 19.4557171,1.56616211 17.1235794,1.56616211 C16.9320874,1.56616211 16.6524503,1.59905197 16.284668,1.66483169 C17.535841,3.31817683 18.1614275,4.95195363 18.1614275,6.56616211 C18.1614275,8.22990573 17.595514,9.87634083 16.4636871,11.5054674 C16.7539578,11.5459306 16.9739219,11.5661621 17.1235794,11.5661621 Z" id="sea-Oval" fill="#9E1B00" transform="translate(19.284668, 6.566162) rotate(-46.000000) translate(-19.284668, -6.566162) "></path>
                    <path d="M17.1880325,36.2058105 C19.5201702,36.2058105 22.3491211,33.9672343 22.3491211,31.2058105 C22.3491211,28.4443868 19.5201702,26.2058105 17.1880325,26.2058105 C16.9965405,26.2058105 16.7169034,26.2387004 16.3491211,26.3044801 C17.1460772,28.046392 17.5445553,29.7244522 17.5445553,31.3386607 C17.5445553,33.0024043 17.2057503,34.604556 16.5281402,36.1451159 C16.8184109,36.185579 17.038375,36.2058105 17.1880325,36.2058105 Z" id="sea-Oval-Copy-3" fill="#FDF0DC" transform="translate(19.349121, 31.205811) rotate(46.000000) translate(-19.349121, -31.205811) "></path>
                    <path d="M17.1880325,36.2058105 C19.5201702,36.2058105 22.3491211,33.9672343 22.3491211,31.2058105 C22.3491211,28.4443868 19.5201702,26.2058105 17.1880325,26.2058105 C16.9965405,26.2058105 16.7169034,26.2387004 16.3491211,26.3044801 C17.6002941,27.9578253 18.2258806,29.5916021 18.2258806,31.2058105 C18.2258806,32.8695542 17.6599671,34.5159893 16.5281402,36.1451159 C16.8184109,36.185579 17.038375,36.2058105 17.1880325,36.2058105 Z" id="sea-Oval-Copy-2" fill="#9E1B00" transform="translate(19.349121, 31.205811) rotate(46.000000) translate(-19.349121, -31.205811) "></path>
                </g>
            </g>
        </g>
    </g>
  <div id="raindrop"></div>
  <div id="raindrop2"></div>
  <div id="raindrop3"></div>
  <div id="raindrop4"></div>
  <div id="raindrop5"></div>
  <div id="raindrop6"></div>
  <div id="raindrop7"></div>
  <div id="raindrop8"></div>
  <div id="raindrop9"></div>
  <div id="raindrop10"></div>
  <div id="raindrop11"></div>
  <div id="raindrop12"></div>
  <div id="raindrop13"></div>
  <div id="raindrop14"></div>
  <div id="raindrop15"></div>
  <p style="bottom:-1rem;position:absolute;font-size:xx-small;">Copyright &copy; <?php echo date("Y"); ?> by Gregory Koberger</p>
</section>
</svg>
</div>

<body>
</div>
    <div class="wrapper animate__animated animate__bounceInDown">
        <?php
        if (!empty($this->session->flashdata('success'))) {
          echo "<div class='alert alert-success m-3 mx-auto'>
          <i class='fa fa-check-circle fa-beat'></i>".' '.$this->session->flashdata('success')."</div>";
        }
        ?>
        <?php
        if (!empty($this->session->flashdata('msg'))) {
          echo "<div class='alert alert-danger m-3 mx-auto'>
          <i class='fa fa-times-circle fa-beat'></i>".' '.$this->session->flashdata('msg')."</div>";
        }
        ?>
        <h3 class="text-center"><span class="underline">Masuk</span></h3>
        <form action="<?php echo base_url().'login/authenticate' ;?>" name="myForm" id="myForm" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" autocomplete="off"
                            required>
                <label class="input-label" for="username">Nama Pengguna</label><i class="bar"></i>
                <span class="usernamer"></span>
            </div>
            <?php echo form_error('username'); ?>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" autocomplete="off"
                            required>
                <label class="input-label" for="password">Kata Sandi</label><i class="bar"></i>
                <span class="passworder"></span>
            </div>
            <?php echo form_error('password'); ?>
            <div class="text-center">
                <button type="submit" class="btn green-button liquidgreen">Masuk</button>
                <p style="margin-top:1rem;">Belum punya akun? 
                <a href="<?php echo base_url().'singup/index';?>">Daftar disini!</a></p>
            </div>
        </form>
    </div>

<script>
$(document).ready(function(){
  $("#myForm").validate({
    
    // Specify validation rules
    rules: {
    username: {
        required: true,
        minlength: 6,
        maxlength: 30,
        uname: true,
        }, 
    password: {
        required: true,
        minlength: 8,
        maxlength: 40,
        },
},
    messages: {
    username: {
        required: "Masukkan nama pengguna",
        minlength: "Nama pengguna minimal 6 karakter",
        maxlength: "Nama pengguna maksimal 30 karakter",
        },
    password: {
        required: "Masukkan kata sandi",
        minlength: "Kata sandi minimal 8 karakter",
        maxlength: "Kata sandi maksimal 40 karakter",
        },
    },
    errorElement: "span",
    errorClass: "error-msg",
    errorPlacement: function (error, element) {
        if (element.attr("name") == "image" )
            error.appendTo(".imager");
        else if (element.attr("name") == "username" )
            error.appendTo(".usernamer");
        else if (element.attr("name") == "password" )
            error.appendTo(".passworder");
        else
            error.insertAfter(element);
    },
    
  });
    jQuery.validator.addMethod("uname", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/.test(value);
    }, "Masukkan nama pengguna yang valid");
});
</script>

</html>