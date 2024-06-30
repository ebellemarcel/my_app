<?php

namespace App\Entity;

// Espace de noms des annotations utilisées par Doctrine
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
     
// Annotation de déclaration d'une entité
/**
 * @ORM\Entity(repositoryClass="AccessoireRepository")
 * @ORM\Table(name="accessoire")
 */
 
class Accessoire
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    private $id = null;

    /**
    * @ORM\Column(type: 'string', length: 100, unique: true)
    */
    private $nom = null;
	
	/**
    * @ORM\Column(type: 'string', length: 255)
    */
    private $description = null;

    /**
    * @ORM\Column(type="date")
    */
    private $date_creation = null;

    /**
    * @ORM\Column(type="date")
    */
    private $date_update = null;

    /**
    * @ORM\ManyToMany(targetEntity=Propriete::class, mappedBy="accessoires")
    */
    private $proprietes;
	
	
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
    * Get nom
    *
    * @return string
    */	
    public function getNom()
    {
        return $this->nom;
    }
	
    /**
    * Set nom
    *
    * @param string $nom
    *
    * @return Accessoire
    */	
    public function setNom(string $nom)
    {
        $this->nom = $nom;
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

    /**
    * Get date_update
    *
    * @return \DateTime
    */
    public function getDateupdate()
    {
        return $this->date_update;
    }

    /**
    * Set date_update
    *
    * @param \DateTime $date_update
    *
    * @return Accessoire
    */
    public function setUpdatedAt($date_update)
    {
        $this->date_update = $date_update;
        return $this;
    }

    /**
	* @return Collection
	*
    * @return Collection|Propriete[]
    */
    public function getProprietes()
    {
        return $this->proprietes;
    }
	
	/**
	* @return Accessoire
	*/
    public function addPropriete(Propriete $propriete)
    {
        if (!$this->proprietes->contains($propriete)) {
            $this->proprietes[] = $propriete;
            $propriete->addAccessoire($this);
        }
        return $this;
    }
	
	/**
	* @return Accessoire
	*/
    public function removePropriete(Propriete $propriete)
    {
        if ($this->proprietes->removeElement($propriete)) {
            $propriete->removeAccessoire($this);
        }
        return $this;
    }

    public function __construct()
    {
        $this->proprietes = new ArrayCollection();
        $this->date_create = new \DateTime();
        $this->date_update = new \DateTime();
    }

    
}