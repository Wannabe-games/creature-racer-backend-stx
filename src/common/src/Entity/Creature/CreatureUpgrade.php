<?php

namespace App\Entity\Creature;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Creature\CreatureUpgradeRepository")
 * @ORM\Table(name="game_creature_upgrade_changes_definitions")
 */
class CreatureUpgrade
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(length=180)
     *
     * @Assert\NotNull()
     */
    private string $name;

    /**
     * @var string
     *
     * @ORM\Column(length=15)
     *
     * @Assert\NotNull()
     */
    private string $type;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $value;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Creature\CreatureLevel", inversedBy="upgradeChanges")
     * @ORM\JoinColumn(name="creature_level_id", nullable=false)
     *
     * @Assert\NotNull()
     */
    private $creatureLevel;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getCreatureLevel()
    {
        return $this->creatureLevel;
    }

    /**
     * @param mixed $creatureLevel
     */
    public function setCreatureLevel($creatureLevel): void
    {
        $this->creatureLevel = $creatureLevel;
    }
}
