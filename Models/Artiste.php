<?php

class Artiste
{
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getTypeArtiste()
    {
        return $this->type_artiste;
    }

    /**
     * @param mixed $type_artiste
     */
    public function setTypeArtiste($type_artiste)
    {
        $this->type_artiste = $type_artiste;
    }

    /**
     * @return mixed
     */
    public function getProfileArtiste()
    {
        return $this->profile_artiste;
    }

    /**
     * @param mixed $profile_artiste
     */
    public function setProfileArtiste($profile_artiste)
    {
        $this->profile_artiste = $profile_artiste;
    }

    /**
     * @return mixed
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * @param mixed $intro
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;
    }

    /**
     * @return mixed
     */
    public function getOeuvre()
    {
        return $this->oeuvre;
    }

    /**
     * @param mixed $oeuvre
     */
    public function setOeuvre($oeuvre)
    {
        $this->oeuvre = $oeuvre;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public $id;
    private $nom;
    private $type_artiste;
    private $profile_artiste;
    private $intro;
    private $oeuvre;
    private $contact;

    /**
     * @param $id
     * @param $nom
     * @param $type_artiste
     * @param $profile_artiste
     * @param $intro
     * @param $oeuvre
     * @param $contact
     */
    public function __construct($id, $nom, $type_artiste, $profile_artiste, $intro, $oeuvre, $contact)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->type_artiste = $type_artiste;
        $this->profile_artiste = $profile_artiste;
        $this->intro = $intro;
        $this->oeuvre = $oeuvre;
        $this->contact = $contact;
    }


}