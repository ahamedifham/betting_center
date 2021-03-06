<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HorseRace
 *
 * @ORM\Table(name="horse_race")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HorseRaceRepository")
 */
class HorseRace
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @ORM\ManyToOne(targetEntity="Horse")
     * @ORM\JoinColumn(name="horse_id", referencedColumnName="id")
     */
    private $horse;

    /**
     * @ORM\ManyToOne(targetEntity="Race")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="id")
     */
    private $race;

    /**
     * @var int
     *
     * @ORM\Column(name="place", type="integer", length=255, nullable=true)
     */
    private $place;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", length=255, nullable=true)
     */
    private $price;
    

    /**
     * Set horse
     *
     * @param \AppBundle\Entity\Horse $horse
     * @return HorseRace
     */
    public function setHorse(\AppBundle\Entity\Horse $horse = null)
    {
        $this->horse = $horse;

        return $this;
    }

    /**
     * Get horse
     *
     * @return \AppBundle\Entity\Horse 
     */
    public function getHorse()
    {
        return $this->horse;
    }

    /**
     * Set race
     *
     * @param \AppBundle\Entity\Race $race
     * @return HorseRace
     */
    public function setRace(\AppBundle\Entity\Race $race = null)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return \AppBundle\Entity\Race 
     */
    public function getRace()
    {
        return $this->race;
    }

    public function __toString()
    {
        return $this->getHorse()->getName().' - '.$this->getRace()->getName() ;
    }

    /**
     * Set place
     *
     * @param integer $place
     * @return HorseRace
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return integer 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return HorseRace
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }
}
