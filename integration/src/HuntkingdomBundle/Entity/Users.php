<?php

namespace HuntkingdomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USERS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsers;

    /**
     * @var string
     *
     * @ORM\Column(name="LAST_NAME", type="string", length=200, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="FIRST_NAME", type="string", length=200, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=150, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="PROFILE_PHOTO", type="string", length=255, nullable=false)
     */
    private $profilePhoto;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=122, nullable=false)
     */
    private $roles = '\'user\'';

    /**
     * @var integer
     *
     * @ORM\Column(name="enabled", type="integer", nullable=false)
     */
    private $enabled = '0';


}

