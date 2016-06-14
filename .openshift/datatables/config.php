<?php

if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');

$sql_details = array(
	"type" => "Mysql",  // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => env('OPENSHIFT_MYSQL_DB_USERNAME', 'adminpenZPxj'),
	"pass" => env('OPENSHIFT_MYSQL_DB_PASSWORD', '8aB-lhQCW7a_'),
	"host" => env('OPENSHIFT_MYSQL_DB_HOST'    , '127.6.131.2'),
	"port" => env('OPENSHIFT_MYSQL_DB_PORT'    , 3306),
	"db"   => env('OPENSHIFT_APP_NAME'         , 'laraveladmin'),
	"dsn"  => "charset=utf8"
);
