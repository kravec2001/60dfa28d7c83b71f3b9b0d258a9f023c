<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbEventsTypes
 *
 * @ORM\Table(name="psb_events_types", uniqueConstraints={@ORM\UniqueConstraint(name="psb_events_types_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbEventsTypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_events_types_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;


}
