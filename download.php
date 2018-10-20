<?php
require('youtube-dl.class.php');


echo $_POST['path'].'<br>';
try {
    
    $mytube = new yt_downloader($_POST['path'], TRUE, "audio");
    $audio = $mytube->get_audio();
    $path_dl = $mytube->get_downloads_dir();
    clearstatcache();
    if($audio !== FALSE && file_exists($path_dl . $audio) !== FALSE)
    {
        /*print "<script>
        download('". $path_dl . $audio ."', 'test.mp3', 'audio/mp3');
        
        </script>";*/
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