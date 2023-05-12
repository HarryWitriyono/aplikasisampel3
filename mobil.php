<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Mobil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
 <div class="row">
  <div class="col-sm-3">
   <h2>Form Tabel Mobil</h2>
  </div> 
  <div class="col-sm-9">
   <form method="post" class="input-group">
    <input type="text" name="kCari" placeholder="Ketik nomor plat mobil yang dicari" class="form-control" >
	<input type="submit" name="bCari" value="Go" class="btn btn-success">
   </form>
  </div>
 </div> 
 <div class="row">
  <form action="" method="post" class="col-sm-5">
    <div class="mb-3 mt-3">
      <label for="nostnk">Nomor STNK:</label>
      <input type="text" class="form-control" id="nostnk" placeholder="Enter nomor stnk" name="nostnk">
    </div>
    <div class="mb-3">
      <label for="jenismobil">Jenis mobil:</label>
      <input type="text" class="form-control" id="jenismobil" placeholder="Enter jenis mobil" name="jenismobil">
    </div>
    <div class="mb-3">
      <label for="noplat">No. plat mobil:</label>
      <input type="text" class="form-control" id="noplat" placeholder="Enter no. plat mobil" name="noplat">
    </div>
	<div class="mb-3">
      <label for="hargajual">Harga jual mobil:</label>
      <input type="text" class="form-control" id="hargajual" placeholder="Enter harga jual mobil" name="hargajual">
    </div>
	<div class="mb-3">
      <label for="tanggaljual">Tanggal jual mobil:</label>
      <input type="date" class="form-control" id="tanggaljual" placeholder="Enter tanggal jual mobil" name="tanggaljual">
    </div>
	<div class="mb-3">
	 <label for="keterangan">Keterangan Tambahan :</label>
	 <textarea class="form-control" title="Ketik keterangan tambahannya bila ada !"name="keterangan"></textarea>
	</div>
    <button type="submit" class="btn btn-primary" name="tombolSimpan">Simpan Rekord Mobil</button>
  </form>
  <div class="col-sm-7">
  <?php if (isset($_POST['bCari'])) {
	  $kCari=$_POST['kCari'];
	  $kon=mysqli_connect("localhost","root","","aplikasisampel3");
	  $sqlcari="select * from mobil where noplat like '%".$kCari."%'";
	  $qcari=mysqli_query($kon,$sqlcari);
	  $r=mysqli_fetch_array($qcari);
	  ?>
  <h2>Identitas Mobil yang dicari </h2>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>No.STNK</th>
        <th>Jenis Mobil</th>
        <th>No.Plat</th>
		<th>Harga Jual</th>
		<th>Tanggal Jual</th>
		<th>Keterangan</th>
		<th>Aksi Rekord</th>
      </tr>
    </thead>
    <tbody>
	 <?php do { ?>
      <tr>
        <td><?php echo $r['nostnk'];?></td>
        <td><?php echo $r['jenismobil'];?></td>
        <td><?php echo $r['noplat'];?></td>
		<td><?php echo number_format($r['hargajual'],0,',','.');?></td>
        <td><?php echo $r['tanggaljual'];?></td>
        <td><?php echo $r['keterangan'];?></td>
		<td>Koreksi 
		    Hapus
		</td>
      </tr>
	 <?php } while ($r=mysqli_fetch_array($qcari)); ?>
    </tbody>
</table>
<?php 
  } //end if isset bCari
  ?>
  </div>
 </div> 
  <?php if (isset($_POST['tombolSimpan'])) {
  $kon = mysqli_connect("localhost","root","","aplikasisampel3");
  $nostnk=$_POST['nostnk'];
  $noplat=$_POST['noplat'];
  $jenismobil=$_POST['jenismobil'];
  $hargajual=$_POST['hargajual'];
  $tanggaljual=$_POST['tanggaljual'];
  $keterangan=$_POST['keterangan'];
  $sql="insert into mobil (nostnk,jenismobil,noplat,hargajual,tanggaljual,keterangan) values ('".$nostnk."','".$jenismobil."','".$noplat."','".$hargajual."','".$tanggaljual."','".$keterangan."')";
  $q=mysqli_query($kon,$sql);
  }
  ?>
</div>

</body>
</html>