<?php 
include "include/confing.php";

// Get search term
$searchTerm = isset($_GET['term'])?$_GET['term']:null;

// Get matched data from barang table
$query = mysqli_query($host,"SELECT * FROM barang WHERE nama_barang LIKE '%".$searchTerm."%' ORDER BY nama_barang ASC");

// Generate barang data array
$barangData = array();

if(mysqli_num_rows($query)>0){

    while($row = mysqli_fetch_array($query)){
        $data['id_barang'] = $row['id_barang'];
        $data['value'] = $row['nama_barang'];
        $data['nama_barang'] = $row['nama_barang'];
        $data['harga'] = $row['harga'];
        $data['stok'] = $row['stok'];
        array_push($barangData, $data);
    }
}

// Return results as json encoded array
echo json_encode($barangData);

?>