<?php

    require_once 'vendor/autoload.php';

    use App\Statistics;
    use App\Search;

    $covidStatisticRecords = new Statistics('app/Data/data.csv');
    $search = new Search();
    $search->checkIfIsset('search');

?>

<html lang="en">
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        td {
            text-align: center;
        }
    </style>
    <title>Covid Statistics</title>
</head>
<body>

    <form method="get">
        <label for="search">Search</label>
        <input type="text" name="search" id="search">
        <input type="submit" name="submit">
    </form>

    <table class="table">
        <tbody>
        <?php foreach($covidStatisticRecords->getHeader() as $header): ?>

            <?php if(strlen($header) > 20) $header = substr($header, 0, 17) . '...'; ?>
            <td><?= $header ?></td>

        <?php endforeach; ?>

        <?php foreach($covidStatisticRecords->getStatement() as $record): ?>
            <?php if($search->search($record['Valsts'], $_GET['search']) || $_GET['search'] === ''): ?>

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

            <?php endif; ?>
        <?php endforeach; ?>

        </tbody>
    </table>

</body>
</html>
