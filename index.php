<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/logo.png" />
    <style>
        #hero-section {
            background-color: #f7d7da; 
            padding: 30px;
            border-radius: 15px;
        }
        h1, h4 {
            color: #333333;
        }
        #content {
            border: 1px solid black;
            border-radius: 15px;
            padding: 5px;
        }
        #profile {
            background-color: #e4fdce; 
            padding: 30px;
            border-radius: 15px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">My Daily Journal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-dark">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">About me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container text-sm-start" id="hero-section">
        <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <h1 class="fw-bold display-4">Create Memories, Save Memories, Everyday</h1>
                <h4 class="lead display-6">Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali</h4>
            </div>
        </div>
    </div>

   <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

<div class="container" id="gallery">
    <h3><center>Gallery</center></h3>
    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
                <img src="img/kota.lama2.png" class="d-block w-100" alt="Kota Lama">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kota Lama Semarang</h5>
                    <p>Kawasan bersejarah di Semarang yang penuh dengan bangunan bergaya Eropa.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/lawang.sewu.png" class="d-block w-100" alt="Lawang Sewu">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lawang Sewu</h5>
                    <p>Bangunan bersejarah dengan desain arsitektur kolonial dan atmosfer mistis.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/sampookong.png" class="d-block w-100" alt="Sam Poo Kong">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sam Poo Kong</h5>
                    <p>Klenteng tertua di Semarang yang merupakan perpaduan budaya Tiongkok dan Jawa.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/masjid.agung.png" class="d-block w-100" alt="Masjid Agung Semarang">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Masjid Agung Semarang</h5>
                    <p>Masjid megah dengan arsitektur khas Jawa dan modern, simbol religi kota Semarang.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


    <div class="container" id="schedule">
        <h3><center>Jadwal Kuliah & Kegiatan Mahasiwa</center></h3>
        <div class="d-flex flex-column flex-md-row flex-wrap justify-content-start">
            <div class="card m-2 p-3" style="width: 18rem; background-color: hsl(205, 97%, 63%); border: 1px solid #fdfdfd;">
                <div class="card-body">
                    <h5 class="card-title">Senin</h5>
                    <p><strong>09.00 - 10.30</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                    <p><strong>13.00 - 15.00</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                </div>
            </div>
            <div class="card m-2 p-3" style="width: 18rem; background-color: #b4f3e4; border: 1px solid #ffffff;">
                <div class="card-body">
                    <h5 class="card-title">Selasa</h5>
                    <p><strong>09.00 - 10.30</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                    <p><strong>13.00 - 15.00</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                </div>
            </div>
            <div class="card m-2 p-3" style="width: 18rem; background-color: hsl(0, 99%, 60%); border: 1px solid #ffffff;">
                <div class="card-body">
                    <h5 class="card-title">Rabu</h5>
                    <p><strong>09.00 - 10.30</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                    <p><strong>13.00 - 15.00</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                </div>
            </div>
            <div class="card m-2 p-3" style="width: 18rem; background-color: #f2fb71; border: 1px solid #ffffff;">
                <div class="card-body">
                    <h5 class="card-title">Kamis</h5>
                    <p><strong>09.00 - 10.30</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                    <p><strong>13.00 - 15.00</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                </div>
            </div>
            <div class="card m-2 p-3" style="width: 18rem; background-color: #49f3c8; border: 1px solid #ffffff;">
                <div class="card-body">
                    <h5 class="card-title">Jumat</h5>
                    <p><strong>09.00 - 10.30</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                    <p><strong>13.00 - 15.00</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                </div>
            </div>
            <div class="card m-2 p-3" style="width: 18rem; background-color: #8fc1ec; border: 1px solid #ffffff;">
                <div class="card-body">
                    <h5 class="card-title">Sabtu</h5>
                    <p><strong>09.00 - 10.30</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                    <p><strong>13.00 - 15.00</strong></p>
                    <p>Basis Data</p>
                    <p>Ruang H.3.4</p>
                </div>
            </div>
            <div class="card m-2 p-3" style="width: 18rem; background-color: #f0f5c8; border: 1px solid #ffffff;">
                <div class="card-body">
                    <h5 class="card-title">Minggu</h5>
                    <p>Tidak Ada Jadwal</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" id="profile">
        <h3><center>Profil Mahasiswa</center></h3>
        <h4><center>Annika Azkia Ramadhani</center></h4>
        <p><center>Mahasiswa Teknik Informatika</center></p>
        <div class="d-flex flex-column flex-md-row align-items-center">
            <img src="img/profil.png" class="rounded-circle" width="150" alt="Profile Picture">
            <table class="table mt-3 mt-md-0 ms-md-3">
                <tr>
                    <th>NIM </th>
                    <td>A11.2023.14980</td>
                </tr>
                <tr>
                    <th>Program Studi   </th>
                    <td>Teknik Informatika</td>
                </tr>
                <tr>
                    <th>Email </th>
                    <td>annikaazkiaramadhani@gmail.com</td>
                </tr>
                <tr>
                    <th>No hp  </th>
                    <td>085 718 955 183</td>
                </tr>
                <tr>
                    <th>Alamat  </th>
                    <td>Jl. Imam Bonjol No. 207 Semarang</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="footer" class="text-center mt-4">
        <div class="mb-2">
            <a href="https://instagram.com" class="h2 p-2 text-dark"><i class="bi bi-instagram"></i></a>
            <a href="https://twitter.com" class="h2 p-2 text-dark"><i class="bi bi-twitter"></i></a>
            <a href="https://whatsapp.com" class="h2 p-2 text-dark"><i class="bi bi-whatsapp"></i></a>
        </div>
        <div>
            <p>&copy; 2024 Daily Journal</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
