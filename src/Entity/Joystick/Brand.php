<?php

namespace App\Entity\Joystick;

use App\Repository\Joystick\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    use TimestampableEntity;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'brand', targetEntity: Joystick::class, orphanRemoval: true)]
    private Collection $joysticks;

    public function __construct()
    {
        $this->joysticks = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Joystick>
     */
    public function getJoysticks(): Collection
    {
        return $this->joysticks;
    }

    public function addJoystick(Joystick $joystick): static
    {
        if (!$this->joysticks->contains($joystick)) {
            $this->joysticks->add($joystick);
            $joystick->setBrand($this);
        }

        return $this;
    }

    public function removeJoystick(Joystick $joystick): static
    {
        if ($this->joysticks->removeElement($joystick)) {
            // set the owning side to null (unless already changed)
            if ($joystick->getBrand() === $this) {
                $joystick->setBrand(null);
            }
        }

        return $this;
    }
}
