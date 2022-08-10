<?php
// $db = new mysqli('localhost', 'root', '', 'bd_conta');

$codMod = $_POST['kw'];
$query = "SELECT * FROM persona WHERE codMod LIKE '%$codMod%'";
$result = $db->query($query);

?>

<?php if(mysqli_num_rows($result)>0): ?>
    <table>
        <thead>
            <tr>
                <th scope="col">codmod</th>
                <th scope="col">nombres </th>
                <th scope="col">condicion</th>
                <th scope="col">accion</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_array()){ ?>
                <tr>
                    <td><?php echo $row['codMod']?></td>
                    <td><?php echo $row['nombres']?></td>
                    <td><?php echo $row['condicion']?></td>
                    <td>
                        <button class="select" name='selectbtn' type='button' >Elegir</button>    
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- <hr>
    <div class='boleta'>
        <label for="codMod">Codigo Modular: </label>
        <input type="text" id='codMod'>

        <label for="nombres">Apellidos y Nombres: </label>
        <input type="text" id="nombres">

        <label for="condicion">Condicion: </label>
        <input type="text" id='condicion'>
    </div> -->
    
<?php else:?>
    <h4>No se encontro resultados para los criterios de busqueda</h4>
<?php endif; ?>