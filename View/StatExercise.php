<?php
ob_start();
$field
?>
    <section class="row">
        <div class="column">

            <table class="table">
                <thead>
                <tr>
                    <th>Take</th>
                    <?php foreach ($fields as $field): ?>
                        <th><a class="link_title" href="#"><?= $field->label ?></a></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fields as $key => $field) : ?>
                    <?php if($key === array_key_first($fields)) : ?>
                    <?php foreach ($field->takes() as $take) : ?>
                        <tr>
                            <td>
                                <a class="text"><?= $take->timeStamp ?></a>
                            </td>
                            <?php
                            $answers = $take->answers();
                            foreach ($take->answers() as $answer) : ?>
                                <td>
                                    <a><?= $answer->response ?></a>
                                </td>
                            <?php endforeach; ?>

                        </tr>
                    <?php endforeach; ?>

                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </section>


<?php
$headerPath = "Components/Header/Results.php";
$contenu = ob_get_clean();

require "Layout.php";