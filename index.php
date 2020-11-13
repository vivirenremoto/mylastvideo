<?php

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($id) {
    $feed_url = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . $id;
    $xml = @simplexml_load_file($feed_url);

    if (isset($xml->entry[0])) {
        $video_url = $xml->entry[0]->link->attributes()->href;
        header('Location:' . $video_url);
    }
}

echo 'No video found';
