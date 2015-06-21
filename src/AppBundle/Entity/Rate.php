<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

/**
 * Rate
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RateRepository")
 */
class Rate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rate", type="boolean")
     */
    private $rate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_comment", type="integer")
     */
    private $idComment;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rate
     *
     * @param boolean $rate
     * @return Rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return boolean 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set idComment
     *
     * @param integer $idComment
     * @return Rate
     */
    public function setIdComment($idComment)
    {
        $this->idComment = $idComment;

        return $this;
    }

    /**
     * Get idComment
     *
     * @return integer 
     */
    public function getIdComment()
    {
        return $this->idComment;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return Rate
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

}
