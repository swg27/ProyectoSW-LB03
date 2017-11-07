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
        <th>CodPregunta</th> 
        <th>Dificultad</th>  
        <th>Tema</th> 
        <th>Pregunta</th> 
        <th>Respuesta</th> 
        <th>Respuesta incorrecta 1</th> 
        <th>Respuesta incorrecta 2</th> 
        <th>Respuesta incorrecta 3</th>
        <th>email</th>
        <th>Imagen relacionada</th>
        </tr>';

while($row = mysqli_fetch_array($preguntas)){
    echo
    '<tr>
    <td align="center">'.$row['CodPregunta'].'</td>
    <td align="center">'.$row['dificultad'].'</td>
    <td align="center">'.$row['tema'].'</td>
    <td align="center">'.$row['pregunta'].'</td>
    <td align="center">'.$row['respuesta'].'</td>
    <td align="center">'.$row['no_respuesta_1'].'</td>
    <td align="center">'.$row['no_respuesta_2'].'</td>
    <td align="center">'.$row['no_respuesta_3'].'</td>
    <td align="center">'.$row['email'].'</td>
    <td align="center">'
    .'<img src="data:image/type;base64,'.base64_encode( $row['image']).'"/>'.
    '</td>
    </tr>';
}
    echo '</table>';
    $preguntas->close();
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

