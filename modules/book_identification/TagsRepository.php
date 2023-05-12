<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class TagsRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'tags';
        $attributes = ['isbn', 'tag'];
        $ids = ['isbn', 'tag'];
        parent::__construct($tableName, $attributes, $ids);
    }

    public function TagNumber($username, $status, $year, $tag)
    {
        $query = "SELECT COUNT(t.isbn) AS Total
                  FROM $this->tableName AS t
                  LEFT JOIN read_act AS act
                  ON act.isbn = t.isbn
                  WHERE act.username = :username
                  AND act.status = :status
                  AND t.tag = :tag";
        if ($year != '0') {
            if ($status == 'to_read') {
                $query .= "\nAND YEAR(act.start_date) = :year;";
            } else {
                $query .= "\nAND YEAR(act.finish_date) = :year;";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status, 'year' => $year, 'tag' => $tag]);
        } else {
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status, 'tag' => $tag]);
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function getSortedTags($username, $status)
    {
        $query = "SELECT t.tag AS tag, COUNT(t.isbn) AS Total
                  FROM $this->tableName AS t
                  LEFT JOIN read_act AS act
                  ON act.isbn = t.isbn
                  WHERE act.username = :username
                  AND act.status = :status
                  GROUP BY t.tag
                  ORDER BY Total DESC;";
        $response = $this->db->prepare($query);
        $response->execute(['username' => $username, 'status' => $status]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllTags()
    {
        $request = 'select distinct tag from ' . $this->tableName;
        $response = $this->db->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}
