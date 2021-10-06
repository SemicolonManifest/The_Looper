<?php
ob_start();
?>
        <h1 class="text">New Exercise</h1>
        <form action="?action=showCreateField" method="post">
        <div class="field">
            <label for="exercise_title">Title</label>
            <input id="exercise_title" type="text" name="exercise[title]">
        </div>
        <div class="actions">
            <input type="submit" name="commit" value="Create Exercise" class="answering button">
        </div>
        </form>



<?php
$headerPath = "Components/Header/Managing.php";
$contenu = ob_get_clean();

require "Layout.php";