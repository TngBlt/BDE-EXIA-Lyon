<?php

namespace GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PictureComment
 *
 * @ORM\Table(name="picture_comment")
 * @ORM\Entity(repositoryClass="GalleryBundle\Repository\PictureCommentRepository")
 */
class PictureComment
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="GalleryBundle\Entity\Picture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return PictureComment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return PictureComment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set picture
     *
     * @param \GalleryBundle\Entity\Picture $picture
     *
     * @return PictureComment
     */
    public function setPicture(\GalleryBundle\Entity\Picture $picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \GalleryBundle\Entity\Picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return PictureComment
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
