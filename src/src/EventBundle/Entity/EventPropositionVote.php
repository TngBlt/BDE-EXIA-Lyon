<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventPropositionVote
 *
 * @ORM\Table(name="event_proposition_vote")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\EventPropositionVoteRepository")
 */
class EventPropositionVote
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",inversedBy="eventsVoted")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EventBundle\Entity\EventProposition",inversedBy="votes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proposition;


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
     * @return EventPropositionVote
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
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return EventPropositionVote
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
     * Set proposition
     *
     * @param \EventBundle\Entity\EventProposition $proposition
     *
     * @return EventPropositionVote
     */
    public function setProposition(\EventBundle\Entity\EventProposition $proposition)
    {
        $this->proposition = $proposition;

        return $this;
    }

    /**
     * Get proposition
     *
     * @return \EventBundle\Entity\EventProposition
     */
    public function getProposition()
    {
        return $this->proposition;
    }
}
