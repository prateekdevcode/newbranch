<?php

require 'vendor/autoload.php';
require 'ImageManupulator.php';
require 'ConvertBase64.php';



// reference the Dompdf namespace
use Dompdf\Dompdf;




// instantiate and use the dompdf class
$dompdf = new Dompdf(array('enable_remote' => true));
$designImg = getBase64('test.png');
$logo = getBase64('https://breelynuniforms.com.au/wp-content/themes/breelyn/customproducts/images/logo.png');
$html = "
<style>
    <link href='http://fonts.googleapis.com/css?family=Signika:600|Roboto+Condensed' rel='stylesheet' type='text/css'>
    @page { margin: 0px; }
    body { margin: 0px;  }
    *{
        box-sizing:border-box;
        margin:0;
        font-family: 'Roboto Condensed', sans-serif;
    }
    .wraper{   
        
    }
    .imageArea{
        width:100%;    
        background:#000;
        padding:50px;
        text-align:left;
        position:relative;
        height:310px;
        padding-top:130px
    }
    .skews{
        display:block;
        position:absolute;
        height:491px;
        right:-160px;
        top:0;
        width:300px;
        background:red;
        z-index:9;   
        transform:skew(-30,0) 
    }
    .logo{
        position:absolute;
        top:350px;
        z-index:99;
        left:610px;
        background:#fff;
        padding:10px 30px
    }
    .imageArea img{
        max-width:70%;
        display:block; 
        
    }
    .descriptionArea{
        width:48.9%;  
        background:red;    
        transform:skew(-30,0) ;
        display:block;
        padding:20px;
        padding-left:280px;
        margin-left:-180px;
        margin-top:-1px;
        position:relative;
        z-index:999;  
        
    }
    .descriptionArea span{
        display:block;
        transform:skew(30,0) ;
        color:#fff;
        font-weight:bold;
        text-transform:uppercase;
    }
    h1{
        color:#3e3b3b;   
        position:absolute;
        top:-95px;
        letter-spacing: 30px;
        font-weight:bold;
        font-size:14px
    }


</style>

<div class='wraper'>
    <div class='imageArea'>
    <img class='logo' src='{$logo}'>
    <div class='skews'></div>
        <h1>DESIGN DETAILS</h1>
        <img  src='{$designImg}'>        
    </div>
    <div class='descriptionArea'>
       <span> SPECIFICATIONS</span>
    </div>
    <div class='specTable'>
       
    </div>
</div>



";

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('my.pdf',array('Attachment'=>0));


// $im = new ImageManipulator('design.png');
// $centreX = round($im->getWidth() / 2);
// $centreY = round($im->getHeight() / 2);

// $x1 = $centreX - 400;
// $y1 = $centreY - 200;

// $x2 = $centreX + 400;
// $y2 = $centreY + 200;

// $im->crop($x1, $y1, $x2, $y2); // takes care of out of boundary conditions automatically
// echo $im->getResource('test.png');





















