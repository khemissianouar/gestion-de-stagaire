<?php
class competencemanager{
	public function __construct(){
		$c= mysql_connect('localhost','root','');
		mysql_select_db('gestiondepfe',$c);
	}
	public function affichecompetence(){
		$sql = "SELECT *FROM competence";
$req = mysql_query($sql) ;
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}
	return $tableau;

}
public function ajoutecompetence($champs)
{ 

     
      array_pop($champs);
$sql ="INSERT INTO competence(";
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
	public function affichecompetenceid($id){
$sql = "SELECT *FROM competence where id='".$id."'";
$req = mysql_query($sql);
	$data= mysql_fetch_assoc($req);
	return $data;


}
}
?>