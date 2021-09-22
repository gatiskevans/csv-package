<?php

    require_once 'vendor/autoload.php';

    use App\Statistics;

    $covidStatisticRecords = new Statistics('app/Data/data.csv');

?>

<html lang="en">
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <title>Covid Statistics</title>
</head>
<body>
    <table class="table">
        <tbody>
        <?php foreach($covidStatisticRecords->getHeader() as $header): ?>

            <?php if(strlen($header) > 20) $header = substr($header, 0, 17) . '...'; ?>
            <td><?= $header ?></td>

        <?php endforeach; ?>

        <?php foreach($covidStatisticRecords->getStatement() as $record): ?>
            <tr>
                <td><?= $record['Datums'] ?></td>
                <td><?= $record['Valsts'] ?></td>
                <td><?= $record['14DienuKumulativaIncidence'] ?></td>
                <td><?= $record['Izcelosana'] ?></td>
                <td><?= $record['Pasizolacija'] ?></td>
                <td><?= $record['PersIrVakcParslSert_PasizolacijaLatvija'] ?></td>
                <td><?= $record['PersIrVakcParslSert_TestsPirmsIebrauksanasLV'] ?></td>
                <td><?= $record['PersIrVakcParslSert_TestsPecIebrauksanasLV'] ?></td>
                <td><?= $record['CitasPersonas_PasizolacijaLatvija'] ?></td>
                <td><?= $record['CitasPersonas_TestsPirmsIebrauksanasLV'] ?></td>
                <td><?= $record['CitasPersonas_TestsPecIebrauksanasLV'] ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>
