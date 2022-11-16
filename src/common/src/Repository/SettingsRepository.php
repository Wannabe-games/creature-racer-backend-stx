<?php
namespace App\Common\Repository;

use App\Entity\Settings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class SettingsRepository.
 */
class SettingsRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Settings::class);
    }

    /**
     * @param Settings $settings
     *
     * @return void
     */
    public function save(Settings $settings): void
    {
        $this->getEntityManager()->persist($settings);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Settings $settings
     *
     * @return void
     */
    public function remove(Settings $settings): void
    {
        $this->getEntityManager()->remove($settings);
        $this->getEntityManager()->flush();
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}
