<?php


class CategorieController
{
    private Categorie $categorie;
    private Categorie $secondCategorie;
    private CategorieService $categorieService;


    public function __construct()
    {
        $this->categorie = new Categorie();
        $this->categorieService = new CategorieService();
        $this->secondCategorie = new Categorie();
    }

    public function createCategorie($categoriename)
    {

        $this->categorie->CategorieBuilder($categoriename);

        try {
            $categorie = $this->categorieService->createCategorie($this->categorie);

            return $categorie;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function deleteCategorie($categoriename)
    {
        $this->categorie->CategorieBuilder($categoriename);

        try {
            $categorie = $this->categorieService->deleteCategorie($this->categorie);
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function updateCategorie($categoriename, $object)
    {
        $this->categorie->CategorieBuilder($categoriename);
        $this->secondCategorie->CategorieBuilder($object);

        try {
            $categorie = $this->categorieService->updateCategorie($this->categorie, $this->secondCategorie);

            return $categorie;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getAll(){
        try {
           $result = $this->categorieService->getAll();
        //    var_dump($result);
            return $result;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getById($categoriename){
        $this->categorie->CategorieBuilder($categoriename);

        try{
            $result = $this->categorieService->getById($this->categorie);

            $id = $result[0]->getId();
            $name = $result[0]->getName();
            $description = $result[0]->getDescription();

            $this->secondCategorie->CategorieBuilder($id, $name , $description);

            return $this->secondCategorie;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

}
