<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbProfiles
 *
 * @ORM\Table(name="psb_profiles", uniqueConstraints={@ORM\UniqueConstraint(name="psb_profiles_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbProfiles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_profiles_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profile", type="string", nullable=true)
     */
    private $profile;

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
    public function getProfile(): ?string
    {
        return $this->profile;
    }

    /**
     * @param string|null $profile
     */
    public function setProfile(?string $profile): void
    {
        $this->profile = $profile;
    }


}
