<?php
session_start();


    if (!isset($_SESSION['user']))
    {
        $_SESSION['user'] =[];
    }
    
        $tab = array(

            'username' => 'cha3cha3'
        );
        array_push($_SESSION['user'], $tab);
        echo "session created"

?>





