<?php

namespace Navis\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Navis\UserBundle\Entity\Company
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Navis\UserBundle\Entity\CompanyRepository")
 */
class Company
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $direction
     *
     * @ORM\Column(name="direction", type="string", length=255)
     */
    private $direction;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string $postalCode
     *
     * @ORM\Column(name="postalCode", type="string", length=10)
     */
    private $postalCode;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set direction
     *
     * @param string $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    /**
     * Get direction
     *
     * @return string 
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
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