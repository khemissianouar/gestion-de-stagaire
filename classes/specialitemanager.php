<?php
class specialitemanager{
	public function __construct(){
		$c= mysql_connect('localhost','root','');
		mysql_select_db('gestiondepfe',$c);
	}
	public function affichespecialite(){
		$sql = "SELECT *FROM specialite";
$req = mysql_query($sql) ;
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
	return $tableau;

}

public function ajoutespecialite($champs)
{ 

     
      array_pop($champs);
$sql ="INSERT INTO specialite(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=") VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";

}

	$sql = substr($sql, 0, -1);
    $sql.= ")";
	mysql_query($sql);

}
public function afficheunspecilaite($id){
$sql="SELECT * FROM specialite WHERE id='".$id."'";
	$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;
}
}
?>