<?php

require_once dirname(__FILE__,2).'/config/config.php';
require_once MODULES_PATH . '/auth/UserRepository.php';


$repo =new UserRepository();

$result = $repo->find();

var_dump($result);