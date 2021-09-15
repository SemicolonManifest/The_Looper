<?php
ob_start();
?>
    <div class="row">
        <div class="column">
            <h1 class="text">Fields</h1>
            <table class="records table">
                <thead>
                <tr>
                    <th>Label</th>
                    <th>Value kind</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                </tbody>
            </table>

            <a class="button answering"
               data-method="put" href="/exercises/441?exercise%5Bstatus%5D=answering"><i
                        class="fa fa-comment"></i> Complete and be ready for answers</a>
        </div>
        <div class="column">
            <h1 class="text">New Fields</h1>
            <form action="/exercises" method="post">
                <div class="field">
                    <label for="field_label">Label</label>
                    <input class="input" id="field_label" type="text" name="field[label]">
                    <label for="field_value">Value kind</label>
                    <input class="input" id="field_value" type="text" name="field[value]">
                </div>
                <div class="actions">
                    <input type="submit" name="commit" value="Create Field" class="answering button">
                </div>
            </form>

        </div>


    </div>


<?php
$headerPath = "Components/Header/Managing.php";
$contenu = ob_get_clean();

require "Layout.php";