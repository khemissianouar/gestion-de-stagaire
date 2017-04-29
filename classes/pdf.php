<?php
require('../fpdf/fpdf.php');
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$cin=$_POST['cin'];
$specialite=$_POST['specialite'];
$email=$_POST['email'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];
$date=date("Y");
$date1=$date-1;

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('../image/logo.png',10,6,200);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Ln(30);
    $this->Cell(70,1,'');
    $this->Cell(200,1,'DEMANDE DE STAGE');
    // Saut de ligne
 
}

// Pied de page
function Footer()
{ $this->Image('../image/logo1.png',10,260,200);
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);

    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',12);
$pdf->ln(13);
//Largeur de la cellule,Hauteur de la cellule
    $pdf->Cell(15,1,'');
   $pdf->Cell(120,1,'Nom et Prenom : '.$nom." ".$prenom);
   $pdf->Cell(200,1," Code cin : ".$cin);
       $pdf->Ln(10);
       $pdf->Cell(15,1,'');
       $pdf->Cell(30,1,'annee : '.$date);
    $pdf->Cell(130,1,"a licence appliquee : ".$specialite);
    $pdf->Ln(10);
    $pdf->Cell(15,1,'');
    $pdf->Cell(40,1,'Annee universaire : '.$date1.'/'.$date);
        $pdf->Ln(10);
        $pdf->Cell(15,1,'');
    $pdf->Cell(40,1,'Adresse : '.$adresse);
    $pdf->Ln(5);
    $pdf->Cell(15,1,'');
     $pdf->Cell(40,10,'Email : '.$email);
      $pdf->Ln(10);$pdf->Cell(15,1,'');
      $pdf->Cell(40,10,'Tel : '.$tel);
       $pdf->Ln(20);$pdf->Cell(15,1,'');
$pdf->Cell(40,10,'Enterprise incube :  ................ ');
$pdf->Ln(10);$pdf->Cell(15,1,'');
$pdf->Cell(40,10,'Domaine d activite :  .................. ');
$pdf->Ln(10);$pdf->Cell(15,1,'');
$pdf->Cell(40,10,'Siege social Adresse :  ................ ');
$pdf->Ln(10);$pdf->Cell(15,1,'');
$pdf->Cell(60,10,'Tel :  ................... ');
$pdf->Cell(40,10,'Fax :  ...................');
$pdf->Ln(20);$pdf->Cell(15,1,'');
$pdf->Cell(60,10,'Periode de stage :');
$pdf->ln(8);$pdf->Cell(15,1,'');
$pdf->Cell(60,10,'a  .................         ..................');
$pdf->ln(20);$pdf->Cell(15,1,'');
$pdf->Cell(60,10,'Le sujet de stage :');
$pdf->ln(10);$pdf->Cell(15,1,'');
$pdf->Cell(200,10,'..............................................................');
$pdf->ln(10);$pdf->Cell(15,1,'');
$pdf->Cell(400,10,' L encadreur pedagogique :.................................................. Signiature : ..................');
$pdf->ln(10);$pdf->Cell(15,1,'');
$pdf->Cell(400,10,' L encadreur de societe :.................................................. Signiature : ..................');
$pdf->ln(10);$pdf->Cell(15,1,'');
$pdf->Cell(400,10,' Visa de Chef du Departement :.................................................. Signiature : ..................');



$pdf->Output();
?>