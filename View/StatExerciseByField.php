<?php
ob_start();
?>
    <section class="row">
        <div class="column">
            <h1><?= $field->label ?></h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Take</th>

                    <th>Content</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($field->takes() as $take) : ?>
                    <tr>
                        <td>
                            <a class="link_title"><?= $take->timeStamp ?></a>
                        </td>
                        <?php foreach ($take->answers() as $answer) : ?>
                            <?php if ($answer->field == $field->getId()): ?>
                                <td>
                                    <a>
                                        <?= $answer->response ?>
                                    </a>
                                </td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </section>


<?php
$headerPath = "Components/Header/Results.php";
$contenu = ob_get_clean();

require "Layout.php";