<?php 
    require_once '_inc/config.php'; 
    
    $item = get_item();
    
    if ( ! $item  = get_item() ){
        show_404();
    } 

    include_once '_partials/header.php';
?>   

    <header>
        <h1>Delete list</h1>
    </header>

    <main class="delete">

        <aside>

            <form id="delete-form" action="_inc/delete-item.php" method="POST">

                <textarea disabled name="message" id="text" cols="30" rows="1" ><?= $item ?></textarea>

                <p class="form group">
                    <input name="id" type="hidden" value="<?php echo $_GET['id'] ?>">
                    <input class="btn" type="submit" value="delete item">

                    <div class="controls back-link">
                        <a href="<?= $base_url ?>">Backkk</a>
                    </div>
                </p>

            </form>

        </aside>

    </main>

<?php include_once '_partials/footer.php' ?>

