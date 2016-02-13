<?php
if (! class_exists( "Verbum\Core\Verbum" )){
    include_once(__DIR__ . '/../realm.php' );
}
use \Verbum\Core\Verbum as Verbum;

Verbum::Scriptor( "Util::unittest!" . basename( __FILE__ ),
function( $self, $params ){
    $vars = Verbum::FilterParams(array(
        "message" => "",
        "assert" => "",
        "assertwith" => "",
        "gotvalue" => ""
    ),$params);

    $isCLI = php_sapi_name() == "cli";
    $nextLine = '<br />';
    echo "[" . date('Ymd-His') . "] ";

    if( $isCLI ){
        $nextLine = "\n";
        echo $vars['message'];
    }
    else{
        $vars['message'] = nl2br( $vars['message'] );
        echo htmlentities( $vars['message'] );
    }

    if ($vars['assertwith'] !== "")
    {
        $vars['assert'] = "";
        if ($vars['assertwith'] == $vars['gotvalue'])
        {
            echo " yes" . $nextLine;
        }
        else
        {
            echo " no, got value of " . $vars['gotvalue'] . $nextLine;
            die();
        }
        return;
    }

    if( $vars['assert'] !== "" ){
        if( $vars['assert'] ){
            echo " yes" . $nextLine;
        }
        else{
            echo " no"  . $nextLine;
            die();
        }
        return;
    }

    echo $nextLine;
});

//TEST VOCO in commandline
if (!isset($argv))
{
    $argv = null;
}

call_user_func( function() use( $argv ){
    if (is_null($argv))
    {
        return;
    }

    global $_SESSION;
    global $_SERVER;
    global $_POST;

    if( basename( $argv[0] ) != basename( __FILE__ ) )
    {
        return;
    }

    Verbum::Voco('Util::unittest!' . basename(__FILE__), array(
        'message' => "Stating Unit Test"
    ));

    $testTotal = 1+1;
    Verbum::Voco('Util::unittest!' . basename(__FILE__), array(
        'message' => "Is 1 + 1 equals 2?",
        'assert' =>  $testTotal == 2 
    ));
    
    $testTotal = 10; // introduce bug
    Verbum::Voco('Util::unittest!' . basename(__FILE__), array(
        'message' => "Is 1 * 3 equals 3?",
        'assert' =>  $testTotal == 3 
    ));
});

