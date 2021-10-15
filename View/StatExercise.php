<?php
ob_start();
?>
    <section class="row">
        <div class="column">

            <table class="table">
                <thead>
                <tr>
                    <th>Take</th>
                    <?php foreach ($fields as $field): ?>
                        <th><a class="link_title" href="?action=showStatExerciseByField&field=<?= $field->getId() ?>"><?= $field->label ?></a></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fields as $key => $field) : ?>
                    <?php if($key === array_key_first($fields)) : ?>
                    <?php foreach ($field->takes() as $take) : ?>
                        <tr>
                            <td>
                                <a class="text" href="?action=showStatExerciseByTake&take=<?= $take->id ?>"><?= $take->timeStamp ?></a>
                            </td>
                            <?php
                            $answers = $take->answers();
                            foreach ($take->answers() as $answer) : ?>
                                <td>
                                    <a>
                                        <i class="<?= ($answer->response != null) ? "fa fa-check short check" : "fa fa-times empty cross" ?>"></i>
                                        <!--<i class="fa fa-check-double filled check"></i> -->
                                       </a>
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