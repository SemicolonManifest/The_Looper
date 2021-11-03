<?php
ob_start();
?>

    <section class="row">
            <a class="button answering column" href="?action=showAllExercises">Take an exercise</a>


            <a class="button managing column" href="?action=showCreateExercise">Create an exercise</a>


            <a class="button results column" href="?action=showManageExercise">Manage an exercise</a>

    </section>


<?php
$headerPath = "Components/Header/Home.php";
$contenu = ob_get_clean();

require "Layout.php";