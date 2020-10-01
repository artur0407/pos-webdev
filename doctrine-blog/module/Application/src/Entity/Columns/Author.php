<?php
namespace Application\Entity\Columns;

trait Author
{
    /**
     * @ORM\Column(name="author", length=50, nullable=true)
     */
    protected $author;

    /**
     * Returns author's name.
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets author's name.
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}