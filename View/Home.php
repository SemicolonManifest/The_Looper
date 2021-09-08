<?php
ob_start();
include_once "Components/Header/Home.php"
?>


    <div class="container dashboard">
        <section class="row">
            <div class="column">
                <a class="button answering column" href="/exercises/answering">Take an exercise</a>
            </div>
            <div class="column">
                <a class="button managing column" href="/exercises/new">Create an exercise</a>
            </div>
            <div class="column">
                <a class="button results column" href="/exercises">Manage an exercise</a>
            </div>
        </section>
    </div>


<?php

$contenu = ob_get_clean(); // stocks la page dans la variable

require "Layout.php";