<?php

if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

// *** ReneVis: set database connection here
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */

//$sql_details = array(
//	"type" => "Mysql",  // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
//	"user" => env('DB_USERNAME', ''),
//	"pass" => env('DB_PASSWORD', ''),
//	"host" => env('DB_HOST', 'localhost'),
//	"port" => env('DB_PORT', '3306'),
//	"db"   => env('DB_DATABASE', ''),
//	"dsn"  => "charset=utf8"
//);
//
$sql_details = array(
	"type" => "Mysql",  // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => 'root',
	"pass" => 'guppie',
	"host" => 'localhost',
	"port" => '3306',
	"db"   => 'datatables_edit',
	"dsn"  => "charset=utf8"
);
