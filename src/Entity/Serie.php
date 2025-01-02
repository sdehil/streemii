<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity
 */
class Serie
{
    /**
     * @var \Media
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getId(): ?Media
    {
        return $this->id;
    }

    public function setId(?Media $id): self
    {
        $this->id = $id;

        return $this;
    }


}
