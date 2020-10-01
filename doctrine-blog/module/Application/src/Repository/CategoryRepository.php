<?php
namespace Application\Repository;

use Application\Entity\Post;

class CategoryRepository extends RepositoryAbstract
{
    /**
     * @param $categoryName
     * @return \Zend\Paginator\Paginator
     */
    public function findPostsByCategory($categoryId)
    {
        $queryBuilder = $this->getCreateQueryBuilder();
        $queryBuilder->select('p')
            ->from(Post::class, 'p')
            ->join('p.category', 't')
            ->where('p.status = :status')
            ->andWhere('t.id = :categoryId')
            ->orderBy('p.dateCreated', 'DESC')

            ->setParameter(':status', Post::STATUS_PUBLISHED)
            ->setParameter(':categoryId', $categoryId);

        return $queryBuilder->getQuery();

        return $this->getPaginator($queryBuilder->getQuery());
    }
}