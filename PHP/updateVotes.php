<?php

include 'cnx.php';

$sql=$cnx->prepare("UPDATE film SET nbVotes =nbVotes+1,totalVotes=totalVotes+? WHERE codeFilm=?");
$sql->bindValue(1,$_GET['nbrStars']);
$sql->bindValue(2,$_GET['codeFilm']);
$sql->execute();


// foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne) {
//     echo "<div>";
//     echo "<h3>".$ligne['codeActeur']."</h3>";
//     echo "<img style=width:80px;height:80px src=".$ligne['imageActeur'].">";
//     echo "<p>".$ligne['nomActeur']."</p>";
//     echo "<p>";
//     echo "</div>";
// }

alert("Votre vote a été pris en compte");

?>