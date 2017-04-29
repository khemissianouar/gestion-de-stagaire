<?php
class conceptionmanager{
	public function __construct(){
		$c= mysql_connect('localhost','root','');
		mysql_select_db('gestiondepfe',$c);
	}
	public function afficheconception(){
		$sql = "SELECT *FROM conception";
$req = mysql_query($sql) ;
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
	return $tableau;

}
	public function afficheconceptionid($id){
		 $sql = "SELECT *FROM conception where id='".$id."'";
$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;


}
public function ajouteconception($champs)
{     
      array_pop($champs);
$sql ="INSERT INTO conception(";
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


}
?>