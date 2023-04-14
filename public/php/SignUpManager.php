<?php
require_once dirname(__FILE__, 3) . '/modules/auth/UserRepository.php';

$userRepository = new UserRepository();
$userRepository->insert($_POST);

header('Location:  ../index.php');
