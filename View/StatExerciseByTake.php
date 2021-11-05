
    <section class="row">
        <div class="column">
            <h1><?= $take->timeStamp ?></h1>
            <table class="table">
                <thead>
                <tr>
                    <th>field</th>

                    <th>Content</th>

                </tr>
                </thead>
                <tbody>

                <?php foreach ($exercise->fields() as $field) : ?>
                    <?php foreach ($field->takes() as $take) : ?>
                        <?php foreach ($take->answers() as $answer) : ?>
                        <?php if($answer->take== $_GET['take'] && $answer->field == $field->getId()): ?>
                            <tr>
                                <td>
                                    <a><?= $field->label ?></a>
                                </td>
                                <td>
                                    <a><?= $answer->response ?></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </section>


