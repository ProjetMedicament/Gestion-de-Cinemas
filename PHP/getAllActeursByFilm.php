<?php

include 'cnx.php';

$sql=$cnx->prepare("SELECT acteur.codeActeur,acteur.nomActeur,acteur.imageActeur
FROM acteur
INNER JOIN jouer ON  acteur.codeActeur = jouer.numActeur
INNER JOIN film ON jouer.numFilm = film.codeFilm
WHERE film.codeFilm = ?");
$sql->bindValue(1,$_GET['numFilm']);
$sql->execute();


foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne) {
    echo "<div>";
    echo "<h3>".$ligne['codeActeur']."</h3>";
    echo "<img style=width:80px;height:80px src=".$ligne['imageActeur'].">";
    echo "<p>".$ligne['nomActeur']."</p>";
    echo "<p>";
    echo "</div>";
}

?>