<?php
require_once('src/tcpdf/tcpdf.php');
require_once '../../Model/ges_off_emp.php'; // Importation de la classe offre_emploi
require_once '../../config.php';
require_once '../../Controller/ges_off_empG.php';

if(isset($_POST['PDF'])) {
    // Commencer la mise en mémoire tampon
    ob_start();

    $titre_off = $_POST['titre_off'];
    $ges_off_empG = new ges_off_empG(); // Créer une instance de la classe ges_off_empG
    $ges_off_emp = $ges_off_empG->chercher_titre_offre($titre_off); // Récupérer les détails de l'offre d'emploi
    
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('rayen');
    $pdf->SetTitle('Job Offer PDF');
    $pdf->SetSubject('Job Offer Details');
    $pdf->SetKeywords('Job, Offer, PDF');

    $pdf->AddPage();

    $pdf->SetFont('dejavusans', '', 12);

    // Afficher les détails de l'offre d'emploi dans le PDF
    $html = "<h2>Job Offer Details</h2>";
    $html .= "<p><strong>Title:</strong> {$ges_off_emp['titre_off']}</p>";
    $html .= "<p><strong>Company:</strong> {$ges_off_emp['nom_ent']}</p>";
    $html .= "<p><strong>Location:</strong> {$ges_off_emp['lieu_ent']}</p>";
    $html .= "<p><strong>Number of Employees:</strong> {$ges_off_emp['nbr_emp']}</p>";
    $html .= "<p><strong>Type of Offer:</strong> {$ges_off_emp['type_off']}</p>";
    $html .= "<p><strong>Mode of Work:</strong> {$ges_off_emp['mode_trav']}</p>";
    $html .= "<p><strong>Recruiter Name:</strong> {$ges_off_emp['nom_rec']}</p>";
    $html .= "<p><strong>Recruitment Date:</strong> {$ges_off_emp['date_rec']}</p>";
    $html .= "<p><strong>Description:</strong> {$ges_off_emp['descrip']}</p>";

    $pdf->writeHTML($html, true, false, true, false, '');

    // Générer et télécharger le fichier PDF
    $pdf->Output('job_offer.pdf', 'D');

    // Vider le tampon et envoyer le PDF
    ob_end_flush();
}
?>
