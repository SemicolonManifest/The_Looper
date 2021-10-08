<?php
ob_start();
?>
    <header class="managing">
        <section class="container">
            <a href="?"><img id="Logo" src="View/Style/Assets/logo.png"></a>
            <?php if (isset($_POST['exercise']['title'])) { ?>
                <a>Exercise : <span><?= $_POST['exercise']['title'] ?></span></a>
            <?php } ?>
        </section>
    </header>

<?php
$header = ob_get_clean();
