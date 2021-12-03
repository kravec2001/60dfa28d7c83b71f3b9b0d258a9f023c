<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbEvents
 *
 * @ORM\Table(name="psb_events", indexes={@ORM\Index(name="IDX_79FBDA8F178197C4", columns={"id_psb_user"})})
 * @ORM\Entity
 */
class PsbEvents
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_events_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="event", type="string", nullable=true)
     */
    private $event;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typ_event", type="string", nullable=true)
     */
    private $typEvent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", nullable=true)
     */
    private $text;

    /**
     * @var int|null
     *
     * @ORM\Column(name="to_telegr_bot", type="integer", nullable=true)
     */
    private $toTelegrBot = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="to_email", type="integer", nullable=true)
     */
    private $toEmail = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="count_ball", type="integer", nullable=true)
     */
    private $countBall = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="count_days", type="integer", nullable=true)
     */
    private $countDays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="event_hyperlink", type="string", nullable=true)
     */
    private $eventHyperlink;

    /**
     * @var \PsbUser
     *
     * @ORM\ManyToOne(targetEntity="PsbUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $idPsbUser;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }

    /**
     * @param string|null $event
     */
    public function setEvent(?string $event): void
    {
        $this->event = $event;
    }

    /**
     * @return string|null
     */
    public function getTypEvent(): ?string
    {
        return $this->typEvent;
    }

    /**
     * @param string|null $typEvent
     */
    public function setTypEvent(?string $typEvent): void
    {
        $this->typEvent = $typEvent;
    }

    /**
     * @return int|null
     */
    public function getToTelegrBot()
    {
        return $this->toTelegrBot;
    }

    /**
     * @param int|null $toTelegrBot
     */
    public function setToTelegrBot($toTelegrBot): void
    {
        $this->toTelegrBot = $toTelegrBot;
    }

    /**
     * @return int|null
     */
    public function getToEmail()
    {
        return $this->toEmail;
    }

    /**
     * @param int|null $toEmail
     */
    public function setToEmail($toEmail): void
    {
        $this->toEmail = $toEmail;
    }

    /**
     * @return int|null
     */
    public function getCountBall()
    {
        return $this->countBall;
    }

    /**
     * @param int|null $countBall
     */
    public function setCountBall($countBall): void
    {
        $this->countBall = $countBall;
    }

    /**
     * @return int|null
     */
    public function getCountDays(): ?int
    {
        return $this->countDays;
    }


}
