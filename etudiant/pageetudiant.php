<?php
session_start();
require("core.php");
?>
<html lang=''>
<head>
<title>islaib_pfe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.bootstrap.min.css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="../css/styles.css">

    
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="styles.css" media="all" />

    <!-- jQuery lib from google server ===================== -->
  <script src="../js/jquery-1.7.2.min.js"></script>
<!--  javaScript -->
<script>  
<!--  // building select nav for mobile width only -->
$(function(){


  // on clicking on link
  $('nav select').on('change',function(){
    window.location = $(this).find('option:selected').val();
  });
});

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
</script><style>
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
<img id="f" src="../image/l.png"><div class="right" ><a href="?m=deco">deconnexion</a></div>
<br>


<?php 	$sujet= new sujetmanager();
$user= new usersmanager();

$sujets =$sujet->affichesujet();

if(isset($_SESSION)){
  $user->auth1($_SESSION['email'],$_SESSION['cin']);
}
  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }

 ?>
    <h2> <img src="../image/etudiant.png" width="100" height="100" > Bienvenue  <?php echo ucfirst(strtolower(trim( $_SESSION['nom']))) ; ?> <?php  

echo ucfirst(strtolower(trim($_SESSION['prenom']))); ?></h2> 
<div class="container">
   
 <header>
    <div id="fdw">
        <!--nav-->
          <nav>
            <ul>
              <li class="current"><a href="pageetudiant.php">liste des sujets<span class="arrow"></span></a>
            

   <li><a href="listedesujetapprouve.php">liste des sujets approuves</a></li>
   <li><a href="mesproposition.php"> mes propositions</a></li>
    <li><a  href="condidature.php">condidature spontane</a></li>
</ul>
            </ul>
          </nav>
    </div><!-- end fdw -->
  </header><!-- end header -->
    
</div>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
 <thead>
              

 <tr> 
 <th>Titre</th>
 <th> Objet</th>
 <th> Mot clé</th>
 <th> Type </th> 
  <th>Anneé universaire</th>
 <th>Etat</th>
 </tr></thead>
 <?php if(!empty($sujets)){ ?>
 <tbody>
 <?php foreach ($sujets as $key=>$value): ?>

  <tr><td>  <a href="sujet1.php?id=<?php echo $value['id']?>" target="_blank"><?php echo $value['titre']; ?> </td></a>
		<td><?php echo $value['objet']; ?> </td>
		<td><?php echo $value['motcle']; ?> </td>
		<td><?php echo $value['type']; ?> </td>
     <td><?php echo $value['anneeuniversaire'] ; ?> </td>
        <td><?php if($value['etat']=='approuver'){echo 'approuvé';}elseif ($value['etat']=='proposer'){echo 'proposé';} elseif ($value['etat']=='affecter'){echo 'affecté';} elseif ($value['etat']=='refuser'){echo 'refusé';} elseif ($value['etat']=='valide'){echo 'validé'; }elseif ($value['etat']=='non valide'){echo 'non validé';} elseif ($value['etat']=='en attende'){echo 'en attente';}
 ?> </td>



<?php endforeach ;} ?>
</tbody>
</table>
<table>
   <tr><td>
    
      
        

        <?php if($_SESSION['niveau']==1){ ?>

      <a href="ajoutesujetete.php"><img src="../image/ajoutesujet.png" width="40px" height="40px"> ajoute sujet</a>
       <?php }
        elseif ($_SESSION['niveau']==2) { ?>
       <a href="ajoutesujetpfa.php"><img src="../image/ajoutesujet.png" width="40px" height="40px"> ajoute sujet</a>
        <?php }
        else{?>
          <a href="ajoutesujetpfe.php"><img src="../image/ajoutesujet.png" width="40px" height="40px"> ajoute sujet </a>
       <?php echo "  ";} ?>
     </td></tr></table><br>
        <form method='POST' action="../classes/pdf.php" >
          <input type="hidden" name='nom' value="<?php echo $_SESSION['nom'];?>"/>
          <input type="hidden" name='prenom' value="<?php echo $_SESSION['prenom'];?>"/>
          <input type="hidden" name='cin' value="<?php echo $_SESSION['cin'];?>"/>
          <input type="hidden" name='niveau' value="<?php echo $_SESSION['niveau'];?>"/>
            <input type="hidden" name='email' value="<?php echo $_SESSION['email'];?>"/>
            <input type="hidden" name='specialite' value="<?php echo $_SESSION['specialite'];?>"/>
            <input type="hidden" name='adresse' value="<?php echo $_SESSION['adresse'];?>"/>
            <input type="hidden" name='tel' value="<?php echo $_SESSION['tel'];?>"/>
           <input id="btn" class="button2" type=submit name=pdf value="demande de stage"/>
          </form>
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
</script>	
</body>
</html>