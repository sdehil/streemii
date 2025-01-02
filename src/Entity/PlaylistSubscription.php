<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaylistSubscription
 *
 * @ORM\Table(name="playlist_subscription", indexes={@ORM\Index(name="IDX_832940C7808B1AD", columns={"subscriber_id"}), @ORM\Index(name="IDX_832940C6BBD148", columns={"playlist_id"})})
 * @ORM\Entity
 */
class PlaylistSubscription
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
     * @ORM\Column(name="subscribed_at", type="datetime_immutable", nullable=false)
     */
    private $subscribedAt;

    /**
     * @var \Playlist
     *
     * @ORM\ManyToOne(targetEntity="Playlist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="playlist_id", referencedColumnName="id")
     * })
     */
    private $playlist;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subscriber_id", referencedColumnName="id")
     * })
     */
    private $subscriber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubscribedAt(): ?\DateTimeImmutable
    {
        return $this->subscribedAt;
    }

    public function setSubscribedAt(\DateTimeImmutable $subscribedAt): self
    {
        $this->subscribedAt = $subscribedAt;

        return $this;
    }

    public function getPlaylist(): ?Playlist
    {
        return $this->playlist;
    }

    public function setPlaylist(?Playlist $playlist): self
    {
        $this->playlist = $playlist;

        return $this;
    }

    public function getSubscriber(): ?User
    {
        return $this->subscriber;
    }

    public function setSubscriber(?User $subscriber): self
    {
        $this->subscriber = $subscriber;

        return $this;
    }


}
