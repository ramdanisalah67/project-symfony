<?php
/**
 * Created by PhpStorm.
 * User: SALAH
 * Date: 16/03/2023
 * Time: 01:42
 */

namespace App\twigExtension;
use Twig\Extension\AbstractExtension ;
use Twig\TwigFilter ;
class MyCustomTwigExtension extends AbstractExtension
{
public function getFilters()
{
    return [new TwigFilter('default_image',[$this,'image_function'])];
}


public function image_function(String $path):string{
    if(strlen(trim($path))==0){
        return 'img1.PNG' ;
    }
    return $path ;
}
}