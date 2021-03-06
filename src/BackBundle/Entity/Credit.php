<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Credit
 *
 * @ORM\Table(name="credit")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\CreditRepository")
 */
class Credit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
       
    /**
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Soundtracks")
     * @ORM\JoinColumn{nullable=false}
     */
    private $soundtracks;

    /**
     * @var string
     *
     * @ORM\Column(name="creditName", type="string", length=255)
     */
    private $creditName;

    /**
     * @var string
     *
     * @ORM\Column(name="creditTitle", type="string", length=255)
     */
    private $creditTitle;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set creditName
     *
     * @param string $creditName
     *
     * @return Credit
     */
    public function setCreditName($creditName)
    {
        $this->creditName = $creditName;

        return $this;
    }

    /**
     * Get creditName
     *
     * @return string
     */
    public function getCreditName()
    {
        return $this->creditName;
    }

    /**
     * Set creditTitle
     *
     * @param string $creditTitle
     *
     * @return Credit
     */
    public function setCreditTitle($creditTitle)
    {
        $this->creditTitle = $creditTitle;

        return $this;
    }

    /**
     * Get creditTitle
     *
     * @return string
     */
    public function getCreditTitle()
    {
        return $this->creditTitle;
    }


    /**
     * Set soundtracks
     *
     * @param \BackBundle\Entity\Soundtracks $soundtracks
     *
     * @return Credit
     */
    public function setSoundtracks(\BackBundle\Entity\Soundtracks $soundtracks = null)
    {
        $this->soundtracks = $soundtracks;

        return $this;
    }

    /**
     * Get soundtracks
     *
     * @return \BackBundle\Entity\Soundtracks
     */
    public function getSoundtracks()
    {
        return $this->soundtracks;
    }
}
