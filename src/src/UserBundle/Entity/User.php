<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @var string
     * @Regex(
     *     pattern="/^[^@]+@(via)?cesi\.fr$/i",
     *     htmlPattern="^[^@]+@(via)?cesi\.fr$",
     *     message="The email must be a valid Cesi.fr or Viacesi.fr email")
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Prom")
     * @ORM\JoinColumn(nullable=true)
     */
    private $prom;

    /**
     * @ORM\ManyToMany(targetEntity="GalleryBundle\Entity\Picture", cascade={"persist"})
     */
    private $picturesLiked;

    /**
     * @ORM\ManyToMany(targetEntity="EventBundle\Entity\EventProposition", cascade={"persist"})
     */
    private $votedPropositions;

    /**
     * @ORM\OneToMany(targetEntity="EventBundle\Entity\EventProposition", mappedBy="user")
     */
    private $eventsProposed;

    /**
     * @ORM\OneToMany(targetEntity="EventBundle\Entity\Participation", mappedBy="user")
     */
    private $eventsParticipations;

    /**
     * @ORM\OneToMany(targetEntity="GalleryBundle\Entity\Picture", mappedBy="user")
     */
    private $pictures;

    /**
     * @ORM\OneToMany(targetEntity="EventBundle\Entity\EventPropositionVote", mappedBy="user")
     */
    private $eventsVoted;

    function __toString()
    {
        return $this->getFullName();
    }


    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
        return null;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {

        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getRoles()
    {
        return array($this->role);
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set prom
     *
     * @param \UserBundle\Entity\Prom $prom
     *
     * @return User
     */
    public function setProm(\UserBundle\Entity\Prom $prom)
    {
        $this->prom = $prom;

        return $this;
    }

    /**
     * Get prom
     *
     * @return \UserBundle\Entity\Prom
     */
    public function getProm()
    {
        return $this->prom;
    }

    public function getFullName(){
        $name = "";
        if($this->getFirstname() or $this->getLastname()){
            if ($this->getFirstname()) {
                $name = $name . $this->getFirstname();
                if ($this->getLastname()) {
                    $name = $name . " " . $this->getLastname();
                }
            } else if ($this->getLastname()) {
                $name = $name . $this->getLastname();
            }

        } else if($this->getUsername()) {
            $name = $this->getUsername();
        } else {
            $name = $this->getEmail();
        }

        return $name;
    }

    public function getTranslatedRole(){
        switch($this->getRole()){
            case "ROLE_USER":
                return "Member";
            case "ROLE_STAFF":
                return "BDE's team";
            case "ROLE_BOSS":
                return "CESI's team";
            default:
                return $this->getRole();
        }
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->picturesLiked = new \Doctrine\Common\Collections\ArrayCollection();
        $this->votedPropositions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add picturesLiked
     *
     * @param \GalleryBundle\Entity\Picture $picturesLiked
     *
     * @return User
     */
    public function addPicturesLiked(\GalleryBundle\Entity\Picture $picturesLiked)
    {
        $this->picturesLiked[] = $picturesLiked;

        return $this;
    }

    /**
     * Remove picturesLiked
     *
     * @param \GalleryBundle\Entity\Picture $picturesLiked
     */
    public function removePicturesLiked(\GalleryBundle\Entity\Picture $picturesLiked)
    {
        $this->picturesLiked->removeElement($picturesLiked);
    }

    /**
     * Get picturesLiked
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPicturesLiked()
    {
        return $this->picturesLiked;
    }

    /**
     * Add votedProposition
     *
     * @param \EventBundle\Entity\EventProposition $votedProposition
     *
     * @return User
     */
    public function addVotedProposition(\EventBundle\Entity\EventProposition $votedProposition)
    {
        $this->votedPropositions[] = $votedProposition;

        return $this;
    }

    /**
     * Remove votedProposition
     *
     * @param \EventBundle\Entity\EventProposition $votedProposition
     */
    public function removeVotedProposition(\EventBundle\Entity\EventProposition $votedProposition)
    {
        $this->votedPropositions->removeElement($votedProposition);
    }

    /**
     * Get votedPropositions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVotedPropositions()
    {
        return $this->votedPropositions;
    }

    /**
     * Add eventsProposed
     *
     * @param \EventBundle\Entity\EventProposition $eventsProposed
     *
     * @return User
     */
    public function addEventsProposed(\EventBundle\Entity\EventProposition $eventsProposed)
    {
        $this->eventsProposed[] = $eventsProposed;

        return $this;
    }

    /**
     * Remove eventsProposed
     *
     * @param \EventBundle\Entity\EventProposition $eventsProposed
     */
    public function removeEventsProposed(\EventBundle\Entity\EventProposition $eventsProposed)
    {
        $this->eventsProposed->removeElement($eventsProposed);
    }

    /**
     * Get eventsProposed
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventsProposed()
    {
        return $this->eventsProposed;
    }

    /**
     * Add eventsParticipation
     *
     * @param \EventBundle\Entity\Participation $eventsParticipation
     *
     * @return User
     */
    public function addEventsParticipation(\EventBundle\Entity\Participation $eventsParticipation)
    {
        $this->eventsParticipations[] = $eventsParticipation;

        return $this;
    }

    /**
     * Remove eventsParticipation
     *
     * @param \EventBundle\Entity\Participation $eventsParticipation
     */
    public function removeEventsParticipation(\EventBundle\Entity\Participation $eventsParticipation)
    {
        $this->eventsParticipations->removeElement($eventsParticipation);
    }

    /**
     * Get eventsParticipations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventsParticipations()
    {
        return $this->eventsParticipations;
    }

    /**
     * Add eventsVoted
     *
     * @param \EventBundle\Entity\EventPropositionVote $eventsVoted
     *
     * @return User
     */
    public function addEventsVoted(\EventBundle\Entity\EventPropositionVote $eventsVoted)
    {
        $this->eventsVoted[] = $eventsVoted;

        return $this;
    }

    /**
     * Remove eventsVoted
     *
     * @param \EventBundle\Entity\EventPropositionVote $eventsVoted
     */
    public function removeEventsVoted(\EventBundle\Entity\EventPropositionVote $eventsVoted)
    {
        $this->eventsVoted->removeElement($eventsVoted);
    }

    /**
     * Get eventsVoted
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventsVoted()
    {
        return $this->eventsVoted;
    }

    /**
     * Add picture
     *
     * @param \GalleryBundle\Entity\Picture $picture
     *
     * @return User
     */
    public function addPicture(\GalleryBundle\Entity\Picture $picture)
    {
        $this->pictures[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \GalleryBundle\Entity\Picture $picture
     */
    public function removePicture(\GalleryBundle\Entity\Picture $picture)
    {
        $this->pictures->removeElement($picture);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}
