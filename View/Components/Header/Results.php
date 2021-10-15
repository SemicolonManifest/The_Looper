<?php
ob_start();
?>
    <header class="results">
        <section class="container">
            <a href="?"><img id="Logo" src="View/Style/Assets/logo.png"></a>
            <?php if ($_GET['action'] == "showStatExercise") { ?>
                <a>Exercise : <span><?= $exercise->title ?></span></a>
            <?php } ?>
        </section>
    </header>

<?php
$header = ob_get_clean();
