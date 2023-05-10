<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class UserRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'users';
        $attributes = [
            'username',
            'password',
            'first_name',
            'last_name',
            'birthday',
            'bio',
            'join_date',
            'location',
            'image',
            'image_seed'
        ];
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
        return parent::insert($params);
    }
    public function countFindByUsernameOrFullName($search = "")
    {
        $request = 'select count(*) as total from ' . $this->tableName . '
         where username like concat("%",?,"%") or concat(first_name," ",last_name) like concat("%",?,"%")';
        $response = $this->db->prepare($request);
        $response->execute([$search, $search]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function findByUsernameOrFullNameLimit($search = "", $offset = 0, $numberMAX = 0)
    {
        $request = 'select * from ' . $this->tableName . '
         where (username like concat("%",?,"%") or concat(first_name," ",last_name) like concat("%",?,"%") )
         limit ' . intval($offset) . ' , ' . intval($numberMAX);
        $response = $this->db->prepare($request);
        $response->execute([$search, $search]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}
