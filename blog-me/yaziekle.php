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
                <a href="admin.php" class="logo"><strong>Yönetici Paneli</strong></a>

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
                <?php
                        if ($_POST) {
                            $baslik = htmlspecialchars($_POST["baslik"]);
                            $aciklama = htmlspecialchars($_POST["aciklama"]);
                            $resim = htmlspecialchars($_POST["resim"]);
                            $link = permalink($baslik);
                            //boşluk kontrolü
                            if (empty($baslik) || empty($aciklama) || empty($resim) ) {
                                // boşsa
                                echo '<p class="alert alert-warning">Lütfen Boş Bırakmayın...</p>';
                            } else {
                                // boş değilse

                                //VERİ EKLEME
                                $veriekle = $db->prepare("INSERT INTO yazilar SET yazi_baslik=?, yazi_aciklama=?, yazi_link=?, yazi_resim=?");
                                $veriekle ->execute([
                                    $baslik,
                                    $aciklama,
                                    $link,
                                    $resim
                                ]);

                                
                                if ($veriekle) {
                                    // Veri Eklendiyse
                                    echo '<p class="alert alert-succes">Veri Ekleme Başaralı</p>';
                                    header("REFRESH:2;URL=yaziekle.php");
                                } else {
                                    // Veri Eklenmediyse
                                    echo '<p class="alert alert-danger">Veri Eklenemedi</p>';
                                    header("REFRESH:2;URL=yaziekle.php");
                                }
                                
                            }
                            

                        }
                ?>
                <form action="" method="post">
                    <strong>BAŞLIK:</strong>
                    <input type="text" name="baslik"  class="form-control">
                    <strong>Açıklama:</strong>
                    <textarea name="aciklama"  cols="30" rows="10" class="form-control"></textarea>
                    <br />
                    <strong>RESİM LİNK:</strong>
                    <input type="text" name="resim"  class="form-control">
                    <br />
                    <input type="submit" value="Yayınla" class="btn btn-dark">
                </form>
                
            </div>
            
        </div>
    </div>
    
</body>
</html>