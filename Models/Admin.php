<?php
class Admin
{
    private $id;
    private $username;
    private $mdp;

    /**
     * @param $id
     * @param $username
     * @param $mdp
     */
    public function __construct($id, $username, $mdp)
    {
        $this->id = $id;
        $this->username = $username;
        $this->mdp = $mdp;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function __toString()
    {
        return $this->id.",".$this->username.",".$this->mdp ;
    }


}