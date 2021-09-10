<?php

class mainController
{
    private ExerciseController $exerciseController;
    private FieldController $fieldController;
    private AnswerController $answerController;
    private TakeController $takeController;

    public function __construct()
    {
        $this->exerciseController = new ExerciseController();
        $this->fieldController = new FieldController();
        $this->answerController = new AnswerController();
        $this->takeController = new TakeController();
    }


    /**
     * @return ExerciseController
     */
    public function getExerciseController(): ExerciseController
    {
        return $this->exerciseController;
    }

    /**
     * @return FieldController
     */
    public function getFieldController(): FieldController
    {
        return $this->fieldController;
    }

    /**
     * @return AnswerController
     */
    public function getAnswerController(): AnswerController
    {
        return $this->answerController;
    }

    /**
     * @return TakeController
     */
    public function getTakeController(): TakeController
    {
        return $this->takeController;
    }



}