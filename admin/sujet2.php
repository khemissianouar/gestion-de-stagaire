<?php require("core.php");?>
<html>
<head><title> Sujets</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
<link href="..\css\sujet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
</head>
<body>
<div id="container">
<img id="i" src="../image/f.jpg" >
<img id="f" src="../image/l.png">

<section>
<?php $sujet = new sujetmanager();
 
        $unsujet =$sujet->afficheunsujetpfa($_GET['id']); 
        ?>
        <table align="center">

<center><h2><?php echo $unsujet['titre'];?></h2></center>

 <tr><td><label>cahier de charge :</label></td>
<td><article><p><?php echo $unsujet['cahierdecharge'];?></p></article></td></tr>
      
        <tr><td><label>date de creation :</label></td><td>
<article><?php echo $unsujet['datedecreation'];?></article></td></tr>
<tr><td><label>date de debut :</label></td><td>
<article><p><?php echo $unsujet['datedebut'];?></p></article></td></tr>

        <tr><td><label>date de fin :</label></td><td>
<article><?php echo $unsujet['datefin'];?></article></td></tr>
<tr><td><label>societe :</label></td><td>
<article><p><?php echo $unsujet['societe'];?></p></article></td></tr>
<tr><td><label>annee universaire :</label></td><td>
<article><p><?php echo $unsujet['anneeuniversaire'];?></p></article></td></tr>
</table>

</section>
<a href="listedesujetpfe.php"><img src="../image/retour.png" width="40px" height="40px"></a>
</div>
</body>
</html>