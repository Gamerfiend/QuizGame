<?php

class Question
{
    private $_question;
    private $_possibleAnswers;
    private $_category;
    private $_correctIndex;

    /**
     * Question constructor.
     * @param String $question The question
     * @param Array<String> $possibleAnswers Possible answers
     * @param String $category The category
     * @param integer $correctIndex The correct answer index within the
     * possible answers array
     *
     */
    function __construct($question, $possibleAnswers, $category, $correctIndex)
    {
        $this->_question = $question;
        $this->_possibleAnswers = $possibleAnswers;
        $this->_category = $category;
        $this->_correctIndex = $correctIndex;
    }

    /**
     * @return String
     */
    public function getQuestion()
    {
        return $this->_question;
    }


    /**
     * @return mixed
     */
    public function getPossibleAnswers()
    {
        return $this->_possibleAnswers;
    }

    /**
     * @return String
     */
    public function getCategory()
    {
        return $this->_category;
    }

    /**
     * @return int
     */
    public function getCorrectIndex()
    {
        return $this->_correctIndex;
    }

    public function getCorrectAnswer()
    {
        return $this->_possibleAnswers[$this->_correctIndex - 1];
    }
}