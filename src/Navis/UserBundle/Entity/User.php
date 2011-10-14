<?php

namespace Navis\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Navis\UserBundle\Entity\User
 *
 * @ORM\Table("User_kong")
 * @ORM\Entity
* @ORM\Entity(repositoryClass="Navis\UserBundle\Entity\UserRepository")
 */
class User implements UserInterface
{
    private $token = null;
    private $em = null;

    //se trata de devolver un objeto del tipo user con el usuario dentro
    public function init($token, $em)
    {
          $this->token = $token;
          $this->em = $em;

          //ya tengo el token sacado, ahora puedo buscar el acces token y el via

          $attr = $this->token->getAttributes();

          switch($attr['via'])
          {
             case "facebook":
                  $user = $em->getRepository('NavisUserBundle:User')->facebookProvider($attr['access_token']);

                  break;
          }


        return $user;

    }

    public function getToken()
    {
        return $this->token;
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

    //RELATIONS
    /**
     * @ORM\OneToOne(targetEntity="Facebook")
     * @ORM\JoinColumn(name="facebook_id", referencedColumnName="id")
     */
    private $facebook;

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



    /**
     * Set facebook
     *
     * @param Navis\UserBundle\Entity\Facebook $facebook
     */
    public function setFacebook(\Navis\UserBundle\Entity\Facebook $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Get facebook
     *
     * @return Navis\UserBundle\Entity\Facebook 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }
}