<?php
require_once dirname(__FILE__, 2) . '/database/Repository.php';

class UserRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'users';
        $attributes = ['username', 'password', 'first_name', 'last_name', 'birthday'];
        $ids = ['username'];
        parent::__construct($tableName, $attributes, $ids);
    }

    public function insert($params)
    {
        $params['password'] = password_hash(
            $params['password'],
            PASSWORD_ARGON2ID,
            ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 4]
        );
        parent::insert($params);
    }
    public function findByUsernameOrFullName($search){
        $request='select * from '.$this->tableName.'
         where title like concat("%",?,"%") or author like concat("%",?,"%")';
        $response = $this->db->prepare($request);
        $response->execute([$search,$search]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}
