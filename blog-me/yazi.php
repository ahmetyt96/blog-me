<?php
    include 'ayar.php';
    include 'funct.php';
    
    $link = @$_GET["link"]; // ?link = burayı çekeyor
    $data = $db -> prepare("SELECT * FROM yazilar WHERE yazi_link=?");
    $data -> execute([
        $link 
    ]);
    $_data = $data -> fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_data["yazi_baslik"] ?></title>
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
                <a href="index.php" class="logo"><strong>BLOG SAYFASI</strong></a>

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
            <div class="col-lg-12 mt-4 mb-4">
                <center><img src="<?=$_data["yazi_resim"]?>" width="333px"></center>
                <a href="yazi.php?link=<?php echo $link; ?>" class="link"><h1 class="text-center"><strong><?php echo $_data["yazi_baslik"]; ?></strong></h1></a>
                <p><?php echo $_data["yazi_aciklama"]; ?></p>
                <strong>TARİH:</strong> <?php echo $_data["yazi_tarih"]; ?>
            </div>
            
        </div>
    </div>
    
</body>
</html>