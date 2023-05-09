<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class BookRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'books';
        $attributes = ['isbn', 'title', 'author', 'publisher', 'image', 'synopsis', 'publishing_year', 'rating', 'genre', 'pages'];
        $ids = ['isbn'];
        parent::__construct($tableName, $attributes, $ids);
    }


    public function SmallPageCount($username,$status,$year){
        $query = "SELECT COUNT(b.isbn) AS Total 
                  FROM $this->tableName AS b 
                  LEFT JOIN read_act AS act
                  ON act.isbn = b.isbn
                  WHERE act.username = :username
                  AND act.status = :status
                  AND pages < 300";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year;";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year;";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status, 'year' => $year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status]);
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }


    public function MediumPageCount($username,$status,$year){
        $query = "SELECT COUNT(b.isbn) AS Total 
                  FROM $this->tableName AS b 
                  LEFT JOIN read_act AS act
                  ON act.isbn = b.isbn
                  WHERE act.username = :username
                  AND act.status = :status
                  AND pages >= 300
                  AND pages < 500";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year;";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year;";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status, 'year' => $year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status]);
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }


    public function LargePageCount($username,$status,$year){
        $query = "SELECT COUNT(b.isbn) AS Total 
                  FROM $this->tableName AS b 
                  LEFT JOIN read_act AS act
                  ON act.isbn = b.isbn
                  WHERE act.username = :username
                  AND act.status = :status
                  AND pages >= 500";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year;";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year;";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status, 'year' => $year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status]);
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function NonFictionCount($username,$status,$year){
        $query = "SELECT COUNT(b.isbn) AS Total 
                  FROM $this->tableName AS b 
                  LEFT JOIN read_act AS act
                  ON act.isbn = b.isbn
                  WHERE act.username = :username
                  AND act.status = :status
                  AND b.genre = 'non_fiction'";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year;";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year;";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status, 'year' => $year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status]);
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }


    public function FictionCount($username,$status,$year){
        $query = "SELECT COUNT(b.isbn) AS Total 
                  FROM $this->tableName AS b 
                  LEFT JOIN read_act AS act
                  ON act.isbn = b.isbn
                  WHERE act.username = :username
                  AND act.status = :status
                  AND b.genre != 'non_fiction'";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year;";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year;";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status, 'year' => $year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username,'status' => $status]);
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }

    //missing time parameter
    public function getAvgBookRating($username,$status,$year){
        $query = "SELECT AVG(b.rating) AS avg
                  FROM read_act AS act
                  LEFT JOIN books AS b
                  ON act.isbn = b.isbn
                  WHERE act.username = :username
                  AND act.status = :status";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status, 'year'=>$year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status]);
        }
        $result = $response->fetch(PDO::FETCH_OBJ);
        if(!$result || !$result->avg){
            return 0 ;
        }else{
            return number_format($result->avg,2);
        }
    }

    public function NoRatingBookCount($username,$status,$year){
        $query = "SELECT COUNT(b.rating) AS Total
                  FROM read_act AS act
                  LEFT JOIN books AS b
                  ON act.isbn = b.isbn
                  WHERE b.rating <= 0.4
                  AND act.username = :username
                  AND act.status = :status";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status, 'year'=>$year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status]);
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }


    public function RatingBookCount($username,$status,$year,$rating){
        $query = "SELECT COUNT(b.rating) AS Total
                  FROM read_act AS act
                  LEFT JOIN books AS b
                  ON act.isbn = b.isbn
                  WHERE rating >= :rating - 0.5
                  AND rating <= :rating + 0.4
                  AND act.username = :username
                  AND act.status = :status";
        if ($year != '0'){
            if ($status == 'to_read'){
                $query .= "\nAND YEAR(act.start_date) = :year";
            }else{
                $query .= "\nAND YEAR(act.finish_date) = :year";
            }
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status, 'rating' => $rating, 'year'=>$year]);
        }else{
            $response = $this->db->prepare($query);
            $response->execute(['username' => $username, 'status' => $status, 'rating' => $rating]);
        }
        
        return $response->fetch(PDO::FETCH_OBJ);    
    }
}
