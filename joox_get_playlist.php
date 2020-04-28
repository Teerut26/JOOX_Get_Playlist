<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>

        </title>
        <?php include('css.php'); ?>
</head>
    <body>
    <div class="card">
    <div class="card-body">
    <h4><svg class="bi bi-link-45deg" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4.715 6.542L3.343 7.914a3 3 0 104.243 4.243l1.828-1.829A3 3 0 008.586 5.5L8 6.086a1.001 1.001 0 00-.154.199 2 2 0 01.861 3.337L6.88 11.45a2 2 0 11-2.83-2.83l.793-.792a4.018 4.018 0 01-.128-1.287z"/>
  <path d="M5.712 6.96l.167-.167a1.99 1.99 0 01.896-.518 1.99 1.99 0 01.518-.896l.167-.167A3.004 3.004 0 006 5.499c-.22.46-.316.963-.288 1.46z"/>
  <path d="M6.586 4.672A3 3 0 007.414 9.5l.775-.776a2 2 0 01-.896-3.346L9.12 3.55a2 2 0 012.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 00-4.243-4.243L6.586 4.672z"/>
  <path d="M10 9.5a2.99 2.99 0 00.288-1.46l-.167.167a1.99 1.99 0 01-.896.518 1.99 1.99 0 01-.518.896l-.167.167A3.004 3.004 0 0010 9.501z"/>
</svg> JOOX_GET_PLAYLIST</h4>
    <br>
<form method="get" action="">
          <input class="form-control" type="url" name="url" placeholder="Example : https://www.joox.com/th/playlist/0iheT9mjEYVFd38y0dKGWA==">
          <br>
          <input name="Submit" type="submit" value="OK" class="btn btn-primary">
          
</form>
</div>
</div>

<div class="card"><div class="card-body"><div class="table-responsive"><p id="p1"><?php  
include('simple_html_dom.php');

$url3 = $_GET['url'];

$html = file_get_html($url3);

//bootstrap

 
//เลือกตำแหน่งของชื่อเพลง
$list = $html->find('div[class="jsx-2309930405 body"]',0);
$list_array = $list->find('b[class="jsx-2493651356 SongName"]');

//เลือกตำแหน่งของนักร้อง
$artist = $html->find('div[class="jsx-2309930405 body"]',0);
$artist_array = $artist->find('div[class="jsx-2342508451 jsx-1241753679 SongDesc"]');

//เลือกตำแหน่งของชื่อเพลงแบบเต็ม
$fullname = $html->find('div[class="jsx-2309930405 body"]',0);
$fullname_array = $fullname->find('div[class="jsx-2342508451 jsx-1241753679 SongListItem noselect"]');

//เลือกตำแหน่งของ ชื่อ playlist
$date = $html->find('h1[class="jsx-156101867 title"]',0);
//เลือกตำแหน่งของ วันที่ Update Playlist
$update = $html->find('span[class="jsx-1487394621"]',0);
//แสดงชื่อ playlist
$surl22 = str_replace("https://www.joox.com/th/playlist/","","$url3");
echo "<div class=card><div class=card-body>URL : <a href=".$url3.">$url3</a></div></div>
            <div class=card><div class=card-body>$surl22</div></div>";
echo "<br>";
echo "<h8>$date</h8>";
//แสดงวันที่ที่ Update ของ playlist
echo "<h4>$update</h4>";
//แสดงชื่อเพลง
echo "<br>";

for ($i=0; $i < sizeof($list_array); $i++ ) { 
    echo $list_array[$i]->plaintext;
    echo "<br>";
}
//แสดงชื่อนักร้อง
echo "<br>";
echo "<h1>ชื่อนักร้อง</h1>";
for ($i=0; $i < sizeof($artist_array); $i++ ) { 
    echo $artist_array[$i]->plaintext;
    echo "<br>";
}
//แสดงชื่อเพลงแบบเต็ม
echo "<br>";
echo "<h1>ชื่อเพลงแบบเต็ม</h1>";
for ($i=0; $i < sizeof($fullname_array); $i++ ) { 
    echo $fullname_array[$i]->plaintext;
    echo "<br>";
}
?>
</p></div></div></div>
</body>
</html>

