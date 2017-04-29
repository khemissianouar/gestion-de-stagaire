<?php
session_start();
require("core.php");
$user= new Usersmanager();
 if(isset($_SESSION)){

  $user->auth($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }
?>
<html><head>
<title>islaib_pfe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style1.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">

</head>
<body>
<div id="container">
<img id="i" src="image/f.jpg" >
<img id="f" src="image/l.png">
<br><br>


<?php 	$sujet= new sujetmanager();

$sujets =$sujet->affichesujet();


 ?> 	
 <table>

 <tr> 
 <th>titre</th>
 <th> objet</th>
 <th> mot cle</th>
 <th> date de creation </th> 
  <th>annee universaire</th>
 <th>etat</th>
 </tr>
 <?php foreach ($sujets as $key=>$value): ?>

  <tr><td>  <a href="sujet1.php?id=<?php echo $value['id']?>" target="_blank"><?php echo $value['titre']; ?> </td></a>
		<td><?php echo $value['objet']; ?> </td>
		<td><?php echo $value['motcle']; ?> </td>
		<td><?php echo $value['datedeceration']; ?> </td>
     <td><?php echo $value['anneeuniversaire'] ; ?> </td>
		<td><?php echo $value['etat'] ; ?> </td>



<?php endforeach ?>

    <?php if(isset($_GET['supp'])&& $_GET['supp']=='delete'){$user->supp($_GET['id']);} ?>

    </table>
    <a href="?m=deco">deconnexion</a>
    
</div>
	
</body>
</html>