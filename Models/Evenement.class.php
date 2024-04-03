<?php

class Evenement
{
    private $id;
    private $titre;
    private $dateDebutEvenement;
    private $dateFinEvenement;
    private $ville;
    private $contenu;
    private $posteur;
    private $contact;

    /**
     * @param $id
     * @param $titre
     * @param $dateDebutEvenement
     * @param $dateFinEvenement
     * @param $ville
     * @param $contenu
     * @param $posteur
     * @param $contact
     */
    public function __construct($id, $titre, $dateDebutEvenement, $dateFinEvenement, $ville, $contenu, $posteur, $contact)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->dateDebutEvenement = $dateDebutEvenement;
        $this->dateFinEvenement = $dateFinEvenement;
        $this->ville = $ville;
        $this->contenu = $contenu;
        $this->posteur = $posteur;
        $this->contact = $contact;
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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDateDebutEvenement()
    {
        return $this->dateDebutEvenement;
    }

    /**
     * @param mixed $dateDebutEvenement
     */
    public function setDateDebutEvenement($dateDebutEvenement)
    {
        $this->dateDebutEvenement = $dateDebutEvenement;
    }

    /**
     * @return mixed
     */
    public function getDateFinEvenement()
    {
        return $this->dateFinEvenement;
    }

    /**
     * @param mixed $dateFinEvenement
     */
    public function setDateFinEvenement($dateFinEvenement)
    {
        $this->dateFinEvenement = $dateFinEvenement;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getPosteur()
    {
        return $this->posteur;
    }

    /**
     * @param mixed $posteur
     */
    public function setPosteur($posteur)
    {
        $this->posteur = $posteur;
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

    public function __toString()
    {
        return $this->id.",".$this->titre.",".$this->dateDebutEvenement.",".$this->dateFinEvenement.",".
            $this->ville.",".$this->contenu.",".$this->posteur.",".$this->contact ;
    }


}
?>