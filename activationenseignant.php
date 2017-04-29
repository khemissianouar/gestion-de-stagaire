<?php require("core.php");
$auth = new Usersmanager();
$dep = new departementmanager();
$depts=$dep->affichedepartement();
if(isset($_SESSION)){
  $auth->auth($_SESSION['email'],$_SESSION['cin']);
}
  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $auth->deco();
  }
if(isset($_POST['enregistrer'])){

	
	$niveau =htmlspecialchars($_POST['grade']);
	$tel=htmlspecialchars($_POST['tel']);
	$adresse =htmlspecialchars($_POST['adresse']);
	$nom=htmlspecialchars($_POST['nom']);
	$prenom =htmlspecialchars($_POST['prenom']);
	$cin =htmlspecialchars($_POST['cin']);
	$email=htmlspecialchars($_POST['email']);


	 if(!empty($_POST['nom'])){
	 	 if(!empty($_POST['prenom'])){
	 	 	 if(!empty($_POST['grade'])){
	 	 	 	if(!empty($_POST['iddepartement'])){
	 	 	 	 if(!empty($_POST['email'])){

	 	 	 	 	
	

	 	 	 	 	 	 	 		
	 	 	 	 	 	 	 	 
	$cinlength = strlen($cin);
   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
   		       	   	  $sql="SELECT * from enseignant where email='".$email."'" ;
$req=mysql_query($sql);
if (mysql_fetch_row($req)==0) {
   		if(!empty($_POST['cin'])){
   
	
	if(is_numeric($cin))
	{

	       if( $cinlength == 8){
	       		       	   	  $sql1="SELECT * from enseignant where cin='".$cin."'" ;
$req1=mysql_query($sql1);
if (mysql_fetch_row($req1)==0) {
	       	 		if(!empty($_POST['adresse'])){
	       	 			 		if(!empty($_POST['tel'])){
	       	 			 				if(is_numeric($tel)){

                            $auth->activeenseignant($_POST);

	       			$erreur="Votre compte est active";}
	       		
	       	



	else {
		    $erreur8='le numero de tel doit etre numerique';
		 }
   

}
else {
		    $erreur8='vous devez sasir le tel';
		 }
   
}


else {
		    $erreur7='vous devez saisir l adresse';
		 }
   

}
	else {
		    $erreur6='cin existe dans notre base  ';
		 }
   

}
	else {
		    $erreur6='cin incorrecte';
		 }
   

}



	else {
		    $erreur6='le cin doit etre numerique';
		 }
   

}

	else {
		    $erreur6='vous devez saisir le cin';
		 }
   

}
	else {
		    $erreur5='email existe dans notre base ';
		 }
   

}
	else {
		    $erreur5='votre email est incorrecte ';
		 }
   

}

	else {
		    $erreur5='vous devez saisir le email';
		 }
   

}

	else {
		    $erreur4='vous devez saisir le departement';
		 }
   

}

	else {
		    $erreur3='vous devez saisir le grade';
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
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<body>
<div id="container">
<img id="i" src="image/f.jpg">
<img id="f" src="image/l.png" >

<form method="POST"  class="form_connexion">
<table align="center">
<tr><td><label> Nom * </label>
<td><input type="text" name="nom" class="input_connexion">	<td>
<?php
if(isset($erreur1)){
	echo '<font color="red">' .$erreur1."</font>" ;

}
?></td>
</tr><tr> <td><label> Prénom * </label></td>
<td><input type="text" name="prenom" class="input_connexion"><td>
<?php
if(isset($erreur2)){
	echo '<font color="red">' .$erreur2."</font>" ;

}
?>
</td>
</tr><tr><td><label> Grade *</label></td>
<td><FORM>
<SELECT name="grade" size="1" class="input_connexion">
<OPTION>
<OPTION>maitre de conference
<OPTION>maitre assistant
<OPTION>maitre technologue
<OPTION>technologue
<OPTION>professeur
<OPTION>assistant
<OPTION>pes
</SELECT>
</FORM></td>
<td>
<?php
if(isset($erreur3)){
	echo '<font color="red">' .$erreur3."</font>" ;

}
?></td>
</tr></tr><tr><td><label> Departement *</label></td>
<td><SELECT name="iddepartement" size="1" class="input_connexion">
<option></option>
 <?php foreach ($depts as $key=>$value): ?>
<option><?php echo $value['nomdep'];?></option>
<?php endforeach ?>
</SELECT></SELECT></td>

</td><td>

</td><td>
<?php
if(isset($erreur4)){
	echo '<font color="red">' .$erreur4."</font>" ;

}
?></td></tr>



<tr><td><label> Email *    </label></td> 
</td>
<td><input type="text" name="email" class="input_connexion"></td>
<td>
<?php
if(isset($erreur5)){
	echo '<font color="red">' .$erreur5."</font>" ;

}?></td></tr>
</tr><tr><td><label> Cin *   </label></td>
<td><input type="text" name="cin" class="input_connexion"></td>
<td>
<?php
if(isset($erreur6)){
	echo '<font color="red">' .$erreur6."</font>" ;

}
?></td>
</tr><tr><td><label> Adresse </label></td>
<td><input type="text" name="adresse" class="input_connexion"></td>
<td>
<?php
if(isset($erreur7)){
	echo '<font color="red">' .$erreur7."</font>" ;

}
?></td>

</tr><tr><td><label> Tel </label></td>
<td><input type="text" name="tel" class="input_connexion"></td>
<td>
<?php
if(isset($erreur8)){
	echo '<font color="red">' .$erreur8."</font>" ;

}
?></td></tr>

<tr><td><input type="submit" name="enregistrer" value="Enregistrer" id="btn"></td>

</tr>	            	
</table>
<tr><td></td><td>
<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}?></td></tr>
</form>
  <a href="home.php"><img src="image/retour.jpg" width="40" height="30px"></a>
</div>
</body>
</html>
