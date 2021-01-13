<?php 

function inputElement($icon, $placeholder, $name, $value, $attr) {
    $ele = "
    
    <div class=\"input-group mb-2\">
        <div class=\"input-group-prepend\">
            <div class=\"input-group-text bg-warning\">$icon</div>
        </div>
        <input autocomplete=\"off\" type=\"text\" class=\"form-control\" id=\"\inlineFormInputGroup\" placeholder='$placeholder' value='$value' name='$name' $attr>
    </div>

    ";

    echo $ele;
    
}

function buttonElement($btnid, $styleclass, $text, $name, $attr) {
    $btn = "
    
        <button name='$name' $attr class='$styleclass' id='$btnid'>$text</button>

    ";

    echo $btn;

}






?>