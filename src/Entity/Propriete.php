<?php
namespace App\Entity;

// Espace de noms des annotations utilisées par Doctrine
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
     
// Annotation de déclaration d'une entité
/**
 * @ORM\Entity(repositoryClass="ProprieteRepository")
 * @ORM\Table(name="propriete")
 */

class Propriete
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
	private $id = null;

	/**
    * @ORM\Column(type: 'string', length: 255)
    */
    private $titre = null;

	/**
    * @ORM\Column(type: 'string', length: 255)
    */
    private $description = null;

    /**
    * @ORM\Column(type: 'string', length: 20)
    */
    private $type = null;
	
	/**
    * @ORM\Column(type: 'float', precision: 10, scale:2)
    */
    private $prix = null;

    /**
    * @ORM\Column(type: 'float', precision: 10, scale:2)
    */
    private $surface = null;

    /**
    * @ORM\Column(type: 'integer')
    */
    private $chambres = null;

    /**
    * @ORM\Column(type: 'string', length: 255)
    */
    private $adresse = null;

    /**
    * @ORM\Column(type: 'string', length: 100)
    */
    private $ville = null;

    /**
    * @ORM\Column(type: 'string', length: 20)
    */
    private $codepostal = null;
	
	/**
    * @ORM\Column(type: 'float', precision: 10, scale: 8, nullable: true)
    */
    private $latitude = null;

    /**
    * @ORM\Column(type: 'float', precision: 10, scale: 8, nullable: true)
    */
    private $longitude = null;

    /**
    * @ORM\Column(type="date")
    */
    private $date_creation = null;

    /**
    * @ORM\Column(type="date")
    */
    private $date_update = null;


	 // Relation Many to One vers User
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     */
    private $iduser = null;


    /**
     * @ORM\OneToMany(mappedBy="propriete", targetEntity=Photo::class, cascade={"persist", "remove"})
     */
    private $photos;

    /**
     * @ORM\ManyToMany(targetEntity=Accessoire::class, inversedBy="proprietes")
     */
    private $accessoires;

    /**
     * @ORM\OneToMany(mappedBy="propriete", targetEntity=Contact::class, cascade={"persist", "remove"})
     */    
	private $contacts;
		
	
	/**
     * Get idPropriete
     *
     * @return integer
     */
	 public function getIdPropriete()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Propriete
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
		
    }
		
	/**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
	
	/**
     * Set description
     *
     * @param string $description
     *
     * @return Propriete
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
		
    }
		
	/**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
	
	/**
     * Set type
     *
     * @param string $type
     *
     * @return Propriete
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
		
    }
		
	/**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

	/**
     * Set prix
     *
     * @param float $prix
     *
     * @return Propriete
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
		
    }
		
	/**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

	/**
     * Set surface
     *
     * @param float $surface
     *
     * @return Propriete
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
		
    }
		
	/**
     * Get surface
     *
     * @return float
     */
    public function getSurface()
    {
        return $this->surface;
    }

	/**
     * Set chambres
     *
     * @param integer $chambres
     *
     * @return Propriete
     */
    public function setChambres($chambres)
    {
        $this->chambres = $chambres;

        return $this;
		
    }
		
	/**
     * Get chambres
     *
     * @return integer
     */
    public function getChambres()
    {
        return $this->chambres;
    }

	/**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Propriete
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
		
    }
		
	/**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
	
	/**
     * Set ville
     *
     * @param string $ville
     *
     * @return Propriete
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
		
    }
		
	/**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
	
	/**
     * Set Code Postal
     *
     * @param string $codepostal
     *
     * @return Propriete
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
		
    }
		
	/**
     * Get ville
     *
     * @return string
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }
	
	/**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Propriete
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
		
    }
		
	/**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

	/**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Propriete
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
		
    }
		
	/**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set date_create
     *
     * @param \DateTime $date_create
     *
     * @return Propriete
     */
    public function setDatecreate($date_create)
    {
        $this->date_create = $date_create;

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
     * Set date_update
     *
     * @param \DateTime $date_update
     *
     * @return Propriete
     */
    public function setDateupdate($date_update)
    {
        $this->date_update = $date_update;

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
     * Set User
     *
     * @return \User
     */		
	public function setUser(\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User
     *
     * @return \User
     */
    public function getUser()
    {
        return $this->user;
    }

	/**
     * @return Collection
	 *
	 * @return Collection|Photo[]
     */
    public function getPhotos()
    {
        return $this->photos;
    }
	/**
	* @return Propriete
	*/
    public function addPhoto(Photo $photo)
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setPropriete($this);
        }
        return $this;
    }

	/**
	* @return Propriete
	*/
    public function removePhoto(Photo $photo)
    {
        if ($this->photos->removeElement($photo)) {
            if ($photo->getPropriete() === $this) {
                $photo->setPropriete(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection
	 *
	 * @return Collection|Accessoire[]
     */
    public function getAccessoires()
    {
        return $this->accessoires;
    }


	/**
	* @return Propriete
	*/
    public function addAccessoire(Accessoire $accessoire)
    {
        if (!$this->accessoires->contains($accessoire)) {
            $this->accessoires[] = $accessoire;
        }
        return $this;
    }

	/**
	* @return Propriete
	*/
    public function removeAccessoire(Accessoire $accessoire)
    {
        $this->accessoires->removeElement($accessoire);
        return $this;
    }

    /**
	 *@return Collection
	 *
     * @return Collection|Contact[]
     */
    public function getContact()
    {
        return $this->contacts;
    }

	/**
	* @return Propriete
	*/
    public function addContactRequest(Contact $contact)
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setPropriete($this);
        }
        return $this;
    }

	/**
	* @return Propriete
	*/
    public function removeContact(Contact $contact)
    {
        if ($this->contacts->removeElement($contact)) {
            if ($contact->getPropriete() === $this) {
                $contact->setPropriete(null);
            }
        }
        return $this;
    }



    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->accessoires = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->date_create = new \DateTime();
        $this->date_update = new \DateTime();
    }

    
}
