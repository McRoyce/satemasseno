<head>
    <title>Sate Mas Seno - Dashboard</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
</head>

<style>
select{
  width: 80px !important;
}
#h3 {
  text-align: center;
  display: block;
  color: #c4bcdc;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
}
#p {
  text-align: center;
  display: block;
  color: #c4bcdc;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
  font-size: xx-small !important;
}
#h32 {
  text-align: center;
  display: block;
  color: #c4bcdc;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
}
#p2 {
  text-align: center;
  display: block;
  color: #c4bcdc;
  position: relative;
  font-family: Roboto, sans-serif, FontAwesome;
  font-size: xx-small !important;
}
</style>

<div class="container animate__animated animate__fadeInLeftBig">
<?php $admin = $this->session->userdata('admin'); ?>
<div class="row">
    <div class="col-lg-6">
        <div class="card" style="height: 400px;">
            <canvas id="Canvas"></canvas>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card text-center" style="height: 400px;">
         
        <div class="container-calendar">
            <button class="btn btn-info" id="previous" onclick="previous()"><i class="fa fa-angle-left"></i></button>
            <button class="btn btn-info" id="next" onclick="next()"><i class="fa fa-angle-right"></i></button>
            <h3 id="monthAndYear"></h5>
            <br>
        <table class="table-calendar" id="calendar" data-lang="id">
            <thead id="thead-month"></thead>
            <tbody id="calendar-body"></tbody>
        </table> 
            <div class="footer-container-calendar">
             <label for="month">Pilih Tanggal </label>
             <select id="month" onchange="jump()" class="form-control">
                 <option value=0>Jan</option>
                 <option value=1>Feb</option>
                 <option value=2>Mar</option>
                 <option value=3>Apr</option>
                 <option value=4>Mei</option>
                 <option value=5>Jun</option>
                 <option value=6>Jul</option>
                 <option value=7>Agu</option>
                 <option value=8>Sep</option>
                 <option value=9>Okt</option>
                 <option value=10>Nov</option>
                 <option value=11>Des</option>
             </select>

             <select id="year" onchange="jump()" class="form-control"></select>
            </div>       
        </div>

        </div>
    </div>
</div>
    <div class="row">

    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div 
                data-stepped-bar='{"title": "Stok Paket Menu", "catagories": [ { "name": "Paket Menu Tersedia", "value": <?php echo $countReady; ?>, "color": "rgba(75, 192, 192, 1)" }, { "name": "Paket Menu Habis", "value": <?php echo $countSoldout; ?>, "color": "rgba(255, 99, 132, 1)" } ]}'>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div 
                data-stepped-bar='{"title": "Status Cabang Resto", "catagories": [ { "name": "Cab Resto Buka", "value": <?php echo $countOpen; ?>, "color": "rgba(75, 192, 192, 1)" }, { "name": "Cab Resto Tutup", "value": <?php echo $countClose; ?>, "color": "rgba(255, 99, 132, 1)" } ]}'>
            </div>
        </div>
    </div>

        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="media">
                    <div class="media-body media-text-left">
                        <h3><?php echo $countOrders; ?></h3>
                        <h6 class="m-b-0">Pesanan</h6>
                    </div>
                    <div class="media-left media-middle">
                        <span>
                            <a href="javascript:void(0)" title="Checklist icons created by Freepik - Flaticon">
                            <img src="<?php echo base_url().'assets/images/icons/checklist.png';?>" height="70"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="media">
                    <div class="media-body media-text-left">
                        <h3><?php echo $countUser; ?></h3>
                        <h6 class="m-b-0">Pelanggan</h6>
                    </div>
                    <div class="media-left media-middle">
                        <span>
                            <a href="javascript:void(0)" title="User icons created by Freepik - Flaticon">
                            <img src="<?php echo base_url().'assets/images/icons/man.png';?>" height="70"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="media">
                    <div class="media-body media-text-left">
                        <h3><?php echo $countAdmin; ?></h3>
                        <h6 class="m-b-0">Admin</h6>
                    </div>
                    <div class="media-left media-middle">
                        <span>
                            <a href="javascript:void(0)" title="Admin icons created by Freepik - Flaticon">
                            <img src="<?php echo base_url().'assets/images/icons/admin.png';?>" height="70"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="media">
                    <div class="media-body media-text-left">
                        <h3><?php echo $countDish; ?></h3>
                        <h6 class="m-b-0">Paket Menu</h6>
                    </div>
                    <div class="media-left media-middle">
                        <span>
                            <a href="javascript:void(0)" title="Spoon icons created by Freepik - Flaticon">
                            <img src="<?php echo base_url().'assets/images/icons/fork.png';?>" height="70"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="media">
                    <div class="media-body media-text-left">
                        <h3><?php echo $countStore; ?></h3>
                        <h6 class="m-b-0">Cabang Resto</h6>
                    </div>
                    <div class="media-left media-middle">
                        <span>
                            <a href="javascript:void(0)" title="Restaurant icons created by Freepik - Flaticon">
                            <img src="<?php echo base_url().'assets/images/icons/cafe.png';?>" height="70"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="media">
                    <div class="media-body media-text-left">
                        <h3><?php echo $countCategory; ?></h3>
                        <h6 class="m-b-0">Kategori</h6>
                    </div>
                    <div class="media-left media-middle">
                        <span>
                            <a href="javascript:void(0)" title="List icons created by Freepik - Flaticon">
                            <img src="<?php echo base_url().'assets/images/icons/list.png';?>" height="70"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
        <div class="card">
            <canvas id="Canvas2"></canvas>
        </div>
            <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center"><span class="underline">Laporan Cabang Resto</span></h3>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Cab Resto</th>
                                <th>Nama Cab Resto</th>
                                <th>Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php if(!empty($resReport)) {?>
                            <?php foreach($resReport as $report) { ?>
                            <tr>                        
                                <?php 
                                $nama = "CAB";
                                $kode = $report->id_cr;
                                $kode = sprintf("%03d", $kode);
                                ?>
                                <td><?php echo $nama.$kode; ?></td>
                                <td><?php echo $report->nama_cr; ?></td>
                                <td><?php echo 'Rp'.number_format("$report->harga",2,",","."); ?></td>
                            </tr>
                            <?php } ?>
                            <?php } else {?>
                            <tr>
                                <td colspan="4">
                                
<div class="body2 text-center">
<h3 id="h3">Belum ada laporan nih...</h3>
  <div class="komi" style="bottom:3rem">
    <div class="komi-head">
    <div class="komi-hair-back">
      <div class="komi-hair-back-1"></div>
    </div>
    <div class="komi-ear komi-ear-left"></div>
    <div class="komi-ear komi-ear-right"></div>
    <div class="komi-cat-ear komi-cat-ear-left">
      <div class="komi-cat-ear-fur"></div>
    </div>
    <div class="komi-cat-ear komi-cat-ear-right">
      <div class="komi-cat-ear-fur"></div>
    </div>
      <div class="komi-hair-strand"></div>
      <div class="komi-face"></div>
    <div class="komi-hair-bangs">
      <div class="komi-hair-bangs-1"></div>
      <div class="komi-hair-bangs-2"></div>
      <div class="komi-hair-bangs-3"></div>
    </div>
    <div class="komi-face-inner">
      <div class="komi-eye komi-eye-left">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-eye komi-eye-right">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-blush komi-blush-left"></div>
      <div class="komi-blush komi-blush-right"></div>
    </div>
  </div>
  <div class="komi-panel">
    <div class="komi-hair-extension"></div>
    <div class="komi-body">
      <div class="komi-neck">
        <div class="komi-neck-shadow"></div>
        <div class="komi-collar komi-collar-left"></div>
        <div class="komi-collar komi-collar-right"></div>
        <div class="komi-bow">
          <div class="komi-bow-top">
            <div class="komi-bow-top-shadow"></div>
          </div>
          <div class="komi-bow-bottom"></div>
        </div>
      </div>
      <div class="komi-shirt">
        <div class="komi-shirt-sleeves"></div>
        <div class="komi-shirt-sleeves-shadow"></div>
      </div>
    </div>
  </div>
  <p id="p" style="margin-bottom:-5rem">Copyright &copy; <?php echo date("Y"); ?> by tiffany choong</p>
  <div class="komi-zigzag komi-zigzag-1"></div>
  <div class="komi-zigzag komi-zigzag-2"></div>
  <div class="komi-zigzag komi-zigzag-3"></div>
  <div class="komi-zigzag komi-zigzag-4"></div>
  <div class="komi-zigzag komi-zigzag-5"></div>
  <div class="komi-zigzag komi-zigzag-6"></div>
  <div class="komi-zigzag komi-zigzag-7"></div>
  <div class="komi-zigzag komi-zigzag-8"></div>
  <div class="komi-zigzag komi-zigzag-9"></div>
  <div class="komi-zigzag komi-zigzag-10"></div>
  <div lang="ja" class="komi-buruburu">
    <span class="komi-buruburu-character komi-buruburu-character-1">
      ブ
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-2">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-3">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-4">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-5">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-6">
      ル
    </span>
  </div>
</div>
</div>

                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 text-center">
                    <a href="<?php $id=1; echo base_url().'admin/home/generate_pdf/'.$id; ?>"
                        class="btn btn-info"><i class="fas fa-download fa-bounce"></i> Unduh Laporan</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
        <div class="card">
            <canvas id="Canvas3"></canvas>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center"><span class="underline">Laporan Paket Menu</span></h3>
                </div>
                <div class="underline-title2"></div>
                <div class="col-md-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Paket Menu</th>
                                <th>Nama Paket Menu</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php if(!empty($dishReport)) {?>
                            <?php foreach($dishReport as $report) { ?>
                            <tr>
                                <?php 
                                $nama = "MNU";
                                $kode = $report->id_cr;
                                $kode2 = $report->id_pm;
                                $kode = sprintf("%03d", $kode);
                                $kode2 = sprintf("%03d", $kode2);
                                ?>
                                <td><?php echo $nama.$kode.$kode2; ?></td>
                                <td><?php echo $report->nama_pm; ?></td>
                                <td><?php echo $report->qty; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } else {?>
                            <tr>
                                <td colspan="4">

<div class="body2 text-center">
<h3 id="h32">Belum ada laporan nih...</h3>
  <div class="komi" style="bottom:3rem">
    <div class="komi-head">
    <div class="komi-hair-back">
      <div class="komi-hair-back-1"></div>
    </div>
    <div class="komi-ear komi-ear-left"></div>
    <div class="komi-ear komi-ear-right"></div>
    <div class="komi-cat-ear komi-cat-ear-left">
      <div class="komi-cat-ear-fur"></div>
    </div>
    <div class="komi-cat-ear komi-cat-ear-right">
      <div class="komi-cat-ear-fur"></div>
    </div>
      <div class="komi-hair-strand"></div>
      <div class="komi-face"></div>
    <div class="komi-hair-bangs">
      <div class="komi-hair-bangs-1"></div>
      <div class="komi-hair-bangs-2"></div>
      <div class="komi-hair-bangs-3"></div>
    </div>
    <div class="komi-face-inner">
      <div class="komi-eye komi-eye-left">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-eye komi-eye-right">
        <div class="komi-eye-pupil">
          <div class="komi-eye-sparkle"></div>
        </div>
      </div>
      <div class="komi-blush komi-blush-left"></div>
      <div class="komi-blush komi-blush-right"></div>
    </div>
  </div>
  <div class="komi-panel">
    <div class="komi-hair-extension"></div>
    <div class="komi-body">
      <div class="komi-neck">
        <div class="komi-neck-shadow"></div>
        <div class="komi-collar komi-collar-left"></div>
        <div class="komi-collar komi-collar-right"></div>
        <div class="komi-bow">
          <div class="komi-bow-top">
            <div class="komi-bow-top-shadow"></div>
          </div>
          <div class="komi-bow-bottom"></div>
        </div>
      </div>
      <div class="komi-shirt">
        <div class="komi-shirt-sleeves"></div>
        <div class="komi-shirt-sleeves-shadow"></div>
      </div>
    </div>
  </div>
  <p id="p2" style="margin-bottom:-5rem">Copyright &copy; <?php echo date("Y"); ?> by tiffany choong</p>
  <div class="komi-zigzag komi-zigzag-1"></div>
  <div class="komi-zigzag komi-zigzag-2"></div>
  <div class="komi-zigzag komi-zigzag-3"></div>
  <div class="komi-zigzag komi-zigzag-4"></div>
  <div class="komi-zigzag komi-zigzag-5"></div>
  <div class="komi-zigzag komi-zigzag-6"></div>
  <div class="komi-zigzag komi-zigzag-7"></div>
  <div class="komi-zigzag komi-zigzag-8"></div>
  <div class="komi-zigzag komi-zigzag-9"></div>
  <div class="komi-zigzag komi-zigzag-10"></div>
  <div lang="ja" class="komi-buruburu">
    <span class="komi-buruburu-character komi-buruburu-character-1">
      ブ
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-2">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-3">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-4">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-5">
      ル
    </span>
    <span class="komi-buruburu-character komi-buruburu-character-6">
      ル
    </span>
  </div>
</div>
</div>

                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 text-center">
                    <a href="<?php $id=2; echo base_url().'admin/home/generate_pdf/'.$id; ?>"
                        class="btn btn-info"><i class="fas fa-download fa-bounce"></i> Unduh Laporan</a>
                </div>
            </div>
            </div>
        </div>
    </div>

    <section>
        <ul class="center">
            <li>
                <i class="button fa fa-play" onclick="funcToggle()"></i>
            </li>
        </ul>
            <iframe class="cont hidden" width="300" height="170" src="https://www.youtube-nocookie.com/embed/jfKfPfyJRdk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>
</div>

<script>
        var ctx = document.getElementById("Canvas").getContext("2d");
        var myChart = new Chart(ctx,{
            type: 'doughnut', 
            data : {
            labels:[
                  'Pesanan Menunggu',
                  'Pesanan Diproses',
                  'Pesanan Dikirim',
                  'Pesanan Berhasil',
                  'Pesanan Batal',],
            datasets: [{
            data:[  
                <?php echo $countPendingOrders; ?>,
                <?php echo $countProcessOrders; ?>,
                <?php echo $countDeliveringOrders; ?>,
                <?php echo $countDeliveredOrders; ?>,
                <?php echo $countRejectedOrders; ?>,],
        backgroundColor:[
                'rgba(162, 181, 187,1)',
                'rgba(255, 206, 86, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',],
            }],
    },
    options: {
    maintainAspectRatio :false,
    plugins: {
        title: {
            display: true,
            text: 'Status Pesanan',
            color: 'white',
            font: {
                size: 18
                }
            },
        legend: {
            position: 'right',
            labels: {
            color: 'white',
        }
      }
    }
  }
}
);

</script>

<script>
var ctx = document.getElementById('Canvas2');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[<?php foreach($resReport as $report) {echo "'" .$report->nama_cr ."',";}?>],
        datasets: [{
            label: 'Total Pendapatan',
            data:[<?php foreach($resReport as $report) {echo "'" .$report->harga ."',";}?>],
            borderColor: [
                'white'
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(162, 181, 187,1)',
            ],
            borderWidth: 2,
            borderRadius: 10,
        }]
    },
    options: {
        plugins: {
            title: {
            display: true,
            text: 'Pendapatan',
            color: 'white',
            font: {
                size: 18
                }
            },
            legend: {
            labels: {
                color: 'white'
                }
            }
        },
    scales: {
        y: {
            grid: {
                color: 'rgba(255,255,255,0.2)',
                borderColor: 'white'
                },
            ticks: {
                color: 'white'
            }
        },
        x: {
            grid: {
                color: 'rgba(255,255,255,0.2)',
                borderColor: 'white'
            },
            ticks: {
                color: 'white'
            }
        },
        yAxes: [{
        ticks: {
        beginAtZero: true,
                }
            }]
        }
    }
});
</script>

<script>
var ctx = document.getElementById('Canvas3');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[<?php foreach($dishReport as $report) {echo "'" .$report->nama_pm ."',";}?>],
        datasets: [{
            label: 'Total Penjualan',
            data:[<?php foreach($dishReport as $report) {echo "'" .$report->qty ."',";}?>],
            borderColor: [
                'white'
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(162, 181, 187,1)',
            ],
            borderWidth: 2,
            borderRadius: 10,
        }]
    },
    options: {
        plugins: {
            title: {
            display: true,
            text: 'Penjualan',
            color: 'white',
            font: {
                size: 18
                }
            },
            legend: {
            labels: {
                color: 'white'
                }
            }
        },
        scales: {
            y: {
            grid: {
                color: 'rgba(255,255,255,0.2)',
                borderColor: 'white'
                },
            ticks: {
                color: 'white'
                }
            },
            x: {
            grid: {
                color: 'rgba(255,255,255,0.2)',
                borderColor: 'white'
                },
            ticks: {
                color: 'white'
                }
            },
        yAxes: [{
        display: true,
        ticks: {
        beginAtZero: true,
                }
            }]
        }
    }
});
</script>

<script>
function generate_year_range(start, end) {
    var years = "";
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
}

today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");


createYear = generate_year_range(1970, 2050);
/** or
 * createYear = generate_year_range( 1970, currentYear );
 */

document.getElementById("year").innerHTML = createYear;

var calendar = document.getElementById("calendar");
var lang = calendar.getAttribute('data-lang');

var months = "";
var days = "";

var monthDefault = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

var dayDefault = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

if (lang == "en") {
    months = monthDefault;
    days = dayDefault;
} else if (lang == "id") {
    months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
} else if (lang == "fr") {
    months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
} else {
    months = monthDefault;
    days = dayDefault;
}


var $dataHead = "<tr>";
for (dhead in days) {
    $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
}
$dataHead += "</tr>";

//alert($dataHead);
document.getElementById("thead-month").innerHTML = $dataHead;


monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);



function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    var firstDay = ( new Date( year, month ) ).getDay();

    tbl = document.getElementById("calendar-body");

    
    tbl.innerHTML = "";

    
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    var date = 1;
    for ( var i = 0; i < 6; i++ ) {
        
        var row = document.createElement("tr");

        
        for ( var j = 0; j < 7; j++ ) {
            if ( i === 0 && j < firstDay ) {
                cell = document.createElement( "td" );
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span>";

                if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                    cell.className = "date-picker selected";
                }
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row);
    }

}

function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}
</script>

<script>
function funcShow() {
  $(".cont.hidden").removeClass('hidden');
  };
function funcHide() {
  $(".cont").addClass('hidden');
};
function funcToggle() {
  $(".cont").toggleClass('hidden');
};

    new CircleType(document.getElementById('h3'))
  .radius(300);

    new CircleType(document.getElementById('p'))
  .dir(-1)
  .radius(700);

    new CircleType(document.getElementById('h32'))
  .radius(300);

    new CircleType(document.getElementById('p2'))
  .dir(-1)
  .radius(700);
</script>

</div>