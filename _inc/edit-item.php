<?php
    // Require config.php - abychom mohli pracovat s databázou
    require_once 'config.php';

    // Add new item in database
    $affected = $database->update('items', 
        [ 'text' => $_POST['message'] ],
        [ 'id' => $_POST['id'] ]
    );
        

    //Kontrola a přesměrování zpátky na index, bez AJAXU
    if ( $affected ){
        header('Location:'. $base_url .'index.php');
        die();
    };
    
     