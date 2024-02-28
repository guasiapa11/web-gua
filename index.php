<?php

include("header.php");

?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <!-- 1 switch page -->

      <?php
      $open = isset($_GET['open']) ? $_GET['open'] : '';
      switch ($open) {
        case 'detail':
          include("detail.php");
          break;
          case 'cat':
            include("kategori.php");
            break;
          case 'cari':
            include("cari.php");
            break;
        default:
          include("depan.php");
          break;
      }

      ?>

    </div>

    <!-- Sidebar Widgets Column -->
   
    <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            
                           
                            
                        <form action="" method="GET">
                        
                            <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" name="key" placeholder="Search for...">
            <!-- <input type="hidden" name="halaman" value="1"> -->
            <span class="input-group-btn">
              <button class="btn btn-secondary" name="open" type="submit" value="cari">Go!</button>
            </span>
          </div>
        </div>
               
        </div>
    </div>
  
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>POPULER</h5>
        </div>
        <?php 
          $query = "SELECT * FROM berita WHERE terbit = '1' ORDER BY ID DESC LIMIT 0,3";
          $result = mysqli_query($connect, $query);
          ?>
           <?php while( $row = mysqli_fetch_assoc($result)) : ?>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
            <img src="<?= $row['gambar']; ?>"  alt=""
							style="width:100px; height:100px;" />
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="./?open=detail&id=<?=$row['ID']; ?>"><?= $row['judul']; ?></a></h5>
                <span><i class="fa fa-eye"></i> <?php 
                 $date = $row['tanggal'];
                  $newDate = date("d-M-Y, H:i:s", strtotime($date)); ?>
                <?= $newDate; ?> |
                Dilihat : <?= $row['viewnum']; ?></span>
            </div>
        </div>
        <?php endwhile; ?>
        <div class="section-title">
            <h5>TERBARU</h5>
        </div>
        <?php 
          $query = "SELECT * FROM berita WHERE terbit = '1' AND tanggal>='".date('Y-m-d H:i:s', strtotime('-7 days'))."' ORDER BY viewnum DESC LIMIT 0,10";
          $result = mysqli_query($connect, $query);
          ?>
      
								 <?php while( $row = mysqli_fetch_assoc($result)) : ?>
								
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
            <img src="<?= $row['gambar']; ?>"  alt=""
							style="width:100px; height:100px;" />
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="./?open=detail&id=<?=$row['ID']; ?>"><?= $row['judul']; ?></a></h5>
                <span><i class="fa fa-eye"></i> <?php 
                  $date = $row['tanggal'];
                  $newDate = date("d-M-Y, H:i:s", strtotime($date)); ?>
                <?= $newDate; ?> |
                Dilihat : <?= $row['viewnum']; ?></span>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
      <!-- Categories Widget / Berita Terbaru -->
                 
                 

     
<?php

include("footer.php");

?>