<h1> Data Blog</h1>


<?php
  $judul = post('judul');
  $penulis = post('penulis');
  $konten = post('konten');
?>

<?php
  $addonq = ''; 
if(get("q")!=""){ 
  $addonq = " WHERE judul LIKE '%".get('q')."%'"; } 
  $hasil = $koneksi->prepare("SELECT * FROM artikel ".$addonq. " ORDER BY id DESC"); 
  $hasil->execute(); 
  $data = $hasil->fetchAll(); 

$i = 1; 
    foreach ($data as $key) { 
    ?> 
 
      <h2><?php echo $key['judul'];?></h2><br> 
      <p><?php echo $key['konten'];?></p>
      <h4><?php echo $key['penulis'];?></h4><br>
      <hr>

    <?php
      $i++;
    }
  ?>