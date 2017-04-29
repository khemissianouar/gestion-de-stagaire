<?php
session_start();
require("core.php");
$user= new Usersmanager();
$dep= new departementmanager();

 if(isset($_SESSION)){

  $user->auth($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }

?>

<html>
<head><title> Sujets</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
.right {
    position: absolute;
    right: 0px;
    width: 300px;
    
    padding: 10px;
}
</style>
</head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg" >
<img id="f" src="../image/l.png">
<div class="right" ><a href="?m=deco">deconnexion</a></div>
<br><br><br>
<?php 
        $unenseignant =$user->afficheunenseignantcin($_GET['cin']); 
        ?>
        <table><tr><td><label>nom :</label></td>
<td><?php echo $unenseignant['nom'];?></td></tr>
<tr><td><label>prenom :</label></td>
<td><?php echo $unenseignant['prenom'];?></td></tr>
<tr><td><label> grade:</label></td>
<td><?php echo $unenseignant['grade'];?></td></tr>
<tr><td><label>departement :</label></td>
<td><?php     $undep=$dep->afficheundepartement($unenseignant['iddepartement']);   echo $undep['nomdep'];                                ?></td></tr>
<tr><td><label>adresse:</label></td>
<td><?php echo $unenseignant['adresse'];?></td></tr>
<tr><td><label> email :</label></td>
<td><?php echo $unenseignant['email'];?></td></tr>
<tr><td><label>cin :</label></td>
<td><?php echo $unenseignant['cin'];?></td></tr>
<tr><td><label>tel :</label></td>
<td><?php echo $unenseignant['tel'];?></td></tr>
</table>
<a href="listedeenseignant.php"><img src="../image/retour.png" width="40px" height="40px"></a>
</body>
</html>