<?php  session_start();
require("core.php");
$dep= new departementmanager();
$depts=$dep->affichedepartement();
$user=new usersmanager();
if(isset($_SESSION)){
  $user->auth($_SESSION['email'],$_SESSION['cin']);
}
if(isset($_POST['ajoute1'])){
if (!empty($_POST['nomdep'])) {
	$dep->ajoutedepartement($_POST);
	$erreur1='bien ajoute';
	
}
else
{
	$erreur='vous devez saisir le departement';
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
departement :
<input type='text'  class="input_connexion" name="nomdep"/> 

<input type='submit'  id="btn" name="ajoute1" value="ajoute" /></form>
<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}


?>
</td></tr><tr><td><?php
if(isset($erreur1)){
	echo '<font color="red">' .$erreur1."</font>" ;

}
?></td></tr><tr>
<th>id </th>
 <th> nom de departement</th>


</tr>
 <?php foreach ($depts as $key=>$value): ?>
<tr>
		<td><?php echo $value['id']; ?> </td>
		<td><?php echo $value['nomdep']; ?> </td>


</tr>

<?php endforeach ?>

</table>
<a href="inscriptionenseignant.php"><img src="../image/retour.png" width="35px" height="35px"></a>
</div>
</body>
</html>