<div class="row">
    <div class="column">
        <h1 class="text">Fields</h1>
        <table class="records table">
            <thead>
            <tr>
                <th>Label</th>
                <th>Value kind</th>
                <th> </th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($exercise->fields() as $field): ?>
                <tr>
                    <td>
                        <?= $field->label ?>
                    </td>
                    <td>
                        <?= ($field->value_kind != \TheLooper\Model\FieldValueKind::SINGLE_LINE) ? ($field->value_kind != \TheLooper\Model\FieldValueKind::LIST_OF_LINES) ? ($field->value_kind == \TheLooper\Model\FieldValueKind::MULTI_LINES) ? "multi_lines" : "" : "list_of_lines" : "single_line" ?>
                    </td>
                    <td id="iconColumn">
                        <a class="icon" href="?action=showEditField&id=<?= $field->getId() ?>&exercise_id=<?= $exercise->id ?>"><i class="fa fa-edit"></i></a>
                        <a class="icon" onclick="return confirm('Are you sure?');"  href="?action=deleteField&id=<?= $field->getId() ?>&exercise_id=<?= $exercise->id ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a class="button answering"
           data-method="put" href="?action=answering&id=<?= $exercise->id ?>" onclick="return confirm('Are you sure?');"><i
                    class="fa fa-comment"></i> Complete and be ready for answers</a>
    </div>
    <div class="column">
        <h1 class="text">New Fields</h1>
        <form action="" method="get">
            <input type="hidden" name="action" value="createField">
            <input type="hidden" name="exercise_id" value="<?= $exercise->id ?>">
            <div class="field">
                <label for="field_label">Label</label>
                <input class="input" id="field_label" type="text" name="field[label]">
                <label for="field_value">Value kind</label>
                <select class="input" id="field_value" name="field[value]">
                    <option value="0">Single line text</option>
                    <option value="1">List of single lines</option>
                    <option value="2">Multi-line text</option>
                </select>
            </div>
            <div class="actions">
                <input type="submit" name="commit" value="Create Field" class="answering button">
            </div>
        </form>

    </div>


</div>
