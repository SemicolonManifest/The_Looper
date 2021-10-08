<?php
ob_start();
?>
    <section class="row">
        <div class="column">
            <h1>Building</h1>
            <table class="table">
                <thead>
                <tr>
                    <th colspan="2">title</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($exercises as $exercise) {
                    if ($exercise['state'] == \TheLooper\Model\ExerciseState::BUILDING) {
                        ?>
                        <tr>
                            <td>
                                <p class="text"><?= $exercise['title'] ?></p>
                            </td>
                            <td id="iconColumn">
                                <a class="icon" href="?action=answering&id=<?= $exercise['id'] ?>"><i class="fa fa-comment"></i></a>
                                <a class="icon" href="?action=manageField&id=<?= $exercise['id'] ?>"><i class="fa fa-edit"></i></a>
                                <a class="icon" href="?action=delete&id=<?= $exercise['id'] ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
        <div class="column">
            <h1>Answering</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>title</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($exercises as $exercise) {
                    if ($exercise['state'] == \TheLooper\Model\ExerciseState::ANSWERING) {
                        ?>
                        <tr>
                            <td>
                                <p class="text"><?= $exercise['title'] ?></p>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
        <div class="column">
            <h1>Closed</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>title</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($exercises as $exercise) {
                    if ($exercise['state'] == \TheLooper\Model\ExerciseState::CLOSED) {
                        ?>
                        <tr>
                            <td>
                                <p class="text"><?= $exercise['title'] ?></p>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </section>


<?php
$headerPath = "Components/Header/Results.php";
$contenu = ob_get_clean();

require "Layout.php";