<?php

if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

// *** ReneVis: set database connection for datatables here
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */

$sql_details = array(
	"type" => "Mysql",  // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => env('OPENSHIFT_MYSQL_DB_USERNAME', 'root'),
	"pass" => env('OPENSHIFT_MYSQL_DB_PASSWORD', 'guppie'),
	"host" => env('OPENSHIFT_MYSQL_DB_HOST'    , 'localhost'),
	"port" => env('OPENSHIFT_MYSQL_DB_PORT'    , 3306),
	"db"   => env('OPENSHIFT_APP_NAME'         , 'datatables_edit'),
	"dsn"  => "charset=utf8"
);
