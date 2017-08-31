<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Movie
 *
 * @ORM\Table(name="movie")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\MovieRepository")
 */
class Movie {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="BackBundle\Entity\Soundtracks", cascade={"persist"})
     * @Assert\Valid()
     */
    private $soundtracks;

    
    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Compagny", cascade={"persist"},mappedBy="movies")
     * @Assert\Valid()
     */
    private $companies;
    
    /**
     * @var string
     *
     * @ORM\Column(name="frTitle", type="string", length=255)
     * @Assert\Length(
     *     min=2, 
     *     minMessage="The french title must be at least {{ limit }} characters long"
     * )
     */
    private $frTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="enTitle", type="string", length=255)
     * @Assert\Length(
     *     min=2, 
     *     minMessage="The english title must be at least {{ limit }} characters long"
     * )
     */
    private $enTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255)
     * @Assert\Length(
     *     min=2, 
     *     minMessage="The movie style be at least {{ limit }} characters long"
     * )
     */
    private $style;

    /**
     * @var string
     *
     * @ORM\Column(name="plot", type="text")
     * @Assert\Length(
     *     max=1000, 
     *     maxMessage=" Maximum number of characters that a plot may contain: {{ limit }} "
     * )
     */
    private $plot;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="date")
     */
    private $releaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="runningTime", type="time")
     */
    private $runningTime;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;
    
     /**
     * @var string
     *
     * @ORM\Column(name="screenplay", type="string", length=255)
     */
    private $screenplay;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set frTitle
     *
     * @param string $frTitle
     *
     * @return Movie
     */
    public function setFrTitle($frTitle) {
        $this->frTitle = $frTitle;

        return $this;
    }

    /**
     * Get frTitle
     *
     * @return string
     */
    public function getFrTitle() {
        return $this->frTitle;
    }

    /**
     * Set enTitle
     *
     * @param string $enTitle
     *
     * @return Movie
     */
    public function setEnTitle($enTitle) {
        $this->enTitle = $enTitle;

        return $this;
    }

    /**
     * Get enTitle
     *
     * @return string
     */
    public function getEnTitle() {
        return $this->enTitle;
    }

    /**
     * Set plot
     *
     * @param string $plot
     *
     * @return Movie
     */
    public function setPlot($plot) {
        $this->plot = $plot;

        return $this;
    }

    /**
     * Get plot
     *
     * @return string
     */
    public function getPlot() {
        return $this->plot;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Movie
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
     * Set runningTime
     *
     * @param \DateTime $runningTime
     *
     * @return Movie
     */
    public function setRunningTime($runningTime) {
        $this->runningTime = $runningTime;

        return $this;
    }

    /**
     * Get runningTime
     *
     * @return \DateTime
     */
    public function getRunningTime() {
        return $this->runningTime;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Movie
     */
    public function setLanguage($language) {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * Set style
     *
     * @param string $style
     *
     * @return Movie
     */
    public function setStyle($style) {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle() {
        return $this->style;
    }

    /**
     * Set soundtracks
     *
     * @param \BackBundle\Entity\SoundTracks $soundtracks
     *
     * @return Movie
     */
    public function setSoundtracks(\BackBundle\Entity\SoundTracks $soundtracks = null) {
        $this->soundtracks = $soundtracks;

        return $this;
    }

    /**
     * Get soundtracks
     *
     * @return \BackBundle\Entity\SoundTracks
     */
    public function getSoundtracks() {
        return $this->soundtracks;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->companies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add company
     *
     * @param \BackBundle\Entity\Compagny $company
     *
     * @return Movie
     */
    public function addCompany(\BackBundle\Entity\Compagny $company)
    {
        $this->companies[] = $company;

        return $this;
    }

    /**
     * Remove company
     *
     * @param \BackBundle\Entity\Compagny $company
     */
    public function removeCompany(\BackBundle\Entity\Compagny $company)
    {
        $this->companies->removeElement($company);
    }

    /**
     * Get companies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * Set screenplay
     *
     * @param string $screenplay
     *
     * @return Movie
     */
    public function setScreenplay($screenplay)
    {
        $this->screenplay = $screenplay;

        return $this;
    }

    /**
     * Get screenplay
     *
     * @return string
     */
    public function getScreenplay()
    {
        return $this->screenplay;
    }
    /*
    public function __toString(){
        return $this->getEnTitle();
    }
    */
    
    /**
     * Convert object to string
     *
     * @return string
     */
    public function __toString() {
        return $this->getCompanies();
    }
}
