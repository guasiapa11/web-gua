<!-- Konfigurasi Pagination -->

<?php 

$jumlahDataPerhalaman = 4;
$dataBerita = mysqli_query($connect, "SELECT * FROM berita");
$jumlahData = mysqli_num_rows($dataBerita);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

if (isset($_GET['halaman'])) {
  $halamanAktif = $_GET['halaman'];
} else {
  $halamanAktif = 1;
}

$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;

?>

<!-- Blog Post -->
<?php 
	$query = "SELECT * FROM berita WHERE terbit = '1' ORDER BY ID DESC LIMIT  $awalData, $jumlahDataPerhalaman ";
	$result = mysqli_query($connect, $query);
?>

<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php while( $row = mysqli_fetch_assoc($result)) : ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= $row['gambar']; ?>">
                                        <div class="ep">18 / 18</div>
                                        <div class="comment"><i class="calender"></i> <?php 
                                                    $date = $row['tanggal'];?></div>
                                        <div class="view"><i class="fa fa-eye"></i><?= $row['viewnum']; ?></div>
                                    </div>
                                    
                                    <div class="product__item__text">
                            
                                        <h5><a href="./?open=detail&id=<?= $row['ID']; ?>"><?= $row['judul']; ?><?=  substr(strip_tags($row['judul']),0,5); ?></a></h5>
                                        <p><font color="white"><?=  substr(strip_tags($row['isi']),0,0); ?></p></font>
                                       
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        
                       
                    </div>
                    </div>
                        </div>
</div>
</section>


<!-- Pagination -->
<ul class="pagination justify-content-center mb-4">
  <?php if( $halamanAktif > 1) : ?>
  <li class="page-item">
    <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">&larr; Berita Sebelumnya</a>
  </li>
  <?php endif; ?>
  <?php if( $halamanAktif < $jumlahHalaman) : ?>
  <li class="page-item">
    <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Berita Lain &rarr;</a>
  </li>
  <?php endif; ?>
</ul>