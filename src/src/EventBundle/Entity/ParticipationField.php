<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipationField
 *
 * @ORM\Table(name="participation_field")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\ParticipationFieldRepository")
 */
class ParticipationField
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="tooltip", type="string", length=255, nullable=true)
     */
    private $tooltip;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EventBundle\Entity\ActivityEvent")
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
     * Set name
     *
     * @param string $name
     *
     * @return ParticipationField
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set tooltip
     *
     * @param string $tooltip
     *
     * @return ParticipationField
     */
    public function setTooltip($tooltip)
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    /**
     * Get tooltip
     *
     * @return string
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * Set event
     *
     * @param \EventBundle\Entity\ActivityEvent $event
     *
     * @return ParticipationField
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
