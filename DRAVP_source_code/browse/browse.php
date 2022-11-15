<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dravp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');




?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Classified-Browse</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script language="Javascript" src="http://dravp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dravp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>

</head>

<body>

<?php
require_once ("../head/head_content.php");
?>

<div class="container" style="padding-bottom:100px;">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dravp.cpu-bioinfor.org/browse/browse.php">Browse</a></li>
            <li class="active">Classified Browse</li>
            
        </ol>
    </div>



    <div style="padding-left: 20%;padding-right: 20%">
        <div class="alert alert-success" role="alert" onclick="aa(1)">
            <p  class="alert-link" style="font-size: 22px;"><span id="aa">+</span> By Data type</p>
        </div>

        <div class="container" id="a" style="display: none">
            <ul>
                <li><a href="http://dravp.cpu-bioinfor.org/browse/GeneralData.php" style="line-height:30px;font-size: 18px;">Antiviral peptides</a></li>
                <li><a href="http://dravp.cpu-bioinfor.org/browse/ProteinData.php" style="line-height:30px;font-size: 18px;">Antiviral proteins</a></li>
                <li><a href="http://dravp.cpu-bioinfor.org/browse/PatentData.php" style="line-height:30px;font-size: 18px;">Patent data</a></li>
                <li><a href="http://dravp.cpu-bioinfor.org/browse/ClinicalData.php" style="line-height:30px;font-size: 18px;">Clinical data</a></li>
            </ul>

        </div>
    </div>

    <div style="padding-left: 20%;padding-right: 20%">
        <div class="alert alert-success" role="alert" onclick="aa(2)">
            <p  class="alert-link" style="font-size: 22px;"><span id="bb">+</span> By Virus</p>
        </div>

        <div class="container" id="b" style="display: none">
            <ul>
                <li><a href="Classfied_Information.php?a=2&b=CCV" style="line-height:30px;font-size: 18px;">Channel catfish virus(CCV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=DENV" style="line-height:30px;font-size: 18px;">Dengue virus(DENV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=EBOV" style="line-height:30px;font-size: 18px;">Ebola virus (EBOV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=FIV" style="line-height:30px;font-size: 18px;">Feline immunodeficiency virus (FIV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=FV3" style="line-height:30px;font-size: 18px;">Frog Virus 3(FV3)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=HSV" style="line-height:30px;font-size: 18px;">Herpes simplex virus(HSV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=HBV" style="line-height:30px;font-size: 18px;">Hepatitis B virus(HBV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=HCV" style="line-height:30px;font-size: 18px;">Hepatitis C virus(HCV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=HCMV" style="line-height:30px;font-size: 18px;">Human cytomegalovirus(HCMV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=HIV" style="line-height:30px;font-size: 18px;">Human immunodeficiency virus(HIV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=HPIV" style="line-height:30px;font-size: 18px;">Human parainfluenza virus(HPIV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=HPV" style="line-height:30px;font-size: 18px;">Human papillomavirus(HPV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=Influenza virus" style="line-height:30px;font-size: 18px;">Influenza virus</a></li>
                <li><a href="Classfied_Information.php?a=2&b=JEV" style="line-height:30px;font-size: 18px;">Japanese encephalitis virus (JEV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=JV" style="line-height:30px;font-size: 18px;">Junin virus(JV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=MeV" style="line-height:30px;font-size: 18px;">Measles virus(MeV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=MERS-CoV" style="line-height:30px;font-size: 18px;">MERS-CoV</a></li>
                <li><a href="Classfied_Information.php?a=2&b=RSV" style="line-height:30px;font-size: 18px;">Respiratory syncytial virus (RSV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=SARS-CoV" style="line-height:30px;font-size: 18px;">SARS-CoV</a></li>
                <li><a href="Classfied_Information.php?a=2&b=SARS-CoV-2"  style="line-height:30px;font-size: 18px;">SARS-CoV-2</a></li>
                <li><a href="Classfied_Information.php?a=2&b=SIV" style="line-height:30px;font-size: 18px;">Simian immunodeficiency virus(SIV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=WNV" style="line-height:30px;font-size: 18px;">West Nile virus(WNV)</a></li>
                <li><a href="Classfied_Information.php?a=2&b=ZIKV" style="line-height:30px;font-size: 18px;">Zika Virus(ZIKV)</a></li>
                
            </ul>

        </div>
    </div>
    
    <div style="padding-left: 20%;padding-right: 20%">
        <div class="alert alert-success" role="alert" onclick="aa(4)">
            <p  class="alert-link" style="font-size: 22px;"><span id="dd">+</span> By Length</p>
        </div>

        <div class="container" id="d" style="display: none">
            <ul>
                <li><a href="Classfied_Information.php?a=3&b=4&c=10" style="line-height:30px;font-size: 18px;">4-10</a></li>
                <li><a href="Classfied_Information.php?a=3&b=11&c=20" style="line-height:30px;font-size: 18px;">11-20</a></li>
                <li><a href="Classfied_Information.php?a=3&b=21&c=30" style="line-height:30px;font-size: 18px;">21-30</a></li>
                <li><a href="Classfied_Information.php?a=3&b=31&c=40" style="line-height:30px;font-size: 18px;">31-40</a></li>
                <li><a href="Classfied_Information.php?a=3&b=41&c=100" style="line-height:30px;font-size: 18px;">41-100</a></li>
            </ul>

        </div>
    </div>
    
    <div style="padding-left: 20%;padding-right: 20%">
        <div class="alert alert-success" role="alert" onclick="aa(3)">
            <p  class="alert-link" style="font-size: 22px;"><span id="cc">+</span> By Family</p>
        </div>

        <div class="container" id="c" style="display: none">
            <ul>
                <li><a href="Classfied_Information.php?a=4&b=Arenaviridae" style="line-height:30px;font-size: 18px;">Arenaviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Coronaviridae"  style="line-height:30px;font-size: 18px;">Coronaviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Filoviridae" style="line-height:30px;font-size: 18px;">Filoviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Flaviviridae"  style="line-height:30px;font-size: 18px;">Flaviviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Herpesviridae" style="line-height:30px;font-size: 18px;">Herpesviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Hepadnaviridae"  style="line-height:30px;font-size: 18px;">Hepadnaviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Iridoviridae" style="line-height:30px;font-size: 18px;">Iridoviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Orthomyxoviridae"  style="line-height:30px;font-size: 18px;">Orthomyxoviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Paramyxoviridae" style="line-height:30px;font-size: 18px;">Paramyxoviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Papillomaviridae" style="line-height:30px;font-size: 18px;">Papillomaviridae</a></li>
                <li><a href="Classfied_Information.php?a=4&b=Retroviridae"  style="line-height:30px;font-size: 18px;">Retroviridae</a></li>
            </ul>

        </div>
    </div>

    


    <div></div>

</div>




<div style="height: 300px"></div>

<?php

require_once("../head/footer.php");

?>



</body>
<script>
    function aa(a) {
        if(a==1){
            if(document.getElementById('a').style.display=='none'){
                document.getElementById('a').style.display='block';
                document.getElementById('aa').innerHTML='-';
            }else {
                document.getElementById('a').style.display='none';
                document.getElementById('aa').innerHTML='+';
            }
        }

        if(a==2){
            if(document.getElementById('b').style.display=='none'){
                document.getElementById('b').style.display='block';
                document.getElementById('bb').innerHTML='-';
            }else {
                document.getElementById('b').style.display='none';
                document.getElementById('bb').innerHTML='+';
            }
        }

        if(a==3){
            if(document.getElementById('c').style.display=='none'){
                document.getElementById('c').style.display='block';
                document.getElementById('cc').innerHTML='-';
            }else {
                document.getElementById('c').style.display='none';
                document.getElementById('cc').innerHTML='+';
            }
        }

        if(a==4){
            if(document.getElementById('d').style.display=='none'){
                document.getElementById('d').style.display='block';
                document.getElementById('dd').innerHTML='-';
            }else {
                document.getElementById('d').style.display='none';
                document.getElementById('dd').innerHTML='+';
            }
        }

        // if(a==5){
        //     if(document.getElementById('e').style.display=='none'){
        //         document.getElementById('e').style.display='block';
        //         document.getElementById('ee').innerHTML='-';
        //     }else {
        //         document.getElementById('e').style.display='none';
        //         document.getElementById('ee').innerHTML='+';
        //     }
        // }

        // if(a==6){
        //     if(document.getElementById('f').style.display=='none'){
        //         document.getElementById('f').style.display='block';
        //         document.getElementById('ff').innerHTML='-';
        //     }else {
        //         document.getElementById('f').style.display='none';
        //         document.getElementById('ff').innerHTML='+';
        //     }
        // }
    }
</script>
</html>
