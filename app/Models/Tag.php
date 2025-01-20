<?php


include_once 'Etiquette.php';

class Tag extends Etiquette
{
    private string $badge = '';


    public function __construct()
    {
        parent::__construct();
    }
    public function setbadge(string $badge): void 
    {
        $this->badge = $badge;
    }
    public function getbadge(): string 
    {
        return $this->badge;
    }

    // public static function instanceWithNameAndDescriptionAndbadge($name, $description, $badge) {
    //     $instance = new self();
    
    //     $instance->name = $name;
    //     $instance->description = $description;
    //     $instance->badge = $badge;

    //     return $instance;
    // }

    public function __call($name, $arguments)
    {
        if ($name == "TagBuilder"){

            if(count($arguments) == 1){
                $this->name = $arguments[0];
            }
            if(count($arguments) == 2){
                
                $this->name = $arguments[0];
                $this->description = $arguments[1];
            }

            if(count($arguments) == 3){
                $this->id = $arguments[0];
                $this->name = $arguments[1];
                $this->description = $arguments[2];
            }
        }
    }




        // public function __toString()
        // {
        //     return parent::__toString() . " , badge: " .$this->badge;
        // }
}