<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubscriptionHistory
 *
 * @ORM\Table(name="subscription_history", indexes={@ORM\Index(name="IDX_54AF90D07808B1AD", columns={"subscriber_id"}), @ORM\Index(name="IDX_54AF90D09A1887DC", columns={"subscription_id"})})
 * @ORM\Entity
 */
class SubscriptionHistory
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
     * @ORM\Column(name="start_at", type="datetime_immutable", nullable=false)
     */
    private $startAt;

    /**
     * @var datetime_immutable
     *
     * @ORM\Column(name="end_at", type="datetime_immutable", nullable=false)
     */
    private $endAt;

    /**
     * @var \Subscription
     *
     * @ORM\ManyToOne(targetEntity="Subscription")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subscription_id", referencedColumnName="id")
     * })
     */
    private $subscription;

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

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeImmutable $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeImmutable $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(?Subscription $subscription): self
    {
        $this->subscription = $subscription;

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
