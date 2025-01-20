<?php

class CourService
{
    private Repository $Repository;

    public function __construct()
    {
        $this->Repository = new Repository();
    }


    public function create(Cours $cour)
    {
        $tablesname = 'Cours';

        $params = [
            'titre' => $cour->getTitre(),
            'description' => $cour->getDescripton(),
            'contenu' => $cour->getContenu(),
            'tag' => $cour->getTag(),
            'categorie_id' => $cour->getCategorie()->getId(),
            'created_at' => $cour->getCreatedAt(),
            'enseignant_id' => $cour->getEnseignant()->getId()
        ];

        // var_dump($params);
        // die();
        $this->Repository->create($tablesname, $params);
    }

    public function delete(Cours $cour)
    {
        $tablesname = "Cours";
        $courname = $cour->getTitre();

        $this->Repository->getCour($tablesname, $courname);


        // var_dump($this->Repository->getCour($tablesname, $courname));
        // die($courname);

        $id = $this->Repository->getCour($tablesname, $courname)->getId();

        $this->Repository->delete($tablesname, $id);
    }



    public function update(Cours $cour, Cours $second)
    {
        $tablesname = "Cours";

        $params = [
            'titre' => $cour->getTitre(),
            'description' => $cour->getDescripton(),
            'contenu' => $cour->getContenu(),
            'tag' => $cour->getTag(),
            'created_at' => $cour->getCreatedAt()
        ];

        $courName = $cour->getTitre();

        $this->Repository->getCour($tablesname, $courName);

        $id = $this->Repository->getCour($tablesname, $courName)->getId();


        $this->Repository->update($tablesname, $id, $params);
    }




    public function getAll()
    {
        $tablesname = "Cours";

        $result = $this->Repository->getAll($tablesname);

        return $result;
    }

    public function getById(Cours $cour)
    {
        $tablesname = "Cours";

        $courName = $cour->getTitre();
        $this->Repository->getCour($tablesname, $courName);

        $id = $this->Repository->getCour($tablesname, $courName)->getId();

        $result = $this->Repository->getById($tablesname, $id);

        return $result;
    }
}
