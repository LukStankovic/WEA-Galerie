<?php
    require_once 'classes/DirItems.php';
    require_once 'classes/Gallery.php';
    if(isset($_POST["submit"])){
        $conf["dir"]=$_POST["dir"];
        $conf["ext"]=$_POST["ext"];
        setcookie("conf",serialize($conf),time() + (86400 * 7));
        header("Location: index.php");
    }
    if(isset($_COOKIE["conf"])){
        $conf = unserialize($_COOKIE["conf"]);
        $allowed = $conf["ext"];
        $dir = $conf["dir"];
        $galerie = new Gallery($conf["dir"],$allowed);
    }
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<title></title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="css/lightbox.css" rel="stylesheet">
</head>
<body>
    <form method="post">
        <input type="text" name="dir" placeholder="pic" value="<?php if(isset($conf["dir"])) echo $conf["dir"]; ?>">
        <input type="checkbox" name="ext[]" value="jpg" <?php foreach($conf["ext"] as $ext) if($ext == "jpg") echo "checked"; ?>> JPG
        <input type="checkbox" name="ext[]" value="png" <?php foreach($conf["ext"] as $ext) if($ext == "png") echo "checked"; ?>> PNG
        <input type="checkbox" name="ext[]" value="gif" <?php foreach($conf["ext"] as $ext) if($ext == "gif") echo "checked"; ?>> GIF
        
        <input id="submit" name="submit" type="submit" value="Odeslat" class="btn btn-primary">
    </form>    
    <?php $galerie->write(); ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/lightbox.js"></script>
</body>
</html>