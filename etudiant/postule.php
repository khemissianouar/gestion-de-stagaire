<?php
require("core.php");
session_start();
$user= new Usersmanager();
 if(isset($_SESSION)){

  $user->auth1($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }

  $postule= new postulemanager();
  if(isset($_POST['postule'])){
if(!empty($_FILES['cv'])){
	 $postule->addpostule($_POST);
  $erreur1='bien ajoute';
}
else{$erreur='il faut mettre votre cv';}

}

?>
<html><head>
<title>islaib_pfe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\sujet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
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
<img id="f" src="../image/l.png"><div class="right" ><a href="?m=deco">deconnexion</a></div>
<br><br>
<table align="center">
<form method="POST" action=" " enctype="multipart/form-data">
<tr><td>CV *
<td><input type="file" name="cv" class="input_connexion"></input></td><td><?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}
?>
</td></tr><tr>
<td> lettre de motivation <td><input type="file" name="lettredemotivation" class="input_connexion"></input>
</tr><tr><td>Attestation
<td><input type="file" name="attestation" class="input_connexion"></input>
</tr><td>

		<input type="hidden" name='cinetudiant' value="<?php echo $_SESSION['cin'];?>"/>
			<input type="hidden" name='idsujet' value="<?php echo $_POST['idsujet'];?>"/>
<input type='submit' name='postule' value="postule" id="btn">
</tr>
<?php
if(isset($erreur1)){
  echo '<font color="red">' .$erreur1."</font>" ;

}
?></td></tr>
</form>
</table>
<a href="listedesujetapprouve.php"><img src="../image/retour.png" width="40px" height="40px"></a>
</div>
</body>
</html>