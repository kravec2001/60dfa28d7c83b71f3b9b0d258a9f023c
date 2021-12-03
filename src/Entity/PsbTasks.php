<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbTasks
 *
 * @ORM\Table(name="psb_tasks", uniqueConstraints={@ORM\UniqueConstraint(name="psb_tasks_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbTasks
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_tasks_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_test", type="integer", nullable=true)
     */
    private $idTest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="task", type="string", nullable=true)
     */
    private $task;

    /**
     * @var string|null
     *
     * @ORM\Column(name="answer1", type="string", nullable=true)
     */
    private $answer1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="answer2", type="string", nullable=true)
     */
    private $answer2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="answer3", type="string", nullable=true)
     */
    private $answer3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="answer4", type="string", nullable=true)
     */
    private $answer4;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bonus", type="integer", nullable=true)
     */
    private $bonus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_task", type="string", nullable=true)
     */
    private $imgTask;

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
    public function getIdTest(): ?int
    {
        return $this->idTest;
    }

    /**
     * @param int|null $idTest
     */
    public function setIdTest(?int $idTest): void
    {
        $this->idTest = $idTest;
    }

    /**
     * @return string|null
     */
    public function getTask(): ?string
    {
        return $this->task;
    }

    /**
     * @param string|null $task
     */
    public function setTask(?string $task): void
    {
        $this->task = $task;
    }

    /**
     * @return string|null
     */
    public function getAnswer1(): ?string
    {
        return $this->answer1;
    }

    /**
     * @param string|null $answer1
     */
    public function setAnswer1(?string $answer1): void
    {
        $this->answer1 = $answer1;
    }

    /**
     * @return string|null
     */
    public function getAnswer2(): ?string
    {
        return $this->answer2;
    }

    /**
     * @param string|null $answer2
     */
    public function setAnswer2(?string $answer2): void
    {
        $this->answer2 = $answer2;
    }

    /**
     * @return string|null
     */
    public function getAnswer3(): ?string
    {
        return $this->answer3;
    }

    /**
     * @param string|null $answer3
     */
    public function setAnswer3(?string $answer3): void
    {
        $this->answer3 = $answer3;
    }

    /**
     * @return string|null
     */
    public function getAnswer4(): ?string
    {
        return $this->answer4;
    }

    /**
     * @param string|null $answer4
     */
    public function setAnswer4(?string $answer4): void
    {
        $this->answer4 = $answer4;
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
    public function getImgTask(): ?string
    {
        return $this->imgTask;
    }

    /**
     * @param string|null $imgTask
     */
    public function setImgTask(?string $imgTask): void
    {
        $this->imgTask = $imgTask;
    }


}
