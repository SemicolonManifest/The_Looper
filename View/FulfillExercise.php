<?php

use TheLooper\Model\FieldValueKind;

ob_start();
?>
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks.</p>
    <form action="?action=fulfillExercise" accept-charset="UTF-8" method="post">
        <input hidden type="text" name="exercise" value="<?= $exerciseID ?>">

        <?php foreach ($fields as $field): ?>
            <div class="field">
                <label for="field_<?= $field->id ?>"><?= $field->label ?></label>
                <<?php if ($field->value == FieldValueKind::LIST_OF_LINES || $field->value == FieldValueKind::MULTI_LINES): ?>textarea<?php else: ?>input type="text"<?php endif; ?> name="fulfillment[<?= $field->id ?>]" id="field_<?= $field->id ?>">
            </div>

        <?php endforeach; ?>

        <div class="actions">
            <input class="button answering" type="submit" name="commit" value="Save" data-disable-with="Save">
        </div>
    </form>

<?php
$headerPath = "Components/Header/Answering.php";
$contenu = ob_get_clean();

require "Layout.php";