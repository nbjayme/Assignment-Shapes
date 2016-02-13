<?php
/*--------------------
    Dutiful - Verbum Base Class
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

class Dutiful{

    protected $mytaskid;
    protected $myrunnable;
    

    public static function Create($voco = array(
        'id'=> null,
        'runnable' => null 
    ))
    {

        return ( new Dutiful( $voco['id'], $voco['runnable'] ) );
    }
    
    public function __construct($id, $runnable ){
        $this->mytaskid = $id. "@" . uniqid();
        $this->myrunnable = $runnable;
    }

    public function Id(){
        return $this->mytaskid;
    }

    public function Execute( $params ){
        $retVal = call_user_func( $this->myrunnable, $this, $params );
        return $retVal;
    }

    public function __destruct(){
        $this->mytaskid = NULL;
        $this->myrunnable= NULL;
    }
}


