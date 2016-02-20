
<?php
 
class DirItems{
    protected $path;
    protected $files = array(); 
    
    public function __construct($dir){
        $this->path = $dir;
        $this->loadFiles();
    }
    
    protected function loadFiles(){
        $dir = dir($this->path);

        while ($item = $dir->read()) {
            if (is_file($this->path . '/' . $item)){
                $this->files[] = $item;
            }
        }
        $dir->close();
    }
    
    public function getFiles(){
      return $this->files;
    }
    
    public function getAllowedFiles($allowedExtensions){
      $files = array();
      foreach ($this->files as $file){
          $extension = strtolower(substr($file,(strpos($file, ".")+1)));
          if (in_array($extension, $allowedExtensions)){
            $files[] = $file;
    	  }
      }
		
      return $files; 
    }
    
    public function write(){
        echo('<ul>');
        foreach ($this->files as $file){
            echo('<li><a href="'.$this->path.'/'.$file.'">'.$file.'</a></li>');
        }
        echo('</ul>');
    }
    
    
}