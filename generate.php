<?php
require_once 'FileUtility.php';
require_once 'Random.php';

$count = 300;
$filename = 'persons.csv';

// Generate data
$data = Random::generatePeople($count);

// Write to CSV
FileUtility::writeToFile($filename, $data);

echo "Data has been generated and saved to $filename.";
?>
