<!DOCTYPE html>
<html lang="es">
<head>
  <title>Consulta por afiliado y prestador </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

<style>
  #noencontrodni {
    background-color: yellow;
    color:black !important;
    text-align: left;
    font-size: 30px;
    margin: 1%;
    padding: 1%;
  }


  #nada {
    text-align: left;
  }


#nosepuedeatender {
    background-color: red;
    color:black !important;
    text-align: left;
    font-size: 30px;
    margin: 1%;
    padding: 1%;
  }

#sepuedeatender {
    background-color: green;
    color:black !important;
    text-align: left;
    font-size: 30px;
    margin: 1%;
    padding: 1%;
  }

  
  </style>

</head>
<body>

<?php

$name = "";
$cars = array
  (
array(2,'Policlinico del Docente',0,0,1,1,1,0,1,1),
array(21,'Hospital Privado Mariano Moreno ',0,0,1,1,1,0,1,1),
array(34,'Sanatorio Bernal',0,0,1,1,1,0,1,1),
array(11,'Centro Medico Talar',0,0,1,0,1,0,1,1),
array(95,'Sanatorio Del Oeste Merlo',0,0,0,0,1,0,0,1),
array(98,'Sanatorio AMTA',0,0,0,0,1,0,0,1),
array(3,'RIOSA (Red Odontologica)',1,0,1,0,1,1,1,0),
array(49,'LABORATORIO DE ANALISIS CLINICOS DR. FILIPPELLI SALAZAR',1,0,1,0,1,1,1,0),
array(1,'Sanatorio Ramon Cereijo',0,0,1,1,1,0,1,0),
array(24,'Hospital Privado Ntra. Sra. de La Merced ',0,0,1,1,1,0,1,0),
array(4,'Clinica Miner',0,0,1,0,1,0,1,0),
array(5,'Policlinico Augusto Vandor',0,0,1,0,1,0,1,0),
array(6,'Clinica Privada Fatima',0,0,1,0,1,0,1,0),
array(7,'Clinica Los Almendros ',0,0,1,0,1,0,1,0),
array(8,'Clinica Privada Fatima',0,0,1,0,1,0,1,0),
array(9,'Clinica Privada San Fernando',0,0,1,0,1,0,1,0),
array(10,'Sanatorio San Pablo',0,0,1,0,1,0,1,0),
array(12,'Clinica Sagrado Corazon',0,0,1,0,1,0,1,0),
array(13,'Clinica Los Almendros ',0,0,1,0,1,0,1,0),
array(14,'Sanatorio Sarmiento',0,0,1,0,1,0,1,0),
array(15,'Clinica Pedro Angel Salas',0,0,1,0,1,0,1,0),
array(16,'Sanatorio San Martin UOM',0,0,1,0,1,0,1,0),
array(17,'Sanatorio La Torre San Martín',0,0,1,0,1,0,1,0),
array(19,'Clinica Provincial ',0,0,1,0,1,0,1,0),
array(20,'Sanatorio San Juan Bautista ',0,0,1,0,1,0,1,0),
array(22,'Clinica Privada Alcorta ',0,0,1,0,1,0,1,0),
array(23,'Clinica Privada Centro ',0,0,1,0,1,0,1,0),
array(25,'Policlinico Regional Eva Peron',0,0,1,0,1,0,1,0),
array(26,'Sanatorio La Torre Lomas del Mirador',0,0,1,0,1,0,1,0),
array(27,'Sanatorio Pediatrico La Torre San Justo',0,0,1,0,1,0,1,0),
array(28,'Sanatorio Privado Madero',0,0,1,0,1,0,1,0),
array(29,'Sanatorio Privada Salud',0,0,1,0,1,0,1,0),
array(31,'Sanatorio 24 de Septiembre',0,0,1,0,1,0,1,0),
array(32,'Policlínico Regional Avellaneda',0,0,1,0,1,0,1,0),
array(33,'Clínica de la Dulce Espera',0,0,1,0,1,0,1,0),
array(35,'Clínica General Belgrano',0,0,1,0,1,0,1,0),
array(36,'Clínica 2 de Abril',0,0,1,0,1,0,1,0),
array(37,'Policlínico Lomas',0,0,1,0,1,0,1,0),
array(38,'Clínica Modelo de Lanús',0,0,1,0,1,0,1,0),
array(39,'Clínica Privada Ranelagh',0,0,1,0,1,0,1,0),
array(40,'Policlínico Guernica',0,0,1,0,1,0,1,0),
array(41,'Instituto Medico Modelo Solano',0,0,1,0,1,0,1,0),
array(42,'Sanatorio San Francisco',0,0,1,0,1,0,1,0),
array(43,'Clínica del Niño de Quilmes',0,0,1,0,1,0,1,0),
array(47,'Clínica Boedo',0,0,1,0,1,0,1,0),
array(48,'CEREGESA',0,0,1,0,1,0,1,0),
array(50,'BERTA EDUARDO',0,0,1,0,1,0,1,0),
array(51,'CENTRO DE DIAGNOSTICO NORTE',0,0,1,0,1,0,1,0),
array(52,'LITOBLAST- CENTRO DE PRACTICAS UROLOGICAS',0,0,1,0,1,0,1,0),
array(53,'CENTRO RADIOLOGICO LEON GALLARDO',0,0,1,0,1,0,1,0),
array(54,'CONSULTORIOS OFTALMOLÓGICOS SERRANO',0,0,1,0,1,0,1,0),
array(55,'INSTITUTO DE NEFROLOGIA SAN MIGUEL',0,0,1,0,1,0,1,0),
array(56,'CENTRO KINESIOLOGICO CTR',0,0,1,0,1,0,1,0),
array(57,'GREGORIS ',0,0,1,0,1,0,1,0),
array(58,'INSTITUTO NEFROLOGICO ZARATE',0,0,1,0,1,0,1,0),
array(59,'HOSPITAL OFTALMOLÓGICO MALVINAS ARGENTINAS',0,0,1,0,1,0,1,0),
array(60,'HOSPITAL OFTALMOLÓGICO JUAN D. PERÓN',0,0,1,0,1,0,1,0),
array(61,'LABORATORIO DE ANATOMIA PATOLOGICA Y CITOLOGIA',0,0,1,0,1,0,1,0),
array(62,'CENTRO DE DIAGNOSTICO IMAT- CEMI',0,0,1,0,1,0,1,0),
array(63,'DIAGNOSTICO MORENO',0,0,1,0,1,0,1,0),
array(64,'CONSULTORIO RADIOLOGICO MORENO',0,0,1,0,1,0,1,0),
array(65,'SERVICIO INTEGRAL DE TERAPIA RENAL ARGENTINA',0,0,1,0,1,0,1,0),
array(66,'DIAGNOSTICO MERLO',0,0,1,0,1,0,1,0),
array(67,'T.C.HAEDO SRL',0,0,1,0,1,0,1,0),
array(68,'MULTIDIAGNOSTICO S.A',0,0,1,0,1,0,1,0),
array(69,'MEDICSA (CONSULTORIO DIAGNOSTICO MEDICO) ',0,0,1,0,1,0,1,0),
array(70,'CENTRO DE DIAGNOSTICO DRES. MOLINAS (MORON)',0,0,1,0,1,0,1,0),
array(71,'CENTRO DE DIAGNOSTICO POR IMAGENES SANATORIO BERNAL',0,0,1,0,1,0,1,0),
array(72,'CENTRO DE DIAGNOSTICO VYM',0,0,1,0,1,0,1,0),
array(73,'LABORATORIO DE ANALISIS CLINICOS DR REZNIK',0,0,1,0,1,0,1,0),
array(74,'DIAGNOSTICARTE ',0,0,1,0,1,0,1,0),
array(75,'INSTITUTO DE DIAGNOSTICO 12 OCTUBRE (QUILMES)',0,0,1,0,1,0,1,0),
array(76,'GAG SENIOR S.R.L',0,0,1,0,1,0,1,0),
array(77,'GENDA',0,0,1,0,1,0,1,0),
array(78,'IMAT',0,0,1,0,1,0,1,0),
array(79,'CENTRO DE IMAGENES ANATOMICAS',0,0,1,0,1,0,1,0),
array(80,'CIED',0,0,1,0,1,0,1,0),
array(81,'IMAT CONGRESO',0,0,1,0,1,0,1,0),
array(82,'SALUD OCULAR Sede Central/Callao',0,0,1,0,1,0,1,0),
array(83,'SALUD OCULAR Sede San Cristóbal',0,0,1,0,1,0,1,0),
array(84,'SALUD OCULAR Sede Villa Devoto (Guardia 24 hs)',0,0,1,0,1,0,1,0),
array(85,'SALUD OCULAR Sede Villa Lugano',0,0,1,0,1,0,1,0),
array(86,'SERVICIO DE TERAPIA RENAL ARGENTINA',0,0,1,0,1,0,1,0),
array(87,'SIGMA',0,0,1,0,1,0,1,0),
array(88,'FONOADIOLOGIA INTEGRAL',0,0,1,0,1,0,1,0),
array(44,'Sanatorio Modelo Estrella (Monte Grande)',0,0,1,0,0,0,1,0),
array(18,'CardioWeb SRL (Servicio Hemodinamia C. Los Almendros Pilar)',0,0,0,0,0,0,1,0),
array(30,'Clinica Privada Tachella',0,0,0,0,0,0,1,0),
array(45,'Clinica Avellaneda Medical Center',0,0,0,0,0,0,1,0),
array(46,'Clinica Materno Infantil Privada Lomas',0,0,0,0,0,0,1,0),
array(89,'Hospital UAI',0,0,0,0,1,0,0,0),
array(90,'ICI (INSTITUTO CARDIOVASCULAR INFANTIL)',0,0,0,0,1,0,0,0),
array(91,'INSTITUTO ORL ARAUZ',0,0,0,0,1,0,0,0),
array(92,'Sanatorio La Toree Vicente Lopez',0,0,0,0,1,0,0,0),
array(93,'Clinica Aires de Pacheco',0,0,0,0,1,0,0,0),
array(94,'Clinica Santa Maria',0,0,0,0,1,0,0,0),
array(96,'Sanatorio Del Oeste Ituzaingo',0,0,0,0,1,0,0,0),
array(97,'Clinica Modelo Moron',0,0,0,0,1,0,0,0),
array(99,'Clinica Privada San Vicente',0,0,0,0,1,0,0,0),
array(100,'Nuevo Sanatorio Berazategui',0,0,0,0,1,0,0,0),
array(101,'EME SALUD S.A. (Radiologia) Escobar',0,0,0,0,0,0,0,0),
array(102,'CENTRO DE OJOS DEL SUR BONAERENSE',0,0,0,0,0,0,0,0)
  );
// id -- PRESTADOR -- AMBULATORIO -- GUARDA DE PUESTO -- PMO -- PMO 2 -- PREMIUM -- PROVISORIO -- SUPERADOR -- TRANSITO



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $numero = $_POST["numero"];
  $_ArrayPrestador=$_POST["prestador"];

$url="http://servicios.gestos.com.ar:8080/ords/rws/gestos/viasano/consultarAfiliado/".$numero;
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $lat=$datos["items"];
    $doc=$datos["items"][0]["doc"];
    $cuil_titular=$datos["items"][0]["cuil_titular"];
    $telefono=$datos["items"][0]["telefono_celular"];
    $nombre_apellido=$datos["items"][0]["nombre_apellido"];
    $cuil=$datos["items"][0]["cuil"];
    $estado=$datos["items"][0]["estado"];
    $categoria= $datos ["items"][0]["categoria"];
    $pmi= $datos ["items"][0]["pmi"];
    $incapacidad=$datos ["items"][0]["incapacidad"];
  $tiene_credencial=$datos ["items"][0]["tiene_credencial"];

  $stylo="id='nada'";

  if (empty($categoria)) 
  {
    $mensaje = "NO SE ENCONTRO EL DNI <br>";
    $stylo="id='noencontrodni'";
  }
  else
  { 
    if($estado !== 'Activo')
      {
        $mensaje = "DNI: ".$numero."<br> Nombre y apelldio :".$nombre_apellido."<br> "." <br> Estado :".$estado."<br>";
        $stylo="id='nosepuedeatender'";
      }
    else
    {
    $mensaje = "DNI: ".$numero." <br> Nombre y apelldio :".$nombre_apellido."<br> "." Estado :".$estado."<br>".
    "Credencial: ".$tiene_credencial."<br>".
    "PMI : ".$pmi."<br>".
    "Incapacidad : ".$incapacidad."<br>".
    "Plan :".$categoria;

    //  0  1        2        3             4    5    6      7       8        9
    // id -- PRESTADOR -- AMBULATORIO -- GUARDA DE PUESTO -- PMO -- PMO 2 -- PREMIUM -- PROVISORIO -- SUPERADOR -- TRANSITO

    $stylo="id='sepuedeatender'";

    if($categoria == 'AMBULATORIO')
      { if ($cars[$_ArrayPrestador-1][2] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{
          $mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
          $stylo="id='nosepuedeatender'";
        };
      }


    if($categoria == 'GUARDA DE PUESTO')
      { if ($cars[$_ArrayPrestador-1][3] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{$mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
      $stylo="id='nosepuedeatender'";};
      }


    if($categoria == 'PMO')
      { if ($cars[$_ArrayPrestador-1][4] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{$mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
        $stylo="id='nosepuedeatender'";
      };
      }


    if($categoria == 'PMO2')
      { if ($cars[$_ArrayPrestador-1][5] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{$mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
      $stylo="id='nosepuedeatender'";};
      }


    if($categoria == '353 PLUS')
      { if ($cars[$_ArrayPrestador-1][6] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{$mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
      $stylo="id='nosepuedeatender'";};
      }


    if($categoria == 'PROVISORIO')
      { if ($cars[$_ArrayPrestador-1][7] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{$mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
      $stylo="id='nosepuedeatender'";};
      }


    if($categoria == 'SUPERADOR.' || $categoria == 'SUPERADOR')
      { if ($cars[$_ArrayPrestador-1][8] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{$mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
      $stylo="id='nosepuedeatender'";};
      }


    if($categoria == 'TRANSITO')
      { if ($cars[$_ArrayPrestador-1][8] == 1)
          {$mensaje=$mensaje."<br> <h2> Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";}
        else{$mensaje=$mensaje."<br> <h2>No Se puede atender en ".$cars[$_ArrayPrestador-1][1]."! </h2>";
      $stylo="id='nosepuedeatender'";};
      }

    }
  }
  test_input($mensaje);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


  


?>

<div class="container">
  <div class="jumbotron">
    <h1>Donde se puede atende paciente?</h1>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nro DNI: <br>  <input type="number" name="numero">
 <br>  <br> 
<div class="row-fluid">
<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="prestador" id="prestador">
<option  value='1'> Policlinico del Docente </option>
<option  value='2'> Hospital Privado Mariano Moreno   </option>
<option  value='3'> Sanatorio Bernal  </option>
<option  value='4'> Centro Medico Talar </option>
<option  value='5'> Sanatorio Del Oeste Merlo </option>
<option  value='6'> Sanatorio AMTA  </option>
<option  value='7'> RIOSA (Red Odontologica)  </option>
<option  value='8'> LABORATORIO DE ANALISIS CLINICOS DR. FILIPPELLI SALAZAR </option>
<option  value='9'> Sanatorio Ramon Cereijo </option>
<option  value='10'>  Hospital Privado Ntra. Sra. de La Merced  </option>
<option  value='11'>  Clinica Miner </option>
<option  value='12'>  Policlinico Augusto Vandor  </option>
<option  value='13'>  Clinica Privada Fatima  </option>
<option  value='14'>  Clinica Los Almendros   </option>
<option  value='15'>  Clinica Privada Fatima  </option>
<option  value='16'>  Clinica Privada San Fernando  </option>
<option  value='17'>  Sanatorio San Pablo </option>
<option  value='18'>  Clinica Sagrado Corazon </option>
<option  value='19'>  Clinica Los Almendros   </option>
<option  value='20'>  Sanatorio Sarmiento </option>
<option  value='21'>  Clinica Pedro Angel Salas </option>
<option  value='22'>  Sanatorio San Martin UOM  </option>
<option  value='23'>  Sanatorio La Torre San Martín </option>
<option  value='24'>  Clinica Provincial  </option>
<option  value='25'>  Sanatorio San Juan Bautista   </option>
<option  value='26'>  Clinica Privada Alcorta   </option>
<option  value='27'>  Clinica Privada Centro  </option>
<option  value='28'>  Policlinico Regional Eva Peron  </option>
<option  value='29'>  Sanatorio La Torre Lomas del Mirador  </option>
<option  value='30'>  Sanatorio Pediatrico La Torre San Justo </option>
<option  value='31'>  Sanatorio Privado Madero  </option>
<option  value='32'>  Sanatorio Privada Salud </option>
<option  value='33'>  Sanatorio 24 de Septiembre  </option>
<option  value='34'>  Policlínico Regional Avellaneda </option>
<option  value='35'>  Clínica de la Dulce Espera  </option>
<option  value='36'>  Clínica General Belgrano  </option>
<option  value='37'>  Clínica 2 de Abril  </option>
<option  value='38'>  Policlínico Lomas </option>
<option  value='39'>  Clínica Modelo de Lanús </option>
<option  value='40'>  Clínica Privada Ranelagh  </option>
<option  value='41'>  Policlínico Guernica  </option>
<option  value='42'>  Instituto Medico Modelo Solano  </option>
<option  value='43'>  Sanatorio San Francisco </option>
<option  value='44'>  Clínica del Niño de Quilmes </option>
<option  value='45'>  Clínica Boedo </option>
<option  value='46'>  CEREGESA  </option>
<option  value='47'>  BERTA EDUARDO </option>
<option  value='48'>  CENTRO DE DIAGNOSTICO NORTE </option>
<option  value='49'>  LITOBLAST- CENTRO DE PRACTICAS UROLOGICAS </option>
<option  value='50'>  CENTRO RADIOLOGICO LEON GALLARDO  </option>
<option  value='51'>  CONSULTORIOS OFTALMOLÓGICOS SERRANO </option>
<option  value='52'>  INSTITUTO DE NEFROLOGIA SAN MIGUEL  </option>
<option  value='53'>  CENTRO KINESIOLOGICO CTR  </option>
<option  value='54'>  GREGORIS  </option>
<option  value='55'>  INSTITUTO NEFROLOGICO ZARATE  </option>
<option  value='56'>  HOSPITAL OFTALMOLÓGICO MALVINAS ARGENTINAS  </option>
<option  value='57'>  HOSPITAL OFTALMOLÓGICO JUAN D. PERÓN  </option>
<option  value='58'>  LABORATORIO DE ANATOMIA PATOLOGICA Y CITOLOGIA  </option>
<option  value='59'>  CENTRO DE DIAGNOSTICO IMAT- CEMI  </option>
<option  value='60'>  DIAGNOSTICO MORENO  </option>
<option  value='61'>  CONSULTORIO RADIOLOGICO MORENO  </option>
<option  value='62'>  SERVICIO INTEGRAL DE TERAPIA RENAL ARGENTINA  </option>
<option  value='63'>  DIAGNOSTICO MERLO </option>
<option  value='64'>  T.C.HAEDO SRL </option>
<option  value='65'>  MULTIDIAGNOSTICO S.A  </option>
<option  value='66'>  MEDICSA (CONSULTORIO DIAGNOSTICO MEDICO)  </option>
<option  value='67'>  CENTRO DE DIAGNOSTICO DRES. MOLINAS (MORON) </option>
<option  value='68'>  CENTRO DE DIAGNOSTICO POR IMAGENES SANATORIO BERNAL </option>
<option  value='69'>  CENTRO DE DIAGNOSTICO VYM </option>
<option  value='70'>  LABORATORIO DE ANALISIS CLINICOS DR REZNIK  </option>
<option  value='71'>  DIAGNOSTICARTE  </option>
<option  value='72'>  INSTITUTO DE DIAGNOSTICO 12 OCTUBRE (QUILMES) </option>
<option  value='73'>  GAG SENIOR S.R.L  </option>
<option  value='74'>  GENDA </option>
<option  value='75'>  IMAT  </option>
<option  value='76'>  CENTRO DE IMAGENES ANATOMICAS </option>
<option  value='77'>  CIED  </option>
<option  value='78'>  IMAT CONGRESO </option>
<option  value='79'>  SALUD OCULAR Sede Central/Callao  </option>
<option  value='80'>  SALUD OCULAR Sede San Cristóbal </option>
<option  value='81'>  SALUD OCULAR Sede Villa Devoto (Guardia 24 hs)  </option>
<option  value='82'>  SALUD OCULAR Sede Villa Lugano  </option>
<option  value='83'>  SERVICIO DE TERAPIA RENAL ARGENTINA </option>
<option  value='84'>  SIGMA </option>
<option  value='85'>  FONOADIOLOGIA INTEGRAL  </option>
<option  value='86'>  Sanatorio Modelo Estrella (Monte Grande)  </option>
<option  value='87'>  CardioWeb SRL (Servicio Hemodinamia C. Los Almendros Pilar) </option>
<option  value='88'>  Clinica Privada Tachella  </option>
<option  value='89'>  Clinica Avellaneda Medical Center </option>
<option  value='90'>  Clinica Materno Infantil Privada Lomas  </option>
<option  value='91'>  Hospital UAI  </option>
<option  value='92'>  ICI (INSTITUTO CARDIOVASCULAR INFANTIL) </option>
<option  value='93'>  INSTITUTO ORL ARAUZ </option>
<option  value='94'>  Sanatorio La Toree Vicente Lopez  </option>
<option  value='95'>  Clinica Aires de Pacheco  </option>
<option  value='96'>  Clinica Santa Maria </option>
<option  value='97'>  Sanatorio Del Oeste Ituzaingo </option>
<option  value='98'>  Clinica Modelo Moron  </option>
<option  value='99'>  Clinica Privada San Vicente </option>
<option  value='100'> Nuevo Sanatorio Berazategui </option>
<option  value='101'> EME SALUD S.A. (Radiologia) Escobar </option>
<option  value='102'> CENTRO DE OJOS DEL SUR BONAERENSE </option>
</select>
</div>

<br> <br> 
<input type="submit" name="submit" value="Consultar">  
</form>
  </div>
  <div class="row">
    <div class="col-sm-1">
      
      <p>.</p>
      
    </div>
    <div class="col-sm-10"  >
      <?php
      
        echo "<h3>Resultado:</h3>";
        echo "<div $stylo>".$mensaje."</div>";

      ?>
    </div>
    <div class="col-sm-1">
      <p>.</p>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
