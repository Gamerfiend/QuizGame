<?php
/*
 * SQL used to create table
CREATE TABLE Highscores
(
entryid int NOT NULL AUTO_INCREMENT,
name varchar(50),
score int,
PRIMARY KEY(entryid)
);
 */

/**
 * This file is used for interactions with the database, primarily to insert highscore and nicknames
 *
 * @package models
 * @author Tyler Bezera <tbezera2@mail.greenriver.edu>
 * @author Brett Yeager <byeager@mail.greenriver.edu>
 */
require "../../../quizgameconfig.php";
$_models_dbh;

try{
    //Instantiate a database object
    $_models_dbh = new PDO(DB_DSN,
        DB_USERNAME, DB_PASSWORD);
}
catch(PDOException $e){
    echo "fail: " . $e->getMessage();
    echo $e->getMessage();
}

/**
 * Insert a member's data into database
 * @param Member $member The member information to add to the database
 */
function submitHighscore($name, $score){

    if($score>0) {
        $sql = "INSERT INTO Highscores(name, score)
        VALUES  (:name, :score)";

        global $_models_dbh;
        $statement = $_models_dbh->prepare($sql);

        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':score', $score, PDO::PARAM_STR);

        $statement->execute();
    }
}

function getHighscores()
{
    $sql = "SELECT * FROM Highscores ORDER BY score DESC LIMIT 20";

    global $_models_dbh;

    $statement = $_models_dbh->prepare($sql);

    $result = $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
