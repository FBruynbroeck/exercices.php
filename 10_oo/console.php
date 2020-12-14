<?php

abstract class Console{
    protected $nom;
    public $version;
    protected $hd = False;

    public function __construct($version){
        $this->version = $version;
    }

    public function getNom(){
        return $this->nom;
    }

}

class Xbox extends Console{
    protected $nom = 'Xbox';

    public function __construct($version){
        parent::__construct($version);
        $this->setHd();
    }

    private function setHd(){
        if(in_array($this->version, ['One', 'OneX', 'OneS'])){
            $this->hd = True;
        } else {
            $this->hd = False;
        }
    }

    public function getNom(){
        return $this->nom.' '.$this->version;
    }

}

class PS extends Console{
    protected $nom = 'PS';
}

$console = new Xbox('One');
echo $console->getNom();
echo '<br>';
$console = new PS('One');
echo $console->getNom();
echo '<br>';

var_dump($console);
?>
