<?php
namespace App\Entity;

// Espace de noms des annotations utilisées par Doctrine
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
     
// Annotation de déclaration d'une entité
/**
 * @ORM\Entity(repositoryClass="ContactRepository")
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    private $id = null;


	/**
    * @ORM\Column(type: 'string', length: 100, nullable: true)
    */
    private $nom = null;

    /**
    * @ORM\Column(type: 'string', length: 180, unique: true)
    */
    private $email = null;

    /**
    * @ORM\Column(type: 'string', length: 20, unique: true)
    */
    private $phone = null;

    /**
    * @ORM\Column(type: 'string')
    */
    private $message = null;

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
    * @return Contact
    */	
    public function setNom(string $nom)
    {
        $this->nom = $nom;
        return $this;
    }  

	/**
    * Get email
    *
    * @return string
    */	
    public function getEmail()
    {
        return $this->email;
    }

    /**
    * Set email
    *
    * @param string $email
    *
    * @return Contact
    */	
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

	/**
    * Get Phone
    *
    * @return string
    */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
    * Set Phone
    *
    * @param string $phone
    *
    * @return Contact
    */	
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

	/**
    * Get Message
    *
    * @return string
    */
    public function getMessage()
    {
        return $this->message;
    }

    /**
    * Set Message
    *
    * @param string $message
    *
    * @return Contact
    */
    public function setMessage(string $message)
    {
        $this->message = $message;
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