<?php

namespace HuntkingdomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikeForum
 *
 * @ORM\Table(name="like_forum")
 * @ORM\Entity
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


}

