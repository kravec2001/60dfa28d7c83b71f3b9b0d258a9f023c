<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbEventsPers
 *
 * @ORM\Table(name="psb_events_pers", uniqueConstraints={@ORM\UniqueConstraint(name="psb_events_pers_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbEventsPers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_events_pers_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_events", type="integer", nullable=false)
     */
    private $idEvents;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="number_order", type="integer", nullable=true)
     */
    private $numberOrder;

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
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return int
     */
    public function getIdEvents(): int
    {
        return $this->idEvents;
    }

    /**
     * @param int $idEvents
     */
    public function setIdEvents(int $idEvents): void
    {
        $this->idEvents = $idEvents;
    }

    /**
     * @return int|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return int|null
     */
    public function getNumberOrder(): ?int
    {
        return $this->numberOrder;
    }

    /**
     * @param int|null $numberOrder
     */
    public function setNumberOrder(?int $numberOrder): void
    {
        $this->numberOrder = $numberOrder;
    }

}
