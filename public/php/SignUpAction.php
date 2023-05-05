<?php
require_once dirname(__FILE__, 3) . '/modules/autoloader.php';

$userRepository = new UserRepository();
$userRepository->insert($_POST);

header('Location:  ../index.php');
