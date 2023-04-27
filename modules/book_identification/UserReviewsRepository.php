<?php

require_once dirname(__FILE__, 2) . '/database/Repository.php';

class UserReviewsRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'user_reviews';
        $attributes = ['isbn', 'username', 'review', 'rating'];
        $ids = ['isbn', 'username'];
        parent::__construct($tableName, $attributes, $ids);
    }


}