<?php
include "../connect.php";
require '../vendor/autoload.php'; // Import Dompdf

# Get value id_reserve
$id_reserve = $_GET['id_reserve'];
//echo $id_reserve;

use Dompdf\Dompdf;
use Dompdf\Options;

// Create a Dompdf object
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

# SQL
$sql = "SELECT * FROM reserve WHERE id_reserve = '$id_reserve'"; // Use a single equals sign
$result = $conn->query($sql);

# Fetch data and create an HTML table
if ($result->num_rows > 0) {
    $html = '<html><body><h1>Reservation Data</h1>';
    $html .= '<table border="1">';
    $html .= '<tr><th>ID</th><th>Name</th><th>Phone</th><th>Date</th><th>Time</th><th>Employee ID</th><th>Service ID</th></tr>';
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row["id_reserve"] . '</td>';
        $html .= '<td>' . $row["name"] . '</td>';
        $html .= '<td>' . $row["phone"] . '</td>';
        $html .= '<td>' . $row["date"] . '</td>';
        $html .= '<td>' . $row["time"] . '</td>';
        $html .= '<td>' . $row["employees_id"] . '</td>';
        $html .= '<td>' . $row["service_id"] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</table>';
    $html .= '</body></html>';

    // Load HTML into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF
    $dompdf->render();

    // Output the PDF to a file
    $output = $dompdf->output();
    file_put_contents('output.pdf', $output);

    echo 'PDF has been generated and saved!';
} else {
    echo '0 results';
}
?>
