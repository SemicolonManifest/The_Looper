<?php
ob_start();
?>
    <header class="results">
        <section class="container">
            <a href="?"><img id="Logo" src="View/Style/Assets/logo.png"></a>
            <?php if ($_GET['action'] == "showStatExercise" || $_GET['action'] == "showStatExerciseByField" || $_GET['action'] == "showStatExerciseByTake"  ) { ?>
                <a  style="text-decoration: none" class="text-white">Exercise : <b><?= $exercise->title ?></b></a>
            <?php } ?>
        </section>
    </header>

<?php
$header = ob_get_clean();
