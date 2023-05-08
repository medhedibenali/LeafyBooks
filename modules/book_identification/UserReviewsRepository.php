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
}
