<?php 
    require_once '_inc/config.php'; 
    
    $item = get_item();
    
    if ( ! $item  = get_item() ){
        show_404();
    } 

    include_once '_partials/header.php';
?>   

    <header>
        <h1>Edit list</h1>
    </header>

    <main class="edit">

        <aside>

            <form id="edit-form" action="_inc/edit-item.php" method="POST">

                <textarea name="message" id="text" cols="30" rows="3" ><?= $item ?></textarea>

                <p class="form group">
                    <input name="id" type="hidden" value="<?php echo $_GET['id'] ?>">
                    <input class="btn" type="submit" value="edit item">

                    <div class="controls back-link">
                        <a href="<?= $base_url ?>">Backkk</a>
                    </div>
                </p>

            </form>

        </aside>

    </main>

<?php include_once '_partials/footer.php' ?>

