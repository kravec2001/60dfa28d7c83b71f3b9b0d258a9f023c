<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbDeparts
 *
 * @ORM\Table(name="psb_departs", uniqueConstraints={@ORM\UniqueConstraint(name="psb_departs_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbDeparts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_departs_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="PsbUser", mappedBy="idDepart")
     */
    private $psbUser;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPsbUser()
    {
        return $this->psbUser;
    }

    /**
     * @param mixed $psbUser
     */
    public function setPsbUser($psbUser)
    {
        $this->psbUser = $psbUser;
    }

}
