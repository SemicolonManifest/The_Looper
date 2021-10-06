<?php
ob_start();
?>
    <section class="row">
        <div class="column">
            <h1>Building</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>title</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($exercises as $exercise) {
                    if ($exercise['state'] == \TheLooper\Model\ExerciseState::BUILDING) {
                        ?>
                        <tr>
                            <td>
                                <p class="text"><?= $exercise['title'] ?></p>
                                <i class="fa fa-comment"></i>
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash"></i>
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