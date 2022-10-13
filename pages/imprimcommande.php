<?php 
 require_once('connexiondb.php');

if(isset($_GET['idboncommande']))$idboncommande = $_GET['idboncommande'];

$requete=$pdo->query("SELECT * FROM boncommande WHERE idboncommande=$idboncommande");
$boncommande=$requete->fetch();


    $idboncommande=$boncommande['idboncommande'];
    $numerobon=$boncommande['numerobon'];
    $nomboncom=$boncommande['nomboncom'];
    $quantitecommande=$boncommande['quantitecommande'];
    $dateboncom=$boncommande['dateboncom'];

   

require_once('fpdf/fpdf.php');
    

$pdf = new FPDF('P', 'mm', 'A5');
$pdf->AddPage();
$pdf->Image('fpdf/Cap.PNG', 10, 5, 130, 20);
$pdf->Ln(20);
$pdf->SetFont('Arial','B',16);

$pdf->Cell(0, 20, 'Bon de Commande de la Pharmacie-Khadija', 'LTRB', 1, 'C');
$pdf->Cell(0, 10, '', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 12);
$h = 7;
$retrait= "  ";

$pdf->Write($h, "Je soussignais, Directrice de la Pharmacie-Khadija certifie que ce bon de commande : \n");

$pdf->Write($h, $retrait . "De Medicament Pour la gestion de la Pharmacie");

$pdf->SetFont('', 'BIU');
$pdf->Write($h, '' . "\n");

$pdf->SetFont('', '');
$pdf->Write($h, " Numero du bon de commande : " . $numerobon . "\n");
$pdf->Write($h, " Nom du bon de commande : " . $nomboncom . "\n");
$pdf->Write($h, " La quantite du commande : " . $quantitecommande . '');  
$pdf->Write($h, " Boites de Medicament " . "\n");
$pdf->Write($h, " La date de commande : " . $dateboncom . "\n");
$pdf->Cell(0, 10, '', 0, 1, 'C');
$pdf->Ln(10);

$pdf->Cell(50);
$pdf->Cell(80, 8, "La Directrice de la PHARMACIE", 1, 1, 'C');

$pdf->Cell(50);
$pdf->Cell(80, 5, "MADAME DIATOU KAMARA", 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 5, '', 'LRB', 1, 'C');

  
$pdf->Cell(50);
$pdf->Cell(80, 6, "Cachet et Signature de la Directrice", 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 6, '', 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 6, '', 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 6, '', 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 6, '', 'LRB', 1, 'C');


$pdf->Output('', '', true);

?>

 