<?php

class TagController {

    private Tag $tag;
    private Tag $secondTag;
    private TagService $tagService;


    public function __construct() {
        $this->tag = new Tag();
        $this->tagService = new TagService();
        $this->secondTag = new Tag();
    }

    public function createTag($tagname){

        $this->tag->TagBuilder($tagname);

        try{
            $tag = $this->tagService->createTag($this->tag);

            return $tag;
        } catch(Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function deleteTag($tagname)
    {
        $this->tag->TagBuilder($tagname);

        try {
            $tag = $this->tagService->deleteTag($this->tag);

        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    } 

    public function updateTag($tagname, $object){
        $this->tag->TagBuilder($tagname);
        $this->secondTag->TagBuilder($object);

        try{
            $tag = $this->tagService->updateTag($this->tag, $this->secondTag);

            return $tag;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getAll(){
        try{
            $result = $this->tagService->getAll();
            return $result;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getById($tagname){
        $this->tag->TagBuilder($tagname);

        try{
            $result = $this->tagService->getById($this->tag);

            $id = $result[0]->getId();
            $name = $result[0]->getName();
            $description = $result[0]->getDescription();

            $this->secondTag->TagBuilder($id, $name , $description);

            return $this->secondTag;
        }catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    } 

}