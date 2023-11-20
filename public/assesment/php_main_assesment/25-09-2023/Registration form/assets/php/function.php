<?php

function inputFields($placeholder,$name,$value,$type){
$element="
 <div class=\"container mb-3 mt-3 w-50\">
 
 <input class=\"form-control\" type=\"$type\" id=\"formFile\" placeholder='$placeholder' name='$name' value='$value'>
</div>
";
echo $element;
}

?>