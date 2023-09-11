<?php

namespace App\Http\Middleware;
use ReflectionClass;
use App\Http\CodeBook;

class CodeBookConversor extends CodeBook {

    public static function getStates(){
        //Count all states
        $reflection = new ReflectionClass(CodeBook::class);
        $states = $reflection->getConstants();

        //Order states by value
        asort($states);
        
        return $states;
    }

    
    public static function getStateByCode($code) {
        $states = self::getStates();
        $key = array_search($code, $states);
        if ($key !== false) {
            return ['code' => $code, 'status' => $key];
        }
        return null;
    }

    public static function getStateByName($name) {
        $states = array_flip(self::getStates());
        $key = array_search($name, $states);
        if ($key !== false) {
            return ['code' => $key, 'status' => $name];
        }
        return null;
    }



}
