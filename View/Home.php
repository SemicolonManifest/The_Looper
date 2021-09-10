<?php
ob_start();
?>

    <section class="row">
        <div class="column">
            <a class="button answering column" href="/exercises/answering">Take an exercise</a>
        </div>
        <div class="column">
            <a class="button managing column" href="/exercises/new">Create an exercise</a>
        </div>
        <div class="column">
            <a class="button results column" href="/exercises">Manage an exercise</a>
        </div>
    </section>


<?php
$headerPath = "Components/Header/Home.php";
$contenu = ob_get_clean();

require "Layout.php";