<?php require("core.php");
$auth1 = new sujetmanager();
$auth = new usersmanager();
$com = new competencemanager();
$con= new conceptionmanager();

session_start();

 if(isset($_SESSION)){

  $auth->auth2($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $auth->deco();
  }
$enseignants =$auth->afficheenseignant();

$coms=$com->affichecompetence();
$cons=$con->afficheconception();
  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $auth->deco();
  }
if(isset($_POST['enregistrer']))
{	$titre=htmlspecialchars($_POST['titre']);
	$objet=htmlspecialchars($_POST['objet']);
	$motcle =htmlspecialchars($_POST['motcle']);
	$cahierdecharge=htmlspecialchars($_POST['cahierdecharge']);
	$datedebut =htmlspecialchars($_POST['datedebut']);
	$datefin=htmlspecialchars($_POST['datefin']);
	$competences =htmlspecialchars($_POST['idcompetences']);
	$conception=htmlspecialchars($_POST['idconception']);
	$encadrant2=htmlspecialchars($_POST['encadrant2']);

	 if(!empty($_POST['titre'])){
	 	 if(!empty($_POST['objet'])){
	 	 	 if(!empty($_POST['motcle'])){
	 	 	 	 if(!empty($_POST['cahierdecharge'])){
	 	 	 	 	 if(!empty($_POST['datedebut'])){
	 	 	 	 	 	 if(!empty($_POST['datefin'])){
	 	 	 	 	 	 	 if(!empty($_POST['idcompetences'])){
	 	 	 	 	 	 	 	if(!empty($_POST['idconception'])){
	 	 	 	 	 	 	 		if(!empty($_POST['encadrant1'])){


	 	 	 	 	 	 	 				if(!empty($_POST['encadrant2'])){

                           $auth1->addsujetpfe1($_POST);
                           $erreur="bien ajoute";

	 	 	 	 	 	 	 				}
	 	 	 	 	 	 	 			
	

		else {
		    $erreur10='vous devez saisir le 2 eme encadrant';
		 }
   

}

	else {
		    $erreur9='vous devez saisir le 1 eme encadrant';
		 }
   

}

	else {
		    $erreur8='vous devez saisir le conception';
		 }
   

}



	else {
		    $erreur7='vous devez saisir le competences';
		 }
   

}

	else {
		    $erreur6='vous devez saisir le date fin';
		 }
   

}

	else {
		    $erreur5='vous devez saisir le date debut';
		 }
   

}

	else {
		    $erreur4='vous devez saisir le cahier de charge';
		 }
   

}

	else {
		    $erreur3='vous devez saisir les mots clés';
		 }
   

}

	else {
		    $erreur2='vous devez saisir le objet';
		 }
   

}




	else {
		    $erreur1='vous devez saisir le titre';
		 }
 }
?>



<html>

<head>
<meta charset="utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
<style>
.right {
    position: absolute;
    right: 100px;
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
<form method="POST"  class="form_connexion"id="forms" action="">
<table>
<tr><td>Titre: </td><td><input type="text" name="titre" class="input_connexion">
<?php
if(isset($erreur1)){
	echo '<font color="red">' .$erreur1."</font>" ;

}
?>
</td></tr>
<tr><td>Objet: </td><td><input type="text" name="objet" class="input_connexion"><?php
if(isset($erreur2)){
	echo '<font color="red">' .$erreur2."</font>" ;

}
?></td></tr>
<tr><td>Mot clé:</td> <td><input type="text" name="motcle" class="input_connexion"></td></tr><?php
if(isset($erreur3)){
	echo '<font color="red">' .$erreur3."</font>" ;

}
?>

<tr><td>cahier de cahrge:</td><td><textarea rows="4" cols="50" name="cahierdecharge" id="forms"  class="input_connexion"></textarea></td></tr><?php
if(isset($erreur4)){
	echo '<font color="red">' .$erreur4."</font>" ;

}
?>
<tr><td>Date Début: </td><td><input type="date" name="datedebut" class="input_connexion"></td></tr><?php
if(isset($erreur5)){
	echo '<font color="red">' .$erreur5."</font>" ;

}
?><input type="hidden" name="cinencadrant" value="<?php echo $_SESSION['cin'];?>" ></input<tr><td>Date Fin: </td><td><input type="date" name="datefin" class="input_connexion"></td></tr><?php
if(isset($erreur6)){
	echo '<font color="red">' .$erreur6."</font>" ;

}
?>
<tr><td>Compétences: </td><td><SELECT name="idcompetences" size="1" class="input_connexion">
<option></option>
 <?php foreach ($coms as $key=>$value): ?>
<option><?php echo $value['nom'];?></option>
<?php endforeach ?>
</select>

<td>
<?php
if(isset($erreur7)){
	echo '<font color="red">' .$erreur7."</font>" ;

}
?>
</td></tr>
<tr><td> Conception</td><td>
<select name='idconception' class="input_connexion" ><option>  </option>
 <?php foreach ($cons as $key=>$value):?>
<option><?php echo $value['nom'];?></option>
<?php endforeach ?>
</select>

<?php
if(isset($erreur8)){
	echo '<font color="red">' .$erreur8."</font>" ;

}
?></td></tr>
<tr><td>Anneé Universaire: </td><td><input type='text' name="anneeuniversaire"  class="input_connexion">
</td>


<td>
<?php
if(isset($erreur7)){
	echo '<font color="red">' .$erreur7."</font>" ;

}
?>
</td></tr>
<input type="hidden" name='encadrant1' value="<?php echo $_SESSION['nom'] ;?> <?php echo $_SESSION['prenom'];?>"/>
<tr>
<tr><td>2 eme Encadrant: </td><td><input type="text" name="encadrant2" class="input_connexion"></td></tr><?php


if(isset($erreur9)){
	echo '<font color="red">' .$erreur9."</font>" ;
}
?>
</tr><tr><td>Societe</td><td><input type='text' name="societe" class="input_connexion"/></td></tr>
<input type="hidden" name='cinproposeur' value="<?php echo $_SESSION['cin'];?>"/>
</td><td><input type="submit" value="enregistrer" id="btn" name="enregistrer"></td> </tr>
<tr><td>

<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}?></td></tr>
</table>
<a href="pageenseignant.php"><img src="../image/retour.png" width="40px" height="40px">
</form>
</div>
</body>
</html>