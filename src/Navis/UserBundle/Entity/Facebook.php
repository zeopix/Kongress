<?php

namespace Navis\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Navis\UserBundle\Entity\Facebook
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Navis\UserBundle\Entity\FacebookRepository")
 */
class Facebook
{

    private $json;
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $acces_token
     *
     * @ORM\Column(name="acces_token", type="string", length=255)
     */
    private $acces_token;

    /**
     * @var string $expiresAt
     *
     * @ORM\Column(name="expiresAt", type="integer", length=12)
     */
    private $expiresAt;

    /**
     * @var string $idClient
     *
     * @ORM\Column(name="idClient", type="string", length=30)
     */
    private $idClient;
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
     * Set acces_token
     *
     * @param string $accesToken
     */
    public function setAccesToken($accesToken)
    {
        $this->acces_token = $accesToken;
    }

    /**
     * Get acces_token
     *
     * @return string 
     */
    public function getAccesToken()
    {
        return $this->acces_token;
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
     * Set clientId
     *
     * @param integer $clientId
     */
    public function setIdClient($clientId)
    {
        $this->idClient = $clientId;
    }

    /**
     * Get clientId
     *
     * @return integer 
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setJson($json)
    {
        $this->json = $json;
    }

    public function getJson()
    {
        return $this->json;
    }
}