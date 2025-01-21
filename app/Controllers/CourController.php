
<?php


class CourController
{
    private Cours $cour;
    private Cours $secondcour;
    private CategorieController $categorieController;
    // private CourService $courService;
    private UserController $enseignant;
    private Utilisateur $user;
    private CourService $courService;
    // private CategorieController $catigorie;

    public function __construct()
    {
        $this->cour = new Cours();
        $this->categorieController = new CategorieController();
        $this->enseignant = new UserController();
        $this->user = new Utilisateur;
        $this->courService = new CourService();
        $this->secondcour = new Cours();
    }



    public function createCour($titre, $description,$contenu, $catigorie, $created_at = '', array $tag = [], $enseignant = '', array $etudinat = [])
    {

        $catigorie = $this->categorieController->getById($catigorie);

        $enseignant = $this->enseignant->getByName($enseignant);
           var_dump($enseignant);
            die($enseignant);


        $id = $enseignant[0]->id;
        $firstname = $enseignant[0]->first_name;
        $lastName = $enseignant[0]->last_name;
        $email = $enseignant[0]->email;
        $password = $enseignant[0]->password;
        $phone = $enseignant[0]->phone;
        $photo = $enseignant[0]->photo;




        $this->user->BuildUser(
            $id,
            $firstname,
            $lastName,
            $email,
            $password,
            $phone,
            $photo
        );

        // var_dump($this->user);
        // die($this->user);

        $this->cour->BuildCour(
            $titre,
            $description,
            $contenu,
            $tag,
            $catigorie,
            $created_at,
            $this->user,
            $etudinat
        );

        // var_dump($this->cour);
        // die();



        try {
            $cour = $this->courService->create($this->cour);
            return $cour;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function delete($courname)
    {

        $this->cour->BuildCour($courname);

        try {
            $cour = $this->courService->delete($this->cour);
            return $cour;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function update($courname, $titre, $descritpion, $contenu, $tag, $catigorie, $created_at, $enseignant)
    {
        $this->cour->BuildCour($courname);


        $this->secondcour->BulidCour(
            $titre,
            $descritpion,
            $contenu,
            $tag,
            $catigorie,
            $created_at,
            $enseignant
        );

        var_dump($this->secondcour);
        die();

        try {
            $cour = $this->courService->update($this->cour, $this->secondcour);

            return $cour;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $cour = $this->courService->getAll();

            return $cour;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getByName($courName){
        $this->cour->BuildCour($courName);

        try {
            $cour = $this->courService->getById($this->cour);

            return $cour;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }
}
