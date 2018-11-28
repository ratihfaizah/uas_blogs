<?php 
$addonq = ''; 
if(get("q")!=""){ $addonq = " WHERE judul LIKE '%".get('q')."%'"; } 
$hasil = $koneksi->prepare("SELECT * FROM artikel ".$addonq. " ORDER BY id DESC"); 
$hasil->execute(); 
$data = $hasil->fetchAll(); 
 ?>
 <a class="btn pull-right" href="index.php?p=CRUD&m=add">Tambah Baru</a> 
 <h2>Data artikel</h2> 
 <div style="clear:both;width:200px;margin-right:12px;" class="pull-right"> 
 	<form action="index.php?p=CRUD&m=search"> 
 		<input autocomplete="off" type="hidden" name="p" value="artikel"> 
 		
 	</form>

 </div>

 <div style="clear:both">&nbsp;</div> 
 <table class="data"> 
 	<thead> 
 		<tr> 
 			<th>No</th> 
 			<th>judul</th> 
 			<th>konten</th> 
 			<th>penulis</th> 
 			<th colspan="2">Action</th> 
 		</tr> 
 	</thead> 
 	<tbody> 
 		<?php 
 		$i = 1;  
 			foreach ($data as $key) { 
 			?> 
 			<tr> 
 				<td><?php echo $i;?></td> 
 				<td><?php echo $key['judul'];?></td> 
 				<td><?php echo $key['konten'];?></td> 
 				<td><?php echo $key['penulis'];?></td>
 				<td><a href="index.php?p=CRUD&m=edit&id= <?php echo $key['id'];?>">Ubah</a></td> 
 				<td><a onclick="return confirm('Hapus Data <?php echo $key['judul'];?>')" href="proses/artikel/hapus.php?id= <?php echo $key['id'];?>">Hapus</a>
 				</td>
			</tr>
			<?php 
			$i++; 
		} 
		?> 
	</tbody> 
</table>

