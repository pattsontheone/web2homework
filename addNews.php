    <?php
    session_start();
    if(isset($_POST['title']) && isset($_POST['desc'])) {
        try {
            // Kapcsolódás
            $title = "\r\n\r\n<h1>".$_POST['title']."</h1>";
            $desc = $_POST['desc'];
            $file = 'news.txt';
            
            $lines=explode("\n", $desc);
            $ok="\r\n <p align='center'>";
            for ($i=0;$i<count($lines);$i++){                
                $ok.="<br> <font color=blue  size='4pt'>".$lines[$i]."</font>";
            }
            $news = $title."\r\n".$ok."\r\n"."</p><p class=default-spacer align='right'> <font color=black  size='3pt'>Közzétette: ".$_SESSION['username']."</font> </p>";
            
            
            file_put_contents($file, $news, FILE_APPEND | LOCK_EX);
            echo "<script>
            alert('A hír rögzítve lett!');
            window.location.href='adding.html';
            </script>";
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
    }
?>