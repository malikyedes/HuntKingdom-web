<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SignalForum
 *
 * @ORM\Table(name="signal_forum")
 * @ORM\Entity
 */
class SignalForum
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_signal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSignal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_pb", type="integer", nullable=false)
     */
    private $idPb;

    /**
     * @var string
     *
     * @ORM\Column(name="cause", type="string", length=100, nullable=true)
     */
    private $cause;


}

