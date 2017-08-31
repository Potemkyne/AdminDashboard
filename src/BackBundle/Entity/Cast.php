<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cast
 *
 * @ORM\Table(name="cast")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\CastRepository")
 */
class Cast {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Movie",cascade={"persist"})
     */
    private $movies;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     * @Assert\Length(
     *     min=2, 
     *     minMessage="The firstname must be at least {{ limit }} characters long")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     * @Assert\Length(
     *     min=2, 
     *     minMessage="The lastname must be at least {{ limit }} characters long")
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     * 
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)
     * 
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="carreer", type="text")
     * @Assert\Length(
     *     max=2000, 
     *     maxMessage="The carreer description should have {{ limit }} characters or less "
     * )
     */
    private $carreer;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Cast
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Cast
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Cast
     */
    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate() {
        return $this->birthDate;
    }

    

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Cast
     */
    public function setPicture($picture) {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture() {
        return $this->picture;
    }

    /**
     * Set carreer
     *
     * @param string $carreer
     *
     * @return Cast
     */
    public function setCarreer($carreer) {
        $this->carreer = $carreer;

        return $this;
    }

    /**
     * Get carreer
     *
     * @return string
     */
    public function getCarreer() {
        return $this->carreer;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add movie
     *
     * @param \BackBundle\Entity\Movie $movie
     *
     * @return Cast
     */
    public function addMovie(\BackBundle\Entity\Movie $movie) {
        $this->movies[] = $movie;
        return $this;
    }

    /**
     * Remove movie
     *
     * @param \BackBundle\Entity\Movie $movie
     */
    public function removeMovie(\BackBundle\Entity\Movie $movie) {
        $this->movies->removeElement($movie);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMovies() {
        return $this->movies;
    }

    /**
      @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"image/jpeg"},
     *     mimeTypesMessage = "Please upload an image"
     * )
     */
    private $file;

    public function getFile() {
        return $this->file;
    }

    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
    }

    public function upload() {
        if (null === $this->file) {
            return;
        }
        $name = $this->file->getClientOriginalName();
        $this->file->move($this->getUploadRootDir(), $name);
        $this->url = $name;
        $this->picture = $name;
    }

    public function getUploadDir() {
        return 'PIC/cast';
    }

    public function getUploadRootDir() {
        return __DIR__ . '../../../../web/' . $this->getUploadDir();
    }


    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Cast
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }
}
