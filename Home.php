<?php session_start();
require("core.php"); 
$log = new Usersmanager();
if(isset($_POST['envoyer'])){
	$email=$_POST['email'];
	$cin=$_POST['cin'];
	if(!empty($email)){
	 if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	 	if(!empty($cin)){
	

$sql="SELECT * FROM etudiant WHERE email='".$email."' AND cin='".$cin."'";
$sql1="SELECT * FROM enseignant WHERE email='".$email."' AND cin='".$cin."'";
$sql2="SELECT * FROM admin WHERE email='".$email."' AND cin='".$cin."'";
$sql3="SELECT * FROM etudiant WHERE email='".$email."' AND cin='".$cin."'";
$sql4="SELECT * FROM enseignant WHERE email='".$email."' AND cin='".$cin."'";
$sql5="SELECT * FROM admin WHERE email='".$email."' AND cin='".$cin."'";

$req=mysql_query($sql) or die(mysql_error());
$req1=mysql_query($sql1) or die(mysql_error());
$req2=mysql_query($sql2) or die(mysql_error());
$req3=mysql_query($sql3) or die(mysql_error());
$req4=mysql_query($sql4) or die(mysql_error());
$req5=mysql_query($sql5) or die(mysql_error());
$data =mysql_fetch_assoc($req3);
$data1 =mysql_fetch_assoc($req4);
$data2 =mysql_fetch_assoc($req5);

if(mysql_fetch_row($req)>0){

	session_start();
$_SESSION['email']=$data['email'] ;
$_SESSION['nom']=$data['nom'];
$_SESSION['cin']=$data['cin'];
$_SESSION['id']=$data['id'];
$_SESSION['role']=$data['role'];
$_SESSION['prenom']=$data['prenom'];
$_SESSION['niveau']=$data['niveau'];
$_SESSION['specialite']=$data['specialite'];
$_SESSION['adresse']=$data['adresse'];
$_SESSION['tel']=$data['tel'];
	header('location:etudiant/pageetudiant.php');
}
if(mysql_fetch_row($req1)>0){
	session_start();
	$_SESSION['email']=$data1['email']  ;
$_SESSION['role']=$data1['role'];
$_SESSION['nom']=$data1['nom'];
$_SESSION['cin']=$data1['cin'];
$_SESSION['id']=$data1['id'];
$_SESSION['prenom']=$data1['prenom'];
	header('location:enseignant/pageenseignant.php');
}
if (mysql_fetch_row($req2)>0){
	session_start();
	$_SESSION['email']=$data2['email'] ;
$_SESSION['nom']=$data2['nom'];
$_SESSION['prenom']=$data2['prenom'];
$_SESSION['cin']=$data2['cin'];
$_SESSION['id']=$data2['id'];
$_SESSION['role']=$data2['role'];
	header('location:admin/listedesujetete.php');
}

else{
	$erreur= "mauvaise identifients";
}
}
else{
	$erreur= "vous devez saisir le mot de passe";
}
}
else{
	$erreur= "email incorrecte ";
}
}
else {
	$erreur= "vous devez saisir l email";
}


	}	


?><html>
<head>
<title>islaib_pfe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/slideshow.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />


</head>
<body>

<div id="container">
<img id="i" src=image/f.jpg >
<img id="f" src=image/l.png >
<br><br>
<form class="input_connexion" method ="POST" action="";>
<input type="text" class="input_connexion"  placeholder="E-mail" name="email">
<input type="password" class="input_connexion" placeholder="Mot de passe" name="cin">
<input type="submit" value="Connexion" id="btn" name="envoyer">
<a  href="activationetudiant.php" class="lien" >Activer compte etudiant</a>
<a  href="activationenseignant.php" class="lien" >Activer compte enseignant</a>
</form>
<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}
?>



<section id="slideshow">
		
	<div class="container">
		<div class="c_slider"></div>
		<div class="slider">
		<figure>
				<img src="image/a.jpg" alt="" width="800" height="400" />
				<figcaption>ISLAIB</figcaption>

			</figure><!--
			--><figure>
			<figure>
				<img src="image/c.jpg" alt="" width="800" height="400" />
				<figcaption>Multimedia et web</figcaption>

			</figure><!--
			--><figure>
				<img src="image/b.jpg" alt="" width="800" height="400" />
				<figcaption>anglais</figcaption>
			</figure><!--
			--><figure> 
				<img src="image/d.png" alt="" width="800" height="400" />
				<figcaption>Espagnol et allemande</figcaption>
			</figure>
		</div>
	</div>
		
	<span id="timeline"></span>
</section>
<div class="container">
    
	
        </div>
    
</div>
</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/vendor/jquery.sortelements.js" type="text/javascript"></script>
<script src="bootstrap/js/jquery.bdt.js" type="text/javascript"></script>
<script>
    $(document).ready( function () {
        $('#bootstrap-table').bdt();
    });
</script>



</body>
</html>