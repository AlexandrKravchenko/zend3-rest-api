<?php

namespace User\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class UserTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function check( string $username,  string $password)
    {
        $rowset = $this->tableGateway->select([
            'username' => $username,
            'password' => $password
        ]);

        $row = $rowset->current();
        if ( !$row ) {
            throw new RuntimeException('Could not find user');
        }

        return $row;
    }
}