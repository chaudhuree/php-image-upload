<?php

function inputFields($placeholder, $name, $type, $value )
{
    return "<div class='form-group my-4'>
                <input type='$type' name='$name' value='$value' class='form-control' placeholder='$placeholder' autocomplete='off'>
            </div>";
}


