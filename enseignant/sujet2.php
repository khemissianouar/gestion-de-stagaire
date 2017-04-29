<?php
session_start();
require("core.php");
$user= new Usersmanager();
$postule= new postulemanager();
 if(isset($_SESSION)){

  $user->auth2($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }
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
    right: 100px;
    width: 300px;
    
    padding: 10px;
}
</style></head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg" >
<img id="f" src="../image/l.png"> 
<br><br>
<div class="right" ><a href="?m=deco">deconnexion</a></div>

<?php 
$att='../up/att/';
$lm='../up/lm/';
$sujet = new sujetmanager();
$unsujet =$sujet->afficheunsujet($_GET['id']);


  ?>
     
        <table align="center">

<center><h2><?php echo $unsujet['titre'];?></h2></center>



        <tr><td><label>date de creation</label></td><td>
<?php echo "   ".$unsujet['datedecreation'];?></td></tr>
<tr><td><label>date de debut</label></td><td>
<p><?php echo "   ".$unsujet['datedebut'];?></p></td></tr>

        <tr><td><label>date de fin</label></td><td>
<?php echo "   ".$unsujet['datefin'];?></td></tr>
<tr><td><label>societe</label></td><td>
<p><?php echo "   ".$unsujet['societe'];?></p></td></tr>
<tr><td><label>annee universaire</label></td><td>
<p><?php echo "   ".$unsujet['anneeuniversaire'];?></p></td></tr>
</table>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
          
          

<tr><th>nom</th><th>prenom</th><th>CV</th><th>lettre de motivation </th><th>attestation</th><th>affectation</th></tr>
</thead>
<?php
  $postules =$postule->affichepostule($unsujet['id']); ?>
  <?php if(!empty($postules)){?>
  <tbody>
<?php foreach ($postules as $key=>$value): 
$etudiant=$user->afficheunetudiantpostule($value['cinetudiant']) ;
?>
 
  <tr><td>
	 <tr><td>  <a href="etudiant2.php?cin=<?php echo $value['cinetudiant'];?>&idsujet=<?php echo $value['idsujet'];?>" target="_blank">
<?php echo $etudiant['nom'];?> </td></a>

 </a>
		<td><?php


     echo $etudiant['prenom']; ?> </td>

<td><a href="<?php echo $value['urlcv'];?>"><img src="../image/cv.png" width="40px" height="40px"></a> </td>
<?php if($value['urllm']!=$lm){?>
<td><a href="<?php echo $value['urllm'];?>"><img src="../image/lm.png" width="40px" height="40px"></a> </td>
<?php }else {echo "<td> </td>";} if($value['urlatt']!=$att){?>
<td><a href="<?php echo $value['urlatt'];?>"><img src="../image/lm.png" width="40px" height="40px"></a> </td><?php }else {echo"<td></td>";}?>
<td>
 <a href="sujet2.php?id=<?php echo $value['idsujet'];?>&cinetudiant=<?php echo $value['cinetudiant']?>&affectue=oui"onclick="return(confirm('Etes-vous sûr d affecte ?'));"><img src="../image/affecter.png" width="35" height="35"></a></td></tr>
<?php endforeach ;}?>
</tbody>

</table>
  <?php if(isset($_GET['affectue'])&& $_GET['affectue']=='oui'){
    $unetudiant =$user->afficheunetudiant($_GET['cinetudiant']); 
    $unsujet1=$sujet->afficheunsujetaffecter($_GET['id']);
    $sujet->affecter1($unetudiant,$unsujet1);
}?>   
 

<a href="listedesujetencadrant.php"><img src="../image/retour.png" width="40px" height="40px"></a>
</div></div></div></div>

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