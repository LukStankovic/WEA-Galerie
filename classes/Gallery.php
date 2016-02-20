<?php 
class Gallery extends DirItems{
    
    protected $allowed = array();
    protected $size;
    
    public function __construct($dir,$allowed){
        parent::__construct($dir);
        $this->allowed = $allowed;
    }
    
    public function write(){
        $this->files = parent::getAllowedFiles($this->allowed);

        foreach ($this->files as $picture){
            echo "<a href='$this->path/$picture' data-lightbox='$this->path'><img src='$this->path/$picture' height='100'></a>";
        }
    }
    
}
?>