<?php require("core.php");
session_start();
$auth = new Usersmanager();
if(isset($_SESSION)){
  $auth->auth($_SESSION['email'],$_SESSION['cin']);
}
  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $auth->deco();

  }
  $sp=new specialitemanager();
  $sps=$sp->affichespecialite();
if(isset($_POST['enregistrer']))
{
	$specialite=htmlspecialchars($_POST['idspecialite']);
	$niveau =htmlspecialchars($_POST['niveau']);
	$tel=htmlspecialchars($_POST['tel']);

	$ville=htmlspecialchars($_POST['ville']);
	$datedenaissance =htmlspecialchars($_POST['datedenaissance']);
	$nom=htmlspecialchars($_POST['nom']);
	$prenom =htmlspecialchars($_POST['prenom']);
	$cin =htmlspecialchars($_POST['cin']);
	$email=htmlspecialchars($_POST['email']);


	 if(!empty($_POST['nom'])){
	 	 if(!empty($_POST['prenom'])){
	 	 		$cinlength = strlen($cin);
   		if(!empty($_POST['cin'])){
   
	
	if(is_numeric($cin))
	{


	       if($cinlength == 8){
	       		       	   		       	   	  $sql1="SELECT * from etudiant where cin='".$cin."'" ;
$req1=mysql_query($sql1);
if (mysql_fetch_row($req1)==0) {
	 	 	 if(!empty($_POST['datedenaissance'])){
	 	 	 	 if(!empty($_POST['idspecialite'])){
	 	 	 	 	if(!empty($_POST['niveau'])){
	 	 	 	 if(!empty($_POST['groupe'])){
	 	 	 	 	 	 	 				if(!empty($_POST['email'])){
	 	 	 	 	 	 	 			
	

	 	 	 	 	 	 	 		
	 	 	 	 	 	 	 	 

   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
   		       	   		       	   	  $sql="SELECT * from etudiant where email='".$email."'" ;
$req=mysql_query($sql);
if (mysql_fetch_row($req)==0) {

	       	 if(!empty($_POST['ville'])){
	 	 	 	 	 	 	 	if(!empty($_POST['tel'])){
	 	 	 	 	 	 	 		if(is_numeric($tel)){

$auth->addetudiant($_POST);

	       			$erreur="Votre compte a bien ete créé";}
	       		
	       	

		          
	
	else {
		$erreur10="tel doit etre numerique"; }
	}
    

		          else {
		    $erreur10='vous devez saisir le tel';
		 }
    
}
	else {
		    $erreur9='vous devez saisir le ville';
		 }
   

}
	        else { $erreur8='email existe dans notre base';

	             }
}


	        else { $erreur8='votre email est incorrecte';

	             }
}

	else {
		    $erreur8='vous devez saisir le email';
		 }
   

}
else {
		    $erreur7='vous devez saisir le groupe';
		 }
   
}
	else {
		    $erreur6='vous devez saisir le niveau';
		 }
   

}



	else {
		    $erreur5='vous devez saisir le specialite';
		 }
   

}

	else {
		    $erreur4='vous devez saisir le date de naissance';
		 }
   

}
	else {
		    $erreur3='cin existe dans notre base';
		 }
   

}

	else {
		    $erreur3='cin est incorrecte';
		 }
   

}

	else {
		    $erreur3='le cin doit etre numerique';
		 }
   

}

	else {
		    $erreur3='vous devez saisir le cin';
		 }
   

}

	else {
		    $erreur2='vous devez saisir le prenom';
		 }
   

}




	else {
		    $erreur1='vous devez saisir le nom';
		 }
   


}

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
<body>
<div id="container">
<img id="i" src="../image/f.jpg">
<img id="f" src="../image/l.png" >

<form method="POST"  class="form_connexion">
<table align="center">
<tr><td><label>Nom * </label>
<td><input type="text" name="nom" class="input_connexion">	<td>
<?php
if(isset($erreur1)){
	echo '<font color="red">' .$erreur1."</font>" ;

}
?></td>
</tr><tr> <td><label> Prénom   </label></td>
<td><input type="text" name="prenom" class="input_connexion"><td>
<?php
if(isset($erreur2)){
	echo '<font color="red">' .$erreur2."</font>" ;

}
?></td>
</tr><tr><td><label>  Cin* </label></td>
<td><input type="text" name="cin" class="input_connexion"></td>
<td>
<?php
if(isset($erreur3)){
	echo '<font color="red">' .$erreur3."</font>" ;

}?>
</td></tr>


<tr><td><label> Date de naissance*</label></td>
<td><input type="date" name="datedenaissance" class="input_connexion"></td>
<td>
<?php
if(isset($erreur4)){
	echo '<font color="red">' .$erreur4."</font>" ;

}
?></td>
</tr><tr><td><label>Specialite *: </label></td><td><SELECT name="idspecialite" size="1" class="input_connexion">
<option></option>
 <?php foreach ($sps as $key=>$value): ?>
<option><?php echo $value['specialite'];?></option>
<?php endforeach ?>
</SELECT></td><td>
<a href="ajoutespecialite.php"> <img src="../image/ajoutesujet.png" width="35px" height="35px"></a></td>

</td><td>
<?php
if(isset($erreur5)){
	echo '<font color="red">' .$erreur5."</font>" ;

}
?></td></tr>


<tr><td><label> Niveau*     </label></td>
<td><FORM>
<SELECT name="niveau" size="1" class="input_connexion">
<OPTION>
<OPTION>1
<OPTION>2
<OPTION>3
<OPTION>4
<OPTION>5
</SELECT>
</FORM></td>
<td>
<?php
if(isset($erreur6)){
	echo '<font color="red">' .$erreur6."</font>" ;

}
?></td>
</tr><tr><td><label> Groupe* </label></td>
<td><FORM>
<SELECT name="groupe" size="1" class="input_connexion">
<OPTION>
<OPTION>1
<OPTION>2
<OPTION>3
<OPTION>4
<OPTION>5
</SELECT>
</FORM></td>
<td>
<?php
if(isset($erreur7)){
	echo '<font color="red">' .$erreur7."</font>" ;

}
?></td>
</tr><tr><td><label> email*    </label></td> 
</td>
<td><input type="text" name="email" class="input_connexion"></td>
<td>
<?php
if(isset($erreur8)){
	echo '<font color="red">' .$erreur8."</font>" ;

}?></td>
</td></tr>
<tr><td><label> Ville*   </label></td>
<td><input type="text" name="ville" class="input_connexion"></td>
<td>
<?php
if(isset($erreur9)){
	echo '<font color="red">' .$erreur9."</font>" ;

}
?></td>
</tr><tr><td><label> Tel*</label></td>
<td><input type="text" name="tel" class="input_connexion"></td>
<td>
<?php
if(isset($erreur10)){
	echo '<font color="red">' .$erreur10."</font>" ;

}
?></td>
<tr><td></td><td><input type="submit" name="enregistrer" value="Enregistrer" id="btn"></td>
<tr><td>  </td> <td> </td></tr>

<tr>
<td>
<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}
?></td>
</tr>

</table>

</form>

<a href="listedeetudiant.php"><img src="../image/retour.png" width="35px" height="35px"></a> 
</div>
</body>
</html>
