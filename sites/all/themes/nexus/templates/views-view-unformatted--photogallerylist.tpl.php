<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
//dpm($rows );
?>
<?php 
 $numphoto = sizeof($rows);
 $htmlphoto = "";
 $fourcol1="";
 $fourcol2="";
 $twocolcombine1 ="";
 $twocolcombine2 ="";
 $twocol1="";
 $twocol2 ="";
 for($i=0;$i<$numphoto;$i++){
    if($i<4){
        $fourcol1 = $fourcol1.'<div class="four-column-row">'.$rows[$i].'</div>';
        }
    if($i>3 && $i<7 ){
        if($i==4){
            $twocolcombine1 = '<div class="twocolcombine"><div class="big-column">'.$rows[$i].'</div><div class="big-column">';
         }
        if($i>4){
            $twocol1 = $twocol1.'<div class="nest-two-column-row">'.$rows[$i].'</div>';
        
        }
    }
    if($i>6&&$i<11)  {
        $fourcol2 = $fourcol2.'<div class="four-column-row">'.$rows[$i].'</div>';
    } 
    if($i>10&&$i<14) {
        if($i==11){
           $twocolcombine2  = '<div class="twocolcombine"><div class="big-column">'.$rows[$i].'</div><div class="big-column">';
         }
        if($i>11){
            $twocol2 = $twocol2.'<div class="nest-two-column-row">'.$rows[$i].'</div>';
        
        }
    }   
       
        }
 
 //dpm($fourcol1);
 //dpm($twocol1);
// dpm($twocolcombine1);
 
// dpm($fourcol2);
//dpm($twocol2);
// dpm($twocolcombine2);
$htmlphoto ='<div class="mphoto-gallery">'.($fourcol1).$twocolcombine1.$twocol1.'</div>'.$fourcol2.$twocolcombine2.$twocol2 .'</div>'.'</div>' ;
print $htmlphoto;
?>
