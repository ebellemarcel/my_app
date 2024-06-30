<?php

namespace App\Entity;

// Espace de noms des annotations utilisées par Doctrine
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
     
// Annotation de déclaration d'une entité
/**
 * @ORM\Entity(repositoryClass="PhotoRepository")
 * @ORM\Table(name="photo")
 */

class Photo
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    private $id = null;

    /**
    * @ORM\Column(type: 'string', length: 255, unique: true)
    */
    private $fileName = null;

    /**
    * @ORM\Column(type: 'boolean')
    */
    private $principale = false;
	
	
    /**
    * @ORM\Column(type="date")
    */
    private $date_create = null;
	
    /**
     * @ORM\ManyToOne(targetEntity="Propriete")
     * @ORM\JoinColumn(name="idpropriete", referencedColumnName="id")
     */	
    private $idpropriete = null;
	
	
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
    * @return Propriete
    */
    public function getPropriete()
    {
        return $this->idpropriete;
    }

    /**
    * @return Photo
	*
	* @param Propriete $propriete
    */
    public function setPropriete(Propriete $propriete)
    {
        $this->propriete = $propriete;
        return $this;
    }


    /**
    * Get Filename
	*
	* @return string
    */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
    * Set Filename
    *
    * @param string $fileName
    *
    * @return Photo
    */	
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }
	
    /**
    * Get Principale
	*
	* @return boolean
    */
    public function Principale()
    {
        return $this->principale;
    }

    /**
    * Set Principale
    *
    * @param bool $principale
    *
    * @return Photo
    */	
    public function setPrincipale(bool $principale)
    {
        $this->principale = $principale;
        return $this;
    }

	/**
    * Get date_create
    *
    * @return \DateTime
    */

    public function getDatecreate()
    {
        return $this->date_create;
    }


    /**
    * Set date_create
    *
    * @param \DateTime $date_create
    *
    * @return Accessoire
    */
    public function setCreatedAt($date_create)
    {
        $this->date_create = $date_create;
        return $this;
    }

    public function __construct()
    {
        $this->date_create = new \DateTime();
    }


}