<?php
ob_start();
?>
    <div class="container">
        <section class="row">
            <div class="column">
                <div class="embed">
                    <p class="text">name exercise</p>
                    <div class="button-container"><a class="answering button" href="/exercises/IDExercise/fulfillments/new">TAKE IT</a></div>
                </div>
            </div>
        </section>
    </div>


<?php
$headerPath = "Components/Header/Answering.php";
$contenu = ob_get_clean();

require "Layout.php";