<?php

$host = "10.0.0.28";
$user = "postgres";
$password = "Diris@123";
$dbname = "pe_dlc_desaia";
$con = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$con) {
    die('Connection failed.');
}

$result = array();

if (!isset($_POST['searchTerm'])) {
    $sql = "select * from lista_mercados   order by nombre_mercado";
    $result = pg_query($con, $sql);
} else {

    $search = $_POST['searchTerm'];

    $sql = "select * from lista_mercados  where   nombre_mercado ilike $1 order by nombre_mercado";
    $result = pg_query_params($con, $sql, array('%' . $search . '%'));
}

$data = array();

while ($row = pg_fetch_assoc($result)) {

    $id = $row['id'];
    $fullname = $row['nombre_mercado'];

    $data[] = array(
        "id" => $id,
        "text" => $fullname
    );

}

echo json_encode($data);
die;