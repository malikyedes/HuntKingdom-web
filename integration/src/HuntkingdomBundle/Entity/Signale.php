<?php

namespace HuntkingdomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Signale
 *
 * @ORM\Table(name="signale")
 * @ORM\Entity
 */
class Signale
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
     * @ORM\Column(name="idE", type="integer", nullable=false)
     */
    private $ide;

    /**
     * @var integer
     *
     * @ORM\Column(name="idU", type="integer", nullable=false)
     */
    private $idu;


}

