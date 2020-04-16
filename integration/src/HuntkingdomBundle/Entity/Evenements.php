<?php

namespace HuntkingdomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements")
 * @ORM\Entity
 */
class Evenements
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=20, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=20, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbreplaces", type="integer", nullable=false)
     */
    private $nbreplaces;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbreparticipants", type="integer", nullable=false)
     */
    private $nbreparticipants;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=1000, nullable=true)
     */
    private $image;
    /**
     * @Assert\File(maxSize="500k")
     */
    public $file;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Evenements
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param string $lieu
     * @return Evenements
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return Evenements
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbreplaces()
    {
        return $this->nbreplaces;
    }

    /**
     * @param int $nbreplaces
     * @return Evenements
     */
    public function setNbreplaces($nbreplaces)
    {
        $this->nbreplaces = $nbreplaces;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbreparticipants()
    {
        return $this->nbreparticipants;
    }

    /**
     * @param int $nbreparticipants
     * @return Evenements
     */
    public function setNbreparticipants($nbreparticipants)
    {
        $this->nbreparticipants = $nbreparticipants;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param \DateTime $datedebut
     * @return Evenements
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param \DateTime $datefin
     * @return Evenements
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Evenements
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return Evenements
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
    public function getWebPath(){
        return null===$this->image ? null : $this->getUploadDir.'/'.$this->image;
    }


    protected function getUploadRootDir(){
        return 'C:/wamp64/www/integration/web/'.$this->getUploadDir();
    }
    public function getUploadDir(){
        return 'images';
    }
    public function uploadFile(){
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }
        if(!$this->id){
            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }else{
            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }
        $this->setFile($this->file->getClientOriginalName());


    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param  $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
}

