<?php
ob_start();
?>

    <section class="row">
            <a class="button answering column" href="/exercises/answering">Take an exercise</a>


            <a class="button managing column" href="/exercises/new">Create an exercise</a>


            <a class="button results column" href="/exercises">Manage an exercise</a>

    </section>


<?php
$headerPath = "Components/Header/Home.php";
$contenu = ob_get_clean();

require "Layout.php";