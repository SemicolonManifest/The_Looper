<section class="row">
    <div class="column">
        <?php foreach ($exercises as $exercise): ?>
            <?php if ($exercise->state == \TheLooper\Model\ExerciseState::ANSWERING): ?>
                <div class="embed">
                    <p class="text"><?= $exercise->title ?></p>
                    <div class="button-container">
                        <a class="answering button" href="?action=showExercise&id=<?= $exercise->id ?>">TAKE IT</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

