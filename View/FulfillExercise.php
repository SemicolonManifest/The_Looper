<?php

use TheLooper\Model\FieldValueKind;

?>
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks.</p>
    <form action="?action=fulfillExercise" accept-charset="UTF-8" method="post">
        <input hidden type="text" name="exercise" value="<?= $exercise->id; ?>">

        <?php foreach ($fields as $field): ?>
            <div class="field">
                <label for="field_<?= ($field->getId()) ?>"><?= ($field->label) ?></label>
                <<?php if ($field->value_kind == FieldValueKind::LIST_OF_LINES || $field->value_kind == FieldValueKind::MULTI_LINES): ?>textarea<?php else: ?>input type="text" <?php endif; ?> name="fulfillments[<?= $field->getId() ?>]" id="field_<?=$field->getId();?>"><?php if ($field->value_kind == FieldValueKind::LIST_OF_LINES || $field->value_kind == FieldValueKind::MULTI_LINES): ?></textarea><?php endif;?></div>

        <?php endforeach; ?>

        <div class="actions">
            <input class="button answering" type="submit" name="commit" value="Save" data-disable-with="Save">
        </div>
    </form>

