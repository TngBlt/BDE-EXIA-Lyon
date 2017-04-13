<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnswerParticipationField
 *
 * @ORM\Table(name="answer_participation_field")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\AnswerParticipationFieldRepository")
 */
class AnswerParticipationField
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EventBundle\Entity\Participation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participation;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EventBundle\Entity\ParticipationField")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participationField;


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
     * Set content
     *
     * @param string $content
     *
     * @return AnswerParticipationField
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
     * Set participation
     *
     * @param \EventBundle\Entity\Participation $participation
     *
     * @return AnswerParticipationField
     */
    public function setParticipation(\EventBundle\Entity\Participation $participation)
    {
        $this->participation = $participation;

        return $this;
    }

    /**
     * Get participation
     *
     * @return \EventBundle\Entity\Participation
     */
    public function getParticipation()
    {
        return $this->participation;
    }

    /**
     * Set participationField
     *
     * @param \EventBundle\Entity\ParticipationField $participationField
     *
     * @return AnswerParticipationField
     */
    public function setParticipationField(\EventBundle\Entity\ParticipationField $participationField)
    {
        $this->participationField = $participationField;

        return $this;
    }

    /**
     * Get participationField
     *
     * @return \EventBundle\Entity\ParticipationField
     */
    public function getParticipationField()
    {
        return $this->participationField;
    }
}
