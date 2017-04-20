<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="activityEvent")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\EventRepository")
 */
class ActivityEvent
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
     * @ORM\Column(name="title", type="string", length=255)
     * @ORM\JoinColumn(nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", length=255, nullable=true)
     */
    private $frequency;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="EventBundle\Entity\EventProposition")
     * @ORM\JoinColumn(nullable=true)
     */
    private $initialProposition;

    /**
     * @ORM\OneToMany(targetEntity="EventBundle\Entity\Participation", mappedBy="event", cascade={"persist","remove"})
     */
    private $participations;

    /**
     * @ORM\OneToMany(targetEntity="GalleryBundle\Entity\Picture", mappedBy="event")
     */
    private $pictures;

    public function getRandomPicture(){
        if(count($this->pictures) > 0){
            return $this->pictures->get(random_int(0,count($this->pictures)-1));
        } else {
            return null;
        }
    }

    function __toString()
    {
        return $this->getDate()->format("Y-m-d")." ".$this->getTitle();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ActivityEvent
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function isFinished(){
        return (new \DateTime()) > $this->getDate();
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
     * Set title
     *
     * @param string $title
     *
     * @return ActivityEvent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ActivityEvent
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return ActivityEvent
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set frequency
     *
     * @param string $frequency
     *
     * @return ActivityEvent
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return string
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set initialProposition
     *
     * @param \EventBundle\Entity\EventProposition $initialProposition
     *
     * @return ActivityEvent
     */
    public function setInitialProposition(\EventBundle\Entity\EventProposition $initialProposition = null)
    {
        $this->initialProposition = $initialProposition;

        return $this;
    }

    /**
     * Get initialProposition
     *
     * @return \EventBundle\Entity\EventProposition
     */
    public function getInitialProposition()
    {
        return $this->initialProposition;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->date = new \DateTime();
    }

    /**
     * Add participation
     *
     * @param \EventBundle\Entity\Participation $participation
     *
     * @return ActivityEvent
     */
    public function addParticipation(\EventBundle\Entity\Participation $participation)
    {
        $this->participations[] = $participation;

        return $this;
    }

    public function doUserParticipate($user){
        if(!$user) return false;
        foreach ($this->getParticipations() as $participations){
            if($participations->getUser()->getId() == $user->getId()){
                return true;
            }
        }
        return false;
    }

    /**
     * Remove participation
     *
     * @param \EventBundle\Entity\Participation $participation
     */
    public function removeParticipation(\EventBundle\Entity\Participation $participation)
    {
        $this->participations->removeElement($participation);
    }

    /**
     * Get participations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipations()
    {
        return $this->participations;
    }

    /**
     * Add picture
     *
     * @param \GalleryBundle\Entity\Picture $picture
     *
     * @return ActivityEvent
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
