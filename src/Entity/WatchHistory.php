<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WatchHistory
 *
 * @ORM\Table(name="watch_history", indexes={@ORM\Index(name="IDX_DE44EFD8EA9FDD75", columns={"media_id"}), @ORM\Index(name="IDX_DE44EFD8C300AB5D", columns={"watcher_id"})})
 * @ORM\Entity
 */
class WatchHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var datetime_immutable
     *
     * @ORM\Column(name="last_watched_at", type="datetime_immutable", nullable=false)
     */
    private $lastWatchedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_views", type="integer", nullable=false)
     */
    private $numberOfViews;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="watcher_id", referencedColumnName="id")
     * })
     */
    private $watcher;

    /**
     * @var \Media
     *
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     * })
     */
    private $media;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastWatchedAt(): ?\DateTimeImmutable
    {
        return $this->lastWatchedAt;
    }

    public function setLastWatchedAt(\DateTimeImmutable $lastWatchedAt): self
    {
        $this->lastWatchedAt = $lastWatchedAt;

        return $this;
    }

    public function getNumberOfViews(): ?int
    {
        return $this->numberOfViews;
    }

    public function setNumberOfViews(int $numberOfViews): self
    {
        $this->numberOfViews = $numberOfViews;

        return $this;
    }

    public function getWatcher(): ?User
    {
        return $this->watcher;
    }

    public function setWatcher(?User $watcher): self
    {
        $this->watcher = $watcher;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): self
    {
        $this->media = $media;

        return $this;
    }


}
