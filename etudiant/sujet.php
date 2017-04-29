<?php
session_start();
require("core.php");
$user= new Usersmanager();
 if(isset($_SESSION)){

  $user->auth1($_SESSION['email'],$_SESSION['cin']);
 }
   if(isset($_GET['m']) && $_GET['m']=='deco'){
  $user->deco();
  }
?>

<html><head>
<title>islaib_pfe</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\sujet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
<style>
.right {
    position: absolute;
    right: 100px;
    width: 300px;
    
    padding: 10px;
}
</style>
</head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg" >
<img id="f" src="../image/l.png"><div class="right" ><a href="?m=deco">deconnexion</a></div>
<section>
<?php $sujet = new sujetmanager();
 
        $unsujet =$sujet->afficheunsujet($_GET['id']); 
        ?>
        
        <table align="center">


<center><h2><?php echo $unsujet['titre'];?></h2></center>

 <tr><td><label>cahier de charge  :</label></td>
<td><article><p><?php echo $unsujet['cahierdecharge'];?></article></p></article></td></tr>
      
        <tr><td><label>date de creation :</label></td><td>
<article><?php echo $unsujet['datedecreation'];?></td></article></tr> :
<tr><td><label>date de debut :</label></td><td>
<article><p><?php echo $unsujet['datedebut'];?></p></article></td></tr>

        <tr><td><label>date de fin :</label></td><td>
<article><?php echo $unsujet['datefin'];?></td></article></tr>
<tr><td><label>societe :</label></td><td>
<article><p><?php echo $unsujet['societe'];?></p></article></td></tr>
<tr><td><label>annee universaire :</label></td><td>
<article><p><?php echo $unsujet['anneeuniversaire'];?></p></article></td></tr><tr><td>
<a href="mesproposition.php"><img src="../image/retour.png" width="40px" height="40px"></a></td></tr>
</table>
</section>
</div>
</body>
</html>