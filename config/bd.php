
<?php
class BD {
    private static $instancia = null;

    public static function crearInstancia() {
        if (self::$instancia == null) {
            $servidor = 'localhost';
            $nombre_bd = 'comercio';
            $usuario = 'root';
            $contrasena = '';

            try {
                self::$instancia = new PDO("mysql:host=$servidor;dbname=$nombre_bd", $usuario, $contrasena);
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$instancia;
    }
}
?>
