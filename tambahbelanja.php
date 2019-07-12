	<?php
		include "include/confing.php";

 		$id_barang = $_POST['id_barang'];
		$jumlah = $_POST['jumlah'];
		$total = $_POST['total'];

		//mysql_query("INSERT INTO jual VALUES('$id_barang','$jumlah','$total')");
		mysqli_query($host, "INSERT INTO jual (id_jual, id_barang, jumlah, total) VALUES (NULL, '$id_barang','$jumlah','$total')");
		header("location:penjualan.php");
		
?>