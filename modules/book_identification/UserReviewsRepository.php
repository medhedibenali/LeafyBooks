<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class UserReviewsRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'user_reviews';
        $attributes = ['isbn', 'username', 'review', 'rating', 'time_submitted', 'is_updated'];
        $ids = ['isbn', 'username'];
        parent::__construct($tableName, $attributes, $ids);
    }

    public function RatingStatistics($username)
    {
        $query = "SELECT COUNT(*) AS rating_number, AVG(rating) AS rating_avg FROM $this->tableName WHERE username= :username";
        $response = $this->db->prepare($query);
        $response->execute([':username' => $username]);
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function ReviewStatistics($username)
    {
        $query = "SELECT COUNT(*) AS review_number FROM $this->tableName WHERE username= :username AND review IS NOT NULL";
        $response = $this->db->prepare($query);
        $response->execute([':username' => $username]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
}
