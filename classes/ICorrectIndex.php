<?php
/**
 * Interface ICorrectIndex
 *
 * Simple single function interface used for getting the correct index of a question.
 */
interface ICorrectIndex
{
    /**
     * Function used to return the correct index for the answer to a question.
     *
     * @return int
     */
    public function getCorrectIndex();
}