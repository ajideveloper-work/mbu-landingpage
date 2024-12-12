<?php 
include 'Apps/conn/ft.php';

// Kode Otomatis Untuk ID Calon Jamaah
$kode                  = mysqli_query($db, "select max(id_calon_jamaah) as id_calon_jamaah from jamaah");
$ar                    = mysqli_fetch_array($kode);
$id_calon_jamaah       = $ar['id_calon_jamaah'];
$urut                  = substr($id_calon_jamaah, 7,3);
$urut++;
$id_calon_jamaah       = "ICJ".date('my').sprintf("%02s",$urut);

// Data Tanggal
$now                   = date("Y-m-d");

// Script Input
if (isset($_POST['submit'])) {
  $id_calon_jamaah     = htmlspecialchars($_POST['id_calon_jamaah']);
  // Panggil Data Personal
  $nama_calon_jamaah   = htmlspecialchars($_POST['nama_calon_jamaah']);
  $jenis_kelamin       = htmlspecialchars($_POST['jenis_kelamin']);
  $tempat              = htmlspecialchars($_POST['tempat']);
  $tanggal_lahir       = htmlspecialchars($_POST['tanggal_lahir']);
  $alamat              = htmlspecialchars($_POST['alamat']);
  $no_telp             = htmlspecialchars($_POST['no_telp']);
  $pekerjaan           = htmlspecialchars($_POST['pekerjaan']);
  // Panggil Data Keluarga
  $nama_ayah           = htmlspecialchars($_POST['nama_ayah']);
  $nama_ibu            = htmlspecialchars($_POST['nama_ibu']);
  // Panggil Data Paspor
  $no_paspor           = htmlspecialchars($_POST['no_paspor']);
  $tempat_dikeluarkan  = htmlspecialchars($_POST['tempat_dikeluarkan']);
  $tanggal_dikeluarkan = htmlspecialchars($_POST['tanggal_dikeluarkan']);
  $tanggal_ekspire     = htmlspecialchars($_POST['tanggal_ekspire']);
  // Panggil Data Lainnya
  $paket_pilihan       = htmlspecialchars($_POST['paket_pilihan']);
  $jenis_kamar         = htmlspecialchars($_POST['jenis_kamar']);
  $tanggal_berangkat   = htmlspecialchars($_POST['tanggal_berangkat']);
  $tanggal_reg         = htmlspecialchars($_POST['tanggal_reg']);
  // Script SQL
  $jalan               = mysqli_query($db, "INSERT INTO jamaah VALUES('$id_calon_jamaah','$nama_calon_jamaah','$jenis_kelamin','$tempat','$tanggal_lahir','$alamat','$no_telp','$pekerjaan')");
  if ($jalan) {
    $next              = mysqli_query($db, "INSERT INTO keluarga VALUES('$id_calon_jamaah','$nama_ayah','$nama_ibu')");
    if ($next) {
      $maju            = mysqli_query($db, "INSERT INTO paspor VALUES('$id_calon_jamaah','$no_paspor','$tempat_dikeluarkan','$tanggal_dikeluarkan','$tanggal_ekspire')");
      if ($maju) {
        $akhir         = mysqli_query($db, "INSERT INTO booking VALUES('$id_calon_jamaah','$paket_pilihan','$jenis_kamar','$tanggal_berangkat','$tanggal_reg')");
        if ($akhir) {
            echo "<script>
                document.location.href='index.php';
                alert('Data Berhasil Dikirim, Harap Hubungi Kami Sesudah Mendaftar.');
            </script>";
        }else{
            echo "<script>
                document.location.href='index.php';
                alert('Data Gagal Dikirim');
            </script>";
          
        }
      }
    }
  }
}


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Muhibah Buana Tour & Travel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sss.css">
    <link href='images/aa.png' rel='shortcut icon'>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Muhibah Buana Utama</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
              <li class="nav-item "><a href="properties.html" class="nav-link">Paket</a></li>
              <li class="nav-item active"><a href="registrasi.php" class="nav-link">Registrasi</a></li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/front.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Registrasi</span></p>
            <h1 class="mb-3 bread">Registrasi Jamaah</h1>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-property-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="property-details">
      				<div class="text text-center">
      					<span class="subheading">Indonesia</span>
      					<h2>Formulir Pendaftaraan Jamaah</h2>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Syarat & Ketentuan</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Formulir Isian</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
								        <table align="center" border="5" style="border-color: #092756;">
								          <tr>
								            <td>
								                <h1><p><center><i class="fa fa-money"></i> Pembayaran</center></p></h1>
								              <p>Pembayaran dapat dilakukan via transfer ke rekening Bank Mandiri:</p>
								              <p><b>1. Rupiah no. rek. 130 000 4509314 a/n PT. Muhibah Buana Utama</b></p>
								              <p><b>2. US Dollar no. rek. 130 000 9255194 a/n PT Muhibah Buana Utama</b></p>
								              <p style="font-size: 15px">Kurs berdasarkan pada hari transfer/transaksi.</p>
								            </td>
								          </tr>
								        </table>								        
						    	</div>
						    	<br>
						    	<div class="">
						    		<table>
						    		        <tr>
						    		            <h1><p><center><i class="fa fa-info-circle"></i> Ketentuan</center></p></h1>
						    		        </tr>
						    				<tr>
								        		<p>1. Mengisi Formulir pendaftaran dengan jelas & benar.</p>
						    				</tr>
						    				<tr>
						    					<p>2. Membayar uang muka Rp. 10.000.000,00- Pada saat pedaftaran.</p>
						    				</tr>
						    				<tr>
						    					<p>3. Dokumen sudah kami terima paling lambat 1 bulan sebelum tanggal keberangkatan dari jadwal yang di pilih.</p>
						    				</tr>
						    				<tr>
						    					<p>4. Bagi wanita diatas 45 tahun yang tanpa mahram disertakan KTP asli & akta kelahiran. Dibawah 45 thn harus dimahramkan.</p>
						    				</tr>
						    				<tr>
						    					<p>5. Pasphoto berwarna dengan latar belakang putih, Ukuran kepala 85%, 4 x 6 = 8 lmbr.</p>
						    				</tr>
						    				<tr>
						    					<p>6. Surat/buku Nikah Asli bagi suami istri.</p>
						    				</tr>
						    				<tr>
						    					<p>7. Copy Kartu keluarga.</p>
						    				</tr>
						    				<tr>
						    					<p>8. Akte Lahir Asli bagi anak dibawah 17 Tahun ( Wajib bagi anak perempuan > 17 thn).</p>
						    				</tr>
						    		</table>
						    	</div>
						    </div>
        
						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						        <h1><p><center><i class="fa fa-user"></i> Form Registrasi <i class="fa fa-group"></i></center></p></h1>
						      	<form action="" method="post" role="form" enctype="multipart/form-data">
									<input type="hidden" name="id_calon_jamaah" id="id_calon_jamaah" value="<?=$id_calon_jamaah;?>">
									<input type="hidden" name="tanggal_reg" id="tanggal_reg" value="<?=$now;?>">
									<input type="hidden" name="tanggal_berangkat" id="tanggal_berangkat" value="<?=$now;?>">
									<table>
              <tr>
                <td>Nama Lengkap Sesuai KTP</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama_calon_jamaah" id="nama_calon_jamaah" style="width: 400px;" required></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki" required> Laki-Laki <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" required>Perempuan</td>
              </tr>
              <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="tempat" id="tempat" style="width: 400px;" required></td>
                <td><input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" style="width: 200px;" required></td>
              </tr>
              <tr>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td><textarea class="form-control" name="alamat" id="alamat" style="width: 400px;" required></textarea></td>
              </tr>
              <tr>
                <td>Nomor Telepon / Handphone</td>
                <td>:</td>
                <td><input class="form-control" type="number" min="0" name="no_telp" id="no_telp" style="width: 400px;" required></td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="pekerjaan" id="pekerjaan" style="width: 400px;" required></td>
              </tr>
              <tr>
                <td>Nama Ayah</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama_ayah" id="nama_ayah" style="width: 400px;" required></td>
              </tr>
              <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama_ibu" id="nama_ibu" style="width: 400px;" required></td>
              </tr>
              <tr>
                <td>Nomor Paspor</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="no_paspor" id="no_paspor" style="width: 400px;"></td>
              </tr>
              <tr>
                <td colspan="3" style="color: #092756">*bila yang sudah memiliki pasport</td>
              <tr>
                <td>Tempat Dikeluarkan Paspor</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="tempat_dikeluarkan" id="tempat_dikeluarkan" style="width: 400px;" ></td>
              </tr>
              <tr>
                <td colspan="3" style="color: #092756">*bila yang sudah memiliki pasport</td>
              </tr>
              <tr>
                <td>Tanggal Dikeluarkan Paspor</td>
                <td>:</td>
                <td><input class="form-control" type="date" name="tanggal_dikeluarkan" id="tanggal_dikeluarkan" style="width: 400px;" ></td>
              </tr>
              </tr>
              <tr>
                <td colspan="3" style="color: #092756">*bila yang sudah memiliki pasport</td>
              <tr>
                <td>Tanggal Kadaluarsa Paspor</td>
                <td>:</td>
                <td><input class="form-control" type="date" name="tanggal_ekspire" id="tanggal_ekspire" style="width: 400px;" ></td>
              </tr>
              </tr>
              <tr>
                <td colspan="3" style="color: #092756">*bila yang sudah memiliki pasport</td>
              </tr>
              <tr>
                <td>Paket Pilihan</td>
                <td>:</td>
                <td>
                  <!-- <input class="form-control" type="text" name="paket_pilihan" id="paket_pilihan" style="width: 400px;"> -->
                  <select name="paket_pilihan" id="paket_pilihan" class="form-control">
            <option value="Belum Pilih">Pilih Paket</option>
            <?php $poli = mysqli_query($db, "SELECT * FROM paket"); ?>
            <?php foreach ($poli as $cb) : ?>
              <option value="<?= $cb['id_paket']; ?>"><?= $cb['nama_paket']; ?></option>
            <?php endforeach; ?>
          </select>
                </td>
              </tr>
              <tr>
                <td>Jenis Kamar yang dipilih</td>
                <td>:</td>
                <td>
                  <!-- <input class="form-control" type="text" name="jenis_kamar" id="jenis_kamar" style="width: 400px;"> -->
                  <input type="radio" name="jenis_kamar" id="jenis_kamar" value="Single" required> Single
                  <input type="radio" name="jenis_kamar" id="jenis_kamar" value="Double" required> Double / Twin
                  <input type="radio" name="jenis_kamar" id="jenis_kamar" value="Triple" required> Triple
                  <input type="radio" name="jenis_kamar" id="jenis_kamar" value="Quad" required> Quad
                </td>
              </tr>
              <!-- <tr>
                <td>Tanggal Berangkat</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="tanggal_berangkat" id="tanggal_berangkat" style="width: 400px;"></td>
              </tr> -->
              <tr>
                <td colspan="3"><input type="checkbox" name="" id="" required>Saya setuju dengan <a style="color: #092756;" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab"> Syarat & Ketentuan</a> yang berlaku.</td>
              </tr>
              <tr>
                <td><button class="btn btn-success btn-block" type="submit" name="submit" id="submit"><i class="fa fa-send"></i> Kirim</button></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
								</form>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>


     <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Muhibah Buana Utama</h2>
              <p>Kami adalah Anggota Resmi dari:</p>
              <p><img src="images/ft_asso.png" style="width: 250px;"></p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="https://api.whatsapp.com/send?phone=6281322601555&text=Assalamualaikum,Bapak/Ibu%20saya%20ingin%20bertanya.."><span class="icon-whatsapp"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/muhibahbuanatourandtravel/?hl=id"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl. Sekejati No.4, Kb. Kangkung, Kiaracondong, Kota Bandung, Jawa Barat 40284, Indonesia</span></li>
	                <li><a href="tel://+622287352815"><span class="icon icon-phone"></span><span class="text">+62-22-87352815</span></a></li>
	                <li><a href="mailto:muhibahbuana@yahoo.com"><span class="icon icon-envelope pr-4"></span><span class="text">muhibahbuana@yahoo.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
  <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d81da1dc22bdd393bb66221/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
    
  </body>
</html>