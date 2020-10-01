<?php
namespace Application\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Zend\Paginator\Paginator;

class RepositoryAbstract extends EntityRepository
{
    /**
     * @param $alias
     * @param null $indexBy
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getCreateQueryBuilder()
    {
        $entityManager = $this->getEntityManager();
        $queryBuilder = $entityManager->createQueryBuilder();

        return $queryBuilder;
    }

    /**
     * @param $query
     * @param int $page
     * @param int $itemCount
     * @return Paginator
     */
    public function getPaginator($query, $page = 1, $itemCount = 25)
    {
        $adapter = new DoctrineAdapter(new ORMPaginator($query, false));
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage($itemCount);
        $paginator->setCurrentPageNumber($page);

        return $paginator;
    }

}