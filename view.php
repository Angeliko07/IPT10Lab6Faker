<?php
require_once 'FileUtility.php';

$filename = 'persons.csv';
$data = FileUtility::openFile($filename);

// Check if the file is empty
if (empty($data)) {
    die('No data found.');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Person Data</h1>
    <table>
        <thead>
            <tr>
                <th>UUID</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Street Address</th>
                <th>Barangay</th>
                <th>Municipality</th>
                <th>Province</th>
                <th>Country</th>
                <th>Phone Number</th>
                <th>Mobile Number</th>
                <th>Company Name</th>
                <th>Company Website</th>
                <th>Job Title</th>
                <th>Favorite Color</th>
                <th>Birthdate</th>
                <th>Email Address</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?php echo htmlspecialchars($cell); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
