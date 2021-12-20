<?php
ob_start();
?>
    <header class="managing">
        <section class="container">
            <a href="?"><img id="Logo" src="View/Style/Assets/logo.png"></a>
            <?php if (isset($exercise)) { ?>
                <a style="text-decoration: none" class="text-white">Exercise : <b><?= $exercise->title ?></b></a>
            <?php } else { ?>
                <a style="text-decoration: none" class="text-white">Exercise</a>
            <?php } ?>
        </section>
    </header>

<?php
$header = ob_get_clean();
