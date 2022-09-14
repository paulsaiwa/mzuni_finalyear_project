<?php

session_start();
require 'log.php';
log_activity($_SESSION['user_id'], "Has successfully logged in the system");


