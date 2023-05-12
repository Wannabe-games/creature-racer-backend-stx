<?php

namespace App\Common\Repository;

trait RepositoryTrait
{
    /**
     * @param $entity
     * @return void
     */
    public function persist($entity): void
    {
        $this->getEntityManager()->persist($entity);
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param $entity
     * @return void
     */
    public function save($entity): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param $entity
     * @return void
     */
    public function remove($entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @return void
     */
    public function beginTransaction(): void
    {
        $this->getEntityManager()->beginTransaction();
    }

    /**
     * @return void
     */
    public function commitTransaction(): void
    {
        $this->getEntityManager()->commit();
    }

    /**
     * @return void
     */
    public function rollbackTransaction(): void
    {
        $this->getEntityManager()->rollback();
    }
}
