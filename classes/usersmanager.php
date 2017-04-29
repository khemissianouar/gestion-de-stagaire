<?php
class Usersmanager{
	public function __construct(){
		$c= mysql_connect('localhost','root','');
		mysql_select_db('gestiondepfe',$c);
	}
	//affiche les etudiant dans la base
	public function afficheetudiants(){
		$sql = "SELECT *FROM etudiant where active='oui' ";
$req = mysql_query($sql) ;
		$sql1 = "SELECT *FROM etudiant where active='oui'  ";
$req1 = mysql_query($sql1);
if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
	return $tableau;
}
}

	public function afficheetudiantsnonstage(){	


$sql="SELECT cin
FROM etudiant
WHERE etudiant.cin  NOT IN (SELECT cinetudiant FROM affecter)";
 $sql1="SELECT cin
FROM etudiant
WHERE etudiant.cin NOT IN (SELECT cinetudiant FROM affecter)" ;
$req= mysql_query($sql) ;
$req1= mysql_query($sql1) ;

if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){



	$tableau[]=$data;

	}

	return $tableau;

}

}






public function auth($email,$cin){
$sql="SELECT * FROM admin WHERE email='$email' AND cin='$cin' ";
	$req = mysql_query($sql);
	$data =mysql_fetch_assoc($req);
	if(isset($data['email'])&&!empty($data['email'])&&isset($data['cin'])&&!empty($data['cin'])){


	}
	else {header('location:../Home.php?m=error');}

}
public function auth1($email,$cin){
$sql="SELECT * FROM etudiant WHERE email='$email' AND cin='$cin' AND active='oui'";
	$req = mysql_query($sql);
	$data =mysql_fetch_assoc($req);
	if(isset($data['email'])&&!empty($data['email'])&&isset($data['cin'])&&!empty($data['cin'])&&!empty($data['cin'])){


	}
	else {header('location:../Home.php?m=error');}

}
public function auth2($email,$cin){
 $sql="SELECT * FROM enseignant WHERE email='$email' AND cin='$cin' AND active='oui'";
	$req = mysql_query($sql);
	$data =mysql_fetch_assoc($req);
	if(isset($data['email'])&&!empty($data['email'])&&isset($data['cin'])&&!empty($data['cin'])&&!empty($data['cin'])){


	}
	else {header('location:../Home.php?m=error');}

}
	//deconnexion 

function deco(){

	session_destroy();
	header('location:../Home.php?m=deconnexion');

}
//ajoute un etudiant
public function addetudiant($champs)
{
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){
      array_pop($champs);
                $sql1="SELECT * FROM specialite Where specialite='".$champs['idspecialite']."'";
	$req1=mysql_query($sql1);
	   $data =mysql_fetch_assoc($req1);
	 $champs['idspecialite']=$data['id'];
$sql ="INSERT INTO etudiant(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",active) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";
}
	$sql = substr($sql, 0, -1);
  $sql.= ",'oui')";
	mysql_query($sql);
$msg='vous etes inscrit sur notre interface gestion de pfe islaib';
	    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($_POST['email'],'confermation d inscription',$msg);
}
}

// ajoute un enseignant

public function addenseignant($champs)
{
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){
      array_pop($champs);
               $sql1="SELECT * FROM departement Where nomdep='".$champs['iddepartement']."'";
	$req1=mysql_query($sql1);
	   $data =mysql_fetch_assoc($req1);
	 $champs['iddepartement']=$data['id'];
$sql ="INSERT INTO enseignant(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",active) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";
}
	$sql = substr($sql, 0, -1);
    $sql.= ",'oui')";
	mysql_query($sql);
	$to=$champs['email'];
	$msg='vous etes inscrit sur notre interface gestion de pfe islaib votre pseudo '.$champs['email'];
	    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($to,'confermation d inscription',$msg,$headers);
}
      }
      // modefie un enseignant
public function modefieenseignant($champs)
{
	  if(isset($champs['enregistrer'])&& !empty($champs['enregistrer']) && !empty($champs['cin'])) {
  array_pop($champs);
  $sql =" UPDATE  enseignant SET ";
      foreach ($champs as $key => $value) {
	$sql.=$key."='".$value."',";
}
	$sql = substr($sql, 0, -1);
	$sql .= "WHERE cin='$champs[cin]'";
	mysql_query($sql);
	header("location:listedeenseignant.php");
}	
}
//modefie un etudiant
public function modefieetudiant($champs)
{
	  if(isset($champs['enregistrer']) && !empty($champs['enregistrer']) && !empty($champs['cin'])) {
  array_pop($champs);
  $sql =" UPDATE  etudiant SET ";
      foreach ($champs as $key => $value) {
	$sql.=$key."='".$value."',";
}
	$sql = substr($sql, 0, -1);
	$sql .= "WHERE cin='$champs[cin]'";
	mysql_query($sql);
		header("location:listedeetudiant.php");
   
}}
//affiche les enseignants dans la base
public function afficheenseignant(){
		$sql = "SELECT * FROM enseignant where active='oui'";
	$req=mysql_query($sql);
			$sql1 = "SELECT * FROM enseignant  where active='oui' ";
	$req1=mysql_query($sql1);
	if(mysql_fetch_row($req1)>0){

while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
}
	return $tableau;

}
//affiche un enseignant
public function afficheunenseignant($cin){
	$sql="SELECT * FROM enseignant WHERE cin=".$cin;
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
public function afficheunenseignantcin($cin){
	$sql="SELECT * FROM enseignant WHERE cin='".$cin."'";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
//affiche un etudiant
public function afficheunetudiant($cin){
 $sql="SELECT * FROM etudiant WHERE cin='".$cin."'";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
public function afficheunetudiantcin($cin){
 $sql="SELECT * FROM etudiant WHERE cin='".$cin."'";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
public function afficheunetudiantpostule($cin){
 $sql="SELECT * FROM etudiant WHERE cin='".$cin."'";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
//supprime un etudiant
function suppetudiant($cin){
	$sql="DELETE FROM etudiant WHERE cin=$cin";
		$req = mysql_query($sql);
		header('location:listedeetudiant.php');

}
//supprime un enseignant
function suppenseignant($cin){
	$sql="DELETE FROM enseignant WHERE cin=$cin";
		$req = mysql_query($sql);
		header('location:listedeenseignant.php');
}
	

//active compte etudiant
public function activeetudiant($champs){
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){
      array_pop($champs);
               echo $sql1="SELECT * FROM specialite Where specialite='".$champs['idspecialite']."'";
	$req1=mysql_query($sql1);
	   $data =mysql_fetch_assoc($req1);
	 $champs['idspecialite']=$data['id'];

$sql ="INSERT INTO etudiant (";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",active) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";
}
	$sql = substr($sql, 0, -1);
 $sql.= ",'non')";
	mysql_query($sql);
	header('location:Home.php');

  }
  	
}
//demande activeation compte enseignant
public function activeenseignant($champs){
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){

      array_pop($champs);
         $sql1="SELECT * FROM departement Where nomdep='".$champs['iddepartement']."'";
	$req1=mysql_query($sql1);
	   $data =mysql_fetch_assoc($req1);
	 $champs['iddepartement']=$data['id'];
	  
$sql ="INSERT INTO enseignant (";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",active) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";
}
	$sql = substr($sql, 0, -1);
 echo $sql.= ",'non')";
	mysql_query($sql);
	


  }
  	
}
	public function nombredemandedactiveetudiant(){
 $sql = "SELECT count(*) FROM 
etudiant where active='non'";
$req = mysql_query($sql) ;
 $a_result=mysql_fetch_row($req);
 return  $a_result;
}
public function affichedemandedactiveetudiant(){
		$sql = "SELECT *FROM etudiant where active='non'";

$req = mysql_query($sql) ;
		$sql1 = "SELECT *FROM etudiant where active='non'";

$req1 = mysql_query($sql1) ;
if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
	return $tableau;
}
} 

function suppdemandedactiveetudiant($cin,$email){
	$sql="DELETE FROM etudiant WHERE cin=$cin";
		$req = mysql_query($sql);
				$msg='votre demande est refuse';
	    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($email,'confermation d inscription',$msg);
		header('location:demandedactiveetudiant.php');
}
function acceptedemandeactiveetudiant($cin,$email){
 $sql=" UPDATE etudiant SET active ='oui' WHERE cin='".$cin."'";
$req = mysql_query($sql);
$msg='votre demande d activation a été accepeté';
	    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($email,'demande d activation',$msg);
	header('location:demandedactiveetudiant.php');


}
function suppdemandedactiveenseignant($cin,$email){
	$sql="DELETE FROM enseignant WHERE cin=$cin";
		$req = mysql_query($sql);
		$msg='votre demande est refuse';
	    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($email,'confermation d inscription',$msg);
		header('location:demandedactiveenseignant.php');
}
function acceptedemandeactiveenseignant($cin,$email){
 $sql=" UPDATE enseignant SET active ='oui' WHERE cin='".$cin."'";
$msg='votre demande d activation est accepete';
	    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($email,'demande d activation',$msg);
$req = mysql_query($sql);
	header('location:demandedactiveenseignant.php');


}
	public function nombredemandedactiveenseignant(){
 $sql = "SELECT count(*) FROM 
enseignant where active='non'";
$req = mysql_query($sql) ;
 $a_result=mysql_fetch_row($req);
 return  $a_result;
}
public function affichedemandedactiveenseignat(){
		$sql = "SELECT *FROM enseignant where active='non'";

$req = mysql_query($sql) ;
		$sql1 = "SELECT *FROM enseignant where active='non'";

$req1 = mysql_query($sql1) ;
if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
	return $tableau;
}
} 
}
?>