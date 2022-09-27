
<?php
include('../../back/get_montos.php');
setlocale(LC_ALL,"es_PE");
date_default_timezone_set('America/Lima');
$emision = strtoupper(strftime("%d de %B del %Y"));

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
body {
  height: 100%;
  margin: 0 auto;
  padding: 0;
  font-size: 12pt;
  line-height: 1.3;
}
* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}
.main-page {
  width: 210mm;
  min-height: 297mm;
  margin: 10mm auto;
  background: white;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
.sub-page {
  padding: 1cm;
  height: 297mm;
}
@page {
  size: A4;
  margin: 5mm;
}
@media print {
  html, body {
    zoom: 110%;
    width: 210mm;
   /*width: 210mm;*/
   /*height: 297mm;*/    
  }
  .main-page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}


</style>

<div class="container">
    <div class='d-flex justify-content-center'>GOBIERNO REGIONAL DEL CUSCO</div>
    <div class='d-flex justify-content-center'>DIRECCION REGIONAL DE EDUCACION CUSCO</div>
    <div class='d-flex justify-content-center'>UNIDAD DE GESTION EDUCATIVA LOCAL CANCHIS</div>
    <div class='d-flex justify-content-center'>RUC - 20200575645</div>
    <div class='d-flex justify-content-center font-weight-bold h5'><u>DUPLICADO DE BOLETA</u></div>
    <br>
    <div class="container">
        <!-- LUGAR Y FECHA -->
        <div class="row" style='margin-right: 0 !important; display: inherit;'>
            <!-- <div class="col-1"></div> -->
            <div class="col-11 d-inline" >
                <div class='d-inline-flex text-uppercase' style ='width: 180px; font-family:Book Antiqua;font-size: 14px;font-weight: bold;'>
                    Lugar y Fecha
                </div>
                <div class='d-inline-flex ' > <!--style="text-decoration: underline; text-decoration-style: dotted;" -->
                    <div class='lead text-center' style='border-bottom: 2px dotted;  width: 703px; line-height: 1em; font-family:Book Antiqua;font-size: 16px;'>
                    <?= $boleta_per['fecha'] ?>
                    </div>
                </div>
            </div>
            <!-- <div class="col-2"></div> -->
        </div>
        <!-- APELLIDOS Y NOMBRES -->
        <div class="row" style='display: inherit;'>
            <!-- <div class="col-1"></div> -->
            <div class="col-11 d-inline" >
                <div class='d-inline-flex text-uppercase' style ='width: 180px;font-family:Book Antiqua;font-size: 14px;font-weight: bold;'>
                    Apellidos y Nombres
                </div>
                <div class='d-inline-flex' > <!--style="text-decoration: underline; text-decoration-style: dotted;" -->
                    <div class='lead text-center' style='border-bottom: 2px dotted;  width: 703px; line-height: 1em; font-family:Book Antiqua;font-size: 16px;'>
                    <?= $boleta_per['nombres'] ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- CODIGO MODULAR -->
        <div class="row" style='display: inherit;'>
            <!-- <div class="col-1 d-inline"></div> -->
            <div class="d-inline pr-0 pl-3" style ='width: 480px; display: inherit;'>
                <div class='d-inline-flex STRONG' style ='width: 180px;font-family:Book Antiqua;font-size: 14px;font-weight: bold;'>
                    CÓDIGO MODULAR N°
                </div>
                <div class='d-inline-flex'> <!--style="text-decoration: underline; text-decoration-style: dotted;" -->
                    <div class='text-center d-inline lead pr-0' style='border-bottom: 2px dotted;  width: 275px; line-height: 1em; font-family:Book Antiqua;font-size: 16px;'>
                    <?= $boleta_per['codMod'] ?>
                    </div>
                </div>
            </div>
        <!-- COD PLANILLA N° -->
            <div class="col-6 d-inline pl-0" >
                <div class='d-inline-flex' style ='width: 180 px;font-family:Book Antiqua;font-size: 14px;font-weight: bold;'>
                    COD PLANILLA N°
                </div>
                <div class='d-inline-flex' > <!--style="text-decoration: underline; text-decoration-style: dotted;" -->
                    <div class='text-center' style='border-bottom: 2px dotted;  width: 288px; line-height: 1em ;  font-family:Book Antiqua; font-size: 16px;'>
                    <?= $boleta_per['codPlanilla'] ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONDICIÓN -->
        <div class="row" style='display: inherit;'>
            <!-- <div class="col-1"></div> -->
            <div class="col-11 d-inline" >
                <div class='d-inline-flex text-uppercase' style ='width: 180px; font-family:Book Antiqua;font-size: 14px;font-weight: bold;'>
                    Condición
                </div>
                <div class='d-inline-flex' > <!--style="text-decoration: underline; text-decoration-style: dotted;" -->
                    <div class='lead text-lg-left' style='border-bottom: 2px dotted;  width: 703px; line-height: 1em; font-family:Book Antiqua;font-size: 16px; '>
                    &nbsp;&nbsp;&nbsp; <?= $boleta_per['condicion'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- PRUEBA 2 -->
    <div style='display:flex; flex-direction: row; flex-wrap: wrap; margin-left: 45px;'>

    <?php
    $result = $montos_2;
    $a=0;
    foreach($result as $datas)
    {
        echo "<div class='small' style='display:flex; flex-direction: column; margin-left: -30px;'>";
        // echo  "<div>" . $datas[$k]['model'] . "--></div>";
        
        foreach($datas as $data)
        {
            $a++;
            // echo $data  ;
            //print_r($data);
                    echo "<div class='row' style='margin-right: 38px;'>";
                        echo "<div class='text-center inline-block  mr-2 ml-2' style='width: 40px; font-weight: bold;font-family:Book Antiqua;font-size: 13px;'>  $a </div>";
                        echo "<div class='text-left mr-2 ml-2' style='width: 120px;font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> {$data[1]} </div>";
                        echo "<div class='text-right mr-2 ml-2' style='width: 100px; padding: 0; font-family:Book Antiqua;font-size: 13px;'> <div style ='border-bottom: 2px dotted;'> <div style = 'position:relative; top:3px;'>{$data[2]} </div> </div> </div>";
                    echo "</div>";
            // echo "<div> {$data[0]} {$data[1]} {$data[2]}  </div>" ;
        }
        echo '</div>';
    }
    ?>

    </div>
    <br>
    <div style='display:flex; flex-direction: row; flex-wrap: wrap; margin-left: 45px;'>
        <div class='small' style='display:flex; flex-direction: column; margin-left: -30px;'>
            <div class='row'>
                <div class='text-center inline-block  mr-2 ml-2' style='width: 40px; font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> </div>
                <div class='text-left mr-2 ml-2' style='width: 120px;font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> REM. TOTAL </div>
                <div class='text-right mr-2 ml-2' style='width: 100px; padding: 0; font-family:Book Antiqua;font-size: 13px;'> <div style ='border-bottom: 2px solid;'> <div style = 'position:relative; top:3px;'>S/ <?= $rem_total ?> </div> </div> </div>

                <div class='text-center inline-block  mr-1 ml-1' style='width: 40px; font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> </div>
                <div class='text-left mr-2 ml-2' style='width: 120px;font-weight: bold;font-family:Book Antiqua;font-size: 13px;'>T.DESCUENTOS </div>
                <div class='text-right mr-2 ml-2' style='width: 100px; padding: 0; font-family:Book Antiqua;font-size: 13px;'> <div style ='border-bottom: 2px solid;'> <div style = 'position:relative; top:3px;'>S/ <?= $des ?> </div> </div> </div>

                <div class='text-center inline-block  mr-1 ml-1' style='width: 40px; font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> </div>
                <div class='text-left mr-2 ml-2' style='width: 120px;font-weight: bold;font-family:Book Antiqua;font-size: 13px;'>REM.LIQUIDA </div>
                <div class='text-right mr-2 ml-2' style='width: 100px; padding: 0; font-family:Book Antiqua;font-size: 13px;'> <div style ='border-bottom: 2px solid;'> <div style = 'position:relative; top:3px;'>S/ <?= $rem_total-$des ?> </div> </div> </div>
            </div>
        </div>
    </div>

    <!-- FECHA DE EMISION -->
    <br>
    <br>
    <br>


    <div style='display:flex; flex-direction: row; flex-wrap: wrap; margin-left: 45px;'>
        <div class='small' style='display:flex; flex-direction: column; margin-left: -30px;'>
            <div class='row'>
                <div class='text-left inline-block ml-2' style='width: 0px; font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> </div>
                <div class='text-left mr-2 ml-2' style='width: 150px;font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> FECHA DE EMISIÓN </div>
                <div class='text-right mr-2 ml-2' style='width: 180px; padding: 0; font-family:Book Antiqua;font-size: 13px;'> <?= $emision ?> </div>

                <div class='text-left mr-2 ml-2' style='width: 1px;font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> </div>
                <div class='text-right mr-2 ml-2' style='width: 70px; padding: 0; font-family:Book Antiqua;font-size: 13px;'> </div>

                <div class='text-center inline-block  mr-1 ml-1' style='width: 40px; font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> </div>
                <div class='text-left mr-2 ml-2' style='width: 120px;font-weight: bold;font-family:Book Antiqua;font-size: 13px;'> </div>
                <div class='text-center mr-2 ml-2' style='width: 235px; padding: 0; font-family:Book Antiqua;font-size: 12px;'> <div style ='border-top: 1px solid;'> CONSTANCIA DE PAGOS <br> AREA DE GESTIÓN ADMINISTRATIVA </div> </div>
            </div>
        </div>
    </div>


    
</div>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<br>

<?php
$array = array(1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36);
$cod = array("001", "002", "003", "004", "005", "006", "007", "008", "009", "010", "011", "012", "013", "014", "015", "016", "017", "018", "019", "020", "021", "022", "023", "024", "025", "026", "027", "028", "029", "030", "031", "032", "033", "034", "035", "036");
$nom_cod = array("001", "002", "003", "004", "005", "006", "007", "008", "009", "010", "011", "012", "013", "014", "015", "016", "017", "018", "019", "020", "021", "022", "023", "024", "025", "026", "027", "028", "029", "030", "031", "032", "033", "034", "035", "036");
$monto = array("001", "002", "003", "004", "005", "006", "007", "008", "009", "010", "011", "012", "013", "014", "015", "016", "017", "018", "019", "020", "021", "022", "023", "024", "025", "026", "027", "028", "029", "030", "031", "032", "033", "034", "035", "036");

?>
