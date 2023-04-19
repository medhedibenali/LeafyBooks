<?php
require_once dirname(__FILE__, 4) . '/modules/auth/UserRepository.php';

$userRepository = new UserRepository();
$userRepository->insert($_POST);

header('Location:  ../../index.php');
