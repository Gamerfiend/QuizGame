<?php
/**

CREATE TABLE Highscores
(
entryid int NOT NULL AUTO_INCREMENT,
name varchar(50),
score int,
PRIMARY KEY(entryid)
);

 */


require "../../../quizgameconfig.php";
$dbh;

try{
    //Instantiate a database object
    $dbh = new PDO(DB_DSN,
        DB_USERNAME, DB_PASSWORD);
    echo "connected to database!";
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


    $sql = "INSERT INTO Highscores(name, score)
        VALUES  (:name, :score)";

    global $dbh;
    $statement = $dbh->prepare($sql);

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':score', $score, PDO::PARAM_STR);

    $statement->execute();
}

function getHighscores()
{
    $sql = "SELECT * FROM Highscores";

    global $dbh;

    $statement = $dbh->prepare($sql);

    $result = $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
