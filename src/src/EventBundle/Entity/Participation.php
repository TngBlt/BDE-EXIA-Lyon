<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\ParticipationRepository")
 */
class Participation
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",inversedBy="eventsParticipations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EventBundle\Entity\ActivityEvent",inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;


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
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Participation
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
     * Set event
     *
     * @param \EventBundle\Entity\ActivityEvent $event
     *
     * @return Participation
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
}
