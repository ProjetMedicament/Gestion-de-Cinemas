<?php

include 'cnx.php';

$sql=$cnx->prepare("SELECT film.codeFilm,film.nomFilm,film.imageFilm,film.nbVotes,film.totalVotes
FROM film
INNER JOIN projeter ON film.codeFilm = projeter.numFilm
WHERE projeter.numCinema = ?");
$sql->bindValue(1,$_GET['numCine']);
$sql->execute();


foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne) {
    echo "<div onclick=GetAllActeursByFilm('".$ligne['codeFilm']."')>";
    echo "<h3>".$ligne['codeFilm']."</h3>";
    echo "<img style=width:80px;height:80px src=".$ligne['imageFilm'].">";
    echo "<p>".$ligne['nomFilm']."</p>";
    for ($i=0; $i < 5; $i++) {
        $i2 = $i+1;
        $numCine = $_GET['numCine'];
        if ($i<=0){
            echo "<i onclick=UpdateVotes(".$i2.",".$ligne['codeFilm'].",'".$numCine."') class='fa-regular fa-star' Name=star".$i." data-toggle='tooltip' data-placement='bottom' title='$i2 étoile'></i>";
        }
        else{   
        echo "<i onclick=UpdateVotes(".$i2.",".$ligne['codeFilm'].",'".$numCine."') class='fa-regular fa-star' Name=star".$i." data-toggle='tooltip' data-placement='bottom' title='$i2 étoiles'></i>";
        }
    }
    echo "<p> NbVotes : ".$ligne['nbVotes']."</p>";
    echo "<p> Total : ".$ligne['totalVotes']."</p>";
    if($ligne['nbVotes']!=0){
        $moyenneVotes = $ligne['totalVotes']/$ligne['nbVotes'];
        echo "<p> Moyenne : ".number_format($moyenneVotes,2)."</p>";
    }
    else{
        echo "<p> Moyenne : Non disponible </p>";
    }
    echo "</div>";
}

?>