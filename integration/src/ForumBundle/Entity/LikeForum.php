<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikeForum
 *
 * @ORM\Table(name="like_forum")
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\LikeForumRepository")
 */
class LikeForum
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_like", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLike;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_pb", type="integer", nullable=false)
     */
    private $idPb;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USERS", type="integer", nullable=false)
     */
    private $idUsers;

    /**
     * @return int
     */
    public function getIdLike()
    {
        return $this->idLike;
    }

    /**
     * @param int $idLike
     */
    public function setIdLike($idLike)
    {
        $this->idLike = $idLike;
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


}

