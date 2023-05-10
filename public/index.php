<?php
require_once dirname(__FILE__, 2) . '/config/config.php';

$pageTitle = 'Home';

require TEMPLATES_PATH . '/header.php';

echo "<div>Hello, World!</div>";

require TEMPLATES_PATH . '/footer.php';
