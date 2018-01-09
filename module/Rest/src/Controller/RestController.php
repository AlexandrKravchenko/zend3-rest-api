<?php

/**
 * Fonte da Rest API utilizando AbstractRestfulController
 * http://www.superlativelabs.com/how-to-create-a-rest-api-in-zend-framework-3-add-action-methods-to-your-restful-controllers/
 */

namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class RestController extends AbstractRestfulController
{
    
    private $users;
    private $lastId = 3;

    public function __construct(){
        $this->users = [
            [ 'id' => 1, 'name' => 'teste', 'age' => 30 ],
            [ 'id' => 2, 'name' => 'teste 2', 'age' => 21 ],
            [ 'id' => 3, 'name' => 'teste 3', 'age' => 45 ],
        ];
    }

    private function notFound()
    {
        $this->getResponse()->setStatusCode(404);
        return new JsonModel([
            'message' => 'Not found'
        ]);
    }

    public function get( $id ){
        $user = $this->users[$id];
        return new JsonModel( $user );
    }

    
    /**
     * GET /api
     * Return list users
     */
    public function getList()
    {
        return new JsonModel([
            'users' => $this->users
        ]);
    }


    /**
     * POST /api
     * Create a new user
     * The $data parameter is automatically mapped from the request body
     */
    public function create($data)
    {
        $this->lastId = $this->lastId + 1;

        $this->users[] = [
            'id' => $this->lastId,
            'name' => $data['name'],
            'age' => $data['age'],
        ];

        // Let's return the complete list with the newly created lead
        return $this->getList();
    }

    /**
     * PUT /user/{id}
     * Updates the user identified by {id}
     * The $id parameter is automatically mapped from the request URL
     * and the $data parameter from the request body
     */    
    public function update($id, $data)
    {
        $userFound = array_filter($this->users, function($u) use ($id) {
            return $u['id'] == $id;
        });

        if ($userFound) {
            $user = array_values($userFound)[0];

            $user['name'] = $data['name'];
            $user['age'] = $data['age'];


            return new JsonModel([
                'user' => $user 
            ]);
        } else {
            return $this->notFound(); // Return a 404 if the lead is not found
        }
    }

    /**
     * DELETE /user/{id}
     * Deletes the user identified by {id}
     * The $id parameter is automatically mapped from the request URL
     */
    public function delete($id)
    {
        $found = false;

        foreach ($this->users as $index => $user) {
            if ($user['id'] == $id) {
                $found = true;
                break;
            }
        }

        if ($found) {
            array_splice($this->users, $index, 1);
            return $this->getList();
        }
        else {
            return $this->notFound(); // Return a 404 if the lead is not found
        }
    }

    public function myUserAction(){
        return new JsonModel($this->users[1]);
    }

}