<?php

require_once('../../config.php');
require_once '../../connection.php';
require_once(ADMIN_LIBRARY_PATH . '/topic.php');

$topic = new Topic($database['host'],$database['username'],$database['password'],$database['name']);

redirect to matpel page
header("Location: ../?content=topic");
die;

?>
