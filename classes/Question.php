<?php
require 'ICorrectIndex.php';
/**
 * Contains question class object.
 *
 * @package classes
 * @author Tyler Bezera <tbezera2@mail.greenriver.edu>
 * @author Brett Yeager <byeager@mail.greenriver.edu>
 */

/**
 * Class Question
 *
 * Question class is used through out the Quiz game in order to store information
 * pulled from API. It requires the ICorrectIndex interface in order to use the
 * getCorrectIndex function.
 *
 * @package classes
 * @author Tyler Bezera <tbezera2@mail.greenriver.edu>
 * @author Brett Yeager <byeager@mail.greenriver.edu>
 */
class Question
{
    private $_question;
    private $_possibleAnswers;
    private $_category;
    private $_correctIndex;

    /**
     * Question constructor. Builds the question object.
     *
     * @param string $question The question
     * @param Array<String> $possibleAnswers Possible answers
     * @param string $category The category
     * @param int $correctIndex The correct answer index within the
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
     * @return string Main question
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
     * Getter for the category id
     * @return string category this question belongs to
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
     * @return string Correct answer from array
     */
    public function getCorrectAnswer()
    {
        return $this->_possibleAnswers[$this->_correctIndex - 1];
    }
}