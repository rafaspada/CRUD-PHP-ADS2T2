<?php

class Conexao{
    private static $dbNome = 'casa_da_crianca';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha =  '';

    private static $cont = null;

    public function __construct(){}

    public static function conectar(){
        if(self::$cont == null){
            try{
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbNome, self::$dbUsuario, self::$dbSenha);
            } catch (\PDOException $exception){
                die($exception->getMessage());
            }
        }
        return self::$cont; 
    }
}

?>