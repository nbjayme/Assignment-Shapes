<?php
/*--------------------
    Arca - Verbum Base Class for Cache
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

class Arca{

    private $storage  = array();

    public static function Create(){
        return ( new Arca() );
    }

    public function __construct(){
    }

    public function Store($attrKey = '', $attrVal = ''){

        if ($attrKey == ''){
            return '';
        }
        
        if (is_null($attrVal))
        {
            unset($this->storage[$attrKey]);
            return;
        }
        
        if ($attrVal != ''){
            $this->storage[$attrKey] = $attrVal;
            return;
        }

        if (isset($this->storage[$attrKey])){
            return $this->storage[$attrKey];
        }

        return '';
    }

    public function Discard( $attrKey = '' ){
        $retVal = $this->Store( $attrKey );
        if (isset($this->storage[$attrKey])){
            unset($this->storage[$attrKey]);
        }
        return $retVal;
    }

    public function ClearAll(){
        $this->storage = array();
    }

    public function __destruct(){
        $this->ClearAll();
    }

}

