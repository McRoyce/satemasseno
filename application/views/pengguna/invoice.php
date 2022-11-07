<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
    <title>Sate Mas Seno - Invoice</title>
    <link rel="icon" href="<?php echo base_url().'assets/images/logo2.png';?>">
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/styleuser.css'); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
</head>

<style>
span {
  font-size: medium;
}
ol li{
  margin-left: -1.5rem;
}
</style>

<body>
<div id="invoice" class="page-content container">
    <div class="page-header mt-4">
        <h3>
            Invoice
            <i class="fa fa-arrow-right"></i>
            <?php 
            $nama = "TRS";
            $kode = $order['id_t'];
            $kode = sprintf("%03d", $kode);
            ?>
            <?php $cDate = strtotime($order['date']); ?>
            ID: <?php echo $nama.$kode.date('dmy',$cDate) ?>
        </h3>
            <div style="margin-top: -20px;">
                <a href="<?php echo base_url().'orders' ?>" class="btn grey-button liquidgrey">
                <i class="fas fa-angle-left"></i></a>
                <a class="btn blue-button liquidblue" href="#" onClick="window.print();" data-title="Print">
                <i class="fa fa-print"></i> Cetak</a>
            </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row" style="background-color:#2ec06f;">
                    <div class="col-0">
                        <div class="text-center">
                            <img src="<?php echo base_url().'assets/images/logo.png';?>" alt="logo" width="140" height="80">
                        </div>
                    </div>
                    <div class="col-6 text-left text-white" style="margin-left: -1rem;">
                        <p class="lead font-weight-bold mb-0">Sate Mas Seno</p>
                        <div><span><i class="fa fa-envelope"></i> satemasseno@gmail.com</span></div>
                        <div><span><i class="fa fa-phone"></i> 0895145601111</span></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="my-4">
                            <div>
                                <h5>Pembeli:</h5>
                            </div>
                                <span><b><?php echo $order['nama_d'].' '.$order['nama_b']?></b></span>
                            <div>
                                <span><?php echo $order['alamat'] ?></span>
                            </div>
                            <div><i class="fa fa-phone"></i> 
                                <span><b> <?php echo $order['telepon'] ?></b></span>
                            </div>
                            <div><i class="fa fa-envelope"></i> 
                                <span><b> <?php echo $order['email'] ?></b></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr>
                        <div class="my-4">
                            <div>
                                <h4>Invoice:</h4>
                            </div>
                                <?php 
                                $nama = "TRS";
                                $kode = $order['id_t'];
                                $kode = sprintf("%03d", $kode);
                                ?>
                                <?php $cDate = strtotime($order['date']); ?>
                            <div><i class="fa fa-circle"></i> 
                                <span><b>Nomor Pesanan: </b></span> <span><?php echo $nama.$kode.date('dmy',$cDate) ?></span></div>
                            <div><i class="fa fa-circle"></i> 
                                <?php $cDate = strtotime($order['date']); ?>
                                <span><b>Tanggal Pesanan: </b></span> <span><?php echo date('d-m-Y',$cDate); ?></span></div>
                            <div><i class="fa fa-circle"></i> 
                                <?php $aDate = strtotime($order['acara']); ?>
                                <span><b>Tanggal Acara: </b></span> <span><?php echo date('d-m-Y',$aDate); ?></span></div>
                            <div><i class="fas fa-circle"></i> 

                            <?php $payment=$order['pembayaran'];
                            if($payment=="bank") { ?>
                                <span><b>Pembayaran:</b></span> <span class="badge badge-pill" 
                                style="background-color:#2ec06f;color:white;font-size:small;">Tranfer Bank</span></div>
                            <?php } ?>

                            <?php if($payment=="qris") { ?>
                                <span><b>Pembayaran:</b></span> <span class="badge badge-pill" 
                                style="background-color:#2ec06f;color:white;font-size:small;">Tranfer QRIS</span></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-white" style="background-color:#2ec06f;">
                            <th>Cabang Resto</th>
                            <th>Paket Menu</th>
                            <th width="45%">Deskripsi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $res['nama_cr']; ?></td>
                            <td><?php echo $order['nama_pm']; ?></td>
                            <td><?php echo $dish['deskripsi']; ?></td>
                            <td><?php echo 'Rp'.number_format($dish['harga'],2,",","."); ?></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="3">Ongkos Kirim</td>
                            <td><?php echo 'Rp'.number_format($dish['ongkir'],2,",","."); ?></td>
                        </tr>
                    </tbody>
                        <tr>
                            <td class="font-weight-bold text-right" colspan="3">Total</td>
                        <td class="font-weight-bold"><?php echo 'Rp'.number_format($order['harga'],2,",","."); ?></td>
                    </tr>
                </table>
            </div>
                    <hr>
                    <div class="text-center">
                        <span class="mb-0">Terima kasih atas pesanan anda</span><br>
                        <span>www.satemasseno.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>