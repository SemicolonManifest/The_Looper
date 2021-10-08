<?php
ob_start();
?>
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks.</p>
    <form action="?action=fulfillExercise" accept-charset="UTF-8" method="post">
        <input hidden type="text" name="exercise" value="3">

        <div class="field">
            <label for="field_1">single line</label>
            <input type="text" name="fulfillment[1]" id="field_1" >
        </div>
        <div class="field">
            <label for="field_2">List of single lines</label>
            <textarea name="fulfillment[2]" id="field_2"></textarea>
        </div>
        <div class="field">
            <label for="field_3">Multi-lines</label>
            <textarea name="fulfillment[3]" id="field_3" ></textarea>
        </div>
        <div class="actions">
            <input type="submit" name="commit" value="Save" data-disable-with="Save">
        </div>
    </form>

<?php
$headerPath = "Components/Header/Answering.php";
$contenu = ob_get_clean();

require "Layout.php";