<?php
namespace App\Entity;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\SettingsRepository")
 * @ORM\Table(name="settings")
 */
class Settings
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $systemType;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $value;

    public function __construct()
    {
        $this->value = [
            'type' => 'string',
            'value' => ''
        ];
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSystemType(): int
    {
        return $this->systemType;
    }

    /**
     * @param int $systemType
     */
    public function setSystemType(int $systemType): void
    {
        $this->systemType = $systemType;
    }

    /**
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param array $value
     */
    public function setValue(array $value): void
    {
        $this->value = $value;
    }
}
