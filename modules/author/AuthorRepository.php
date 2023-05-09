<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class AuthorRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'authors';
        $attributes = ['id', 'pen_name', 'first_name', 'last_name', 'birthday', 'death_day', 'bio', 'nationality', 'image'];
        $ids = ['id'];
        parent::__construct($tableName, $attributes, $ids);
    }



    public function getNumberOfAuhtors($username,$status,$year){
        $query="SELECT a.pen_name AS pen_name, COUNT(*) AS Total
                FROM $this->tableName AS a
                LEFT JOIN books AS b ON a.id = b.author
                LEFT JOIN read_act AS act ON act.isbn = b.isbn
                WHERE act.username = :username
                AND act.status = :status";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= ' AND YEAR(act.start_date) = :year';
            }else{
                $query .= ' AND YEAR(act.finish_date) = :year';
            }
            $query .= ' GROUP BY pen_name;';
            $reponse = $this->db->prepare($query);
            $reponse->execute(['username' => $username, 'status' => $status, 'year' => $year]);
        }else{
            $query .= ' GROUP BY pen_name;';
            $reponse = $this->db->prepare($query);
            $reponse->execute(['username' => $username, 'status' => $status]);
        }
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }
}
