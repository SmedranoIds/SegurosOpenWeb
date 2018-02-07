<?php
/**
 * Template Name: Openweb - Page Descubre
 * Template Post Type: page
 * Template Description: Plantilla para páginas sólo con cabecera y pie.
 *
 * @package Openweb
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();
?>
<!-- chat -->
<?php include('template-parts/chat.php'); ?>
<!-- end chat -->


<!-- page descubre -->
<?php
while (have_posts()) {
    the_post();
}
?>
<section class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <h1 class="titulo">Conoce las coberturas que HogarSeguro te ofrece:</h1>
    </div>
  </div>
  
</section>
<div id="carousel-example" class="carousel slide" data-ride="carousel" style="background: #eee; height: 620px;">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner text-center" role="listbox">
    <div class="item active">
      <div class="text-center picture casaIncendio">
      </div>
      <div class="carousel-caption">
        <h3>Incendio y/o rayo</h3>
        <div class="container">
          <div class="row">
            <p>Cubre daños materiales causados por un incendio y/o rayo.Deducible:$5,000</p>
        <p>Deducible:$5000</p>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture casita">
        <span class="grieta"></span>
      </div>
      <div class="carousel-caption">
        <h3>Terremoto</h3>
        <p>Cubre daños materiales causados por terremotos y/o erupción volcánica.</p>
        <p>Deducible:2% o 3% dependiendo la zona sísmica. Coaseguro:10%, 20% o 30% dependiendo la zona sísmica.</p>
        <p>Cobertura Opcional.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture nube">
        
      </div>
      <div class="carousel-caption">
        <h3>Riesgos Hidrometeorológicos</h3>
        <p>Cubre daños materiales ocasionados por avalanchas de loco,granizo, helada, huracán, inundación, inundación por lluvia, golpe de mar, marejada, nevada y vientos tempestuosos.</p>
        <p>Deducible: 1%,2% o 5% dependiendo la zona.</p>
        <p>Coaseguros:10%.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture arbolCaido">
        
      </div>
      <div class="carousel-caption">
        <h3>Extensión Cubierta</h3>
        <p>Cubre daños materiales causados por explosión, huelgas, naves aéreas, vehículos, humo, rotura o filtraciones accidentales de tuberías, caida de árboles o antenas parabólicas.</p>
        <p>Deducible:$5,000.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture carroCasita">
        
      </div>
      <div class="carousel-caption">
        <h3>Gastos Extraordinarios</h3>
        <p>Cubre gastos derivados de un siniestro amparado como la renta de casa temporal, gastos de mudanza o renta de bodega hasta por 9 meses.</p>
        <p>Deducible: 7 días de espera.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture casitaEscombros">
        
      </div>
      <div class="carousel-caption">
        <h3>Remoción de Escombros</h3>
        <p>Se cubren los gastos para remover los escombros como desmontaje, demolición o limpieza.</p>
        <p>Deducible: No aplica.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture ladron">
        
      </div>
      <div class="carousel-caption">
        <h3>Robo con Violencia</h3>
        <p>Se cubre el robo de los bienes del asegurado que sean sustraidos con violencia en el hogar como ropa, relojes o joyas.</p>
        <p>Deducible: $5,000.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture casitaEquipo">
        
      </div>
      <div class="carousel-caption">
        <h3>Equipo Electrónico</h3>
        <p>Se cubren los equipos electrónicos hasta 5 años de antiguedad que sufran daños a consecuencia de ciertos riesgos como corto circuito o defectos de fabricación.</p>
        <p>Deducible: $500.00 por equipo.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture casaCristales">
        
      </div>
      <div class="carousel-caption">
        <h3>Cristales</h3>
        <p>Queda cubierta la rotura accidental de cristales interiores y exteriores como lunas, cubiertas o vitrinas.</p>
        <p>Deducible:$500,00 por cristal.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture casaFamilia">
        
      </div>
      <div class="carousel-caption">
        <h3>Responsabilidad civil Privada y Familiar</h3>
        <p>Quedan amparados los daños ogastos que ocasione el asegurado y sus dependientes económicos, dentro y fuera del hogar.</p>
        <p>Deducible. No aplica.</p>
      </div>
    </div>
    <div class="item">
      <div class="text-center picture casaGrifo">
        
      </div>
      <div class="carousel-caption">
        <h3>Asistencia médica y en el hogar</h3>
        <p>Envío de personal experto en caso de emergencias con costo preferencial.</p>
        <p>Sólo aplica paquete Plus.</p>
      </div>
    </div>
  </div>
  <div>
    <!-- Indicators -->
  <ol class="carousel-indicators hidden-xs">
    <li data-target="#carousel-example" data-slide-to="0" class="active">
      <span class="pictureIndicador incendio"></span>
      <span>Incendio <br><br></span>
    </li>
    <li data-target="#carousel-example" data-slide-to="1">
      <span class="pictureIndicador terremoto"></span>
      <span>Terremoto <br><br></span>
    </li>
    <li data-target="#carousel-example" data-slide-to="2">
      <span class="pictureIndicador gota"></span>
      <span>Riesgos Hidro</span>
    </li>
    <li data-target="#carousel-example" data-slide-to="3">
      <span class="pictureIndicador extension"></span>
      <span>Extensión Cubierta</span>
    </li>
    <li data-target="#carousel-example" data-slide-to="4">
      <span class="pictureIndicador gastos"></span>
      <span>Gastos <br><br></span>
    </li>
    <li data-target="#carousel-example" data-slide-to="5">
      <span class="pictureIndicador escombros"></span>
      <span>Escombros <br><br></span>
    </li>
    <li data-target="#carousel-example" data-slide-to="6">
      <span class="pictureIndicador robo"></span>
      <span>Robo <br><br></span>
    </li>
    <li data-target="#carousel-example" data-slide-to="7">
      <span class="pictureIndicador equipo"></span>
      <span>Equipo <br><br></span>
    </li>
    <li data-target="#carousel-example" data-slide-to="8">
      <span class="pictureIndicador cristales"></span>
      <span>Cristales <br><br></span>
    </li>
    <li data-target="#carousel-example" data-slide-to="9">
      <span class="pictureIndicador familia"></span>
      <span>RC Familiar</span>
    </li>
    <li data-target="#carousel-example" data-slide-to="10">
      <span class="pictureIndicador asistencia"></span>
      <span>Asistencia <br><br></span>
    </li>
  </ol>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<section class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <h1 class="titulo"> <br></h1>
    </div>
  </div>
  
</section>


<?php get_footer();
