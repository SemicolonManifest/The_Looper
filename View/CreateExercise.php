
        <h1 class="text">New Exercise</h1>
        <?php if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?=$error ?>
            </div>
        <?php endif; ?>
        <form action="?action=showCreateField" method="post">
        <div class="field">
            <label for="exercise_title">Title</label>
            <input id="exercise_title" type="text" name="exercise[title]">
        </div>
        <div class="actions">
            <input type="submit" name="commit" value="Create Exercise" class="button answering">
        </div>
        </form>

