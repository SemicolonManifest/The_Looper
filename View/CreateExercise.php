<?php
ob_start();
?>
    <div class="container">
        <h1 class="text">New Exercise</h1>
        <section class="row">
            <div class="column">
                <div>
                    <label for="exercise_title">Title</label>
                    <input id="exercise_title" type="text" name="exercise[title]">
                    <div class="button-container"><a class="answering button" href="/exercises/IDExercise/fulfillments/new">TAKE IT</a></div>
                </div>
            </div>
        </section>
    </div>


<?php
$headerPath = "Components/Header/Managing.php";
$contenu = ob_get_clean();

require "Layout.php";