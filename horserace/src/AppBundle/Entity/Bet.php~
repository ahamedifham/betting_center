<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * HorseRace
 *
 * @ORM\Table(name="bet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BetRepository")
 */
class Bet {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="HorseRace")
     * @ORM\JoinColumn(name="horse1_race1_id", referencedColumnName="id")
     */
    private $horse_one;

    /**
     * @ORM\ManyToOne(targetEntity="HorseRace")
     * @ORM\JoinColumn(name="horse2_race2_id", referencedColumnName="id")
     */
    private $horse_two;

    /**
     * @ORM\ManyToOne(targetEntity="HorseRace")
     * @ORM\JoinColumn(name="horse3_race3_id", referencedColumnName="id")
     */
    private $horse_three;

    /**
     * @ORM\ManyToOne(targetEntity="HorseRace")
     * @ORM\JoinColumn(name="horse4_race4_id", referencedColumnName="id")
     */
    private $horse_four;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Bet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Bet
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set horse_one
     *
     * @param \AppBundle\Entity\HorseRace $horseOne
     * @return Bet
     */
    public function setHorseOne(\AppBundle\Entity\HorseRace $horseOne = null)
    {
        $this->horse_one = $horseOne;

        return $this;
    }

    /**
     * Get horse_one
     *
     * @return \AppBundle\Entity\HorseRace 
     */
    public function getHorseOne()
    {
        return $this->horse_one;
    }

    /**
     * Set horse_two
     *
     * @param \AppBundle\Entity\HorseRace $horseTwo
     * @return Bet
     */
    public function setHorseTwo(\AppBundle\Entity\HorseRace $horseTwo = null)
    {
        $this->horse_two = $horseTwo;

        return $this;
    }

    /**
     * Get horse_two
     *
     * @return \AppBundle\Entity\HorseRace 
     */
    public function getHorseTwo()
    {
        return $this->horse_two;
    }

    /**
     * Set horse_three
     *
     * @param \AppBundle\Entity\HorseRace $horseThree
     * @return Bet
     */
    public function setHorseThree(\AppBundle\Entity\HorseRace $horseThree = null)
    {
        $this->horse_three = $horseThree;

        return $this;
    }

    /**
     * Get horse_three
     *
     * @return \AppBundle\Entity\HorseRace 
     */
    public function getHorseThree()
    {
        return $this->horse_three;
    }

    /**
     * Set horse_four
     *
     * @param \AppBundle\Entity\HorseRace $horseFour
     * @return Bet
     */
    public function setHorseFour(\AppBundle\Entity\HorseRace $horseFour = null)
    {
        $this->horse_four = $horseFour;

        return $this;
    }

    /**
     * Get horse_four
     *
     * @return \AppBundle\Entity\HorseRace 
     */
    public function getHorseFour()
    {
        return $this->horse_four;
    }

    public function __toString()
    {
        return $this->id != null ? $this->getName() : 'New Record';
    }
}
