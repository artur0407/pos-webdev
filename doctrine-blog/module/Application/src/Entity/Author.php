<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="\Application\Repository\AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author extends EntityAbstract implements DataCreatedAndUpdatedInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", length=20, unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="email", length=20, unique=true)
     */
    protected $email;

    /**
    * @ORM\Column(name="status", type="boolean")
    */
    protected $status;

    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Post", mappedBy="author")
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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

    public function getPosts()
    {
        return $this->posts;
    }

    public function addPosts($post)
    {
        $this->posts[] = $post;
    }
}