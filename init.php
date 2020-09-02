<?php

if (!file_exists(__DIR__ . '/config.php')) {
  die('ERROR: No existe config.php');
}
require 'config.php';
session_start();

setlocale(LC_TIME, SITE_LANG);
date_default_timezone_set(SITE_TIMEZONE);

require('inc/class-db.php');
require('inc/posts.php');
require('inc/helpers.php');

$app_db = new Db(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

if (isset($_GET['logout'])) {
  logout();
}
