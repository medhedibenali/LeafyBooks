<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class ReadActRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'read_act';
        // status can be 'to_read','currently_reading' or 'finished_reading'
        // for 'to_read', 'start_date' is when the user added the book and 'finish_date' is null
        // for 'currently_reading', 'start_date' is when the user added the book and 'finish_date' is when the user starting reading the book
        // for 'finshed_reading', 'start_date' is when the user started reading the book and 'finish_date' is when the user finished the book
        $attributes = ['username', 'isbn', 'status', 'start_date', 'finish_date'];
        $ids = ['username', 'isbn'];
        parent::__construct($tableName, $attributes, $ids);
    }

    public function ActivityStastics($username, $status)
    {
        $query = "SELECT COUNT(*) AS activity_number FROM $this->tableName WHERE username= :username AND status= :status";
        $reponse = $this->db->prepare($query);
        $reponse->execute([':username' => $username, 'status' => $status]);
        return $reponse->fetch(PDO::FETCH_OBJ);
    }

    public function ActivityBooks($username, $status, $element)
    {
        $query = "SELECT b.$element AS $element FROM books AS b LEFT JOIN $this->tableName AS act ON act.isbn = b.isbn WHERE username= :username AND status= :status LIMIT 3";
        $reponse = $this->db->prepare($query);
        $reponse->execute([':username' => $username, 'status' => $status]);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }

    public function BookCount($username, $status, $year)
    {
        $query = "SELECT COUNT(*) AS Total
                  FROM $this->tableName
                  WHERE username = :username
                  AND status = :status";
        if ($status == 'to_read') {
            $query .= ' AND YEAR(start_date) = :year;';
        } else {
            $query .= ' AND YEAR(finish_date) = :year;';
        }
        $reponse = $this->db->prepare($query);
        $reponse->execute([':username' => $username, 'status' => $status, 'year' => $year]);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTotalPages($username, $status, $year)
    {
        if ($year == '') {
            $query = "SELECT SUM(b.pages) AS Total FROM books AS b LEFT JOIN $this->tableName AS act ON act.isbn = b.isbn WHERE act.username = :username AND act.status = :status";
            $reponse = $this->db->prepare($query);
            $reponse->execute(['username' => $username, 'status' => $status]);
        } else if ($status == 'to_read') {
            $query = "SELECT SUM(b.pages) AS Total FROM books AS b LEFT JOIN $this->tableName AS act ON act.isbn = b.isbn WHERE act.username = :username AND act.status = :status AND YEAR(act.start_date) = :year";
            $reponse = $this->db->prepare($query);
            $reponse->execute(['username' => $username, 'status' => $status, 'year' => $year]);
        } else {
            $query = "SELECT SUM(b.pages) AS Total FROM books AS b LEFT JOIN $this->tableName AS act ON act.isbn = b.isbn WHERE act.username = :username AND act.status = :status AND YEAR(act.finish_date) = :year";
            $reponse = $this->db->prepare($query);
            $reponse->execute(['username' => $username, 'status' => $status, 'year' => $year]);
        }
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGenres($username, $status, $year, $genre)
    {
        if ($year != '0') {
            if ($status == 'to_read') {
                $query = "SELECT SUM(Total) AS Total_sum
                  FROM (
                    SELECT COUNT(*) AS Total
                    FROM books AS b 
                    LEFT JOIN $this->tableName AS act 
                    ON act.isbn = b.isbn 
                    WHERE act.username = :username 
                    AND b.genre = :genre 
                    AND act.status = :status
                    AND YEAR(act.start_date) = :year
                    UNION 
                    SELECT COUNT(*) AS Total
                    FROM tags AS t 
                    LEFT JOIN $this->tableName AS act 
                    ON act.isbn = t.isbn 
                    WHERE act.username = :username 
                    AND act.status = :status
                    AND t.tag = :genre
                    AND YEAR(act.start_date) = :year
                ) AS subquery;";
                $reponse = $this->db->prepare($query);
                $reponse->execute(['username' => $username, 'status' => $status, 'genre' => $genre, 'year' => $year]);
            } else {
                $query = "SELECT SUM(Total) AS Total_sum
                  FROM (
                    SELECT COUNT(*) AS Total
                    FROM books AS b 
                    LEFT JOIN $this->tableName AS act 
                    ON act.isbn = b.isbn 
                    WHERE act.username = :username 
                    AND b.genre = :genre 
                    AND act.status = :status
                    AND YEAR(act.start_date) = :year
                    UNION 
                    SELECT COUNT(*) AS Total
                    FROM tags AS t 
                    LEFT JOIN $this->tableName AS act 
                    ON act.isbn = t.isbn 
                    WHERE act.username = :username 
                    AND act.status = :status
                    AND t.tag = :genre
                    AND YEAR(act.finish_date) = :year
                ) AS subquery;";
                $reponse = $this->db->prepare($query);
                $reponse->execute(['username' => $username, 'status' => $status, 'genre' => $genre, 'year' => $year]);
            }
        } else {
            $query = "SELECT SUM(Total) AS Total_sum
                  FROM (
                    SELECT COUNT(*) AS Total
                    FROM books AS b 
                    LEFT JOIN $this->tableName AS act 
                    ON act.isbn = b.isbn 
                    WHERE act.username = :username 
                    AND b.genre = :genre 
                    AND act.status = :status
                    UNION 
                    SELECT COUNT(*) AS Total
                    FROM tags AS t 
                    LEFT JOIN $this->tableName AS act 
                    ON act.isbn = t.isbn 
                    WHERE act.username = :username 
                    AND act.status = :status
                    AND t.tag = :genre
                ) AS subquery;";
            $reponse = $this->db->prepare($query);
            $reponse->execute(['username' => $username, 'status' => $status, 'genre' => $genre]);
        }
        return $reponse->fetch(PDO::FETCH_OBJ);
    }
}
