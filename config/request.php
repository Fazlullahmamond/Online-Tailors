<?php

//check if lang parameter is set or not

$url = $_SERVER['REQUEST_URI'];
if (strpos($url, "?") != false){
    $url .= "&";
}else{
    $url .= "?";
}
if (strpos($url,"lang=") != false &&  isset($_GET['lang'])){
    $urls = explode('lang='.$_SESSION['lang'], $url);
    $url = $urls[0];
}
?>



<!-- create three links for selecting languages -->
<div class="language">
    <a href=<?php echo "$url"."lang="."en"; ?>><?php echo $lang['English']; ?></a> | 
    <a href=<?php echo "$url"."lang="."ps"; ?>><?php echo $lang['pashto']; ?></a> | 
    <a href=<?php echo "$url"."lang="."pr"; ?>><?php echo $lang['dari']; ?></a>
</div>