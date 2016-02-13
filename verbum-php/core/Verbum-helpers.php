<?php
namespace Verbum\Core;

Verbum::Scriptor('Verbum::config', function( $self, $params){
    $config = array(
        'mode.debug' => 'on',
        'mode.errorlevel' => E_WARNING + E_ERROR,
        'mode.language' => 'en-US',
        'path.data' => Verbum::NormalizePath(realpath( dirname(__FILE__) . '/../../data')),
        'path.uploads' => Verbum::NormalizePath(realpath( dirname(__FILE__) . '/../../data/uploads')),
    );
    return $config;
});

Verbum::Scriptor('Verbum::breath', function( $self, $params ){
    $d = __DIR__;

    $modules = array();
    if ( ! is_array( $params ) ){
        $modules[] = $params;
    }
    else{
        $modules = & $params;
    }

    $fLoaded = array();
    
    foreach( $modules as $modFile ){
        $isExists = false;
        $m = Verbum::NormalizePath($modFile . '.php');

        $isExists = file_exists($m);
        
        if ( ! $isExists)
        {
            $m = Verbum::NormalizePath($d . '/' . $modFile . ".php");
            $isExists = file_exists($m);
        }
        
        if (! $isExists)
        {
            $m =  realpath( $d . '/..');
            $m .= "/" . $modFile . ".php";
            $m = Verbum::NormalizePath($m);
            $isExists = file_exists($m);
        }

        if (! $isExists)
        {
            continue;
        }
        include_once( $m );
        $fLoaded[] = $m;
    }
    return $fLoaded;
});

Verbum::Scriptor('Verbum::reply_success', function( $self, $params ){
    $msg['status'] = 'success';
    $msg['details'] = $params;
    return $msg;
});

Verbum::Scriptor('Verbum::reply_fail', function( $self, $params ){
    $msg['status'] = 'fail';
    $msg['details'] = & $params;
    return $msg;
});

if ( php_sapi_name() == "cli" ){
    Verbum::Voco('Verbum::breath', array( "Verbum-CLI" ) );
}
else{
    Verbum::Voco('Verbum::breath', array( "Verbum-WEB" ) );
}

if (!function_exists('\Verbum\Core\shutdown'))
{
    function shutdown() {
        $error = error_get_last();
        if ($error['type'] == 0)
        {
            return;
        }
        echo "<h1>Error Occured</h1>";
        echo $error['message'] . '<br />';
        echo $error['file'] . ' at line ' . $error['line'] . '<br />';
    }
    register_shutdown_function('\Verbum\Core\shutdown');
}


