<?php
ob_start();
?>
        <section class="row">
            <div class="column">
                <?php foreach ($exercises as $exercise ){ ?>
                <div class="embed">
                    <p class="text"><?= $exercise['title'] ?></p>
                    <div class="button-container">
                        <a class="answering button" href="?action=showExercise&id=<?= $exercise['id'] ?>">TAKE IT</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>


<?php
$headerPath = "Components/Header/Answering.php";
$contenu = ob_get_clean();

require "Layout.php";