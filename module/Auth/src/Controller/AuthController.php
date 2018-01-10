<?php 

namespace Auth\Controller;

use Auth\Model\UserTable;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AuthController extends AbstractRestfulController{

    private $table;

    public function __construct( UserTable $table ){
        $this->table = $table;
    }

    /**
     * POST /api/auth/login
     *
     * @return json
     */
    public function loginAction(){
        $request = $this->getRequest();            

        if ( $request->isPost() ){
            $data = $request->getPost();
            
            if ( $this->table->check( $data->username, $data->password ) ){
                return new JsonModel([
                    'message' => "You've been authenticated with success!",
                    'user' => $user
                ]);
            }

            return new JsonModel([
                'message' => "Username and/or password invalid!"
            ]);
        }

        $this->getResponse()->setStatusCode(404);
        return new JsonModel([
            'message' => 'Not found'
        ]);
    }

    /**
     * GET /api/auth/logout
     *
     * @return void
     */
    public function logoutAction(){

    }
}