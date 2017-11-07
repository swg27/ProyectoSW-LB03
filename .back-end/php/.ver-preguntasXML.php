<?php

if(isset($_GET['user']))
{
    $email = $_GET['user'];
    if (empty($email)) {
        echo 'error 1';
    } else if (!preg_match("/^(([a-zA-Z]{1,})+[0-9]{3})+@ikasle\.ehu\.+(eus|es)$/", $email)) {
        echo 'error 2';
    } else {
//ob_start();
//session_start();

        include_once '../.others/.Dbconnect.php';

        $error = false;

        $sql = "SELECT email FROM users WHERE email='$email'";

        if (!mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>alert('Credenciales incorrectas!');</script>";
            die('Error: ' . mysqli_error($conn));
        }else{
             $user = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($user);
            clearstatcache();
            if($email == $row['email']) {
                ?>
<?php
$error=false;
$preguntas=mysqli_query($conn, "SELECT * FROM Preguntas");
echo '<table border=1> 
        <tr> 
        <th>Enunciado</th> 
        <th>Dificultad</th>  
        <th>Tema</th> 
        </tr>';
$preguntas = simplexml_load_file('../xml/questions.xml');
foreach ($preguntas-> assessmentItem as $pregunta) 
	{
    $atributos = $pregunta->attributes();
    echo
    '<tr>
    <td align="center">'.$pregunta->itemBody->p.'</td>
    <td align="center">'.$atributos['complexity'].'</td>
    <td align="center">'.$atributos['subject'].'</td></tr>';
	}
      echo '</table>';
    mysqli_close($conn);

?>

                <?php
            }else
            {
                echo "\n Solo pueden acceder usuarios registrados. \n";
                echo "<a href='../../HTML-N-PHP/register.php'>Registrarse</a>";
            }
        }
    }
}
else
{
    echo "\n Error";
}
?>
<html>
<style>
    table {
        margin: auto;
        padding: 1%;
        border: 2px;
        border-bottom-color: dodgerblue;
        background-color: rgba(10, 56, 75, 0.53);
    }
    table tr{
        margin: auto;
        padding: 0%;
        border: 2px;
        border-bottom-color: dodgerblue;
        background-color: rgb(255, 253, 219);
    }
    
    td p {
        margin-left: 2%;
        margin-right: 5%;
        margin-top: 3%;
        margin-bottom: 1%;
    }

    li {
        margin-left: 10%;
    }

</style>
</html>

        