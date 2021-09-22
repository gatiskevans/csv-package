<?php

    require_once 'vendor/autoload.php';
    use App\Data;

    $data = new Data();
    $data->dataLoader();
    $data->explodeHeader();
    $data->explodeRecords();

?>
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
    <table>
        <tr>
<?php

    foreach($data->explodeHeader() as $field){
        echo "<td>$field</td>";
    }

    echo "</tr>";

    foreach($data->getRecords() as $records) {
        echo "<tr>";
        foreach($records as $record) {
            echo "<td>$record</td>";
        }
        echo "</tr>";
    }

?>
    </table>