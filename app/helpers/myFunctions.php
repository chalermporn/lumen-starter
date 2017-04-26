<?php

function checkAuthKey($key){
    return ($key == AUTH_KEY) ? true : false;
}