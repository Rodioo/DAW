<?php

require_once('connection.php');

$crt=0;
$nr = 0;

while($nr<5)
{
    $isbn='';
    $autor='';
    $titlu='';
    $pret='';
        
    $start = 376087 + $crt;
    $link = 'https://www.librarie.net/p/'.$start;
    $crt++; 
        
    $homepage = file_get_contents($link);

    $cautaisbn=explode('<b>ISBN:</b>',$homepage);
    $cautaisbn=$cautaisbn[1];
    $cautaisbn=explode('</td>',$cautaisbn);

    $cautaisbn=$cautaisbn[1];
    $cautaisbn=explode('">',$cautaisbn);
    $isbn=str_replace('-','',$cautaisbn[1]); 

    if($isbn == ''){
        continue;
    }
        
    echo $isbn.'</br>';

    $nr++;

    $cautaautor=explode('<b>Autor(i):</b>',$homepage);
    $cautaautor=$cautaautor[1];
    $cautaautor=explode('</td>',$cautaautor);
    $cautaautor=$cautaautor[1];
    $cautaautor=explode('<a title="',$cautaautor);
    $cautaautor=$cautaautor[1];
    $cautaautor=explode('" href=',$cautaautor);

    $autor=$cautaautor[0];

    echo $autor.'</br>';

    $cautatitlu=explode('<div class="css_titlu"> <h1><b>',$homepage);
    $cautatitlu=$cautatitlu[1];
    $cautatitlu=explode('</b>',$cautatitlu);

    $titlu=$cautatitlu[0];

    echo $titlu.'</br>';

    $cautaimg=explode('<div class="css_coperta">',$homepage);
    $cautaimg = $cautaimg[1];
    $cautaimg = explode('<img src="', $cautaimg);
    $cautaimg = $cautaimg[1];
    $cautaimg = explode('" ', $cautaimg);
    $img = $cautaimg[0];
    echo $img. '<br>';

    $cautapret=explode('<table class="css_box_pret"',$homepage);

    if (count($cautapret)==1) 
        $pret='';
    else
    {
        $cautapret=$cautapret[1];
        $cautapret=explode('</table>',$cautapret);
        $cautapret=$cautapret[0];

        $intreg=explode('class="css_box_comanda_pret" nowrap align="left">',$cautapret);
        $intreg=$intreg[1];


        if(str_contains($intreg,'<sup><small>')) {
            
                
                $intreg=explode('<sup><small>',$intreg);
                        
                $zecimale=explode('</small>',$intreg[1]);
                $intreg=explode('">',$intreg[0]);
                
                $intreg=trim($intreg[1]);
                
                $zecimale=trim($zecimale[0]);
                
                $pret=$intreg.'.'.$zecimale;
        }
        else
        {
            $pret=explode(' lei',$intreg);
            $pret=explode('<b>', $pret[0]);
            $pret=$pret[1];
        }
        echo  $pret.'</br>';
        echo '<hr>';


    }

}

?>
