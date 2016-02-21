<?php 
class Gallery extends DirItems{
    
    protected $allowed = array();
    protected $height;
    
    public function __construct($dir,$allowed,$height){
        if (file_exists($dir)) {
            parent::__construct($dir);
        }
        $this->allowed = $allowed;
        $this->height = $height;
    }
    
    public function write(){
        $this->files = parent::getAllowedFiles($this->allowed);

        foreach ($this->files as $picture){
            echo "<a href='$this->path/$picture' data-lightbox='$this->path'><img src='$this->path/$picture' height='$this->height'></a>";
        }
    }
    
}
?>