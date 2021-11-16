<div class="row">
    <div class="column">
        <h1 class="text">Editing Field</h1>
        <form action="" method="get">
            <input type="hidden" name="action" value="editField">
            <input type="hidden" name="field_id" value="<?= $field->getId() ?>">
            <div class="field">
                <label for="field_label">Label</label>
                <input class="input" id="field_label" type="text" name="field[label]" value="<?= $field->label ?>">
                <label for="field_value">Value kind</label>
                <select class="input" id="field_value" name="field[value]">
                    <option value="0" <?= ($field->value_kind == \TheLooper\Model\FieldValueKind::SINGLE_LINE) ? "selected='selected'" : "" ?>>Single line text</option>
                    <option value="1" <?= ($field->value_kind == \TheLooper\Model\FieldValueKind::LIST_OF_LINES) ? "selected='selected'" : "" ?>>List of single lines</option>
                    <option value="2" <?= ($field->value_kind == \TheLooper\Model\FieldValueKind::MULTI_LINES) ? "selected='selected'" : "" ?>>Multi-line text</option>
                </select>
            </div>
            <div class="actions">
                <input type="submit" name="commit" value="Update Field" class="answering button">
            </div>
        </form>

    </div>


</div>
