<!DOCTYPE html>
<html>
<head>
    <title>Youtube Downloader</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/downloadjs/1.4.8/download.min.js"></script>
    <style>
        
    </style>
</head>
<body>
<?php
require('youtube-dl.class.php');
try {
    $mytube = new yt_downloader("https://www.youtube.com/watch?v=ZsVeBgenWxQ", TRUE, "audio");
    $audio = $mytube->get_audio();
    $path_dl = $mytube->get_downloads_dir();
    clearstatcache();
    if($audio !== FALSE && file_exists($path_dl . $audio) !== FALSE)
    {
        print "<a href='". $path_dl . $audio ."'>Download</a>";
    } else {
        print "Oops. Something went wrong.";
    }
    $log = $mytube->get_ffmpeg_Logfile();
    if($log !== FALSE) {
        print "<br><a href='" . $log . "' target='_blank'>Click, to view the Ffmpeg file.</a>";
    }
}
catch (Exception $e) {
    die($e->getMessage());
}
?>
</body>
</html>