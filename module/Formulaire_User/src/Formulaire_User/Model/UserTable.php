<?php
namespace Formulaire_User\Model;

use Zend\Db\TableGateway\TableGateway;

class UserTable
{

    protected $tableGateway;

    public function __construct (TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll ()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getUser ($userId)
    {
        $userId = (int) $userId;
        $rowset = $this->tableGateway->select(array(
            'user_id' => $userId
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Impossible de trouver l'utilisateur $userId");
        }
        return $row;
    }

    public function saveUser (User $user)
    {
        $data = array(
            'user_surname' => $user->user_surname,
            'user_fisrt_name' => $user->user_fisrt_name,
            'user_mail' => $user->user_mail,
            'user_password' => $user->user_password,
            'user_civility' => $user->user_civility
        );
        
        $user_id = (int) $user->user_id;
        if ($user_id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getUser($user_id)) {
                $this->tableGateway->update($data, array(
                    'user_id' => $user_id
                ));
            } else {
                throw new \Exception('Le formulaire utilisateur user_Id n\'existe pas');
            }
        }
    }

    public function deleteUser ($user_id)
    {
        $this->tableGateway->delete(array(
            'user_id' => $user_id
        ));
    }
}