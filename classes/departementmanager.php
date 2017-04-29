<?php
class departementmanager{
	public function __construct(){
		$c= mysql_connect('localhost','root','');
		mysql_select_db('gestiondepfe',$c);
	}
	public function affichedepartement(){
		$sql = "SELECT *FROM departement";
$req = mysql_query($sql) ;
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
	return $tableau;

}
public function ajoutedepartement($champs)
{ 

     
      array_pop($champs);

$sql ="INSERT INTO departement(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=") VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";

}

	$sql = substr($sql, 0, -1);
    echo $sql.= ")";
	mysql_query($sql);

}
public function afficheundepartement($id){
	$sql="SELECT * FROM departement WHERE id='".$id."'";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
}
?>