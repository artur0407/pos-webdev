<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="\Application\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category extends EntityAbstract implements DataCreatedAndUpdatedInterface
{
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
     * @ORM\OneToMany(targetEntity="\Application\Entity\Post", mappedBy="category")
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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