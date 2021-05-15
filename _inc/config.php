<?php 

// Require Composer's autoloader.
require_once 'vendor/autoload.php';
 
// Using Medoo namespace.
use Medoo\Medoo;
 
// Connect the database.
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'todo',
    'server'        => 'localhost',
    'username'      => 'root',
    'password'      => '',
    'charset'       => 'utf-8'
]);

/**
 *  GLOBAL VARIABLES
 */
$base_url = 'http://localhost/Todoapp%20copy/';
  
/**
 * GLOBAL FUNCTIONS
 */

function show_404(){
    header('HTTP/1.0 404 Not Found');
        include_once '404.php';
        die();
}

function get_item(){

    if ( ! isset( $_GET['id'] ) || empty( $_GET['id'] ) ){
        return false;
    }

    global $database;

    $item = $database->get("items", "text", [
        "id" => $_GET['id']  
    ]);
    
    if ( ! $item ){
        return false;
    }

    return $item; 

}

function is_ajax(){

    return ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' );

}