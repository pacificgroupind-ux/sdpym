<?php
require_once __DIR__ . '/../includes/functions.php';
require_admin(['super_admin','staff']);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="admissions_export.csv"');
$out = fopen('php://output', 'w');
fputcsv($out, ['ID','Name','Phone','Email','Course','Message','Applied At']);
$stmt = db()->query("SELECT id,name,phone,email,course,message,created_at FROM admissions ORDER BY created_at DESC");
while($row=$stmt->fetch()) fputcsv($out, $row);
fclose($out);
exit;
