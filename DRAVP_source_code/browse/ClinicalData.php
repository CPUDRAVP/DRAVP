<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dravp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');



@$page=isset($_GET['page'])?$_GET['page']:1;
function escapeString($content) {
    $pattern = "/(select[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])|(drop[\s])/i";
    if (is_array($content)) {
        foreach ($content as $key=>$value) {
            $content[$key] = addslashes(trim($value));
            if(preg_match($pattern,$content[$key])) {
                $content[$key] = '';
            }
        }
    } else {
        $content=addslashes(trim($content));
        if(preg_match($pattern,$content)) {
            echo '<script>location.href="http://dravp.cpu-bioinfor.org/"</script>';exit;
        }
    }
    return $content;
}
function safe_replace($string) {
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('\\','',$string);
    return $string;
}
$page=escapeString($page);
$page=safe_replace($page);


$hdeh=$page;



?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Peptide Drug</title>
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

<div class="container">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dravp.cpu-bioinfor.org/browse/Peptide_Information.php">Browse</a></li>
            <li class="active">Clinical peptide</li>
        </ol>
    </div>
    <div class="row mt40" style="padding-top: 20px">



        <table class="table table-bordered">
            <thead>
            <tr>


                <th>DRAVP ID</th>
                <th>Name</th>
                <th>Sequence</th>
                <th>Target Organism</th>
                <th>Pubchem ID</th>

            </tr>
            </thead>
            <tbody>


            <?php
            $showpages=7;
            $page_eff=($showpages-1)/2;
            $pagesize=20;



            $sq="select * from clinical_peptides order by DRAVP_ID asc";
            $r=mysqli_query($conn,$sq);
            $records=mysqli_num_rows($r);
            $pagecount=ceil($records/$pagesize);
            $start=($page-1)*$pagesize;
            $i=1;
            $i=($page-1)*$pagesize+$i;


            $sqld="select * from clinical_peptides order by DRAVP_ID asc limit $start,$pagesize";
            $rsd=mysqli_query($conn,$sqld);
            while($row=mysqli_fetch_assoc($rsd)) {



                echo ' <tr>
                <td><a href="clinical_information.php?id='.$row['DRAVP_ID'].'" >'.$row['DRAVP_ID'].'</a></td>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Description'].'</td>
                <td>'.$row['Target_Organism'].'</td>
                <td><a target="_blank" href="https://pubchem.ncbi.nlm.nih.gov/#query='.$row['Pubchem'].'" >'.$row['Pubchem'].'</a></td>
            </tr>';
            }
            ?>



            </tbody>
        </table>

    </div>
</div>


<div class="container mt-5">

    <div class="text-right mb-5">



        <?php
        echo ' <a href="ClinicalData.php?page=1&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default">First</a> ';

        $start=1;
        $end=$pagecount;
        if($pagecount>$showpages){
            if($page>$page_eff){
                $start=$page-$page_eff;
                $end=$pagecount>$page+$page_eff?$page+$page_eff:$pagecount;
            }else{
                $start=1;
                $end=$pagecount>$showpages?$showpages:$pagecount;
            }
            if($page+$page_eff>$pagecount){
                $start=$start-($page=$page_eff-$end);
            }
            for($i=$start;$i<=$end;$i++){
                if($i==$page){
                    echo ' <a href="ClinicalData.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary">'.$i.'</a> ';
                }else{
                    echo ' <a href="ClinicalData.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default" >'.$i.'</a> ';
                }
            }
        }else{
            for($i=$start;$i<=$end;$i++) {
                if($i==$page){
                    echo ' <a href="ClinicalData.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary">'.$i.'</a> ';
                }else{
                    echo ' <a href="ClinicalData.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default" >'.$i.'</a> ';
                }
            }
        }
        if($page<0){
            $uid=$end-$showpages+1;
            for($i=$uid;$i<=$end;$i++) {
                if($i==$hdeh){
                    echo ' <a href="ClinicalData.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary">'.$i.'</a> ';
                }else{
                    echo ' <a href="ClinicalData.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default" >'.$i.'</a> ';
                }
            }
        }


        echo ' <a href="ClinicalData.php?page='.$pagecount.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default">Last</a> ';
        ?>



    </div>
</div>


<div style="height: 300px"></div>

<?php

require_once("../head/footer.php");

?>



</body>
</html>
