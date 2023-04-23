<?php
require_once 'C:/wamp64/www/OnlineFood-PHP/FPDF/fpdf.php';
require_once '../connection/connect.php';
$sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id ";

$data = mysqli_query($db, $sql);
if (isset($_POST['btnPdfOrders'])) {


    $pdf = new FPDF('p', 'mm', 'a4');
    $pdf->SetFont('arial', 'b', '14');
    $pdf->AddPage();
    $pdf->cell('40', '10', 'User', '1', '0', 'C');
    $pdf->cell('40', '10', 'Title', '1', '0', 'C');
    $pdf->cell('40', '10', 'Quantity', '1', '0', 'C');
    $pdf->cell('20', '10', 'Price', '1', '0', 'C');
    $pdf->cell('40', '10', 'Address', '1', '0', 'C');
    $pdf->cell('20', '10', 'Status', '1', '0', 'C');
    $pdf->cell('20', '10', 'Reg-Date', '1', '0', 'C');




    while ($row = mysqli_fetch_assoc($data)) {

        $pdf->cell('40', '10', $row['username'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['title'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['quantity'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['price'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['address'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['status'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['date'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['o_id'], '1', '0', 'C');
    }

    $pdf->Output();
}
