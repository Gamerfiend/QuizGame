<?php
require 'ICorrectIndex.php';

class Question implements ICorrectIndex
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
     * Getter for question
     * @return String Main question
     */
    public function getQuestion()
    {
        return $this->_question;
    }


    /**
     * Getter for the possible answers array
     * @return Array<String> an array of the questions
     */
    public function getPossibleAnswers()
    {
        return $this->_possibleAnswers;
    }

    /**
     * Getter for the catergory id
     * @return String catergory this question belongs to
     */
    public function getCategory()
    {
        return $this->_category;
    }

    /**
     * Getter for the correct answer index, used for getting the answer from the answers array
     * @return int index of correct answer
     */
    public function getCorrectIndex()
    {
        return $this->_correctIndex;
    }

    /**
     * Getter for the correct answer, used to compare against user answer
     * @return String Correct answer from array
     */
    public function getCorrectAnswer()
    {
        return $this->_possibleAnswers[$this->_correctIndex - 1];
    }
}