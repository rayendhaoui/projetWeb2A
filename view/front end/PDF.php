<?php
require_once('../back%20end/src/tcpdf/tcpdf.php');
require_once '../../Model/ges_off_emp.php'; // Importation de la classe offre_emploi
require_once '../../config.php';
require_once '../../Controller/ges_off_empG.php';

if(isset($_GET['offre_id'])) {
    ob_start()
    $titre = $_GET['offre_id'];
    $db = config::getConnexion();  
    $search_query = "SELECT * FROM ges_off_emp WHERE titre_off = :titre_off";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':titre_off' => $titre));
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('rayen');
        $pdf->SetTitle('Job Offer PDF');
        $pdf->SetSubject('Job Offer Details');
        $pdf->SetKeywords('Job, Offer, PDF');
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', '', 12);
        // Afficher les détails de l'offre d'emploi dans le PDF
        $content = "
            <h2>Job Offer Details</h2>
            <p><strong>Title:</strong> {$row['titre_off']}</p>
            <p><strong>Company:</strong> {$row['nom_ent']}</p>
            <p><strong>Location:</strong> {$row['lieu_ent']}</p>
            <p><strong>Number of Employees:</strong> {$row['nbr_emp']}</p>
            <p><strong>Type of Offer:</strong> {$row['type_off']}</p>
            <p><strong>Mode of Work:</strong> {$row['mode_trav']}</p>
            <p><strong>Recruiter Name:</strong> {$row['nom_rec']}</p>
            <p><strong>Recruitment Date:</strong> {$row['date_rec']}</p>
            <p><strong>Description:</strong> {$row['descrip']}</p>
        "; 

        $pdf->writeHTML($content, true, false, true, false, '');

        // Output the PDF as a download
        $pdf->Output('job_offer.pdf', 'D');
          // Vider le tampon et envoyer le PDF
    ob_end_flush();
    }
}
?>
