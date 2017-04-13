<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventProposition
 *
 * @ORM\Table(name="event_proposition")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\EventPropositionRepository")
 */
class EventProposition
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="proposedDate", type="datetime")
     */
    private $proposedDate;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",inversedBy="eventsProposed")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="EventBundle\Entity\EventPropositionVote", mappedBy="proposition")
     */
    private $votes;


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
     * Set title
     *
     * @param string $title
     *
     * @return EventProposition
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
     * @return EventProposition
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
     * Set proposedDate
     *
     * @param \DateTime $proposedDate
     *
     * @return EventProposition
     */
    public function setProposedDate($proposedDate)
    {
        $this->proposedDate = $proposedDate;

        return $this;
    }

    /**
     * Get proposedDate
     *
     * @return \DateTime
     */
    public function getProposedDate()
    {
        return $this->proposedDate;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return EventProposition
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
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vote
     *
     * @param \EventBundle\Entity\EventPropositionVote $vote
     *
     * @return EventProposition
     */
    public function addVote(\EventBundle\Entity\EventPropositionVote $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove vote
     *
     * @param \EventBundle\Entity\EventPropositionVote $vote
     */
    public function removeVote(\EventBundle\Entity\EventPropositionVote $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
