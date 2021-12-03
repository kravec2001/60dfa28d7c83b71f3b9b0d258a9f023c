<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsbNews
 *
 * @ORM\Table(name="psb_tests", uniqueConstraints={@ORM\UniqueConstraint(name="psb_tests_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class PsbTests
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="psb_tests_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_test", type="string", nullable=true)
     */
    private $nameTest;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_test", type="datetime", nullable=true)
     */
    private $dateTest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_test", type="string", nullable=true)
     */
    private $imgTest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private $descript;

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
    public function getNameTest()
    {
        return $this->nameTest;
    }

    /**
     * @param string|null $nameTest
     */
    public function setNameTest($nameTest)
    {
        $this->nameTest = $nameTest;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateTest()
    {
        return $this->dateTest;
    }

    /**
     * @param \DateTime|null $dateTest
     */
    public function setDateTest($dateTest)
    {
        $this->dateTest = $dateTest;
    }

    /**
     * @return string|null
     */
    public function getImgTest()
    {
        return $this->imgTest;
    }

    /**
     * @param string|null $imgTest
     */
    public function setImgTest($imgTest)
    {
        $this->imgTest = $imgTest;
    }

    /**
     * @return string|null
     */
    public function getDescript()
    {
        return $this->descript;
    }

    /**
     * @param string|null $descript
     */
    public function setDescript($descript)
    {
        $this->descript = $descript;
    }


}
