<?php

include 'cnx.php';

$sql=$cnx->prepare("select codeCine,nomCine,imageCine from cinema");
$sql->execute();

// echo '<table class="table table-striped">
//   <thead>
//     <tr>
//       <th scope="col">Code Cine</th>
//       <th scope="col">Image Cine</th>
//       <th scope="col">Nom Cine</th>
//     </tr>
//   </thead>
//   <tbody>';

echo "<table>
  <tr>
    <th></th>
    <th>Code Cinema</th>
    <th>Image</th>
    <th>Nom Cinema</th>
  </tr>";
foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne) {
    // echo "<tr onclick=GetAllFilmsByCine('".$ligne['codeCine']."')></tr>";
    echo "<td></td>";
    echo "<td onclick=GetAllFilmsByCine('".$ligne['codeCine']."')><h3>".$ligne['codeCine']."</h3></td>";
    echo "<td onclick=GetAllFilmsByCine('".$ligne['codeCine']."')><img style=width:80px;height:80px src=".$ligne['imageCine']."></td>";
    echo "<td onclick=GetAllFilmsByCine('".$ligne['codeCine']."')><p>".$ligne['nomCine']."</p></td>";
    echo "<td></div></td>";
    // echo '<th scope="row">'.$ligne['codeCine'].'</th>';
    // echo '<td><img style=width:80px;height:80px src='.$ligne['imageCine'].'></td>';
    // echo '<td>'.$ligne['nomCine'].'</td>';
    echo "</tr>";
}
echo  "</table>";

?>