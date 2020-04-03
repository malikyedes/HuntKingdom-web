<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\PublicationRepository")
 */
class Commentaire
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
     * @var integer
     *
     * @ORM\Column(name="ID_USERS", type="integer", nullable=false)
     */
    private $idUsers;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_pb", type="integer", nullable=false)
     */
    private $idPb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="added_in", type="datetime", nullable=false)
     */
    private $addedIn = 'CURRENT_TIMESTAMP';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return \DateTime
     */
    public function getAddedIn()
    {
        return $this->addedIn;
    }

    /**
     * @param \DateTime $addedIn
     */
    public function setAddedIn($addedIn)
    {
        $this->addedIn = $addedIn;
    }


}

