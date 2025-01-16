<?php

class Cours
{

    private int $id;
    private string $titre;
    private string $description;
    private string $contenu;
    private $tag = [];
    private Categorie $categorie;
    private string $created_at;
    private Utilisateur $enseignant;
    private $etudiant = [];


    public function __construct()
    {

        $this->categorie = new Categorie();
        $this->enseignant = new Utilisateur();
    }

    public function __call($name, $arguments)
    {
        if ($name == "BuildCour") {

            if (count($arguments) == 1) {
                $this->id = $arguments[1];
            }

            if (count($arguments) == 2) {
                $this->titre = $arguments[0];
                $this->description = $arguments[1];
            }

            if (count($arguments) == 3) {
                $this->titre = $arguments[0];
                $this->description = $arguments[1];
                $this->contenu = $arguments[2];
            }
            if (count($arguments) == 5){
                $this->id = $arguments[0];
                $this->titre = $arguments[1];
                $this->description = $arguments[2];
                $this->contenu = $arguments[3];
                $this->created_at = $arguments[4];
            }



            if (count($arguments) == 7) {
                $this->id = $arguments[0];
                $this->titre = $arguments[1];
                $this->description = $arguments[2];
                $this->contenu = $arguments[3];
                $this->tag = $arguments[4];
                $this->categorie = $arguments[5];
                $this->created_at = $arguments[6];
                $this->enseignant = $arguments[7];
                $this->etudiant = $arguments[8];
            }
        }
    }




    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function setTag(array $tag): void
    {
        $this->tag = $tag;
    }

    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function setCreatedSAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function setEnseignant(Utilisateur $enseignant): void
    {
        $this->enseignant = $enseignant;
    }

    public function setEtudiant(array $etudiant): void
    {
        $this->etudiant = $etudiant;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDescripton(): string
    {
        return $this->description;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getTag(): array
    {
        return $this->tag;
    }

    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }

    public function getCreatedAt () : string {
        return $this->created_at;
    }

    public function getEnseignant () : Utilisateur {
        return $this->enseignant;
    }

    public function getEtudiant () : array {
        return $this->etudiant;
    }


    public function __toString()
    {

        return "(Cours) => id : " .$this->id. " , titre : " 
        .$this->titre. " , description : " .$this->description. " , contenu: " .$this->contenu. 
        " , created_at: " .$this->created_at. " , enseignant: " .$this->enseignant. " , tag: " . implode(" , ", $this->tag) . " , categorie: " .$this->categorie. " , etudiant: " . implode(",", $this->etudiant) . ".";
    }

}
