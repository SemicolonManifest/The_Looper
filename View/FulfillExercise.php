<?php

use TheLooper\Model\FieldValueKind;

?>
<h1>Your take</h1>
<p>If you'd like to come back later to finish, simply submit it with blanks.</p>
<?php if (isset($saveSuccess)): ?>
    <?php if ($saveSuccess): ?>
        <div class="alert alert-success" role="alert">
            Save successful!
        </div>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            An error occurred during the save process.
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if (isset($submitSuccess)): ?>
    <?php if ($submitSuccess): ?>
        <div class="alert alert-success" role="alert">
            Submit successful!
        </div>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            An error occurred during the submit process.
        </div>
    <?php endif; ?>
<?php endif; ?>
<form <?php if (isset($isEditing)): ?> action="?action=editFulfillment" <?php else: ?> action="?action=fulfillExercise" <?php endif; ?>
        accept-charset="UTF-8" method="post">
    <?php if (isset($isEditing)): ?>
        <input hidden type="text" name="take" value="<?= $take->id; ?>">

        <?php foreach ($answers as $answer): ?>
            <div class="field">
                <label for="field_<?= ($answer->field->getId()) ?>"><?= ($answer->field->label) ?></label>

                <<?php if ($answer->field->value_kind == FieldValueKind::LIST_OF_LINES || $answer->field->value_kind == FieldValueKind::MULTI_LINES): ?>textarea<?php else: ?>input type="text" value="<?= $answer->response ?>"<?php endif; ?>   name="answers[<?= $answer->id ?>]"
                                                                                                                                                                                                                                                  id="field_<?= $answer->field->getId(); ?>"><?php if ($answer->field->value_kind == FieldValueKind::LIST_OF_LINES || $answer->field->value_kind == FieldValueKind::MULTI_LINES): ?><?= $answer->response ?></textarea><?php endif; ?>
            </div>

        <?php endforeach; ?>


    <?php else: ?>
        <input hidden type="text" name="exercise" value="<?= $exercise->id; ?>">

        <?php foreach ($fields as $field): ?>
            <div class="field">
                <label for="field_<?= ($field->getId()) ?>"><?= ($field->label) ?></label>
                <<?php if ($field->value_kind == FieldValueKind::LIST_OF_LINES || $field->value_kind == FieldValueKind::MULTI_LINES): ?>textarea<?php else: ?>input type="text" <?php endif; ?> name="fulfillments[<?= $field->getId() ?>]"
                                                                                                                                                                                                id="field_<?= $field->getId(); ?>"><?php if ($field->value_kind == FieldValueKind::LIST_OF_LINES || $field->value_kind == FieldValueKind::MULTI_LINES): ?></textarea><?php endif; ?>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>


    <div class="actions">
        <input class="button answering" type="submit" name="commit" value="Save" data-disable-with="Save">
    </div>
</form>

