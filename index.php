<?php 
    include_once '_partials/header.php';
    require_once '_inc/config.php'; 
    
    $data = $database->select( 'items', ['id', 'text']);

    //echo '<pre>';
    //print_r($data);
    //echo '</pre>';

?>   

    <header>
        <h1>Todo list</h1>
    </header>

    <main>

        <article>
            <ul class="menu">
                <?php 
                    foreach ( $data as $item ){

                        echo '<li id="item-'. $item['id'] .'">';
                        echo $item['text'];
                        echo '<div class="controls pull-right">';
                        echo '  <a href="edit.php?id='. $item['id'] .'" class="edit-link" >edit</a>';
                        echo '  <a href="delete.php?id='. $item['id'] .'" class="delete-link" ><i class="fa fa-times"></i></a>';
                        echo '</div>';
                        echo '</li>';

                    }
                ?>
            </ul>

        </article>

        <aside>

            <form id="add-form" action="_inc/add-item.php" method="POST">

                <textarea name="message" id="text" cols="30" rows="3" placeholder="there is https\\:DSA951ADS"></textarea>

                <p class="form group">
                    <input class="btn" type="submit" value="add new thing">
                </p>

            </form>

        </aside>

    </main>

<?php include_once '_partials/footer.php' ?>

