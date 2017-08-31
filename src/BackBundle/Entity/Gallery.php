<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\GalleryRepository")
 */
class Gallery {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Movie")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $movie;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Gallery
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Gallery
     */
    public function setAlt($alt) {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt() {
        return $this->alt;
    }

    /**
     * Set movie
     *
     * @param \BackBundle\Entity\Movie $movie
     *
     * @return Gallery
     */
    public function setMovie(\BackBundle\Entity\Movie $movie = null) {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \BackBundle\Entity\Movie
     */
    public function getMovie() {
        return $this->movie;
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
        $this->path = $name;
    }

    public function getUploadDir() {
        return 'PIC/gallery';
    }

    public function getUploadRootDir() {
        return __DIR__ . '../../../../web/' . $this->getUploadDir();
    }


    /**
     * Set path
     *
     * @param string $path
     *
     * @return Gallery
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
