<!-- #run python using php  -->
<?php
    $command = escapeshellcmd('python -u "i:\Xam\htdocs\Finalproject\Pyfiles\modelrun.py" WIN_20200324_14_03_19_Pro.jpg');
    $output = shell_exec($command);
    echo $output;
?>

<?php
if($_GET["filename"]){
    $name = $_GET["filename"];
    echo $name."\n";
    $command = 'python -u "i:\Xam\htdocs\Finalproject\Pyfiles\modelrun.py" '.$name;
    $command = escapeshellcmd($command);
    $output = shell_exec($command);
    echo $output;
    if(!$output){
        echo "no output";
    }
}

?>