<?php

namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class RestController extends AbstractActionController
{
    
    public function __construct(){

    }

    public function indexAction()
    {
        $obj['name'] = "Name";
        $obj['age'] = 30;

        echo json_encode( $obj );

        die;
    }

}