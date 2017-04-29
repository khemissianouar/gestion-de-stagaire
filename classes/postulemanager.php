<?php
class postulemanager{
	private $table = "postule";
	//connection a la base de donnes
public	function __construct(){
		$c= mysql_connect('localhost','root','');
		mysql_select_db('gestiondepfe',$c);
	}
	// affichege de tout les sujets
	function affichepostule(){
		$sql = "SELECT * FROM  condidature ";
        $req = mysql_query($sql);
        	$sql1 = "SELECT * FROM  condidature ";
        $req1 = mysql_query($sql1);
        if (mysql_fetch_row($req1)>0) {
        
      
while($data =mysql_fetch_assoc($req)){


	$tableau[]=$data;

	}

	return $tableau;
}
 }
public function addpostule($champs)
{

	if(isset($champs['postule'])&& !empty($champs['postule'])){
      array_pop($champs);
      		$target_dir = "../up/cv/";
      		$target_dir1 = "../up/lm/";
      		$target_dir2 = "../up/att/";

$target_file = $target_dir . basename($_FILES["cv"]["name"]);
		$path1=$_FILES['lettredemotivation']['tmp_name'];
		$name=$_FILES['lettredemotivation']['name'];
		$size1=$_FILES['lettredemotivation']['size'];
		$type1=$_FILES['lettredemotivation']['type'];
		$error1=$_FILES['lettredemotivation']['error'];
		$target_file1 = $target_dir1 . basename($_FILES["lettredemotivation"]["name"]);
		$path2=$_FILES['attestation']['tmp_name'];
		$name2=$_FILES['attestation']['name'];
		$size2=$_FILES['attestation']['size'];
		$type2=$_FILES['attestation']['type'];
		$error2=$_FILES['attestation']['error'];
		$target_file2 = $target_dir2 . basename($_FILES["attestation"]["name"]);
		$path=$_FILES['cv']['tmp_name'];
		$name=$_FILES['cv']['name'];
		$size=$_FILES['cv']['size'];
		$type=$_FILES['cv']['type'];
		$error=$_FILES['cv']['error'];
		
	move_uploaded_file($path,$target_file);
	move_uploaded_file($path1,$target_file1);
	move_uploaded_file($path2,$target_file2);

$sql ="INSERT INTO condidature(";
foreach ($champs as $key => $value) {
	$sql.=$key.',';
}
    $sql = substr($sql, 0, -1);
    $sql.=",urlcv,urllm,urlatt) VALUES("; 
    foreach ($champs as $key => $value) {
	$sql.="'".$value."',";

}

	$sql = substr($sql, 0, -1);
  $sql.= ",'$target_file','$target_file1','$target_file2')";
	mysql_query($sql);
	header('location:listedesujetapprouve.php');

}
}
	public function nombreetudiantpostule($cin){
$sql = "SELECT count(cinetudiant) FROM 
condidature where idsujet='".$id."'";
$req = mysql_query($sql) ;
 $a_result=mysql_fetch_row($req);
 return  $a_result;
}
}