<?php

class Oeuvre
{
    private $id;
    private $lien_oeuvre;
    private $artiste_id;

    /**
     * @param $id
     * @param $lien_oeuvre
     * @param $artiste_id
     */
    public function __construct($id, $lien_oeuvre, $artiste_id)
    {
        $this->id = $id;
        $this->lien_oeuvre = $lien_oeuvre;
        $this->artiste_id = $artiste_id;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLienOeuvre()
    {
        return $this->lien_oeuvre;
    }

    /**
     * @param mixed $lien_oeuvre
     */
    public function setLienOeuvre($lien_oeuvre)
    {
        $this->lien_oeuvre = $lien_oeuvre;
    }

    /**
     * @return mixed
     */
    public function getArtisteId()
    {
        return $this->artiste_id;
    }

    /**
     * @param mixed $artiste_id
     */
    public function setArtisteId($artiste_id)
    {
        $this->artiste_id = $artiste_id;
    }


}