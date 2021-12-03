<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbProjectUsers
 *
 * @ORM\Table(name="psb_project_users", uniqueConstraints={@ORM\UniqueConstraint(name="psb_project_users_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbProjectUsers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_project_users_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_project", type="integer", nullable=true)
     */
    private $idProject;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

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
    public function getIdProject(): ?int
    {
        return $this->idProject;
    }

    /**
     * @param int|null $idProject
     */
    public function setIdProject(?int $idProject): void
    {
        $this->idProject = $idProject;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     */
    public function setIdUser(?int $idUser): void
    {
        $this->idUser = $idUser;
    }

}
