<?php
require_once dirname(__FILE__, 2) . '/database/Repository.php';

class AuthorRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'authors';
        $attributes = ['id', 'pen_name', 'password', 'first_name', 'last_name', 'birthday', 'death_day', 'bio', 'nationality', 'picture'];
        $ids = ['id'];
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
}


