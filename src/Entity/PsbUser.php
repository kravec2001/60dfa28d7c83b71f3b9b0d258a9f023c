<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbUser
 *
 * @ORM\Table(name="psb_user")
 * @ORM\Entity
 */
class PsbUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_user_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fio", type="string", length=200, nullable=true)
     */
    private $fio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_manager", type="integer", nullable=true)
     */
    private $idManager;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_depart", type="integer", nullable=true)
     */
    private $idDepart;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_post", type="integer", nullable=true)
     */
    private $idPost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img", type="string", nullable=true)
     */
    private $img;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bonus", type="integer", nullable=true)
     */
    private $bonus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", nullable=true)
     */
    private $email;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_teacher", type="integer", nullable=true)
     */
    private $idTeacher;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="psbUser")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private ?User $user;

    /**
     * @ORM\ManyToOne(targetEntity="PsbPosts", inversedBy="psbUser")
     * @ORM\JoinColumn(name="id_post", referencedColumnName="id")
     */
    private ?PsbPosts $post;

    /**
     * @ORM\ManyToOne(targetEntity="PsbDeparts", inversedBy="psbUser")
     * @ORM\JoinColumn(name="id_depart", referencedColumnName="id")
     */
    private ?PsbDeparts $depart;


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
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * @param string|null $fio
     */
    public function setFio($fio)
    {
        $this->fio = $fio;
    }

    /**
     * @return int|null
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return int|null
     */
    public function getIdManager()
    {
        return $this->idManager;
    }

    /**
     * @param int|null $idManager
     */
    public function setIdManager($idManager)
    {
        $this->idManager = $idManager;
    }

    /**
     * @return int|null
     */
    public function getIdDepart()
    {
        return $this->idDepart;
    }

    /**
     * @param int|null $idDepart
     */
    public function setIdDepart($idDepart)
    {
        $this->idDepart = $idDepart;
    }

    /**
     * @return int|null
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * @param int|null $idPost
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }

    /**
     * @return string|null
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string|null $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return int|null
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * @param int|null $bonus
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return PsbUser
     */
    public function setUser(?User $user): PsbUser
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return PsbPosts|null
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param PsbPosts|null $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return PsbDeparts|null
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * @param PsbDeparts|null $depart
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getIdTeacher()
    {
        return $this->idTeacher;
    }

    /**
     * @param int|null $idTeacher
     */
    public function setIdTeacher($idTeacher)
    {
        $this->idTeacher = $idTeacher;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateStart(): ?\DateTime
    {
        return $this->dateStart;
    }

    /**
     * @param \DateTime|null $dateStart
     */
    public function setDateStart(?\DateTime $dateStart): void
    {
        $this->dateStart = $dateStart;
    }


}
