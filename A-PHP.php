<?php
// -----------------------------------------------------------------------------------------------------------
// ERRORES
// -----------------------------------------------------------------------------------------------------------
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// -----------------------------------------------------------------------------------------------------------
// HEADER (envia informacion extra en encabezado)(redirecciona, autenticaciones, cookies, cache)(viaja por detras del servidor)
//         https://platzi.com/clases/3151-php-entornos-funciones/49809-redirecciones/
// -----------------------------------------------------------------------------------------------------------
header('location:index.php'); //redirecciona a index.php
exit; //PONER ESTO AL FINAL PARA SEGURIDAD
header("Refresh: 5; URL=index.php"); //Refrescar
// -----------------------------------------------------------------------------------------------------------
// INCLUDE
// -----------------------------------------------------------------------------------------------------------
include 'archivo.php'; //si no anda, emite warning
include_once 'archivo.php'; //solo se puede aplicar una vez
require 'archivo.php'; //si no anda, para la ejecucion de la página
require_once 'archivo.php'; //el más estricto. EL MEJOR PARA USAR
// -----------------------------------------------------------------------------------------------------------
// DEBUGEAR
// -----------------------------------------------------------------------------------------------------------
echo "<pre>" . var_dump($array) . "</pre>"; // PARA DEBUGEAR, VER CONTENIDO Y UBICACION DE UN ARRAY
//dd('variable'); //es necesario instarlo: https://platzi.com/clases/3144-php-cookies-sesiones/49692-la-funcion-dd-en-php/
// -----------------------------------------------------------------------------------------------------------
// STRING
// -----------------------------------------------------------------------------------------------------------
ucfirst('hola'); //PRIMER LETRA EN MAYUSCULA
lcfirst('Hola'); //PRIMER LETRA EN MINUSUCLA
substr($variableLarga, 0, 200); //recorta la variable de 0 hasta 200 
preg_match("/[a-zA-Z ]", $variable); //validar con expresiones regulares
filter_var($var, FILTER_VALIDATE_EMAIL); //FILTER_VALIDATE tiene un par de opciones para validar campos
strlen("NUMERO DE CARACTERES"); //DEVUELVE LONGITUD DE STR
strpos("NUMERO DE CARACTERES", "DE"); //DEVUELVE UBICACION DE "DE"
echo str_replace("CARACTERES", "OBEJAS", "NUMERO DE CARACTERES"); //REEMPLAZA: NUMERO DE OBEJAS
echo strtolower("MAYUSCULAS A MINUSCULAS");
echo strtoupper("minusculas a mayusculas");
echo trim("    hola    ");  //LIMPIA LOS ESPACIOS EN BLANCO
echo gettype($numero); // SABER QUE TIPO DE VARIABLE ES
echo is_string($var); //DEVUELVE BOOLEAN, PONER is_ Y APARECEN TODOS LOS TIPOS
is_numeric($var); //DEVUELVE BOOLEAN SI ES INT O STRING NUMERICO
echo isset($var);   //BOOLEAN SI LA VAR EXISTE O NO
echo empty($var);   //TRUE SI ESTÁ VACÍA
unset($var);  //BORRA LA VARIABLE
//Si tenemos una factura se imprima de la siguiente forma.
echo str_pad($code, 8, '#'); //Vamos a tener 8 espacio con 8 carácteres, LOS RESTANTES VAN A SER #
echo str_pad($code, 8, '#', STR_PAD_BOTH); //Ambos lados
echo str_pad($code, 8, '#', STR_PAD_LEFT); //izquierda
// -----------------------------------------------------------------------------------------------------------
// ARRAY
// -----------------------------------------------------------------------------------------------------------
explode(', ', ('javascript, php, laravel')); //convierte string en array separándolos por el primer argumento
implode(', ', ["javascript", "php", "laravel"]); //convierte array a string separándolos por el primer argumento
pg_num_rows($array);    //muestra la cantidad de espacios que tiene ocupados una query
array_rand($array); //imprime elem aleatorio de un array
array_search("Rels B", $array);  //busca dentro de un array y devuelve el índice
array_key_exists('key', $array); //comprueba que existe el key en el array
in_array($array, $valor); //Comprueba si un valor existe en un array
count($array); //cuenta el número de elementos
sizeof($array); //cuenta el número de elementos
unset($array[2]);   //elimina el índice 2
array_slice($array, $posicion); //elimina un elemento ORDENANDO los inidices
array_pop($array);  //elimina el ultimo valor.
array_shift($array); //elimina el primer valor.
array_unshift($array, "Rels B"); //añade un valor al principio.
array_push($array, "Rels B"); //añade un valor al final.
array_splice($array, $posicion, 0, $elemento); //Añade un elemento en índice
array_walk($array, 'funcion'); //itera el array y por cada iteración se llama a una función, sirve por ejemplo para ponerle mayusculas
array_chunk($array, $cada_cuantos_indices_divide); //Divide un array en fragmentos.
sort($array); //ordena array por orden alfabético o numérico
rsort($array); //Ordena un array en orden inverso.
arsort($array); //ordena array por orden alfabético invertido
ksort($array); //Ordena un array por clave.
krsort($array); //Ordena un array por clave en orden inverso.
array_reverse($array); //Invierte orden de array numérico
array_flip($array); //Intercambia todas las claves de un array con sus valores asociados.
array_diff($array1, $array2); //compara 2 arrays y muestra las diferencias existentes entre los 2.
array_diff_assoc($array1, $array2); //compara 2 arrays y muestra las diferencias existentes entre los 2 con un chequeo adicional de índices
array_merge($array1, $array2); //une, junta los arrays sin indice
array_merge_recursive($array1, $array2); //une, junta 2 arrays con indice en uno mismo
array_combine($indice, $key); //une, junta 2 arrays en un array bidimiencional array1=indice array2=key.

$array = array("Batman", "Superman", "HULK");
$array2 = ["Batman", "Superman", "HULK"];
echo $array[2];
$array[] = "Spiderman";   //AGREGA ELEM
$ArrayAsociativo = array(    //MANEJA INDICES
    'nombre' => 'Juan Cruz',
    'apellido' => 'Cordoneda',
);
echo $ArrayAsociativo['apellido'];

$ArrayMultiDimensional = array(
    array(
        'nombre' => 'Juan Cruz',
        'apellido' => 'Cordoneda',
    ),
    array(
        'nombre' => 'Justo',
        'apellido' => 'González',
    ),
    array(
        'nombre' => 'Esteban',
        'apellido' => 'Perez',
    )
);
echo $ArrayMultiDimensional[1]['nombre']; //Juan Cruz

for ($x = 0; $x < count($lista); $x++) {    //iterador
    echo $lista[$x] . "<br>";
}

foreach ($lista as &$value) {
    $value = $value * 2;
}

$i = 0;
while($i < count($users)) //iterador
{
	echo $users[$i]."\n";
	$i++;
}
// -----------------------------------------------------------------------------------------------------------
// fecha
// -----------------------------------------------------------------------------------------------------------
echo date('d-m-Y');  //GENERA TODO TIPO DE FECHA Y HORARIO
$date = date_create(); //crea un obejto de tipo datetime, para echo hay que formatear
$intervalo_de_tiempo = date_interval_create_from_date_string('5 days');
date_add($date, $intervalo_de_tiempo); //agrega tiempo
$date = date_format($date, 'Y/m/d H:i:s'); //formatea 
$fecha_en_formato_unix = strtotime($date); //formato unix (en segundos)
echo time(); //muestra codigo de hora que se actualiza todo el tiempo
date_default_timezone_get('América/Argentina/Buenos Aires'); //zona horaria
// -----------------------------------------------------------------------------------------------------------
// fecha con POO
// -----------------------------------------------------------------------------------------------------------
$intervalo_de_tiempo = DateInterval::createFromDateString('5 days');
$date = new DateTime(); //fecha actual
$date2 = new DateTime('2021/04/04'); //fecha configurada
$date2 = DateTime::createFromFormat("l j F Y", "Sunday 17 April 2022"); //fecha desde un formato dado
$date->add($intervalo_de_tiempo); //agrega tiempo
$date->modify("+1 day +2 months"); //Modificar una fecha
$intervalo_diferencia_de_tiempo = $date2->diff($date); //$date2 - $date (OBJETO INTERVAL)
$date->format('Y-m-d'); //formatea 
$intervalo_diferencia_de_tiempo->format("%y años, %m meses, %d días");; //$date2 - $date (OBJETO INTERVAL)
$date_inmutable = new DateTimeImmutable(); //fechas inmutables (no se modifican)
// -----------------------------------------------------------------------------------------------------------
// fechas en funciones (estas se encuentran en https://platzi.com/clases/3144-php-cookies-sesiones/49705-expande-tu-arsenal-de-funciones-para-fechas/ )
// -----------------------------------------------------------------------------------------------------------
//echo get_full_date('2022-04-25 16:35:45');//Lunes 25 de Abril de 2022 a las 4:35 pm
//echo get_time_from_timestamp('24:32:45');//6:32 pm
//echo translate_time('1 dia', false)//1 day
// -----------------------------------------------------------------------------------------------------------
// matematica
// -----------------------------------------------------------------------------------------------------------
echo sqrt(10); //10 al cuadrado
echo rand(1, 10); //random entre minimo y maximo 
echo round(7.899, 2); //redondea el 2 es la cantidad de decimales a poner
$num_length = strlen((string)$num); //lenght de numeros
// -----------------------------------------------------------------------------------------------------------
// CONSTANTES  (contenedor de informacion que no pueden cambiar)
//              https://platzi.com/clases/3151-php-entornos-funciones/49808-variables-superglobales/
// -----------------------------------------------------------------------------------------------------------
define('nombre', 'Juan Cruz'); //FORMA 1 DE CONSTANTE
const PI = 3.1416;            //FORMA 2 DE CONSTANTE
echo nombre; //sin $
echo $GLOBALS; //MUESTRA TODAS LAS VARIABLES GLOBALES Y CREADAS
echo __LINE__;  //numero de la linea en la que estoy
echo __FILE__; //ubic y nombre del archivo
echo __FUNCTION__; //se muestra si esta dentro de una funcion e imprime la funcion;
echo $_ENV; //Entorno donde se ejecuta php
echo $_REQUEST; //contiene todos los $_GET, $_POST and $_COOKIE.
// -----------------------------------------------------------------------------------------------------------
// VARIABLES DE SERVIDOR
// -----------------------------------------------------------------------------------------------------------
echo $_SERVER['SERVER_ADDR']; //MUESTRA LA DIRECCION IP DEL ORDENADOR CONTENEDOR
echo $_SERVER['REMOTE_ADDR']; //MUESTRA LA IP DEL CLIENTE
echo $_SERVER['SERVER_NAME']; //MUESTRA EL DOMINIO
echo $_SERVER['SERVER_SOFTWARE']; //MUESTRA EL SOFTWARE QUE LEVANTA EL SERVIDOR
echo $_SERVER['HTTP_USER_AGENT']; //MUESTRA EL NAVEGADOR WEB QUE ACCEDE A LA PAG
echo $_SERVER['HTTP_USER_AGENT']; //MUESTRA EL NAVEGADOR WEB QUE ACCEDE A LA PAG
// -----------------------------------------------------------------------------------------------------------
// SESIONES (similares a cookies, sirven para iniciar sesion, datos encriptados)
// -----------------------------------------------------------------------------------------------------------
session_start();  //Las sesiones se pueden iniciar usando la función
$_SESSION['Usuario'] = "Juan Cruz"; // creando una session
session_destroy(); //cierro la sesion
// -----------------------------------------------------------------------------------------------------------
// COOKIES (fichero que se almacena en el equipo del usuario, guardando datos o rastrear info) 
//         https://platzi.com/clases/3144-php-cookies-sesiones/49694-trabajando-con-cookies/
// -----------------------------------------------------------------------------------------------------------
setcookie(name: 'ejemplo', value: 'valor', expires_or_options: 0, path: '/', httponly: true); //crea cookie (path:inidica donde se va subir la cookie)
setcookie("un año", "cookie de un año", time() + (60 * 60 * 24 * 365)); //cookie con expiración temporal (1 año)
echo $_COOKIE['micookie']; // para verlas, consola, application, cookies
unset($_COOKIE['micookie']);               //borrar cookie paso 1
setcookie('micookie', '', time() - 100);  //borrar cookie paso 2 (caducarla)  
// -----------------------------------------------------------------------------------------------------------
// PRE-OPERADORES
// -----------------------------------------------------------------------------------------------------------
$year = 2021;
++$year; //1+$year
--$year; //1-$year;
// -----------------------------------------------------------------------------------------------------------
// EXCEPCIONES (capturar excepciones en código susceptible a error)
//              https://platzi.com/clases/3144-php-cookies-sesiones/49699-revisando-los-metodos-de-las-excepciones/
// -----------------------------------------------------------------------------------------------------------
try {
    if (isset($_GET['ID'])) {
        echo "anda";
    } else {
        throw new Exception('Error de lógica');     //LANZAR UNA EXCEPCION
    }
} catch (Exception $e) {   //si se lanza una exce el catch se activa
    echo 'Ha habido un error: ' . $e->getMessage(); //lanza 'Error de lógica'
} finally {  //cuando se termine de ejecutar todo...
    echo "todo correcto";
}
$e->__construct(); // Constructor de la excepción
$e->getMessage(); // Obtiene el mensaje de Excepción
$e->getPrevious(); // Devuelve la excepción anterior
$e->getCode(); // Obtiene el código de una excepción
$e->getFile(); // Obtiene el fichero en el que se creó la excepción
$e->getLine(); // Obtiene la línea en el que se creó la excepción
$e->getTrace(); // Obtiene la traza de la pila
$e->getTraceAsString(); // Obtiene la traza de la pila como una cadena de caracteres
$e->__toString(); // Representación de la excepción en formato cadena
// -----------------------------------------------------------------------------------------------------------
// EXCEPCIONES PERSONALIZADAS EN CLASES https://platzi.com/clases/3144-php-cookies-sesiones/49700-crea-tus-propias-excepciones/
// -----------------------------------------------------------------------------------------------------------
class GatoException extends Exception
{
    public function getMeow()
    {
        return "Meow";
    }
}

class ConejoException extends Exception
{
    public function getRabbit()
    {
        return "Conejo";
    }
}

try {
    $exception = readline("Excepcion a lanzar: ");
    if ($exception == "conejo")
        throw new GatoException("Meow");
    else
        throw new ConejoException("Conejo");
} catch (GatoException $e) {
    echo $e->getMessage() . "\n";
    echo $e->getMeow();
} catch (ConejoException $e) {
    echo $e->getMessage() . "\n";
    echo $e->getRabbit();
} finally {
    echo "Se ha lanzado la excepcion";
}
// -----------------------------------------------------------------------------------------------------------
// FUNCIONES
// -----------------------------------------------------------------------------------------------------------
$frase = "esta frase es global, pero no se ejecuta dentro de la funcion $name";
function param(int $p1, bool $p2 = true, array $p3 = array(23, 32)):string
{
    global $frase;  //la trae del global
    return 'AHORA SI:' . $frase;
}
$frase = param(".");   //'AHORA SI:' . $frase; 
// -----------------------------------------------------------------------------------------------------------
// FUNCIONES VARIABLES https://platzi.com/clases/3151-php-entornos-funciones/49758-funciones-variables/
// -----------------------------------------------------------------------------------------------------------
function suma($n1, $n2)
{
    return $n1() + $n2(); // getNumber2() + getNumber3()
}
function getNumber2()
{
    return 7;
}
function getNumber3()
{
    return 3;
}
suma('getNumber2', 'getNumber3');

// -----------------------------------------------------------------------------------------------------------
// FUNCIONES ANONIMAS (VARIABLES QUE REQUIEREN LOGICA)
//                    https://platzi.com/clases/3151-php-entornos-funciones/49762-funciones-anonimas/
// -----------------------------------------------------------------------------------------------------------
$es = function ($name) { //funcion anonima
    return "Hola, {$name}";
};
function saludar(Closure $funcion_anonima, $name) //Closure es un parametro que indica que sea una funcion
{
    return $funcion_anonima($name);
}
echo saludar($es, "Lynda");

// -----------------------------------------------------------------------------------------------------------
// FUNCIONES ARROW https://platzi.com/clases/3151-php-entornos-funciones/49760-arrow-functions/
// -----------------------------------------------------------------------------------------------------------
$cajero = 10;
$add_cajero = fn($add) => $cajero + $add;
echo $add_cajero(20);

$where_am_i = "México";
$change_where_am_i = fn(&$where_am_i) => $where_am_i = "Colombia";
$change_where_am_i($where_am_i);
echo $where_am_i; // Colombia
// -----------------------------------------------------------------------------------------------------------
// SWITCH  https://platzi.com/clases/3151-php-entornos-funciones/49810-match/
// -----------------------------------------------------------------------------------------------------------
$dia = 2;
switch ($dia) {
    case 1:
        echo "lunes";
        break;
    case 2:
        echo "martes";
        break;
    default:            //ES EL ELSE DEL SWITCH
        echo "NI IDEA PA";
        break;
}
// -----------------------------------------------------------------------------------------------------------
// MATCH (SIMILAR AL SWITCH) https://platzi.com/clases/3151-php-entornos-funciones/49810-match/
// -----------------------------------------------------------------------------------------------------------
function get_country_name_match($country)
{
    return match ($country) {
        "MX" => "México",
        "COL" => "Colombia",
        "EUA" => "Estados Unidos Americanos",
        default => "Lo siento, no conozco ese país"
    };
}
echo get_country_name_match("LKASJDKLASDNLAS") . PHP_EOL;
// -----------------------------------------------------------------------------------------------------------
// DO WHILE (EJECUTA POR UNA VEZ UNA SENTENCIA DE CODIGO Y LUEGO ENTRA EN EL SICLO WHILE)
// -----------------------------------------------------------------------------------------------------------
$edad = 18;
$contador = 1;
do {
    echo "ejecución" . $contador;
    $contador++;
} while ($edad >= 18 && $contador <= 10);
// -----------------------------------------------------------------------------------------------------------
// FICHEROS
// -----------------------------------------------------------------------------------------------------------
$archivo = fopen("fichero.txt", "a+"); //abrir archivo

while (!feof($archivo)) {   //itera linea por linea
    $contenido = fgets($archivo);   //leer archivo
    echo $contenido . "<br/>";
}

if (file_exists('fichero1.txt')) {
    fwrite($archivo, "Soy un texto");    //escribir archivo
    copy('fichero1.txt', 'fichero2.txt') or die("error al copiar"); //copiar fichero en otro
    rename('fichero1.txt', 'ficherojuan.txt');  //renombrar archivo
    unlink('ficherojuan.txt') or die("error al borrar"); //borrar archivo
}
fclose($archivo); //cierra archivo
// -----------------------------------------------------------------------------------------------------------
// DIRECTORIOS (CARPETAS)
// -----------------------------------------------------------------------------------------------------------
if (!is_dir('mi_carpeta')) {
    mkdir('mi_carpeta', 0777) or die("error al crear"); //crea directorio
}
$abrir = opendir('mi_carpeta');   //abre la carpeta
$archivo = readdir($abrir);       //lee la carpeta
rmdir('mi_carpeta');          //borrar dir
// -----------------------------------------------------------------------------------------------------------
// POO CLASES
// -----------------------------------------------------------------------------------------------------------
class Coche
{
    public const PAGINATE = 25; //VARIABLES CONSTANTES
    public $marca; //podemos acceder a el desde cualquier lugar
    protected $modelo; //podemos acceder desde la clase que los define y heredados
    private $color; //podemos acceder desde la clase solamente.

    public function __construct($color)  //Constructor
    {
        $this->color = $color;
    }
    public function __destruct()   //cuadno el objeto es utlizado, se destruye
    {
        echo "destruyendo el objeto";
    }
    public function __toString()  //se ejecuta al instanciar el objeto
    {
        return "hola, {$this->modelo}";
    }

    public function getColor() //metodos (por defecto public)
    {
        return $this->color;   //busca en esta clase la prop color
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function mostrarInfo(Coche $objeto) //mostrador de info con objeto como parametro
    {
        $info = "<h1>Info del coche:</h1>";
        $info .= "modelo:" . $objeto->modelo;
        $info .= "marca:" . $objeto->marca;
        $info .= "color:" . $objeto->color;
    }
}
$coche = new Coche("rojo");       //instanciar clase
echo $coche->marca;    //aceder sus variables publicas
echo $coche->getColor();    //aceder a sus metodos
echo $coche->mostrarInfo($coche);
echo var_dump($coche);
//metodos
class_exists('Clase'); //boolean si existe la clase
var_dump(get_class_methods($coche)); //muestra métodos de clase
// -----------------------------------------------------------------------------------------------------------
// POO HERENCIA
// -----------------------------------------------------------------------------------------------------------
class Ferrari extends Coche
{
    private $serie;
    public function __construct($serie)
    {
        parent::__construct("verde"); //super en php, llama al constructor de clase padre para heredar
        $this->serie = $serie;
    }
}

// -----------------------------------------------------------------------------------------------------------
// INTERFAZ  (define que métodos va a tener mi clase)(deben ser finas y especificas)
//           (es un contrato, la clase que la implemente esta obligada a implementar sus metodos)
// -----------------------------------------------------------------------------------------------------------
interface Computadora
{
    public function prender();
    public function apagar();
    public function reiniciar();
    public function detectarUSB();
}
class iMac implements Computadora
{
    public function prender()
    {
    }
    public function apagar()
    {
    }
    public function reiniciar()
    {
    }
    public function detectarUSB()
    {
    }
}
// -----------------------------------------------------------------------------------------------------------
//CLASES ESTÁTICAS (prop y metodos normales que NO NECESITAN INSTANCIAR)
// -----------------------------------------------------------------------------------------------------------
class Estatica
{
    public static $color;
    public static $entorno;
    public static function getColor()
    {
        return self::$color;  //self:: es un this estatico, con el accedes a las variables
    }
    public static function setColor($color)
    {
        self::$color = $color;
    }

    //constant //no varía y es estática
}
echo Estatica::getColor();
Estatica::setColor("rojo");
$noEstatica = new Estatica(); //se puede instanciar
echo $noEstatica::getColor();
// -----------------------------------------------------------------------------------------------------------
// CLASE ABSTRACTA  (NO SE PUEDE INSTANCIAR PERO SIRVE DE MOLDE)
// -----------------------------------------------------------------------------------------------------------
abstract class Ordenador
{
    public $encendido;
    abstract public function encender();
}
class Intel extends Ordenador
{
    public $software;
    public function encender()
    {
        $this->encendido = true;
    }
}
// -----------------------------------------------------------------------------------------------------------
// TRAIT (clases con siertos metodos que podemos utilzar en otras clases)(plantilla de clases)
//        https://platzi.com/clases/3144-php-cookies-sesiones/49711-traits/
// -----------------------------------------------------------------------------------------------------------
trait Utilidades
{
    public function MostrarNombre()
    {
        echo $this->nombre;
    }
}
class Coches
{
    public $nombre;
    use Utilidades;
}
$coche3 = new Coches();
$coche3->nombre = 'Ferrari';
$coche3->MostrarNombre();
// -----------------------------------------------------------------------------------------------------------
// BASE DE DATOS 
// -----------------------------------------------------------------------------------------------------------
$enlace = mysqli_connect("127.0.0.1", "mi_usuario", "mi_contraseña", "mi_bd");
if (mysqli_connect_errno()) {   //CHECKEADOR
    echo "ERROR DE CONEXION: ".mysqli_connect_error() ;
} else {
    echo "CONEXION REALIZADA";
}
// select
$query = mysqli_query($local, "SELECT * FROM TABLA"); //EJECUCION DE QUERY
$resultado = mysqli_fetch_assoc($query); //DEVUELVE 1 REGISTRO (OPCION 1)
while ($row = mysqli_fetch_assoc($query)) {  //ITERA Y DEVUELVE TODOS LOS REGISTROS
    echo $row['descripcion'];
    echo $row['nombre'];
}
// insert
$insert = mysqli_query($local, "INSERT INTO tabla(a,b,c,d)"); //EJECUCION DE QUERY
// -----------------------------------------------------------------------------------------------------------
// BASE DE DATOS POO https://platzi.com/clases/4228-php-sql/54838-refactor-de-la-conexion-con-clases/
// -----------------------------------------------------------------------------------------------------------
use Doctrine\DBAL\Configuration;
class Conexion extends Configuration {
  private static $instancia;
  private $conexion;

  private function __construct()
  {
    $this->crear_conexion();
  }

    //crea la instancia 
  public static function getInstancia()
  {
    if (!self::$instancia instanceof self)
      self::$instancia = new self();
    return self::$instancia;
  }

  private function crear_conexion()
  {
    $mysqli = new \mysqli($this->server, $this->user, $this->pass, $this->db, $this->port);
    $this->validar_conexion($mysqli);
    $this->set_names($mysqli);
    $this->conexion = $mysqli;
  }
  
  private function set_names($mysqli)
  {
    $setnames = $mysqli->prepare("SET NAMES 'utf8'");
    $setnames->execute();
  }

  private function validar_conexion(&$mysqli)
  {
    if ($mysqli->connect_errno)
      die("Falló la conexión: {$mysqli->connect_error}");
  }

  public function get_database_conexion()
  {
    return $this->conexion;
  }
}

class IncomesController {

    private $connection;
    
    public function __construct() {
        $this->connection = Conexion::getInstancia()->get_database_conexion();
    }

    public function index() {

        $stmt = $this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();
        // opcion 1
        $results = $stmt->fetchAll();
        // opcion 2
        $amount = 0;$description = 0;
        $stmt->bindColumn('amount',$amount);
        $stmt->bindColumn('description',$description);
        while($stmt->fetch()){
            echo "Gastaste $amount USD en: $description\n";
        }
    }

    public function store($data) {

        $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES (:payment_method, :type, :date, :amount, :description)");

        $stmt->bindValue(":payment_method", $data["payment_method"]);
        $stmt->bindValue(":type", $data["type"]);
        $stmt->bindValue(":date", $data["date"]);
        $stmt->bindValue(":amount", $data["amount"]);
        $stmt->bindValue(":description", $data["description"]);
        $stmt->execute();
    }

    public function show($id) {
        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=:id;");
        $stmt->execute([
            ":id" => $id
        ]);
    }
    
    public function update($data, $id) {

        $stmt = $this->connection->prepare("UPDATE incomes SET 
            payment_method = :payment_method, 
            type = :type, 
            date = :date, 
            amount = :amount, 
            description = :description
        WHERE id=:id;");

        $stmt->execute([
            ":id" => $id,
            ":payment_method" => $data["payment_method"],
            ":type" => $data["type"],
            ":date" => $data["date"],
            ":amount" => $data["amount"],
            ":description" => $data["description"],
        ]);

    }
    public function destroy($id) {
        $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute([
            ":id" => $id
        ]);
    }
    
}
// -----------------------------------------------------------------------------------------------------------
// INCLUDE AUTOLOAD
// -----------------------------------------------------------------------------------------------------------
function autocargarClases($class)
{
    require_once 'carpeta/' . $class . 'php';  //carga todos los archvios de las clases q yo tenga
}
spl_autoload_register('autocargarClases');
// -----------------------------------------------------------------------------------------------------------
// ESPACIOS DE NOMBRES Y PAQUETES
// -----------------------------------------------------------------------------------------------------------
//namespace PaqueteAdministrador //crea un paquete 
use PaqueteAdministrador; //inserta clase dentro de paquete
// -----------------------------------------------------------------------------------------------------------
// SYSTEM COMANDOS LINUX
// -----------------------------------------------------------------------------------------------------------
//COMANDOS GENERADORES DEL ARCHIVO A ENVIAR
system('rm *.html');  //borra existente
system('curl imagenURL >    imagen.jpg'); //descarga img y crea archivo
system('php usuario_archivados.php > usuarios_archivos.html'); //convierte archivo php a html
// -----------------------------------------------------------------------------------------------------------
// GENERADOR DE RUTAS
// -----------------------------------------------------------------------------------------------------------
$ROOT = realpath($_SERVER["DOCUMENT_ROOT"]); //RETORNA LA RUTA DEL DOCUMENTO = home/www EN LA VARIABLE ROOT
//realpath(); //expande todos los enlaces simbólicos y resuelve las referencias de caracteres '/./', '/../' y '/', en la ruta de
// entrada dada por path y devuelve el nombre de la ruta absoluta canonizado.
// -----------------------------------------------------------------------------------------------------------
// GOTO (SALTEA CODIGO)
// -----------------------------------------------------------------------------------------------------------
goto marca;
echo "jaz";
echo "jaz";
echo "jaz";
echo "jaz";
marca:
echo "Me saltié 4 modelos ";
// -----------------------------------------------------------------------------------------------------------
// PHP UNIT 
// -----------------------------------------------------------------------------------------------------------
// Validate.php
use Validate;

function password($value)
{
    return (bool) password_hash($value, PASSWORD_BCRYPT);
}
// ValidateTest.php

function test_password()
{
    // $password = Validate::password('1234567');
    // $this->assertTrue($password);
}
// -----------------------------------------------------------------------------------------------------------
// FORMULARIO GET Y POST
// -----------------------------------------------------------------------------------------------------------
?>
<form action="get" action="recibir.php"></form> //redirige y manda variables por get
<form action="post" action="recibir.php"></form> //redirige y manda variables por post MAS SEGURO
<?php
var_dump($_GET); //MUESTRA EL ARRAY GET Y SU CONTENIDO
var_dump($_POST); //MUESTRA EL ARRAY POST Y SU CONTENIDO

if (isset($_GET['numero'])) {       //SI LA VARIABLE EXISTE...
    $numero = (int)$_GET['numero']; //CASTEA LA VARIABLE, LE CAMBIA EL TIPO
}

$apellido = isset($_POST['apellidos']) ? $_POST['apelldios'] : false; //si existe, se le da ese valor 

preg_match("/[a-zA-Z ]", $variable); //valida con expresiones regulares
filter_var($var, FILTER_VALIDATE_EMAIL); //FILTER_VALIDATE tiene un par de opciones para validar campos
// -----------------------------------------------------------------------------------------------------------
// UPLOAD DE IMG
// -----------------------------------------------------------------------------------------------------------
?>
<h1>Info del coche:</h1>
"modelo:".$objeto->$modelo;
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="archivo">
    <input type="submit" name="Enviar">
</form>
<h1>Listado de imagenes</h1>
<?php
$gestor = opendir('./mi_carpeta');   //ABRE LA CARPETA CONTENEDORA DE IMG
if ($gestor) {     //SI EXISTE
    while (($image = readdir($gestor)) !== false) {   //MIENTRAS QUE LEA UNA IMAGEN
        if ($image != '.' && $image != '..') {
            echo "<img src='images/$image' width='200px'/><br/>";  //IMPRIME
        }
    }
}
//  EN UPLOAD.PHP .....
$archivo = $_FILES['archivo'];
$nombre = $archivo['name'];
$tipo = $archivo['type'];
if ($tipo = "image/jpg" || $tipo = "image/jpeg" || $tipo = "image/png" || $tipo = "image/gif") { //SI ES DE ESTOS TIPOS
    if (!is_dir('mi_carpeta')) {  //SI LA CARPETA NO EXISTE
        mkdir('mi_carpeta', 0777) or die("error al crear"); //crea directorio
    }
    move_uploaded_file($archivo['tmp_name'], 'mi_carpeta/' . $nombre);  //sube el archivo a la carpeta
    header("Refresh: 5; URL=index.php");
    echo "IMAGEN SUBIDA";
} else {
    header("Refresh: 5; URL=index.php");
    echo "subi una imagen pa";
}

// -----------------------------------------------------------------------------------------------------------
// THICKBOX (VENTANA EMERGENTE)
// -----------------------------------------------------------------------------------------------------------
echo "<td class='opbutton1'><a href='precintos_rotos_listado.php?height=500&width=700&nId_Equipo=" . trim($aRowER["id_equipo"]) . "&cEquipo=" . trim($aRowER["nombre"]) . "'title='' class='thickbox'>Mostrar</a></td>\n";

?>
<!-- PASAR VARIABLES DE JAVASCRIPT A PHP -->

<!-- js -->
<script type="text/javascript">
    function enviar() {
        var superficie = document.getElementById("superficie").value;
        window.location = "graba_metros.php?superficie=" + superficie;
    }
</script>
// -----------------------------------------------------------------------------------------------------------
// FRONT CONTROLLER //https://platzi.com/clases/3144-php-cookies-sesiones/49709-front-controller/
// -----------------------------------------------------------------------------------------------------------
<?php
$page = $_GET['page'] ?? null;

switch ($page) {
    case 'home':
        require("pages/home.php");
        break;
    case 'contact':
        require("pages/contact.php");
        break;
    case 'services':
        require("pages/services.php");
        break;
        deafult:
        require("pages/404.php");
        break;
}
?>
<!-- --------------------------------------------------------------------------------------------------------------------- -->
<!-- SELECT PHP -->
<!-- --------------------------------------------------------------------------------------------------------------------- -->
<form method="POST" id="fPlanilla" name="fPlanilla" action="planilla_pago.php">
    <input type="hidden" name="cCompleto" value='<?php echo $cNombre_Usuario; ?>' />
    <input type="hidden" name="nId_Usuario" value='<?php echo $nId_Usuario; ?>' />
    <input type="hidden" name="nId_Sistema" value='<?php echo $nId_Sistema; ?>' />
    <input type="hidden" name="nId_Comuna" id="nId_Comuna" value='' />
    <input type="hidden" name="fFecha" id="fFecha" value='' />
    <table id='comunas' border="0" cellpadding="5" cellspacing="2" align="center">
        <tr>
            <th class='topbar' colspan='10'>Planilla pago</th>
        </tr>
        <tr>
            <th class='topbar'>Comuna</th>
            <td class='data1'>
                <?php
                echo "<select size='1' name='nComuna' id='nComuna'>\n";
                echo "	<option value='0'>Elija ...</option>\n";
                $comuna = pg_query($conexion, "SELECT * FROM comuna");
                while ($aRowA = pg_fetch_array($comuna)) {
                    if ($nComuna == $aRowA["id_comuna"]) {
                        echo "<option selected value='" . trim($aRowA["id_comuna"]) . "'>" . trim($aRowA["nombre"]) . "</option>\n";
                    } else {
                        echo "<option value='" . trim($aRowA["id_comuna"]) . "'>" . trim($aRowA["nombre"]) . "</option>\n";
                    }
                }
                echo "</select>\n";
                ?>
            </td>
            <td class='opbutton1'><a OnClick="validarForm();">Mostrar</a></td>
        </tr>
    </table>
</form>

<!-- --------------------------------------------------------------------------------------------------------------------- -->
<!-- PASAR VARIABLES DE JAVASCRIPT A PHP -->
<!-- --------------------------------------------------------------------------------------------------------------------- -->
<form method="POST" action="/fotogrametria/graba_pagos.php" name="fPago" id="fPago">
    <input type="hidden" name="nPartida" id="nPartida" value='<?php echo $nPartida; ?>' />
    <input type="hidden" name="nId_Sentencia" id="nId_Sentencia" value='<?php echo $nId_Sentencia; ?>' />
    <input type="hidden" name="nNumeracion" id="nNumeracion" value='<?php echo $nNumeracion; ?>' />
    <input type="hidden" name="cTipo" id="cTipo" value='<?php echo $cTipo; ?>' />
    <input type="hidden" name="cTipo_Anca" id="cTipo_Anca" value='<?php echo $cTipo_Anca; ?>' />
</form>
<script>
    $.post("/fotogrametria/graba_pagos.php", {
            nPartida: document.fPago.nPartida.value,
            nId_Sentencia: document.fPago.nId_Sentencia.value,
            nNumeracion: document.fPago.nNumeracion.value,
            cTipo: document.fPago.cTipo.value,
            cTipo_Anca: document.fPago.cTipo_Anca.value,
            dFecha_Pago: document.fPago.dFecha_Pago.value,
            pTipo_Pago: combo.options[combo.selectedIndex].text,
            nImporte: document.fPago.nImporte.value
        },
        function(data) {
            if (data == 1) {
                document.location = "/fotogrametria/buscar.php?cBuscar=P&cPartida=<?php echo $nPartida; ?>&cMensajes=1";
            }
            if (data == 2) {
                document.location = "/fotogrametria/buscar.php?cBuscar=P&cPartida=<?php echo $nPartida; ?>&cMensajes=2";
            }
            if (data == 33) {
                document.location = "/fotogrametria/buscar.php?cBuscar=P&cPartida=<?php echo $nPartida; ?>&cMensajes=33";
            }
            //jAlert(data)
        });
</script>

<!-- GRABA_PAGOS.PHP -->
<?php
$nId_Acta = trim($_POST["nId_Acta"]);
$nId_Sentencia = trim($_POST['nId_Sentencia']);
$nPartida = trim($_POST['nPartida']);
$cTipo = trim($_POST["cTipo"]);
$cTipo_Anca = trim($_POST["cTipo_Anca"]);
$dFecha_Pago = trim($_POST["dFecha_Pago"]);
$pTipo_Pago = trim($_POST["pTipo_Pago"]);
$cImporte = trim($_POST["nImporte"]);
?>

// -----------------------------------------------------------------------------------------------------------
//El archivo .htaccess //https://platzi.com/clases/3144-php-cookies-sesiones/49710-el-archivo-htaccess/
// -----------------------------------------------------------------------------------------------------------
<VirtualHost *:80>
    ServerName www.cursoplatzi.test
    DocumentRoot /srv/www/htdocs/platzi-php/htaccess
    <Directory "/srv/www/htdocs/platzi-php/htaccess">
        Options FollowSymLinks
        AllowOverride All
    </Directory>
</VirtualHost>