<?php
    /*
    // Require config.php - abychom mohli pracovat s databázou
    require_once 'config.php';

    // Add new item in database
    $id = $database->insert('items', [
        'text' => $_POST['message'] 
    ]);

    //Kontrola a přesměrování zpátky na index, bez AJAXU
    if ( $id ){
        //header('Location:'. $base_url .'index.php');
        die('success');
    };
    */
    
    // Require config.php - abychom mohli pracovat s databázou
    require_once 'config.php';
    
    $id = $database->insert('items', 
        [ 'text' =>  $_POST['message'] ]
    );

    $item_id = $database->id();

    
    if( ! $id ) die( 'Error' );
 
    if(  is_ajax() ) {

        $message = json_encode([
                'status' => 'success',
                'id' => $item_id
        ]);

        die( $message );

    }else{
        header('Location:'. $base_url .'index.php');
        die();
    };