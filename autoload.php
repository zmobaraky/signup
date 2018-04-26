<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 11:40
 */

spl_autoload_register(function ($class_name) {
    //include 'class/'.$class_name . '.php';


    $directorys = array(
        'controllers/',
        'models/'
    );

    //for each directory
    foreach($directorys as $directory)
    {
        //see if the file exsists
        $class = explode('\\',$class_name);
        $class_name = $class[count($class)-1];
        if(file_exists($directory.$class_name . '.php'))
        {

            require_once($directory.$class_name . '.php');
            //only require the class once, so quit after to save effort (if you got more, then name them something else
            return;
        }
    }


});
?>