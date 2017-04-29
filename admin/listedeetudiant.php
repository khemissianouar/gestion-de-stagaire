<?php
session_start();
require("core.php");
$user= new Usersmanager();
$sujet= new sujetmanager();
$spe= new specialitemanager();

$a_result=$user->nombredemandedactiveetudiant();
 if(isset($_SESSION)){

  $user->auth($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }
   $a_result1=$user->nombredemandedactiveenseignant();
$a_result=$user->nombredemandedactiveetudiant();
$a=$a_result[0]+$a_result1[0];
$pro=$sujet->nombredesujetpropose();
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
});</script>
<style>
.right {
    position: absolute;
    right: 0px;
    width: 300px;
    
    padding: 10px;
}
</style></head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg" >
<img id="f" src="../image/l.png"><div class="right" ><a href="?m=deco">deconnexion</a></div>
<br><br>

  <h2> <img src="../image/Administrateur.png" width="100" height="100" >Bienvenue  <?php echo ucfirst(strtolower(trim( $_SESSION['nom']))) ; ?> <?php  

echo ucfirst(strtolower(trim($_SESSION['prenom']))); ?></h2>

<div class="container">
 <header>
    <div id="fdw">
        <!--nav-->
          <nav>
            <ul><li><a href="listedesujetete.php">Stage d'ete</a>
</li>
            <li><a href="listedesujetpfa.php">PFA</a>
              <ul style="display: none;" class="sub_menu">
            <li><a href="listedesujetpfa.php">sujet pfa</a></li>
                  <li class="arrow_top"></li>
                  <li><a href="sujetpfapropose.php">sujet propose </a></li>
            </ul></li>
      

            <li>
                <a href="listedesujetpfe.php">PFE<font color="red"><?php if ($pro[0]>0){
      echo $pro[0]; }?></font><span class="arrow"></span></a>
                <ul style="display: none;" class="sub_menu">
                  <li class="arrow_top"></li>
                  <li><a href="listedesujetpfe.php">sujet PFE</a></li>
                  <li><a href="listedesujetpfepropose.php">sujet propose <font color="red"><?php if ($pro[0]>0){
      echo $pro[0]; }?></font> </a></li></a></li>
                 
                  <li><a href="listedeencadrant.php">encadrement</a></li>
                </ul>
              </li>   
                   <li ><a href="listedeetudiant.php">etudiant<span class="arrow"></span> </a>
                  <ul style="display: none;" class="sub_menu">
                    <li class="arrow_top"></li>
            
               <li><a class="subCurrent" href="listedeetudiant.php">liste des etudiants </a>
            <li ><a href="etudiantnontpasstage.php">etudiant n'ont pas stage</a></li></ul></li>
            <li><a href="listedeenseignant.php">enseignant </a></li>     
   <li><a href="mesproposition.php"> mes propositions</a></li>

  <li>
            <a href="demandedactiveetudiant.php">demande activation
                <font color="red"><?php if ($a>0){
      echo $a; }?></font><span class="arrow"></span></a>
                <ul style="display: none;" class="sub_menu">
                  <li class="arrow_top"></li>
                  <li><a href="demandedactiveetudiant.php">demande etudiant <font color="red"><?php if ($a_result[0]>0){
      echo $a_result[0]; }?></font> </a></li>
                  <li><a href="demandedactiveenseignant.php">demande enseignant <font color="red"><?php if ($a_result1[0]>0){
      echo $a_result1[0]; }?></font></a></li>
            
                </ul>

            </ul>
          </nav>
    </div><!-- end fdw -->
  </header><!-- end header -->
    
</div>
<?php 	

$users=$user->afficheetudiants();

  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }

 ?> 	
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
 <thead>
                

 <tr> 
 <th>Nom </th>
 <th> Prenom </th>
  <th> Specialite </th>
   <th> Niveau</th> 
  <th> Groupe </th>
 <th>Email</th>
 <th>Edition</th>
  <th>Suppression</th>
 </tr></thead>
 <?php if(!empty($users)){ ?>
 <tbody>
 <?php foreach ($users as $key=>$value): ?>

  <tr><td>  <a href="etudiant.php?cin=<?php echo $value['cin']?>" target="_blank"><?php echo $value['nom']; ?> </td></a>
		<td><?php echo $value['prenom']; ?> </td>
   <td> <?php     $unspe=$spe->afficheunspecilaite( $value['idspecialite']);   echo $unspe['specialite'];                                ?>

        <td><?php echo $value['niveau']; ?> </td>
    <td><?php echo $value['groupe']; ?> </td>
     	<td><?php echo $value['email']; ?> </td>
     	<td><a href="modefieetudiant.php?cin=<?php echo $value['cin'];?>"><img src="../image/modefie.png" width="40px" height="40px" ></a></td>
     	<td><a href="listedeetudiant.php?cin=<?php echo $value['cin'];?>&supp=delete"onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));"><img src="../image/supprime.png" width="30px" height="30px"></a></td></tr>


<?php endforeach;} ?>
</tbody>


    </table>
       <?php if(isset($_GET['supp'])&& $_GET['supp']=='delete'){$user->suppetudiant($_GET['cin']);} ?>

        <a href="inscriptionetudiant.php"><img src="../image/ajoute.png" width="40px" height="40px"> </a>
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