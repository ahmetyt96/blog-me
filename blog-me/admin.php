<?php
    include 'ayar.php';
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
                <a href="" class="logo"><strong>Yönetici Paneli</strong></a>

            </div>
            <div class="col-lg-6 text-right">
                <a href="index.php" class="menu">Siteyi Görüntüle</a>
                <a href="admin.php" class="menu">Yazılar</a>
                <a href="yaziekle.php" class="menu">Yazı Ekle</a>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4 mb-4">
                <table class="table table-dark table-striped">
                    <tr>
                        <td>Başlık:</td>
                        <td>Tarih:</td>
                    </tr>
                    <?php

                        $dataList = $db -> prepare("SELECT * FROM yazilar ORDER BY yazi_id DESC");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchALL(PDO::FETCH_ASSOC);

                        foreach($dataList as $row){
                            echo '<tr>
                                    <td>
                                        <a href="yazi.php?link='.$row["yazi_link"].'" class="text-white" target="_blank">'.$row["yazi_baslik"].'</a>
                                    </td>
                                    <td>
                                        '.$row["yazi_tarih"].'
                                    </td>
                                </tr>';
                        }
                    ?>
                    
                </table>
            </div>
            
        </div>
    </div>
    
</body>
</html>