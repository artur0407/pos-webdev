<?php
namespace Application\Repository;

use Application\Entity\Post;

/**
 * This is the custom repository class for Post entity.
 */
class PostRepository extends RepositoryAbstract
{
    /**
     * Retrieves all published posts in descending date order.
     * @return Query
     */
    public function findPublishedPosts()
    {
        $queryBuilder = $this->getCreateQueryBuilder();
        
        $queryBuilder->select('p')
            ->from(Post::class, 'p')
            ->where('p.status = :status')
            ->orderBy('p.dateCreated', 'DESC')
            ->setParameter(':status', Post::STATUS_PUBLISHED);

        return $this->getPaginator($queryBuilder->getQuery());
    }
    
    /**
     * Finds all published posts having any tag.
     * @return array
     */
    public function findPostsHavingAnyTag()
    {
        $queryBuilder = $this->getCreateQueryBuilder();
        
        $queryBuilder->select('p')
            ->from(Post::class, 'p')
            ->join('p.tags', 't')
            ->where('p.status = ?1')
            ->orderBy('p.dateCreated', 'DESC')
            ->setParameter('1', Post::STATUS_PUBLISHED);

        $queryBuilder->getQuery()->getSQL();
        $posts = $queryBuilder->getQuery()->getResult();
        
        return $posts;
    }
    
    /**
     * Finds all published posts having the given tag.
     * @param string $tagName Name of the tag.
     * @return Query
     */
    public function findPostsByTag($tagName)
    {
        $queryBuilder = $this->getCreateQueryBuilder();
        $queryBuilder->select('p')
            ->from(Post::class, 'p')
            ->join('p.tags', 't')
            ->where('p.status = :status')
            ->andWhere('t.name = :tagName')
            ->orderBy('p.dateCreated', 'DESC')
            ->setParameter(':status', Post::STATUS_PUBLISHED)
            ->setParameter(':tagName', $tagName);

        $results = $this->getPaginator($queryBuilder->getQuery());
        return $results;
    }

    /**
     * Finds all published posts having the given author.
     * @param integer $author Id of the author.
     * @return Query
     */
    public function findPostsByAuthor($author)
    {
        $queryBuilder = $this->getCreateQueryBuilder();
        $queryBuilder->select('p')
            ->from(Post::class, 'p')
            ->where('p.status = :status')
            ->andWhere('p.author = :author')
            ->orderBy('p.dateCreated', 'DESC')
            ->setParameter(':status', Post::STATUS_PUBLISHED)
            ->setParameter(':author', $author);

        $results = $this->getPaginator($queryBuilder->getQuery());
        return $results;
    }
}