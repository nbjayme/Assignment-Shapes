<?php
/*--------------------
    Verbum - Core Realm Class
    Copyright (C) 2014  Nathaniel nbjayme@gmail.com

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

--------------------*/
namespace Verbum\Core;

class Verbum{

    private static $vocos = array();
    private static $cache = array();

    public static function Scriptor( $incantation, $runnable ){
        $vocoId = self::VocoId( $incantation );
        if( $vocoId == ""){
            echo "Scriptor incantation error.";
            return;
        }

        self::$vocos[ $vocoId ] = self::CreateService('Dutiful', array(
                'id' => $vocoId,
                'runnable' => $runnable
            ));
    }

    public static function Voco( $incantation, $params = array()){
        $vocoId = self::VocoId( $incantation );
        if( $vocoId == ""){
            echo "Voco incantation error.";
            return;
        }
        self::VocoExtension( $incantation );
        return self::LaunchVoco( $vocoId, $params );
    }

    public static function Summon( $vocoId, $params ){
        // override on Extenders
    }

    final public static function CreateService($service, $vars = null)
    {
        if (!class_exists( __NAMESPACE__  . '\\' . $service))
        {
            self::LoadService($service);
        }
        $service = __NAMESPACE__ . '\\' . $service;
        return $service::Create($vars);
    }

    final public static function LoadService($id){
        $d = __DIR__;
        $fPath = Verbum::NormalizePath($d .'/lib/' . $id . '.php');
        if (! is_file($fPath)){
            return false;
        }
        include_once($fPath);
        return true;
    }
    
    final public static function Cache($context)
    {
        if (!isset(self::$cache[$context]))
        {
            self::$cache[$context] = self::CreateService('Arca');
        }
        return self::$cache[$context];
    }

    final public static function FilterParams( $filter, $params = null){
        if (is_null($params))
        {
            return array();
        }
        $keys = array();
        foreach ($filter as $key => $item)
        {
            $keys[] = $key;
        }
        foreach ($params as $key => $item)
        {
            if (!in_array($key, $keys))
            {
                continue;
            }
            $filter[$key] = $item;
        }
        return $filter;
    }

    final public static function NormalizePath()
    {
        $args = func_get_args();
        if (count($args) == 0)
        {
            return "";
        }
        if (count($args) == 1)
        {
            return strtr($args[0], '\\','/');
        }
        foreach ($args as $key => $aItem)
        {
            $args[$key] = self::Normalize($aItem);
        }
        return join('/', $args);
    }
    
    final public static function VocoId( $incantation ){
        $s = explode( '.', $incantation );
        $s = strtolower( $s[0] );
        preg_match('/([a-z]+)::([a-z|_|0-9|\!]+)/', $s, $match );
        if( count( $match ) < 2 ){
            return "";
        }
        $vocoId =  $match[1] . '_' . $match[2];
        return $vocoId;
    }

    final private static function LaunchVoco( $vocoId, $params = array() ){
        if( ! isset( self::$vocos[ $vocoId ] ) ){
            echo "Unregistered voco $vocoId.";
            return;
        }
        $runnable = self::$vocos[ $vocoId ];
        return $runnable->Execute( $params );
    }

    final private static function LoadRealm($realm)
    {
        if ( class_exists( $realm ) ){
            return;
        }
        $trealm = strtolower($realm);
        $loaded = self::Voco('Verbum::breath', $trealm . '/realm');
        if (count($loaded) != 0 )
        {
            return;
        }
        Verbum::Voco('Verbum::breath', $realm );
    }

    final private static function VocoExtension( $incantation ){
        preg_match( '/([a-z|A-Z]+)::([a-z|_|0-9|)]+)\!([a-z|_|0-9|)]+)/', 
            $incantation, $match );

        if ( count( $match ) < 4 ){
            return FALSE;
        }

        $realm = $match[1];
        self::LoadRealm( $realm );
        // Summon Voco
        $realm = '\\Verbum\\'. $realm . '\Realm';
        if (!class_exists($realm))
        {
            echo 'Uninstantiated class ' . $realm;
            die();
        }
        return $realm::Summon( $match[2], $match[3] );
    }

};


include_once( __DIR__ . '/Verbum-helpers.php');
$config = Verbum::Voco('Verbum::config',array());
if ($config['mode.debug'] == 'on'){
    ini_set('display_errors', TRUE);
}
else{
    ini_set('display_errors', FALSE);
}
error_reporting($config['mode.errorlevel']);


