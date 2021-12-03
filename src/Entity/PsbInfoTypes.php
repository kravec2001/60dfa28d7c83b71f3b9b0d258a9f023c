<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbInfoTypes
 *
 * @ORM\Table(name="psb_info_types", uniqueConstraints={@ORM\UniqueConstraint(name="psb_types_info_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbInfoTypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_types_info_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_type", type="string", nullable=true)
     */
    private $nameType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_type", type="string", nullable=true)
     */
    private $imgType;

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
    public function getNameType(): ?string
    {
        return $this->nameType;
    }

    /**
     * @param string|null $nameType
     */
    public function setNameType(?string $nameType): void
    {
        $this->nameType = $nameType;
    }

    /**
     * @return string|null
     */
    public function getImgType(): ?string
    {
        return $this->imgType;
    }

    /**
     * @param string|null $imgType
     */
    public function setImgType(?string $imgType): void
    {
        $this->imgType = $imgType;
    }


}
