<?php

namespace Source\Members;

class Config
{
    public const COMPANY = "UpInside";
    protected const DOMAIN = "upinside.com.br";
    private const SECTOR = "Educação";

    public static $company;
    public static $domain;
    public static $section;

    public static function setConfig($company, $domain, $sector)
    {
        self::$company = $company;
        self::$domain = $domain;
        self::$section = $sector;
    } 
}