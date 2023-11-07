<?php

namespace App\Entity\Joystick;

use App\Repository\Joystick\KeyRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: KeyRepository::class)]
#[ORM\Table(name: 'joystick_key')]
class Key
{
    use TimestampableEntity;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\ManyToOne(inversedBy: 'keys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Joystick $joystick = null;

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getJoystick(): ?Joystick
    {
        return $this->joystick;
    }

    public function setJoystick(?Joystick $joystick): static
    {
        $this->joystick = $joystick;

        return $this;
    }
}
