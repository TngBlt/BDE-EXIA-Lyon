<?php

namespace GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EventBundle\EventBundle;
use UserBundle\Entity\User;
use UserBundle\UserBundle;
use Symfony\Component\Validator\Constraints\Image;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="GalleryBundle\Repository\PictureRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Picture
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
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \EventBundle\Entity\ActivityEvent
     *
     * @ORM\ManyToOne(targetEntity="EventBundle\Entity\ActivityEvent",inversedBy="pictures")
     * @ORM\JoinColumn(nullable=true)
     */
    private $event;

    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", mappedBy="picturesLiked", cascade={"persist"})
     */
    private $usersLiked;

    /**
     * @Image(
     *     maxSize="5M",
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB."
     *     )
     */
    private $file;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="GalleryBundle\Entity\PictureComment", mappedBy="picture", cascade={"persist"})
     */
    private $comments;

    function __toString()
    {
        return $this->getPath();
    }

    /**
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if ($this->file !== null) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->file->guessExtension();
        }
    }

    /**
     * Called after entity persistence
     *
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        $this->file->move(
            $this->getUploadRootDir(),
            $this->path
        );

        $this->file = null;
    }

    public function getUploadRootDir(){
        return __DIR__."/../../../web/img/uploads/pictures";
    }

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
     * Set path
     *
     * @param string $path
     *
     * @return Picture
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
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

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Picture
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
     * Set event
     *
     * @param \EventBundle\Entity\ActivityEvent $event
     *
     * @return Picture
     */
    public function setEvent(\EventBundle\Entity\ActivityEvent $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \EventBundle\Entity\ActivityEvent
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Picture
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usersLiked = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usersLiked
     *
     * @param \UserBundle\Entity\User $usersLiked
     *
     * @return Picture
     */
    public function addUsersLiked(\UserBundle\Entity\User $usersLiked)
    {
        $this->usersLiked[] = $usersLiked;

        return $this;
    }

    /**
     * Remove usersLiked
     *
     * @param \UserBundle\Entity\User $usersLiked
     */
    public function removeUsersLiked(\UserBundle\Entity\User $usersLiked)
    {
        $this->usersLiked->removeElement($usersLiked);
    }

    /**
     * Get usersLiked
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersLiked()
    {
        return $this->usersLiked;
    }

    /**
     *
     * @return Boolean
     */
    public function doUserLikes($user) {
        if($this->getUsersLiked()->contains($user))
        {
            return true;
        }
        else {
            return false;
        }
    }



    /**
     * Add comment
     *
     * @param \GalleryBundle\Entity\PictureComment $comment
     *
     * @return Picture
     */
    public function addComment(\GalleryBundle\Entity\PictureComment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \GalleryBundle\Entity\PictureComment $comment
     */
    public function removeComment(\GalleryBundle\Entity\PictureComment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    public function getCommentCount()
    {
        $commentsCount = count($this->getComments());

        return $commentsCount;
    }
}
