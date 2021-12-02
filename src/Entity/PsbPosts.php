<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbPosts
 *
 * @ORM\Table(name="psb_posts", uniqueConstraints={@ORM\UniqueConstraint(name="psb_posts_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbPosts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_posts_id_seq", allocationSize=1, initialValue=1)
     */
    private $idPost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="PsbUser", mappedBy="idPost")
     */
    private $psbUser;

    /**
     * @return int
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * @param int $idPost
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
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
