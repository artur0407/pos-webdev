<?php
namespace Application\Entity;

use Application\Entity\Columns\Author;
use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a comment related to a blog post.
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment extends EntityAbstract
    implements DataCreatedAndUpdatedInterface
{
    use Author;

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** 
     * @ORM\Column(name="content")
     */
    protected $content;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", nullable=false)
     */
    protected $post;

    public function __construct()
    {
        $this->dateCreated = new \DateTime();
    }

    /**
     * Returns ID of this comment.
     * @return integer
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * Sets ID of this comment.
     * @param int $id
     */
    public function setId($id) 
    {
        $this->id = $id;
    }
    
    /**
     * Returns comment text.
     * @return string
     */
    public function getContent() 
    {
        return $this->content;
    }

    /**
     * Sets comment text.
     * @param string $comment
     */
    public function setContent($comment) 
    {
        $this->content = $comment;
    }

    /*
     * Returns associated post.
     * @return \Application\Entity\Post
     */
    public function getPost() 
    {
        return $this->post;
    }
    
    /**
     * Sets associated post.
     * @param \Application\Entity\Post $post
     */
    public function setPost($post) 
    {
        $this->post = $post;
        $post->addComment($this);
    }
}

