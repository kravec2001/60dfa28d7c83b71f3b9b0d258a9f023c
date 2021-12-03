<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbProjects
 *
 * @ORM\Table(name="psb_projects", uniqueConstraints={@ORM\UniqueConstraint(name="psb_projects_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbProjects
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_projects_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_project", type="string", nullable=true)
     */
    private $imgProject;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_manager", type="integer", nullable=true)
     */
    private $idManager;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private $descript;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getImgProject(): ?string
    {
        return $this->imgProject;
    }

    /**
     * @param string|null $imgProject
     */
    public function setImgProject(?string $imgProject): void
    {
        $this->imgProject = $imgProject;
    }

    /**
     * @return int|null
     */
    public function getIdManager(): ?int
    {
        return $this->idManager;
    }

    /**
     * @param int|null $idManager
     */
    public function setIdManager(?int $idManager): void
    {
        $this->idManager = $idManager;
    }

    /**
     * @return string|null
     */
    public function getDescript(): ?string
    {
        return $this->descript;
    }

    /**
     * @param string|null $descript
     */
    public function setDescript(?string $descript): void
    {
        $this->descript = $descript;
    }


}
