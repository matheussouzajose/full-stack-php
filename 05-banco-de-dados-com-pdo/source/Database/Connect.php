<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class Connect
{
    private const HOST = "laradock_mysql_1";
    private const USER = "root";
    private const PASSWD = "root";
    private const DBNAME = "fullstackphp";

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstace(): PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            } catch (PDOException $exception) {
                die("<h1>Whoops! Erro ao conectar</h1>");
            }
        }
        return self::$instance;
    }

    final private function __construct()
    {
    }

    private function __clone()
    {
        
    }
}