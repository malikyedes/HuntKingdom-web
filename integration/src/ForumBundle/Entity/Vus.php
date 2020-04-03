<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vus
 *
 * @ORM\Table(name="vus")
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\VusRepository")
 */
class Vus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_view", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idView;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USERS", type="integer", nullable=false)
     */
    private $idUsers;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_pb", type="integer", nullable=false)
     */
    private $idPb;

    /**
     * @return int
     */
    public function getIdView()
    {
        return $this->idView;
    }

    /**
     * @param int $idView
     */
    public function setIdView($idView)
    {
        $this->idView = $idView;
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


}

