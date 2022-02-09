<?php

$start = strtotime('2020-02-29');
$startDate = strtotime($_GET['startDate']);
$endDate = strtotime($_GET['endDate']);

$startDiff = $startDate - $start;
$dateToStart = round($startDiff / 86400);

$difference = $endDate - $startDate;
$days = round($difference / 86400);

$offset = $dateToStart +1 ;
$limit = $days;

$input = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?offset=$offset&resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&limit=$limit"));
$data = $input->result->records;

?>

<style>
    table, th, td {
        border: 1px solid black;
        padding: 5px;
    }
</style>

<form method="get" action="/">
    <label>
        <input type="date" name="startDate">
    </label>
    <label>
        <input type="date" name="endDate">
    </label>
    <button type="submit">Submit</button>
</form>

<table>
    <tr>
        <th>Datums</th>
        <th>TestuSkaits</th>
        $item->Datums
        <th>ApstiprinataCOVID19InfekcijaSkaits</th>
    </tr>
    <?php foreach ($data as $item) { ?>
        <tr>
            <td><?php echo $item->Datums; ?></td>
            <td><?php echo $item->TestuSkaits; ?></td>
            <td><?php echo $item->ApstiprinataCOVID19InfekcijaSkaits; ?></td>
        </tr>
    <?php } ?>
</table>
