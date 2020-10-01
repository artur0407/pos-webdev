<?php
namespace Application\Entity;

use Application\Entity\Author;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;

/**
 * This class represents a single post in a blog.
 * @ORM\Entity(repositoryClass="\Application\Repository\PostRepository")
 * @ORM\Table(name="post")
 * @ORM\HasLifecycleCallbacks()
 */
class Post extends EntityAbstract implements DataCreatedAndUpdatedInterface
{
    use Columns\Author;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** 
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @ORM\Column(name="subtitle", type="string", length=100, nullable=true)
     */
    protected $subtitle;

    /** 
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /** 
     * @ORM\Column(name="status", type="boolean")
     */
    protected $status;
    
    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Comment", mappedBy="post")
     * @ORM\JoinColumn(name="id", referencedColumnName="post_id")
     */
    protected $comments;
    
    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Category", inversedBy="posts")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true)
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Author", inversedBy="posts", cascade={"persist"})
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=true)
     */
    protected $author;

    /**
     * @ORM\ManyToMany(targetEntity="\Application\Entity\Tag", inversedBy="posts")
     * @ORM\JoinTable(name="post_tag",
     *      joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    protected $tags;

    
    /**
     * Constructor.
     */
    public function __construct() 
    {
        $this->comments = new ArrayCollection();        
        $this->tags = new ArrayCollection();        
    }

    /**
     * Returns ID of this post.
     * @return integer
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * Sets ID of this post.
     * @param int $id
     */
    public function setId($id) 
    {
        $this->id = $id;
    }

    /**
     * Returns author.
     * @return Author
     */
    public function getAuthor() 
    {
        return $this->author;
    }

    /**
     * Sets author.
     * @param Author $author
     */
    public function setAuthor(Author $author) 
    {
        $this->author = $author;
    }

    /**
     * Returns title.
     * @return string
     */
    public function getTitle() 
    {
        return $this->title;
    }

    /**
     * Sets title.
     * @param string $title
     */
    public function setTitle($title) 
    {
        $this->title = $title;
    }

    /**
     * Returns title.
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Sets title.
     * @param string $subTitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Returns status.
     * @return bool
     */
    public function getStatus() 
    {
        return $this->status;
    }

    /**
     * Sets status.
     * @param bool $status
     */
    public function setStatus($status) 
    {
        $this->status = (bool) $status;
    }   
    
    /**
     * Returns post content.
     */
    public function getContent() 
    {
       return $this->content; 
    }
    
    /**
     * Sets post content.
     * @param type $content
     */
    public function setContent($content) 
    {
        $this->content = $content;
    }
    
    /**
     * Returns comments for this post.
     * @return array
     */
    public function getComments() 
    {
        return $this->comments;
    }
    
    /**
     * Adds a new comment to this post.
     * @param $comment
     */
    public function addComment($comment) 
    {
        $this->comments[] = $comment;
    }
    
    /**
     * Returns tags for this post.
     * @return array
     */
    public function getTags() 
    {
        return $this->tags;
    }      
    
    /**
     * Adds a new tag to this post.
     * @param $tag
     */
    public function addTag($tag) 
    {
        $this->tags[] = $tag;        
    }

    /**
     * @ORM\PrePersist
     */
    public function validationStatusAuthor()
    {
        if($this->getAuthor()->getStatus() == false)
            throw new Exception("Atenção, não é possivel inserir Post de Autor com status INATIVO");
    }

    /**
     * Removes association between this post and the given tag.
     * @param type $tag
     */
    public function removeTagAssociation($tag) 
    {
        $this->tags->removeElement($tag);
    }

    /**
     * @return string
     */
    public function getCommentCountStr()
    {
        $count = $this->getComments()->count();
        if ($count == 0) {
            return 'Seja o primeiro a comentar';
        }
        return ($count == 1) ? '1 comentário' : $count . ' comentários';
    }
}

