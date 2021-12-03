<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbInfo
 *
 * @ORM\Table(name="psb_info", uniqueConstraints={@ORM\UniqueConstraint(name="psb_info_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbInfo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_info_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="type_info", type="integer", nullable=true)
     */
    private $typeInfo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="data_info", type="string", nullable=true)
     */
    private $dataInfo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_info", type="datetime", nullable=true)
     */
    private $dateInfo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_info", type="string", nullable=true)
     */
    private $imgInfo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bonus", type="integer", nullable=true)
     */
    private $bonus;

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
    public function getTypeInfo(): ?int
    {
        return $this->typeInfo;
    }

    /**
     * @param int|null $typeInfo
     */
    public function setTypeInfo(?int $typeInfo): void
    {
        $this->typeInfo = $typeInfo;
    }

    /**
     * @return string|null
     */
    public function getDataInfo(): ?string
    {
        return $this->dataInfo;
    }

    /**
     * @param string|null $dataInfo
     */
    public function setDataInfo(?string $dataInfo): void
    {
        $this->dataInfo = $dataInfo;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateInfo(): ?\DateTime
    {
        return $this->dateInfo;
    }

    /**
     * @param \DateTime|null $dateInfo
     */
    public function setDateInfo(?\DateTime $dateInfo): void
    {
        $this->dateInfo = $dateInfo;
    }

    /**
     * @return string|null
     */
    public function getImgInfo(): ?string
    {
        return $this->imgInfo;
    }

    /**
     * @param string|null $imgInfo
     */
    public function setImgInfo(?string $imgInfo): void
    {
        $this->imgInfo = $imgInfo;
    }

    /**
     * @return int|null
     */
    public function getBonus(): ?int
    {
        return $this->bonus;
    }

    /**
     * @param int|null $bonus
     */
    public function setBonus(?int $bonus): void
    {
        $this->bonus = $bonus;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }


}
