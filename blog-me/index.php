<?php
    include 'ayar.php';
    include 'funct.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header class="container">
        <div class="row">
            <div class="col-lg-6">
                <a href="" class="logo"><strong>BLOG SAYFASI</strong></a>

            </div>
            <div class="col-lg-6 text-right">
                <a href="index.php" class="menu">Ana Sayfa</a>
                <a href="" class="menu">Hakkımızda</a>
                <a href="admin.php" class="menu">Admin Panel</a>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-4 mb-4">
                <h1><strong>BLOG DENEME</strong></h1>
                <p>AÇIKLAMA</p>
            </div>
            <?php

                        $dataList = $db -> prepare("SELECT * FROM yazilar ORDER BY yazi_id DESC");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchALL(PDO::FETCH_ASSOC);

                        foreach($dataList as $row){
                            echo '<div class="col-lg-4">
                            <div class="card">
                                <img src="'.$row["yazi_resim"].'" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">'.$row["yazi_baslik"].'</h5>
                                  <p class="card-text">'.kisalt($row["yazi_aciklama"]).'</p>
                                  <a href="yazi.php?link='.$row["yazi_link"].'" class="btn btn-dark">Devamını Oku</a>
                                </div>
                              </div>
                        </div>';
                        }
                    ?>
            
        </div>
    </div>
    
</body>
</html>