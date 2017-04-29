<?php
require("core.php");
session_start();
$user= new Usersmanager();
 if(isset($_SESSION)){

  $user->auth1($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }

  $condidature= new condidaturemanager();
    $postule= new postulemanager();
  if(isset($_POST['postule'])){
if(!empty($_FILES['cv'])){
	   $condidature->addcondidature($_POST);
    $erreur1='bien ajoute';}

else{

  $erreur='il faut mettre votre cv';}

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

    <h2> <img src="../image/etudiant.png" width="100" height="100" >Bienvenue  <?php echo ucfirst(strtolower(trim( $_SESSION['nom']))) ; ?> <?php  

echo ucfirst(strtolower(trim($_SESSION['prenom']))); ?></h2>
<div class="container">
   
 <header>
    <div id="fdw">
        <!--nav-->
          <nav>
            <ul>
              <li><a href="pageetudiant.php">liste des sujets<span class="arrow"></span></a>
         

   <li><a href="listedesujetapprouve.php">liste des sujets approuves</a></li>
   <li><a href="mesproposition.php"> mes propositions</a></li>
         <li><a class="current" href="condidature.php">condidature spontane</a></li>
</ul>
            </ul>
          </nav>
    </div><!-- end fdw -->
  </header><!-- end header -->
    
</div>
<table align="center">
<form method="POST" action="" enctype="multipart/form-data">
<tr><td>CV *
<td><input type="file" name="cv" class="input_connexion"></input></td><td><?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}
?>
</td></tr><tr>
<td> lettre de motivation <td><input type="file" name="lettredemotivation" class="input_connexion"></input>
</tr><tr><td>Attestation
<td><input type="file" name="attestation" class="input_connexion"></input>
</tr><td>


<input type='submit' name='postule' value="postule" id="btn">
</tr>
<tr><td><?php if(isset($erreur1)){
  echo '<font color="red">' .$erreur1."</font>" ;

}
?>
</td></tr>
</form>
</table>

</div>
</body>
</html>