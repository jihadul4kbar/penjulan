<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

	

    <title>Penjulan</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
	  <a class="navbar-brand" href="#">Penjualan</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="penjualan.php">Penjualan</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	  </div>
	</nav>

<div class="container">
	<div class="isiweb">
		<h2>Penjualan</h2>
		<form action="tambahbelanja.php" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<div class="auto-widget">
					    <input type="text" name="" id="namabarang" placeholder="Nama Barang" class="form-control" required="">
					</div>
				</div>
				<div class="col-sm-2">
					<input type="text" name="jumlah" id="jumlah" onkeyup="sum();" placeholder="Jumlah" class="form-control">
				</div>
				<div class="col-sm-2">
					<input type="submit" value="Add" class="btn btn-primary">
				</div>
				<div class="col-sm-12">
				<H4 style="text-align:center;padding:20px;">DETAIL BARANG</H4>
				</div>
				<div class="col-sm-3">
				id barang<input type="text" name="id_barang" id="id_barang"  class="form-control">
				</div>
				<div class="col-sm-3">
					    Harga <input type="text" name="harga" id="harga" onkeyup="sum();" class="form-control">
				</div>
				<div class="col-sm-3">
					    Stok <input type="text" name="stok" id="stok"  class="form-control">
				</div>
				<div class="col-sm-3">
					    Total <input type="text" name="total" id="total" class="form-control">
				</div>

			</div>
		</form>
		<h4 style="text-align:center;padding-top:30px;">DAFTAR BELANJA</h4>
		<?php 
		include "include/confing.php";

		$query = mysqli_query($host,"SELECT a.*, b.* FROM  barang a, jual b WHERE a.id_barang = b.id_barang ");
		?>
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Aksi</th>
			</tr>
			<?php if(mysqli_num_rows($query)>0){ ?>
			<?php $no = 1;
				while ($data = mysqli_fetch_array($query)) {
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data["nama_barang"];?></td>
				<td><?php echo $data["jumlah"];?></td>
				<td><?php echo $data["total"];?></td>
				<td>hapus</td>
			</tr>
			<?php } ?>
			<?php } ?>
			<tr>
			<td colspan="3"><b>Total Belanja</b></td>
			<?php 
			 $totalbelanja = mysqli_query($host,"SELECT SUM(total) as belanja FROM jual");
			 while ($row = $totalbelanja->fetch_assoc()) {
			
			?>
			<td colspan="2"><?php echo $row['belanja'];?></td>
			<?php }?>
			</tr>
		</table>
	</div>
</div>
<!-- Optional JavaScript -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<script>
		$(function() {
		    $("#namabarang").autocomplete({
		        source: "getbarang.php",
		        minLength:2,
		        select: function( event, ui ) {
		            event.preventDefault();
		            $("#id_barang").val(ui.item.id_barang);
		            $("#nama_barang").val(ui.item.nama_barang);
		            $("#harga").val(ui.item.harga);
		            $("#stok").val(ui.item.stok);
		        }
		    });
		});
		function sum() {
		      var txtFirstNumberValue = document.getElementById('harga').value;
		      var txtSecondNumberValue = document.getElementById('jumlah').value;
		      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
		      if (!isNaN(result)) {
		         document.getElementById('total').value = result;
		      }
		}
	</script>
    
  </body>
</html>