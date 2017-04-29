<?php  session_start();
require("core.php");
$spe= new specialitemanager();
$sps=$spe->affichespecialite();
$user=new usersmanager();
if(isset($_SESSION)){
  $user->auth($_SESSION['email'],$_SESSION['cin']);
}
if(isset($_POST['ajoute'])){
if (!empty($_POST['nom'])) {
	$spe->ajoutespecialite($_POST['nom']);
	$erreur1='bien ajoute';
	  

	  
}
else
{
	$erreur='vous devez saisir le specialite';
}
}

 ?>
<html>
<head>
<meta charset="utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
</head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg">
<img id="f" src="../image/l.png" >
<table>
<tr><td>
<form method="POST"  class="form_connexion"id="forms" action=" ">
specialite
<input type='text'  class="input_connexion" name="specialite"/> 

<input type='submit'  id="btn" name="ajoute" value="ajoute" /></form>
<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}

?>
</td></tr><tr><td><?php
if(isset($erreur1)){
	echo '<font color="red">' .$erreur1."</font>" ;

}
?></td></tr>
<th>id </th>
 <th> specialite</th>


</tr>
 <?php foreach ($sps as $key=>$value): ?>
<tr>
		<td><?php echo $value['id']; ?> </td>
		<td><?php echo $value['specialite']; ?> </td>


</tr>

<?php endforeach ?></table>
<a href="inscriptionetudiant.php"><img src="../image/retour.png" width="35px" height="35px"></a>




</div>
</body>
</html>