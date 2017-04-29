<?php
class sujetmanager{
	private $table = "sujets";
	//connection a la base de donnes
public	function __construct(){
		$c= mysql_connect('localhost','root','');
		mysql_select_db('gestiondepfe',$c);
	}

	// affichage de tout les sujets
	function affichesujetpfe(){
		$sql = "SELECT *FROM sujetdestage where type='pfe'" ;
        $req = mysql_query($sql);
        	$sql1 = "SELECT *FROM sujetdestage where type='pfe' ";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
}
	function afficheencadrant(){
		$sql = "SELECT *FROM affecter";
        $req = mysql_query($sql);
        	$sql1 = "SELECT *FROM affecter";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
}



// afiche les sujet de pfe
	function affichesujet(){
		$sql = "SELECT *FROM sujetdestage";
        $req = mysql_query($sql);
        	$sql1 = "SELECT *FROM sujetdestage";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}}
// afiche les sujet de pfe
	function affichesujetpfa(){
		$sql = "SELECT *FROM sujetdestage where type='pfa'";
        $req = mysql_query($sql);
        	$sql1 = "SELECT *FROM sujetdestage where type='pfa'";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
}
// afiche les sujet de ete
	function affichesujetete(){
		$sql = "SELECT *FROM sujetdestage where type='ete'";
        $req = mysql_query($sql);
        	$sql1 = "SELECT *FROM sujetdestage  where type='ete'";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}}
//affiche les sujets propose

	function affichesujetpfepropose(){
		$sql = "SELECT *FROM sujetdestage where type='pfe' and etat='proposer'";
        $req = mysql_query($sql);
        	$sql1 = "SELECT *FROM sujetdestage where type='pfe'and etat='proposer'";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}	}

function affichesujetapprouve(){
		$sql = "SELECT *FROM sujetdestage where type='pfe' and etat='approuver'";
        $req = mysql_query($sql);
        $sql1 = "SELECT *FROM sujetdestage where type='pfe' and etat='approuver'";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}}

public function affichesujetaffecter(){
		$sql = "SELECT *FROM sujetdestage where type='pfe'and WHERE etat='affecter'";
        $req = mysql_query($sql);
        	$sql1 = "SELECT *FROM sujetdestage where type='pfe' and WHERE etat='affecter'";
        $req1 = mysql_query($sql1);
        	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
}




// afiiche un sujet pfe
public function afficheunsujet($id){
	$sql="SELECT *FROM sujetdestage where id='".$id."'";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
public function afficheunsujetete($id){
	$sql="SELECT * FROM sujetdestage WHERE type='ete' and id=".$id;
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
public function afficheunsujetpfa($id){
	$sql="SELECT * FROM sujetdestage  WHERE type='pfa' and  id=".$id;
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
//affiche un sujet propose

public function afficheunsujetpfepropose($id){
	$sql="SELECT * FROM sujetdestage WHERE type='pfe' and id=".$id;
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
public function afficheunsujetaffecter($id){
	 $sql="SELECT * FROM sujetdestage WHERE type='pfe'  and  id='".$id."';";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}


//ajoute sujet pfe

public function addsujetpfe($champs)
{ 
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){
      array_pop($champs);
                
                $sql3="SELECT * FROM conception Where nom='".$champs['idconception']."'";
	$req3=mysql_query($sql3);
	   $data3 =mysql_fetch_assoc($req3);
	 $champs['idconception']=$data3['id'];
	         $sql2="SELECT * FROM competence Where nom='".$champs['idcompetences']."'";
	$req2=mysql_query($sql2);
	  $data2 =mysql_fetch_assoc($req2);
	 $champs['idcompetences']=$data2['id'];
      $test=explode(" ",$champs['encadrant1']);
      $nom=$test[0];
        $prenom=$test[1];
     $sql1="SELECT * FROM enseignant Where nom='".$nom."'AND prenom='".$prenom."'";
	$req1=mysql_query($sql1);
     $data =mysql_fetch_assoc($req1);
     $date = date("Y-m-d");
 $sql ="INSERT INTO sujetdestage(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",etat,cinencadrant,datedecreation,type) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";

}

	$sql = substr($sql, 0, -1);
 $sql.= ",'proposer','".$data['cin']."','".$date."','pfe')";
	mysql_query($sql);

}
} 
//ajoute sujet pour enseignant
public function addsujetpfe1($champs)
{ 
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){
      array_pop($champs);
                      $sql1="SELECT * FROM conception Where nom='".$champs['idconception']."'";
	$req1=mysql_query($sql1);
	   $data =mysql_fetch_assoc($req1);
	$champs['idconception']=$data['id'];
	          $sql2="SELECT * FROM competence Where nom='".$champs['idcompetences']."'";
	$req2=mysql_query($sql2);
	  $data1 =mysql_fetch_assoc($req2);
	 $champs['idcompetences']=$data1['id'];
 
     $date = date("Y-m-d");
$sql ="INSERT INTO sujetdestage(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",etat,datedecreation,type) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";

}

	$sql = substr($sql, 0, -1);
 $sql.= ",'proposer','".$date."','pfe')";
	mysql_query($sql);

}}

public function addsujetete($champs)
{
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){
      array_pop($champs);
      $date = date("Y-m-d");
$sql ="INSERT INTO sujetdestage (";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.="etat,datedecreation,type) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";

}

	$sql = substr($sql, 0, -1);
   $sql.= ",'proposer','".$date."','ete')";
	mysql_query($sql);
	header('location:pageetudiant.php');

}
} 

public function addsujetpfa($champs)
{
	if(isset($champs['enregistrer'])&& !empty($champs['enregistrer'])){
      array_pop($champs);
        $date = date("Y-m-d");
$sql ="INSERT INTO sujetdestage(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",etat,datedecreation,type) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";

}

	$sql = substr($sql, 0, -1);
   echo  $sql.= ",'proposer','".$date."','pfa')";
	mysql_query($sql);
	header('location:pageetudiant.php');

}
}

public function deco(){
	session_destroy();
	header('location:../Home.php?m=deconnexion');

}
public function approuve($id)
{

  $sql =" UPDATE  sujetdestage SET etat='approuver' WHERE id ='".$id."'";
	mysql_query($sql);
	header('location:listedesujetpfepropose.php');

}
public function refuse($id)
{

  $sql =" UPDATE sujetdestage SET etat='refuse' WHERE id ='".$id."'";
	mysql_query($sql);
header('location:listedesujetpfepropose.php');

}

public function soutenupfe($id)
{

  $sql =" UPDATE  sujetdestage SET etat='valide' WHERE id ='".$id."'";
	mysql_query($sql);
	$sql1="DELETE FROM affecter WHERE idsujet='".$id."'";
		$req1 = mysql_query($sql1);

	header('location:listedeencadrant.php');

}
public function soutenupfa($id)
{

  $sql =" UPDATE  sujetdestage SET etat='valide' WHERE id ='".$id."'";
	mysql_query($sql);
	header('location:sujetpfapropose.php');

}
public function nonvalidepfe($id)
{

  $sql =" UPDATE  sujetdestage SET etat='non valide' WHERE id ='".$id."'";
	mysql_query($sql);
		$sql1="DELETE FROM affecter WHERE idsujet='".$id."'";
		$req1 = mysql_query($sql1);
	header('location:listedeencadrant.php');

}
public function enattendepfe($id)
{

 $sql =" UPDATE  sujetdestage SET etat='en attende' WHERE id ='".$id."'";
	mysql_query($sql);
	header('location:listedeencadrant.php');

}


 public  function affichesujetpfapropose(){
$sql="SELECT * FROM sujetdestage Where type='pfa' and etat='proposer'";
	$req=mysql_query($sql);
	$sql1="SELECT * FROM sujetdestage Where type='pfa'and etat='proposer'";
	$req1=mysql_query($sql1);
	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
}
 public  function affichesujetetepropose(){
$sql="SELECT * FROM sujetdestage Where type='ete' and etat='proposer'";
	$req=mysql_query($sql);
	$sql1="SELECT * FROM sujetdestage Where type='ete'and etat='proposer'";
	$req1=mysql_query($sql1);
	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
}

 public  function affichesujetencadrant($cin){
$sql="SELECT * FROM sujetdestage Where etat='approuver' AND cinencadrant=".$cin;
	$req=mysql_query($sql);
	$sql1="SELECT * FROM sujetdestage Where etat='approuver' AND cinencadrant=".$cin;
	$req1=mysql_query($sql1);
	if(mysql_fetch_row($req1)>0){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}}


 function affichemesproposition($cin){
$sql=" SELECT * FROM sujetdestage Where cinproposeur='".$cin."'";
	$req=mysql_query($sql);
	$sql1=" SELECT * FROM sujetdestage Where cinproposeur='".$cin."'";
	$req1=mysql_query($sql1);
	if(mysql_fetch_row($req1)){
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
}
	public function nombredesujetencadre($cin){
  $sql = "SELECT count(*) FROM sujetdestage where type='pfe' and etat='approuver' AND cinencadrant='".$cin."'";
$req = mysql_query($sql) ;
 $a_result=mysql_fetch_row($req);
 return  $a_result;
}
	public function nombredesujetpropose(){
 $sql = "SELECT count(*) FROM 
sujetdestage where type='pfe'and etat='proposer'";
$req = mysql_query($sql) ;
 $a_result=mysql_fetch_row($req);
 return  $a_result;
}

// affectue un sujet a un etudiant
	public function affecter($etudiant,$unsujet){

  			if(isset($_POST['affectue']) ){

   $sql="INSERT INTO affecter(cinencadrant,cinetudiant,idsujet) VALUES('".$_SESSION['cin']."','".$etudiant['cin']."','".$unsujet['id']."');" ;
  				mysql_query($sql);
  				 $sql1="DELETE from condidature where cinetudiant='".$etudiant['cin']."';";
  					mysql_query($sql1);
  			$sql2=" UPDATE  sujetdestage SET etat='affecter' WHERE id ='".$unsujet['id']."';";
  						mysql_query($sql2);
  						header("location:listedesujetencadrant.php");

  			}
  		}
  		// affictue sujet a un etudiant 
  		public function affecter1($etudiant,$unsujet){


   $sql="INSERT INTO affecter(cinencadrant,cinetudiant,idsujet) VALUES('".$_SESSION['cin']."','".$etudiant['cin']."','".$unsujet['id']."');" ;
  				mysql_query($sql);
  				 $sql1="DELETE from condidature where cinetudiant='".$etudiant['cin']."';";
  					mysql_query($sql1);
  			$sql2=" UPDATE  sujetdestage SET etat='affecter' WHERE id ='".$unsujet['id']."';";
  						mysql_query($sql2);
  						header("location:listedesujetencadrant.php");

  			
  		}


public function modefiesujet($champs)
{
	  if(isset($champs['enregistrer'])&& !empty($champs['enregistrer']) && !empty($champs['id'])) {
  array_pop($champs);
               $sql3="SELECT * FROM conception Where nom='".$champs['idconception']."'";
	$req3=mysql_query($sql3);
	   $data3 =mysql_fetch_assoc($req3);
	 $champs['idconception']=$data3['id'];
	         $sql2="SELECT * FROM competence Where nom='".$champs['idcompetences']."'";
	$req2=mysql_query($sql2);
	  $data2 =mysql_fetch_assoc($req2);
	 $champs['idcompetences']=$data2['id'];

        $test=explode(" ",$champs['encadrant1']);
      $nom=$test[0];
        $prenom=$test[1];
     $sql1="SELECT * FROM enseignant Where nom='".$nom."'AND prenom='".$prenom."'";
	$req1=mysql_query($sql1);
     $data =mysql_fetch_assoc($req1);
     $champs['cinencadrant']=$data['cin'];

 $sql =" UPDATE  sujetdestage SET ";
      foreach ($champs as $key => $value) {
	$sql.=$key."='".$value."',";
}
	$sql = substr($sql, 0, -1);
 $sql .= "WHERE id='$champs[id]'";
	mysql_query($sql);
		header('location:listedesujetpfe.php');

}
}
}

?>