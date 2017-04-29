<?php require("core.php");

session_start();
$user= new Usersmanager();
$spe= new specialitemanager();
 if(isset($_SESSION)){

  $user->auth2($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }


?>
<html>
<head><title> Sujets</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\sujet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
<style>
.right {
    position: absolute;
    right: 0px;
    width: 450px;
    
    padding: 10px;
}
</style>
</head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg" >
<img id="f" src="../image/l.png">
<div class="right" >
  <a href="?m=deco">deconnexion</a></div>


<?php
        $unetudiant =$user->afficheunetudiantcin($_GET['cin']); 

       ?>

      <table align=center><tr><td><label>nom :</label></td>
<td><?php echo $unetudiant['nom'];?></td></tr>
<tr><td><label>prenom :</label></td>
<td><?php echo $unetudiant['prenom'];?></td></tr>
<tr><td><label> date de naissance:</label></td>
<td><?php echo $unetudiant['datedenaissance'];?></td></tr>
<tr><td><label>cin:</label></td>
<td><?php echo $unetudiant['cin'];?></td></tr>
<tr><td><label>specialite :</label></td>
<td><?php     $unspe=$spe->afficheunspecilaite($unetudiant['idspecialite']);   echo $unspe['specialite'];                                ?></td></tr>
<tr><td><label>niveau:</label></td>
<td><?php echo $unetudiant['niveau'];?></td></tr>
<tr><td><label>email :</label></td>
<td><?php echo $unetudiant['email'];?></td></tr>
<tr><td><label>adresse:</label></td>
<td><?php echo $unetudiant['adresse'];?></td></tr>
<tr><td><label> ville :</label></td>
<td><?php echo $unetudiant['ville'];?></td></tr>
<tr><td><label>tel:</label></td>
<td><?php echo $unetudiant['tel'];?></td></tr></table>



<?php $sujet=new sujetmanager();

$unsujet=$sujet->afficheunsujetaffecter($_GET['idsujet']);
$sujet->affecter($unetudiant,$unsujet);


?>
<form method='POST' action="">
	<input type="submit" value='affecter' name='affectue' id='btn'/>
</form>
<a href="listedesujetencadrant.php"><img src="../image/retour.png" width="40px" height="40px"></a></a>

</div>
  </body>
</html>