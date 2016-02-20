<!doctype html>
<?php
    require_once 'classes/DirItems.php';
    require_once 'classes/Gallery.php'
?>
<html lang="cs">
<head>
<meta charset="utf-8">
<title></title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="css/lightbox.css" rel="stylesheet">
</head>
<body>
    <?php 
    $allowed = array("png", "gif", "jpg", "jpeg");
    $galerie = new Gallery("pic",$allowed);

    $galerie->write();
    ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/lightbox.js"></script>
</body>
</html>