<?php
    require_once 'classes/DirItems.php';
    require_once 'classes/Gallery.php';
    if(isset($_POST["submit"])){
        $conf["dir"]=$_POST["dir"];
        $conf["ext"]=$_POST["ext"];
        $conf["height"]=$_POST["height"];
        setcookie("conf",serialize($conf),time() + (86400 * 7));
        header("Location: index.php");
    }
    if(isset($_COOKIE["conf"])){
        $conf = unserialize($_COOKIE["conf"]);
        $allowed = $conf["ext"];
        $dir = $conf["dir"];
        $height = $conf["height"];
        
        $galerie = new Gallery($dir,$allowed,$height);
    }

?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>Gallery</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="config">
            <form method="post">
                <div class="row">
                    <div class="col-md-5 con">
                        <label for="pic">Directory: </label>
                        <input class="dir" type="text" name="dir" placeholder="pic" value="<?php if(isset($dir)) echo $dir; else echo "pic"?>">
                        <input type="checkbox" name="ext[]" value="jpg" <?php if(isset($allowed)) foreach($allowed as $ext) if($ext == "jpg") echo "checked"; ?>> JPG
                        <input type="checkbox" name="ext[]" value="png" <?php if(isset($allowed)) foreach($allowed as $ext) if($ext == "png") echo "checked"; ?>> PNG
                        <input type="checkbox" name="ext[]" value="gif" <?php if(isset($allowed)) foreach($allowed as $ext) if($ext == "gif") echo "checked"; ?>> GIF
                        
                    </div>
                    <div class="col-md-5 height">
                        Height: <span><?php echo (isset($height)) ? $height : "100"; ?></span>px 
                        <input type="range" name="height" min="10" max="200" step="10" value="<?php echo (isset($height)) ? $height : "100"; ?>">
                    </div>
                    <div class="col-md-2">
                        
                        <input id="submit" name="submit" type="submit" value="Show" class="btn btn-primary">
                    </div>
                </div>
               
                
                
            </form>  
        </div>
        <div class="gallery">
            <?php
                if(isset($galerie))
                    $galerie->write(); 
            ?>
        </div>
        
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/lightbox.js"></script>
    <script>
    $(document).ready(function(){

        $(".height input").change(function(){
           var height = $(this).val();
           $(".height span").html(height);
        });
    });
    </script>
</body>
</html>