<!DOCTYPE html>
<html>
<head>
<title>Nestor Adrian Lagonegro</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/validacion.js"></script>



<style>
.container {
  position: relative;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

</style>
</head>
<body id="myPage">

<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Cerrar
    <i class="fa fa-remove"></i>
  </a>
  <br>
  <a href="/lookman/" class="w3-bar-item w3-button" target="_blank">E-comerce 1 </a>
  <a href="/ecomerce/" class="w3-bar-item w3-button" target="_blank">E-comerce 2 </a>
  <!--a href="/oggi/login.php" class="w3-bar-item w3-button" target="_blank">Intranet</a-->
  <!--a href="#" class="w3-bar-item w3-button" target="_blank">Tickets</a>
  <a href="#" class="w3-bar-item w3-button" target="_blank">Agenda</a-->
</nav>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-large w3-teal"><i class="fa fa-home  "></i></a> <!-- home-->

  <a href="#team" class="w3-bar-item w3-button w3-large w3-hover-white"><i class="fa fa-microchip  "></i></a> <!-- programcion-->
  

  <a href="#work" class="w3-bar-item w3-button w3-large w3-hover-white"><i class="fa fa-laptop  "></i></a> <!-- laburos-->
  <a href="#estudios" class="w3-bar-item w3-button w3-large w3-hover-white"><i class="fa fa-book  "></i></a>

  <a href="#contact" class="w3-bar-item w3-button w3-large w3-hover-white"><i class="fa fa-address-book-o  "></i></a> <!-- contacto-->

  <!--a href="#desarrollos" class="w3-bar-item w3-button w3-large w3-hover-white"><i class="fa fa-code"></i></a> 
    <div class="w3-dropdown-hover w3-large">
    <button class="w3-button" title="Notifications">
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">IntraNet</a>
      <a href="#" class="w3-bar-item w3-button">E-comerce</a>
      <a href="#" class="w3-bar-item w3-button">Pedidos</a>
    </div>
  </div-->

  <!--a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a-->
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="#team" class="w3-bar-item w3-button">Team</a>
    <a href="#work" class="w3-bar-item w3-button">Work</a>
    <!--a href="#estudios" class="w3-bar-item w3-button">Price</a-->
    <a href="#contact" class="w3-bar-item w3-button">Contacto</a>    
    <!--a href="#" class="w3-bar-item w3-button">Search</a-->
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="/img/architect.gif" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom w3-theme">  
    <h1>NESTOR ADRIAN LAGONEGRO</h1>
    <h3>Analista tecnico funcional</h3>
    
    <!--button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">LEARN W3.CSS</button-->

  </div>
</div>















<!-- Modal viasano -->
<div id="viasano" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('viasano').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Via Sano</h4>
      <h5>Core: Salud</h5>
    </header>
    <div class="w3-container">
      <p>Como Analista funcional, realizo el soporte, desarrollo e implementación de los productos (software) que adquiera la empresa desde CRM (Alephoo), BI (Alephoo), ERP (Tango Gestión), plataformas varias Fluig (ECM + BMP + WCM + ESB) y su relación mediante Web Services.</p>

      <p>Dentro de la organización, tuve la oportunidad de acompañar la vida de todos los productos antes mencionado, manejar licitaciones de proveedores de Software, definir funcionalidades a los partners y testear estos una vez finalizados.</p>
      
    </div>
    <footer class="w3-container w3-teal">
      <p> </p>
    </footer>
  </div>
</div>















<!-- Modal viasano -->
<div id="prosegur" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('prosegur').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Prosegur</h4>
      <h5>Core: Seguridad</h5>
    </header>
    <div class="w3-container">
      <p>Como Analista funcional dentro de las plataformas internas, me encargue del relevamiento de la misma, análisis de QA, definición de funcionalidades de cara al usuario interno comercial (el cual tiene por objetivo la carga de horas y presupuestos para terceros). Sobre estas plataformas descansan análisis de horas, costeos y tarifas que impactan directamente en la facturación de la compañía. Trabajé en conjunto con el equipo de Fabrica de Software alocado en Brasil (Joinville).</p>            
    </div>
    <footer class="w3-container w3-teal">
      <p> </p>
    </footer>
  </div>
</div>











<!-- Modal viasano -->
<div id="totvs" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('totvs').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>TOTVS</h4>
      <h5>Core: Software factory</h5>
    </header>
    <div class="w3-container">
      <p>He desarrollado mi carrera como especialista para la plataforma colaboratiba Fluig y el ERP Protheus.
Realizando Planificaciones y acompañamiento de la implementación en ambas herramientas, apuntando a satisfacer las expectativas y necesidades de los clientes.</p>
      <p>También impartía las capacitaciones técnicas y funcionales de equipos in company. Realizando visitas y presentaciones técnicas para clientes, estimaciones de horas, costos y elaboración de propuestas comerciales.</p>
      
    </div>
    <footer class="w3-container w3-teal">
      <p> </p>
    </footer>
  </div>
</div>











<!-- Modal viasano -->
<div id="cda" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('cda').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>CDA</h4>
      <h5>Core: Consultoria</h5>
    </header>
    <div class="w3-container">
      <p>Como integrante del área de desarrollo para Banco Galicia (sector Personas), me desempeñé como Analista Técnico en el cual manejaban datos de extrema sensibilidad como lo son:</p>
      <p>Base de Clientes, Extractos electrónicos, Oficios y Embargos, Datawarehouse Sourcing, etc.Todo mediante reportes y validación sobre estos con COBOL CICS, changeman, JCL, Control-M, etc</p>
    </div>
    <footer class="w3-container w3-teal">
      <p> </p>
    </footer>
  </div>
</div>







<!-- Modal viasano -->
<div id="acenture" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('acenture').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Accenture</h4>
      <h5>Core: Consultoria</h5>
    </header>
    <div class="w3-container">
      <p>Como programador COBOL CICS en Accenture para el proyecto Telefónica de España, me desempeñé realizando resolución de incidentes y desarrollo de específicos relativos al área de Descuentos, estimación de volumen de trabajo, Análisis de requerimientos y Realización de documentación de pruebas.</p>
    </div>
    <footer class="w3-container w3-teal">
      <p> </p>
    </footer>
  </div>
</div>





<!-- Modal viasano -->
<div id="barbarella" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('barbarella').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Administrativo</h4>
      <h5>Core: Empaquetado</h5>
    </header>
    <div class="w3-container">
      <p>Como Administrativo para Barbarella (empresa Retail) alocada en las instalaciones de Procter & Gambler en el parque industrial de Pilar, me desempeñé como usuario SAP para el módulo de ventas y distribución, encargado del despacho de mercancías realizando picking en el sistema, para luego generar la orden de transporte y así hacer el seguimiento por logistic hasta la llegada del producto al cliente.</p>      
    </div>
    <footer class="w3-container w3-teal">
      <p> </p>
    </footer>
  </div>
</div>





<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
<h2>Lenguajes</h2>
<!--p>De programacion que domino</p-->
<br>
<br>

<div class="w3-row"><br>

<div class="w3-quarter container">
  <img src="/img/png128bits/002-marcas-y-logotipos.png" alt="PHP" style="width:45%" class="w3-circle w3-hover-opacity">
    <div class="overlay">
    <div class="text">PHP</div>
  </div>
  <!--h3>PHP</h3-->
  <!--p>Web Designer</p-->
  <br><br>
</div>

<div class="w3-quarter container">
  <img src="/img/png128bits/008-sql.png" alt="transact-sql" style="width:45%" class="w3-circle w3-hover-opacity">
    <div class="overlay">
    <div class="text">Transact-sql</div>
  </div>
  <!--h3>Transact-SQL</h3-->
  <!--p>Support</p-->
  <br><br>
</div>

<div class="w3-quarter container">
  <img src="/img/png128bits/001-logos.png" alt="Java Script" style="width:45%" class="w3-circle w3-hover-opacity">
    <div class="overlay">
    <div class="text">Java Script</div>
  </div>
  <!--h3>Js</h3-->
  <!--p>Boss man</p-->
  <br><br>
</div>

<div class="w3-quarter container">
  <img src="/img/png128bits/012-visual-studio.png" alt="ASP .NET" style="width:45%" class="w3-circle w3-hover-opacity">
    <div class="overlay">
    <div class="text">ASP .NET</div>
  </div>
  <!--h3>.NET</h3-->
  <!--p>Fixer</p-->
  <br><br>
</div>




<div class="w3-quarter container">
  <img src="/img/png128bits/005-logos-3.png" alt="MySQL" style="width:45%" class="w3-circle w3-hover-opacity">
    <div class="overlay">
    <div class="text">MySQL</div>
  </div>
  <!--h3>MySql</h3-->
  <!--p>Fixer</p-->
  <br><br>
</div>



<div class="w3-quarter container">
  <img src="/img/png128bits/003-logos-1.png" alt="HTML 5" style="width:45%" class="w3-circle w3-hover-opacity">
    <div class="overlay">
    <div class="text">HTML 5</div>
  </div>
  <!--h3>HTML 5</h3-->
  <!--p>Fixer</p-->
  <br><br>
</div>


<div class="w3-quarter container">
  <img src="/img/png128bits/004-logos-2.png" alt="CSS" style="width:45%" class="w3-circle w3-hover-opacity">
  <div class="overlay">
    <div class="text">CSS</div>
  </div>
  <!--h3>CSS</h3-->
  <!--p>Fixer</p-->
  <br><br>
</div>


<div class="w3-quarter container">
  <img src="/img/png128bits/cobol_nofondo.png" alt="COBOL" style="width:45%" class="w3-circle w3-hover-opacity">
  <div class="overlay">
    <div class="text">COBOL</div>
  </div>
  <!--h3>COBOL</h3-->
  <!--p>Fixer</p-->
  <br><br>
</div>




</div>
</div>

<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter">
<h2>Sobre mí</h2>
<p>Soy una persona responsable, me brindo con dedicación y me caracterizo por ser profesional en mi área. Me gusta desempeñarme en equipo, pienso que la buena comunicación y el respeto son fundamentales a la hora de integrar un proyecto.</p>
</div>

<div class="w3-quarter">
  <br><br>
<div class="w3-card w3-white">
  <img src="/img/via_sano_laboro.png" alt="Snow" style="width:100%">
  <div class="w3-container w3-grey">
  <h3>Via Sano Salud</h3>
  <h4>2017-Actualmente</h4>
  <p>Analista Funcional</p>
  </div>
  </div>
    <div class="w3-container" style="position:relative">
  <a onclick="document.getElementById('viasano').style.display='block'" class="w3-button w3-xlarge w3-circle w3-teal" style="position:absolute;top:-28px;right:24px">+</a>
  </div>
</div>

<div class="w3-quarter">
  <br><br>
<div class="w3-card w3-white">
  <img src="/img/presegur.jpg" alt="Lights" style="width:100%">
  <div class="w3-container w3-grey">
  <h3>Prosegur</h3>
  <h4>2016-2017</h4>
  <p>Analista funcional</p>
  </div>
  </div>
    <div class="w3-container" style="position:relative">
  <a onclick="document.getElementById('prosegur').style.display='block'" class="w3-button w3-xlarge w3-circle w3-teal" style="position:absolute;top:-28px;right:24px">+</a>
  </div>
</div>

<div class="w3-quarter">
  <br><br>
<div class="w3-card w3-white">
  <img src="/img/totvs.png" alt="Mountains" style="width:100%">
  <div class="w3-container w3-grey">
  <h3>TOTVS</h3>
  <h4>2014-2015</h4>
  <p>Analista Funcional y Desarrollo</p>
  </div>
  </div>
    <div class="w3-container" style="position:relative">
  <a onclick="document.getElementById('totvs').style.display='block'" class="w3-button w3-xlarge w3-circle w3-teal" style="position:absolute;top:-28px;right:24px">+</a>
  </div>
</div>


<div class="w3-quarter">
  <br><br>
<div class="w3-card w3-white">
  <img src="/img/cda.jpg" alt="Mountains" style="width:100%">
  <div class="w3-container w3-grey">
  <h3>CDA</h3>
  <h4>2012-2014</h4>
  <p>Analista Programador</p>
  </div>
  </div>
    <div class="w3-container" style="position:relative">
  <a onclick="document.getElementById('cda').style.display='block'" class="w3-button w3-xlarge w3-circle w3-teal" style="position:absolute;top:-28px;right:24px">+</a>
  </div>
</div>



<div class="w3-quarter">
  <br><br>
<div class="w3-card w3-white">
  <img src="/img/accenture_log.jpg" alt="Mountains" style="width:100%">
  <div class="w3-container w3-grey">
  <h3>ACCENTURE</h3>
  <h4>2010-2012</h4>
  <p>Programador</p>
  </div>
  </div>
  <div class="w3-container" style="position:relative">
  <a onclick="document.getElementById('acenture').style.display='block'" class="w3-button w3-xlarge w3-circle w3-teal" style="position:absolute;top:-28px;right:24px">+</a>
  </div>
</div>


<div class="w3-quarter">
  <br><br>
<div class="w3-card w3-white">
  <img src="/img/barbarella_logo.png" alt="Mountains" style="width:100%">
  <div class="w3-container w3-grey">
  <h3>BARBARELLA</h3>
  <h4>2009-2010</h4>
  <p>Administrativo</p>

  </div>

  </div>
  

  <div class="w3-container" style="position:relative">
  <a onclick="document.getElementById('barbarella').style.display='block'" class="w3-button w3-xlarge w3-circle w3-teal" style="position:absolute;top:-28px;right:24px">+</a>
  </div>

</div>

</div>




<!-- Estudios Row -->
<div class="w3-row-padding w3-center w3-padding-64" id="estudios">
    <h2>Estudios</h2>
    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">Tec. Analista de sistemas</p>
        </li>
        <li class="w3-padding-16"><b>Escuela de arte Davinci</b></li>
        <!--li class="w3-padding-16"><b>Materias</b> 34</li>
        <li class="w3-padding-16"><b>Aprobadas</b> 15</li>
        <li class="w3-padding-16"><b>Promedio</b> Support</li-->
        <li class="w3-padding-16">
          <h2 class="w3-wide">Cursando</h2>
          <span class="w3-opacity"> 3<small>er</small> cutrimestre</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <!--button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Plan de estudio </button-->
          <a href="https://davinci.edu.ar/carreras/analista-de-sistemas" class="w3-button w3-teal w3-padding-large" target="_blank"><i class="fa fa-check"></i> Plan de estudio  </a>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">PHP & MySQL Avanzado</p>
        </li>
       <li class="w3-padding-16"><b>E-leranig UTN</b></li>
        <!--li class="w3-padding-16"><b>Materias</b> 34</li>
        <li class="w3-padding-16"><b>Aprobadas</b> 15</li>
        <li class="w3-padding-16"><b>Promedio</b> Support</li-->
        <li class="w3-padding-16">
          <h2 class="w3-wide">Finalizado</h2>
          <span class="w3-opacity"> 2019<small>Septiembre</small></span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <a 
          href="https://www.sceu.frba.utn.edu.ar/e-learning/index.php?option=com_mtree&task=viewlink&link_id=275&Itemid=113" 
          class="w3-button w3-teal w3-padding-large" target="_blank"><i class="fa fa-check"></i> Plan de estudio  </a>
          
        </li>
      </ul>
    </div>


    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">.NET</p>
        </li>
        <li class="w3-padding-16"><b>Educacion IT.</b></li>
        <!--li class="w3-padding-16"><b>Materias</b> 34</li>
        <li class="w3-padding-16"><b>Aprobadas</b> 15</li>
        <li class="w3-padding-16"><b>Promedio</b> Support</li-->
        <li class="w3-padding-16">
          <h2 class="w3-wide">Cursando</h2>
          <span class="w3-opacity"> ASP NET </span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          
          <a 
          href="https://www.educacionit.com/curso-de-c-sharp-net" 
          class="w3-button w3-teal w3-padding-large" target="_blank"><i class="fa fa-check"></i> Plan de estudio  </a>

        </li>
      </ul>
    </div>



</div>







<div class="w3-row-padding w3-padding-64 w3-theme-l1 w3-center" id="desarrollos">
            
    
    
      <ul class="w3-ul">
        <li>                                 
          <button onclick="w3_open()" class="w3-btn w3-block w3-teal w3-hover-shadow"><h3><i class="fa fa-code"></i>Desarrollos</h3> </button>
        </li>
      </ul>
    
    



  <!--div class="w3-container" style="position:relative">
  <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
  style="position:absolute;top:-28px;right:24px">Portfolio</a>
  </div-->

</div>





<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Escribime</span></div>
      <!--h3>Address</h3>
      <p>Swing by for a cup of coffee, or whatever.</p-->
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Buenos Aires, Argentina</p>
      <!--p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  Argentina</p-->
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" onsubmit="return validar_mensaje();">
      
      <div class="w3-section">      
        <label>Nombre</label>
        <input class="w3-input" type="text" name="nombre" id="nombre" >
      </div>
      
      <div class="w3-section">      
        <label>Correo</label>
        <input class="w3-input" type="text" name="mail" id="mail" >
      </div>
      
      <div class="w3-section">      
        <label>Mensaje</label>
        <input class="w3-input" type="text" name="mensaje" id="mensaje" >
      </div>  
      
      <!--input class="w3-check" type="checkbox" checked name="Like">
      <label>I Like it!</label-->

      <button type="submit" class="w3-button w3-right w3-theme">Enviar</button>
      </form>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="/img/maphome2.jpg" class="w3-image w3-greyscale-min" style="width:100%;">

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">    
  
  <a class="w3-button w3-large w3-teal" href="https://www.linkedin.com/in/nestor-adrian-lagonegro-21b89a22" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>

  <!--a class="w3-button w3-large w3-teal" href="https://www.instagram.com/alagonegro" title="Google +" target="_blank"><i class="fa fa-instagram"></i></a-->


  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Ir arriba</span>
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>