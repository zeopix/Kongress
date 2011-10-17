<?php

namespace Navis\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Navis\UserBundle\Entity\Google
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Navis\UserBundle\Entity\GoogleRepository")
 */
class Google
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $idClient
     *
     * @ORM\Column(name="idClient", type="string", length=255)
     */
    private $idClient;

    /**
     * @var string $accessToken
     *
     * @ORM\Column(name="accessToken", type="string", length=255)
     */
    private $accessToken;
    /**
     * @var string $expiresAt
     *
     * @ORM\Column(name="expiresAt", type="integer", length=12)
     */
    private $expiresAt;

    //RELATIONS

        /**
     * @ORM\OneToOne(targetEntity="User")
     */
    private $user;

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
     * Set idClient
     *
     * @param string $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    /**
     * Get idClient
     *
     * @return string 
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set accessToken
     *
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Get accessToken
     *
     * @return string 
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set expiresAt
     *
     * @param integer $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Get expiresAt
     *
     * @return integer 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set user
     *
     * @param Navis\UserBundle\Entity\User $user
     */
    public function setUser(\Navis\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Navis\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}