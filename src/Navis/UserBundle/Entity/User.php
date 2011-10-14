<?php

namespace Navis\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Navis\UserBundle\Entity\User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User implements UserInterface
{

    public function __construct(\Etcpasswd\OAuthBundle\Model\User $user)
    {
        
    }
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * {@inheritdoc}
     */
    function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * {@inheritdoc}
     */
    function getPassword()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    function getSalt()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    function eraseCredentials()
    {

    }

    /**
     * {@inheritdoc}
     */
    function equals(UserInterface $user)
    {
        return (
            $user instanceof User
            && $user->getUsername() === $this->getUsername()
        );
    }


}