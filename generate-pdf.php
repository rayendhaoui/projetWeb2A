<?php
$servername="localhost";
$username="root";
$password="";
$bdd="ecotrust";
$con=mysqli_connect($servername,$username,$password,$bdd);

require_once('D:/XAMPP/phpMyAdmin/vendor/tecnickcom/tcpdf/tcpdf.php');

// fetch data from the table
$sql = "SELECT * FROM livreur";
$result = $con->query($sql);

// format data as HTML
$html = "<table><tr><th>ID</th><th>Nom</th><th>Prenom</th><th>CIN</th></tr>";
while($row = $result->fetch_assoc()) {
    $html .= "<tr><td>".$row['ID']."</td><td>".$row['Nom']."</td><td>".$row['Prenom']."</td><td>".$row['CIN']."</td></tr>";
}
$html .= "</table>";

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator('My PDF Creator');
$pdf->SetAuthor('John Doe');
$pdf->SetTitle('My PDF Title');
$pdf->SetSubject('My PDF Subject');

// add a page
$pdf->AddPage();

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// output the PDF file to the browser or save it to a file
$pdf->Output('example.pdf', 'I');

?>