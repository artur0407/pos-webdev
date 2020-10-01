<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Author;

class AuthorController extends AbstractActionController 
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
     * This is the default "index" action of the controller. 
     * It displays the Authors
     */
    public function indexAction() 
    {
        // Get recent posts
        $authors = $this->entityManager->getRepository(Author::class)
            ->findBy([], ['name'=>'DESC']);
        
        // Render the view template.
        return new ViewModel([
            'authors' => $authors,
            'postManager' => $this->postManager
        ]);   
        
    }
}
