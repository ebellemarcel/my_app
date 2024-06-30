<?php

namespace App\Entity;

// Espace de noms des annotations utilisées par Doctrine
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
     
// Annotation de déclaration d'une entité
/**
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="user")
 */

class User implements UserInterface
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    private $id = null;

    /**
    * @ORM\Column(type: 'string', length: 180, unique: true)
    */
    private $email = null;

    
	/**
    * @ORM\Column(type: 'json')
    */
    private array $roles = [];

	/**
    * @ORM\Column(type: 'string')
    */
    private $password = null;

	/**
    * @ORM\Column(type: 'string', length: 100, nullable: true)
    */
    private $prenom = null;

	/**
    * @ORM\Column(type: 'string', length: 100, nullable: true)
    */
    private $nom = null;

    /**
    * @ORM\Column(type="date")
    */
    private $date_create = null;

    /**
    * @ORM\Column(type="date")
    */
    private $date_update = null;

    /**
    * @ORM\ManyToMany(targetEntity=Propriete::class, mappedBy="users")
    */
    private Collection $properties;

	
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
    * @return User
    */	
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }


    /**
	* Get roles
	*
	* @return array
    */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    /**
	* Set roles
	*
	* @param array $roles
	*
	* @return User
    */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
        return $this;
    }

	/**
    * Get password
    *
    * @return string
    */	
    public function getPassword()
    {
        return $this->password;
    }
	

    /**
    * Set password
    *
    * @param string $password
    *
    * @return User
    */	
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
    * Get prenom
    *
    * @return string
    */	
    public function getPrenom()
    {
        return $this->prenom;
    }
	

    /**
    * Set prenom
    *
    * @param string $prenom
    *
    * @return User
    */	
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
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
    * @return User
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
	* @return Collection
	*	
	* @return User
	*
    * @return Collection|Propriete[]
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
	* @return Collection
	*	
	* @return User
	*
    * @return Collection|Propriete[]
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