<style>
    body {
        background-color: #1e1e1e;
        color: #e4e4e4;
        font-family: monospace;
        font-size: 14px;
    }
</style>

<h1>Hola mundo, Inicio del curso PHP!</h1>
<p>PHP es un lenguaje de tipado dinamico, debil y gradual!</p>
<ul>
    <li><strong>Dinamico</strong>: Porque no es necesario declarar el tipo de la variable.</li>
    <li><strong>Debil</strong>: Porque va a intentar cambiar los tipos automaticamente, como javascript.</li>
    <li><strong>Gradual</strong>: Tambien podemos indicar opcionalmente el tipo de las variables. (En clases, funciones y algunos contextos en particular)</li>
</ul>

<?php
   header("Refresh:5"); // Refresca el sitio cada 5 segundos (para no tenes que dar F5 cada vez que hago un cambio)
   // Esto es un comentario en php

    echo "<h2>Variables</h2>";
    $vString = "Esto es una variable del tipo String";
    $vInteger = 22;
    $vBool = true;
    $vDate = date("Y-m-d H:n:s");
    echo $vString;
    echo "<br>".$vInteger;
    echo "<br>".$vBool;
    echo "<br>".$vDate;
    echo "<br>";


    // var_dump() sirve para ver el tipo, tamano y contenido de una variable. Ojo porque lo muestra sobre el documento.
    var_dump($vDate);

    // Tener en cuenta que los errores tambien los muestra en el documento.
    // Para descativarlo utilizar php.ini, desactivar php errors, configurarlo para asegurarnos de que el sitio no va mostrar informacion que no queremos brindar a posibles atacantes.
    echo "<br>";

    // gettype() sirve para ver el tipo de dato
    echo gettype($vDate)."<br>";

    // Metodos para revisar tipos de datos (hay muchos mas, revisar documentacion)
    echo is_string($vString)."<br>";
    echo is_integer($vInteger)."<br>";
    echo is_bool($vBool)."<br>";

    // Se puede hacer un forzado de tipo - type casting
    $nombre = (string) "Lucas";
    echo $nombre;


    // Escapar caracteres con \
    echo "<br>Este es mi nombre: $nombre";
    echo "<br>Este es mi nombre: \$nombre luego de escapar la variable";

   // Constantes (2 tipos)
   //   Globales - Se pueden utilizar en cualquier parte del sitio sin utilizar el simbolo de $.
   define("LENGUAJE","PHP");
   echo "<br>".LENGUAJE;
   //   Locales - Se pueden utilizar en clases o en lugares especificos donde estamos trabajando.
   const NOMBRE = "Lucas";
   echo "<br>".NOMBRE;

   // Se puede hacer validaciones del tipo is_bool, is_string, is_integer
   echo "<br>".is_bool($vBool);

   // if
   if ($nombre) {
      echo "<br><h4>Mi nombre</h4>";
   } else {
      echo "<br><h4>No tengo nombre</h4>";
   } // No es necesario el punto y coma en aca

   echo "<br>";

   if (1==2) {
      echo "1 es igual a 2";
   } else if (1==0) {
      echo "1 es igual a 0";
   } else {
      echo "1 es igual a 1";
   }

   echo "<br>".$nombre;

   // Tambien se puede partir el codigo php y colocar grandes fragmentos de html en medio, a modo de plantilla.
   $a = 1;
   $b = 2;
   if ($b >= $a) { ?>
      <h5>PHP partido - b >= a</h5>
<?php } else { ?>
      <h5>PHP partido - b < a</h5>
<?php } ?>

<?php
      // Switch
      switch ($a) {
        case 0:
            echo "a es igual a 0";
            break;
        case 1:
            echo "a es igual a 1";
            break;
        case 2:
            echo "a es igual a 2";
            break;
      }

   // Match
   // se utiliza como el switch, pero tiene una sintaxis mas clara y te permite almacenar el resultado de lo evaluado en una variable.
   $edad = 17;
   $salida = match (true) {
      $edad < 2   => "Sos un bebe, $nombre",
      $edad < 10  => "Sos un nene, $nombre",
      $edad < 18  => "Sos un adolescente, $nombre",
      $edad == 18 => "Sos mayor de edad recien cumplido, $nombre",
      $edad < 40  => "Sos un adulto joven, $nombre",
      $edad < 60  => "Sos un adulto viejo, $nombre",
      default     => "Estas al borde de ser un jubilado, $nombre",
   };

   echo "<br>".$salida;

   // Arrays y foreach 
   $arregloDeLenguajes = ["PHP","JavaScript","Python",1,2]; // Inicializacion
   $arregloDeLenguajes[3] = "Java"; // Asignacion sobreescribiendo posicion 4
   $arregloDeLenguajes[] = "TypeScript"; // Si no coloco donde lo asigno, me hace un append al final del array.
?>
<ul>
<?php
   // Para recorrer el array utilizo $foreach:
   foreach ($arregloDeLenguajes as $lenguaje) {
?>
   <li><?php echo $lenguaje ?></li>
<?php } ?>
</ul>

<?php
   // Tambien puedo obtener el indice con la palabra reservada "$key =>"
   foreach ($arregloDeLenguajes as $key => $lenguaje) {
?>
   <li><?php echo $key." ".$lenguaje ?></li>
<?php } ?>
</ul>

<?php
      // Arrays Asociativos (Como un diccionario de datos)
      $persona = [
         "name" => "Miguel",
         "age" => 78,
         "isDev" => true,
         "languages" => ["PHP","JavaScript","Python"],
      ];
      $person["name"] = "Carlos"; // Para modificar el valor del la llave "name"
      $person["languages"][] = "Java"; // Para agregar al final del array languages el valor "Java"
      echo "<br>".$person;

      // Llamadas a API
      const API_URL = "https://whenisthenextmcufilm.com/api";

      // Inicializacion de nueva sesion de cURL; ch = cURL handle
      $ch = curl_init(API_URL);
   
      // Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      /*
         Ejecutar la peticion
         y guardamos el resultado
       */
      $result = curl_exec($ch);
      $data = json_decode($result,true);
      curl_close($ch);

      var_dump($data);
?>
   <!-- Otra forma de escribir un echo rapido es con <?= "valor a imprimir" ?> -->
   <img src="<?= $data["poster_url"]; ?>">







