<?php
require("core.php");
session_start();
$user= new Usersmanager();
   $sujet= new sujetmanager();
 if(isset($_SESSION)){

  $user->auth2($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }
  $enc=$sujet->nombredesujetencadre($_SESSION['id']);
?>
<html lang=''>
<head>
 <head>
<title>islaib_pfe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.bootstrap.min.css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" href="../css/demo.css">  
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="styles.css" media="all" />

    <!-- jQuery lib from google server ===================== -->
  <script src="js/jquery-1.7.2.min.js"></script>
<!--  javaScript -->
<script> 

// show and hide sub menu
$(function(){
  $('nav ul li').hover(
    function () {
      //show its submenu
      $('ul', this).slideDown(150);
    }, 
    function () {
      //hide its submenu
      $('ul', this).slideUp(150);     
    }
  );
});
//end
</script>
<style>
.right {
    position: absolute;
    right: 0px;
    width: 300px;
    
    padding: 10px;
}
</style>

</head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg" >
<img id="f" src="../image/l.png">
<div class="right" ><a href="?m=deco">deconnexion</a></div>
<br><br>
<h2 ><img src="../image/enseignant.png" width="100" height="100" >Bienvenue  <?php echo ucfirst(strtolower(trim( $_SESSION['nom']))) ; ?> <?php  

echo ucfirst(strtolower(trim($_SESSION['prenom']))); ?></h2>
  

<body>
<div class="container">
   
  <header>
    <div id="fdw">
        <!--nav-->
          <nav>
            <ul>
              <li ><a href="pageenseignant.php">liste de sujet</a>
         
              </li>
            <li class="current"><a href="listedesujetencadrant.php" >demande d'encadrement<font color="red"><?php if ($enc[0]>0){
      echo $enc[0]; }?></font></a></li>

   <li ><a href="mesproposition.php">mes proposistions</a></li>
    <li><a href="listedecondidature.php">liste de condidature</a></li>
          </ul>
          </nav>
    </div><!-- end fdw -->
    </div>
  </header>
<?php 	$sujet= new sujetmanager();
$postule= new postulemanager();
$cin=$_SESSION['cin'];
$sujets =$sujet->affichesujetencadrant($cin);
 ?> 	
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
 <thead>
 <tr> 
 <th>Titre</th>
 <th> Objet</th>
 <th> Mot clé</th>
 <th> Date de création </th> 
  <th>Anneé universaire</th>
 <th>Etat</th>
 </tr> </thead>
<?php if(!empty($sujets)){  ?>
<tbody>
 <?php foreach ($sujets as $key=>$value):
?>
  <tr><td>  <a href="sujet2.php?id=<?php echo $value['id']?>" target="_blank"><?php echo $value['titre']."  " ;
 $sql = "SELECT count(cinetudiant) FROM 
condidature where idsujet='".$value['id']."'";
$req = mysql_query($sql) ;$poe=mysql_fetch_row($req); if ($poe[0]>0){ ?><font color="red"><?php echo $poe[0];} ?></font>
 
 </td></a>
		<td><?php echo $value['objet']; ?> </td>
		<td><?php echo $value['motcle']; ?> </td>
		<td><?php echo $value['datedecreation']; ?> </td>
     <td><?php echo $value['anneeuniversaire'] ; ?> </td>
        <td><?php if($value['etat']=='approuver'){echo 'approuvé';}elseif ($value['etat']=='proposer'){echo 'proposé';} elseif ($value['etat']=='affecter'){echo 'affecté';} elseif ($value['etat']=='refuser'){echo 'refusé';} elseif ($value['etat']=='valide'){echo 'validé'; }elseif ($value['etat']=='non valide'){echo 'non validé';} elseif ($value['etat']=='en attende'){echo 'en attente';}
 ?> </td>
      </tr>
          <?php  endforeach ;}?>

</tbody>




    </table>
    
</div>
</div>	
</div>
</div>

<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.colVis.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );
</script></body>
</html>