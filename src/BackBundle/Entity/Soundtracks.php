<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Soundtracks
 *
 * @ORM\Table(name="soundtracks")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\SoundtracksRepository")
 */
class Soundtracks {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="date")
     */
    private $releaseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     * @Assert\Length(
     *     min=2, 
     *     minMessage="The label name must be at least {{ limit }} characters long"
     * )
     */
    private $label;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Soundtracks
     */
    public function setReleaseDate($releaseDate) {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate() {
        return $this->releaseDate;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Soundtracks
     */
    public function setLabel($label) {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label                                                  
     *
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

}
