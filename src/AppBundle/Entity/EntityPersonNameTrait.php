<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

trait EntityPersonNameTrait
{
    /**
     * @ORM\Column(length=50)
     */
    private $firstName;

    /**
     * @ORM\Column(length=50)
     */
    private $lastName;

    public function __toString(): string
    {
        return $this->getFullName();
    }

    public function getFullName(): string
    {
        return $this->firstName.' '.$this->lastName;
    }

    public function getPartialName(): string
    {
        return $this->firstName.' '.$this->getLastNameInitial();
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getLastNameInitial()
    {
        $normalized = preg_replace('/[^a-z]+/', '', strtolower($this->lastName));

        return strtoupper($normalized[0]).'.';
    }
}
