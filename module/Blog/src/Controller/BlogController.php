<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController
{
    public function indexAction()
    {

        $posts = [
            [ 'id' => 1, 'title' => 'My title', 'description' => 'description' ],
            [ 'id' => 2, 'title' => 'My title 2', 'description' => 'description 2' ],
            [ 'id' => 3, 'title' => 'My title 3', 'description' => 'description 3' ],
        ];
        
        return new ViewModel([
            'posts' => $posts
        ]);
    }
}