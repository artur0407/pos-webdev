<?php
namespace Application\Repository;

use Application\Entity\Author;

class AuthorRepository extends RepositoryAbstract
{
    /**
     * @param $email
     * @return array
     */
    public function findAuthorsByEmail($email)
    {
        $queryBuilder = $this->getCreateQueryBuilder();
        $queryBuilder->select('a')
            ->from(Author::class, 'a')
            ->where('a.email = :email')
            ->setParameter(':email', $email);

        $queryBuilder->getQuery()->getSQL();
        $authors = $queryBuilder->getQuery()->getResult();
        
        return $authors;
    }
}