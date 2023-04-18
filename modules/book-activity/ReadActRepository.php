<?php


require_once dirname(__FILE__, 2) . '/database/Repository.php';
class ReadActRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'readact';
        // status can be 'toread','currentlyreading' or 'finishedreading'
        $attributes = ['username','ISBN','status','start_date','finish_date'];
        $ids = ['username','ISBN'];
        parent::__construct($tableName, $attributes, $ids);

        // Creates the table
        $query = "CREATE TABLE IF NOT EXISTS $tableName (
                    $attributes[0] VARCHAR(20) NOT NULL,
                    $attributes[1] VARCHAR(20) NOT NULL,
                    $attributes[2] VARCHAR(20) NOT NULL,
                    `$attributes[3]` DATE DEFAULT NULL,
                    `$attributes[4]` DATE DEFAULT NULL,
                    PRIMARY KEY ($attributes[0], $attributes[1])
                    );";
        $this->db->exec($query);



        //Mock values
        $activity1 = array(
            "username"=>'Tom',
            "ISBN" => '978-3-16-148410-0',
            "status"=>"toread",
            "start_date"=>"2023-04-18"
        );

        $activity2 = array(
            "username"=>'Tom',
            "ISBN" => '978-3-16-143240-0',
            "status"=>"currentlyreading",
            "start_date"=>"2023-04-10"
        );

        $activity3 = array(
            "username"=>'Tom',
            "ISBN" => '978-3-16-154410-0',
            "status"=>"finishedreading",
            "start_date"=>"2023-04-19"
        );

        $this->insert($activity1);
        $this->insert($activity2);
        $this->insert($activity3);
    }
}