<?php session_start();
require("core.php");

$user=new usersmanager();
if(isset($_SESSION)){
  $user->auth2($_SESSION['email'],$_SESSION['cin']);
}
$auth = new sujetmanager();

  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $auth->deco();
  }

    if(isset($_GET['id']) && !empty($_GET['id'])){
  $sujetpropose = $auth->afficheunsujetpfepropose($_GET['id']);
  $auth->modefieunsujetencadrant($_POST);
  }  	 			 					



?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<body>

<div id="container">
<img id="i" src="../image/f.jpg">
<img id="f" src="../image/l.png" >

<form method="POST"  class="form_connexion">
<table align="center">
<input type="hidden" name='id' value="<?php echo $sujetpropose['id'];?>"/>
<br><br><br><br><br>

<tr><td><label> etat </label></td><td>
<SELECT name="etat" size="1" class="input_connexion" >
<OPTION><?php echo $sujetpropose['etat'];?></OPTION> 
<OPTION>affecter
</SELECT></td>


<tr><td><input type="submit" name="enregistrer" value="Enregistrer" id="btn"/></td>

</tr>
            	
</table>
<tr><td></td><td>
<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}?></td></tr>
</form>
<a href="?m=deco">deconnexion</a>
  <a href="listedesujetencadrant.php">retour</a>
</div>
</body>
</html>