<?php

class TagService
{
    public Repository $Repository;

    public function __construct()
    {
        $this->Repository = new Repository();
    }

    public function createTag(Tag $tag)
    {
        $tablename = "tags";

        if (empty($tag->getDescription()) || $tag->getDescription() == null) {
            $tag->setDescription("This tag is empty");
        }

        if (empty($tag->getbadge()) || $tag->getbadge() == null) {
            $tag->setbadge("I am za LOOOOGO");
        }

        $params = [
            'name' => $tag->getName(),
            'description' => $tag->getDescription(),
            'logo' => $tag->getbadge()
        ];

        $this->Repository->create($tablename, $params);
    }

    public function deleteTag(tag $tag)
    {
        $tablename = 'tags';
        $TagName = $tag->getName();
        // die($TagName);
        $this->Repository->getbynameCategorieAndTag($tablename, $TagName);
        // var_dump($this->Repository->getbynameCategorieAndTag($tablename, $TagName));
        // die();
        $id = $this->Repository->getbynameCategorieAndTag($tablename, $TagName)->getId();
        $this->Repository->delete($tablename, $id);
    }

    public function updateTag(Tag $tag, Tag $secondTag)
    {
        $tablename = "tags";

        $params = [
            'name' => $secondTag->getName(),
            'description' => $secondTag->getDescription(),
            'logo' => $secondTag->getbadge()
        ];

        if (empty($secondTag->getDescription()) || $secondTag->getDescription() == null) {
            $secondTag->setDescription("default Description");
        }
        if (empty($tag->getbadge()) || $tag->getbadge() == null) {
            $tag->setbadge("I am za LOOOOGO");
        }

        $TagName = $tag->getName();
        // die($TagName);
        $this->Repository->getbynameCategorieAndTag($tablename, $TagName);
        // var_dump($this->Repository->getbynameCategorieAndTag($tablename, $TagName));
        // die();

        $id = $this->Repository->getbynameCategorieAndTag($tablename, $TagName)->getId();
        $this->Repository->update($tablename, $id, $params);
    }

    public function getAll()
    {
        $tablename = 'tags';
        $result = $this->Repository->getAll($tablename);

        return $result;
    }

    public function getById(Tag $tag)
    {
        $tablename = "tags";

        $TagName = $tag->getName();

        $this->Repository->getbynameCategorieAndTagByid($tablename, $TagName);

        // $id = $this->Repository->getbynameCategorieAndTag($tablename, $TagName)->getId();

        // $result = $this->Repository->getById($tablename, $id);
        $result = $this->Repository->getbynameCategorieAndTagByid($tablename, $TagName);
        return $result;
    }
}
