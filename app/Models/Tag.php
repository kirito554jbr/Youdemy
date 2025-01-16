<?php


include_once 'Etiquette.php';

class Tag extends Etiquette
{
    private string $badge;


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

    public static function instanceWithNameAndDescriptionAndbadge($name, $description, $badge) {
        $instance = new self();
    
        $instance->name = $name;
        $instance->description = $description;
        $instance->badge = $badge;

        return $instance;
    }


    public function __toString()
    {
        return parent::__toString() . " , badge: " .$this->badge;
    }
}