<?php

function welcome()
{
    if (auth()->check()) {
        return 'Welcome' . auth()->user()->name;
    } else {
        return 'Welcome guest!';
    }
}

?>