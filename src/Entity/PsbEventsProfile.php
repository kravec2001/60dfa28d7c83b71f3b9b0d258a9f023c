<?php

namespace App\Entity;

use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping as ORM;

/**
 * PsbEventsProfile
 *
 * @ORM\Table(name="psb_events_profile", uniqueConstraints={@ORM\UniqueConstraint(name="events_profile_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbEventsProfile
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_events_profile_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_profile", type="integer", nullable=true)
     */
    private $idProfile;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_events", type="integer", nullable=true)
     */
    private $idEvents;

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
     * @return int|null
     */
    public function getIdProfile(): ?int
    {
        return $this->idProfile;
    }

    /**
     * @param int|null $idProfile
     */
    public function setIdProfile(?int $idProfile): void
    {
        $this->idProfile = $idProfile;
    }

    /**
     * @return int|null
     */
    public function getIdEvents(): ?int
    {
        return $this->idEvents;
    }

    /**
     * @param int|null $idEvents
     */
    public function setIdEvents(?int $idEvents): void
    {
        $this->idEvents = $idEvents;
    }

}
