<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        .table {
            align:center;
        }
    </script>
</head>
<body>
    <table border="1" class="table">
        <th>Index</th>
        <th>Value</th>

    <?php
        $var = array();
        for ($i=0; $i<101; $i++)
        {
            $var[] = "student_id_" .$i;

        }
        ?>
        <?php
        foreach($var as $x=>$value){
            ?>    
        <tr>
            <td><?php echo $x ?></td>
            <td><?php echo $value ?></td>
        </tr>
    <?php
        }
    ?>
    </table>

</body>
</html>