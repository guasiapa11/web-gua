<?php
include 'inc/koneksi.php';
include 'inc/fungsi.php';
global $connect;
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <!-- Navigation -->
  <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html">
                          <font color="yellow">ASHURA </font><font color="red">NEWS</font>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./">Homepage</a></li>
                                
                                        <?php 
              $jumlahDataPerhalaman = 3;
              $dataBerita = mysqli_query($connect, "SELECT * FROM berita");
              $jumlahData = mysqli_num_rows($dataBerita);
              $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

              if (isset($_GET['page'])) {
                $halamanAktif = $_GET['page'];
              } else {
                $halamanAktif = 1;
              }
              $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
          ?>
          <?php 
            $query = "SELECT * FROM kategori WHERE terbit = 1 ORDER BY ID ASC LIMIT 0,10";
            $result = mysqli_query($connect, $query);
           ?>
          <?php while ( $row = mysqli_fetch_assoc($result) ) : ?>
          <li class="nav-item">
            <a class="nav-link" href="./?open=cat&id=<?= $row['ID']; ?>"><?= $row['kategori']; ?></a>
          </li>

                               
          
       
                                </li>
                                
                                <?php endwhile; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
  