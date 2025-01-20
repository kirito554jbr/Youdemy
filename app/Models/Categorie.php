<?php

include_once 'Etiquette.php';


class Categorie extends Etiquette
{ 
    public function __construct(){}

    // public static function instanceNameDescription(string $name,string $description){
    //     $instance = new self();

    //     $instance->name = $name;
    //     $instance->description = $description;

    //     return $instance;
    // }

    public function __call($name, $arguments)
    {
        if ($name == "CategorieBuilder"){

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




    // public function __toString() {
    //     return parent::__toString();
    // }

}