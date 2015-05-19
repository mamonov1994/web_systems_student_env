<?php

class bootstrap {
    static public function startLoad(){
        foreach(glob("application/*.php") as $filename) {
            include_once $filename;
        }
    }
}