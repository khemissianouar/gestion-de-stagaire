<?php  session_start();

require("core.php");
$conp= new conceptionmanager();
$conps=$conp->afficheconception();

$user=new usersmanager();
if(isset($_SESSION)){
  $user->auth($_SESSION['email'],$_SESSION['cin']);
}
if(isset($_POST['ajoute'])){
if (!empty($_POST['nom'])) {
	$conp->ajouteconception($_POST);
	$erreur1='bien ajoute';
	
}
else
{
	$erreur='vous devez saisir le conception';
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
conception
<input type='text'  class="input_connexion" name="nom"/> 

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
 <th> conception</th>


</tr>
 <?php foreach ($conps as $key=>$value): ?>
<tr>
		<td><?php echo $value['id']; ?> </td>
		<td><?php echo $value['nom']; ?> </td>


</tr>

<?php endforeach ?>
</table>
<a href="ajoutesujetpfe.php"><img src="../image/retour.png" width="35px" height="35px"></a>

</div>
</body>
</html>