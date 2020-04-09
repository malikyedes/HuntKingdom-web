<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\PublicationRepository")
 */
class Publication
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pb", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPb;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USERS", type="integer", nullable=false)
     */
    private $idUsers;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=100, nullable=false)
     */
    private $theme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Posted_in", type="datetime", nullable=false)
     */
    private $postedIn = 'CURRENT_TIMESTAMP';

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
    public function getIdPb()
    {
        return $this->idPb;
    }

    /**
     * @param int $idPb
     */
    public function setIdPb($idPb)
    {
        $this->idPb = $idPb;
    }

    /**
     * @return int
     */
    public function getIdUsers()
    {
        return $this->idUsers;
    }

    /**
     * @param int $idUsers
     */
    public function setIdUsers($idUsers)
    {
        $this->idUsers = $idUsers;
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
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param string $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * @return \DateTime
     */
    public function getPostedIn()
    {
        return $this->postedIn;
    }

    /**
     * @param \DateTime $postedIn
     */
    public function setPostedIn($postedIn)
    {
        $this->postedIn = $postedIn;
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
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    public function getWebPath(){
        return null===$this->image ? null : $this->getUploadDir.'/'.$this->image;
    }


    protected function getUploadRootDir(){
        return 'C:/wamp/www/integration/web/'.$this->getUploadDir();
    }
    public function getUploadDir(){
        return 'images';
    }
    public function uploadFile(){
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }
        if(!$this->idPb){
            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }else{
            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }
        $this->setFile($this->file->getClientOriginalName());


    }

    /**
     * @param $file
     * @return $this
     */
    public function setFile($file){
        $this->file=$file;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFile(){
        return $this->file;
    }



}

