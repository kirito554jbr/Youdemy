
<?php



class CategorieService
{
    public Repository $Repository;



    public function __construct()
    {
        $this->Repository = new Repository();
    }



    public function createCategorie(Categorie $categorie)
    {
        $tablename = "categories";

        if (empty($categorie->getDescription()) || $categorie->getDescription() == null) {
            $categorie->setDescription("This categorie is empty");
        }

        $params = [
            'name' => $categorie->getName(),
            'description' => $categorie->getDescription()
        ];

        $this->Repository->create($tablename, $params);
    }

    public function deleteCategorie(Categorie $categorie)
    {
        $tablename = 'categories';
        $CategorieName = $categorie->getName();
        $this->Repository->getbynameCategorieAndTag($tablename, $CategorieName);

        $id = $this->Repository->getbynameCategorieAndTag($tablename, $CategorieName)->getId();
        $this->Repository->delete($tablename, $id);
    }

    public function updateCategorie(Categorie $categorie, Categorie $secondCategorie)
    {
        $tablename = "categories";
        
        $params = [
            'name' => $secondCategorie->getName(),
            'description' => $secondCategorie->getDescription()
        ];
        if (empty($categorie->getDescription()) || $categorie->getDescription() == null) {
            $categorie->setDescription("This categorie is empty");
        }
        $CategorieName = $categorie->getName();
        $this->Repository->getbynameCategorieAndTag($tablename, $CategorieName);

        $id = $this->Repository->getbynameCategorieAndTag($tablename, $CategorieName)->getId();
        $this->Repository->update($tablename, $id, $params);
    }

    public function getAll(){
        $tablename = 'categories';
        $result = $this->Repository->getAll($tablename);
        // var_dump($result);

        return $result;

    }

    public function getById(Categorie $categorie){
        $tablename = "categories";
        $CategorieName = $categorie->getName();
        // var_dump($CategorieName);
        // die();
        $this->Repository->getbynameCategorieAndTagByid($tablename, $CategorieName);

        // var_dump($this->Repository->getbynameCategorieAndTag($tablename, $CategorieName));
        
        // $id = $this->Repository->getbynameCategorieAndTag($tablename, $CategorieName)->getId();
        // var_dump($id);
        // die();
        // $result = $this->Repository->getById($tablename, $id);
        $result = $this->Repository->getbynameCategorieAndTagByid($tablename, $CategorieName);

        return $result;

    }
}
