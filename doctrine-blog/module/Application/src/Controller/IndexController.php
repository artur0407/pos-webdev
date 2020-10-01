<?php
namespace Application\Controller;

use Application\Entity\Category;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Post;

/**
 * This is the main controller class of the Blog application. The 
 * controller class is used to receive user input,  
 * pass the data to the models and pass the results returned by models to the 
 * view for rendering.
 */
class IndexController extends AbstractActionController 
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager 
     */
    private $entityManager;
    
    /**
     * Post manager.
     * @var Application\Service\PostManager 
     */
    private $postManager;
    
    /**
     * Constructor is used for injecting dependencies into the controller.
     */
    public function __construct($entityManager, $postManager) 
    {
        $this->entityManager = $entityManager;
        $this->postManager = $postManager;
    }
    
    /**
     * This is the default "index" action of the controller. It displays the 
     * Recent Posts page containing the recent blog posts.
     */
    public function indexAction() 
    {
        $tagFilter = $this->params()->fromQuery('tag', null);
        $authorFilter = $this->params()->fromQuery('author', null);

        $results = $this->entityManager->getRepository(Post::class)->findPublishedPosts();
        
        if ($tagFilter) {
            // Filter posts by tag
            /** @var \Doctrine\ORM\Query $query */
            $results = $this->entityManager->getRepository(Post::class)->findPostsByTag($tagFilter);
        }

        if ($authorFilter) {
            // Filter posts by author
            /** @var \Doctrine\ORM\Query $query */
            $results = $this->entityManager->getRepository(Post::class)->findPostsByAuthor($authorFilter);
        }
                       
        // Get popular tags.
        $tagCloud = $this->postManager->getTagCloud();
        
        // Render the view template.
        return new ViewModel([
            'posts' => $results,
            'postManager' => $this->postManager,
            'tagCloud' => $tagCloud
        ]);
    }
    
    /**
     * This action displays the About page.
     */
    public function aboutAction() 
    {
        $repo = $this->entityManager->getRepository(Category::class);
        $query = $repo->findPostsByCategory(1); /** @var $query \Doctrine\ORM\Query */

        $dqlEsperado = 'SELECT p FROM Application\Entity\Post p INNER JOIN p.category t WHERE p.status = :status AND t.id = :categoryId ORDER BY p.dateCreated DESC';
        echo $dqlResultado = $query->getDQL();

        var_dump($query->contains('INNER JOIN p.category'));
        var_dump($query->contains('p.status = :status'));
        exit;
        
        $appName = 'Blog';
        $appDescription = 'A simple blog application for the Using Zend Framework 3 book';
        
        return new ViewModel([
            'appName' => $appName,
            'appDescription' => $appDescription
        ]);
    }
}
