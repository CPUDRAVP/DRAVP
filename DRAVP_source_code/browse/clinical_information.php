<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dravp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');

@$tit=$_GET['id'];


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
$tit=escapeString($tit);
$tit=safe_replace($tit);

$sql="select * from clinical_peptides where DRAVP_ID='$tit'";
$rs=mysqli_query($conn,$sql);

if(mysqli_num_rows($rs)>0){
    $row=mysqli_fetch_assoc($rs);
}else{
    echo '<script>location.href="http://dravp.cpu-bioinfor.org/"</script>';exit;
}



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
    <script src="https://3Dmol.org/build/3Dmol-min.js" async></script>
    <style>
        th,p>span{
            font-weight:549;
            font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        strong{
            font-family: arial,verdana,helvetica,sans-serif;
        }
    </style>
</head>

<body>

<?php
require_once ("../head/head_content.php");
?>

<div class="container">
    <div class="row" style="margin-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dravp.cpu-bioinfor.org/browse/ClinicalData.php">Browse</a></li>
            <li class="active"><?php  echo "{$row['DRAVP_ID']}"?></li>
            <li style="float:right;"><a href="<?php echo $_SERVER['HTTP_REFERER'];  ?>"><span class="glyphicon glyphicon-arrow-left">Back</span></a></li>
        </ol>
    </div>


    <p>
        <strong style="font-size: 20px;">Sequence information</strong>
    </p>
    <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
    <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">

        <p>
            <span style="color: #4478b1;font-size:18px;">DRAVP ID</span>&nbsp; <?php echo $row['DRAVP_ID']?>
        </p>
        <p>
            <span style="color: #4478b1;font-size:18px;">Name</span>&nbsp;&nbsp; <?php echo $row['Name']?>
        </p>
        <p>
            <span style="color: #4478b1;font-size:18px;">Sequence</span>&nbsp; <?php echo '<textarea style="width:700px;line-height:30px;margin-top:7px;">'.$row['Sequence'].'</textarea>'?>
        </p>
        <p>
            <span style="color: #4478b1;font-size:18px;">Target Organism</span>&nbsp; <?php echo $row['Target_Organism']?>
        </p>
        <p>
            <span style="color: #4478b1;font-size:18px;">Pubchem ID</span>&nbsp; 
            <?php echo '<a target="_blank" href="https://pubchem.ncbi.nlm.nih.gov/#query='.$row['Pubchem'].'">'.$row['Pubchem'].'</a>';?>
        </p>
        <p>
            <span style="color: #4478b1;font-size:18px;">Molecular Formula</span>&nbsp; <?php echo $row['Molecular_Formula']?>
        </p>
        <p>
            <span style="color: #4478b1;font-size:18px;">DrugBank Accession Number</span>&nbsp; <?php echo $row['DrugBank_Accession_Number'];?>
        </p>
        <p>
            <span style="color: #4478b1;font-size:18px;">Description</span>&nbsp; <?php echo $row['Description'];?>
        </p>
        
        <p>
            <span style="color: #3a95c8;font-size:18px;">Chemical Structure Depiction</span>&nbsp; 
            <p>
                <img src="http://dravp.cpu-bioinfor.org/Structure/chemical_structure_depiction/<?php echo $row['Chemical_structure_depiction']?>" width="25%">
            </p>
        </p>
        
    </div>
     
     
    <br/>    
    <p>
        <strong style="font-size: 20px;">Literature information</strong>
    </p>
    <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
        
     <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">   
        <?php
                $title = explode("##", $row['Title']);						
							$pubmed_id = explode("##", $row['Pubmed_ID']);
							for ($i= 0;$i< count($pubmed_id); $i++){
								$num=$i+1;
echo<<<LL_IN
                    <p>
                        <span style="color: #333;;font-size:16px;">Literature {$num}</span>
                    </p>
                    <p>
                        <span style="color: #4478b1;font-size:18px;">Pubmed ID
                        <a target='_blank'  href="http://www.ncbi.nlm.nih.gov/pubmed/{$pubmed_id[$i]}" style="font-size:15px;">{$pubmed_id[$i]}</a>
                        </span>
                    </p>
                    <p>
                        <span style="color: #4478b1;font-size:18px;">Title</span>&nbsp;&nbsp; {$title[$i]}
                    </p>

LL_IN;
						

							}
                ?>
        
      </div> 
        
   
    <br><br>
    <p>
        <strong style="font-size: 20px">ClinicalTrails Information</strong>
    </p>
    <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">

    <table class="table table-bordered"  style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
        <thead>
        <tr>

            <th style="color: #4478b1;font-size:16px;">NCT Number</th>
            <th style="color: #4478b1;font-size:16px;">Study Title</th>
            <th style="color: #4478b1;font-size:16px;">Condition/Disease</th>
            <th style="color: #4478b1;font-size:16px;">Status</th>
            <th style="color: #4478b1;font-size:16px;">Phase</th>
            <th style="color: #4478b1;font-size:16px;">Sponsor</th>

        </tr>
        </thead>
        <tbody>


        <?php

        $sqlde="select * from clinical_information  where  DRAVP_ID='$tit'  order by DRAVP_ID asc ";
        $rsde=mysqli_query($conn,$sqlde);
        while($rowe=mysqli_fetch_assoc($rsde)) {



            echo ' <tr>
                <td>
                    <a target="_blank" href="https://clinicaltrials.gov/ct2/show/'.$rowe['NTC_Number'].'">'.$rowe['NTC_Number'].'
                </td>
                <td>'.$rowe['Study_Title'].'</td>
                <td>'.$rowe['Condition_Disease'].'</td>
                <td>'.$rowe['Status'].'</td>
                <td>'.$rowe['Phase'].'</td>
                <td>'.$rowe['Sponsor'].'</td>
            </tr>';
        }
        ?>



        </tbody>
    </table>




    <br><br>








</div>






<?php

require_once("../head/footer.php");

?>



</body>
<script type="text/javascript">

    function showDivs(objId) {

        <?php
        $piewww = explode("##", $row['Structure']);
        $nuww = count($piewww);
        $ibwww=0;
        while($ibwww<$nuww){
            $linkbwww=$piewww[$ibwww];


           echo 'document.getElementById("'.$ibwww.'").style.display = "none";';
            echo 'document.getElementById("a'.$ibwww.'").style.background = "#e6e6e6";';
            echo 'document.getElementById("a'.$ibwww.'").style.color = "#000000";';
            echo 'document.getElementById("a'.$ibwww.'").style.borderColor = "#ccc";';

            $ibwww++;
        }
        ?>
        document.getElementById(objId).style.display = "";
        document.getElementById('a'+objId).style.background = "#31b0d5";
        document.getElementById('a'+objId).style.color = "#ffffff";
        document.getElementById('a'+objId).style.borderColor = "#31b0d5";
    }

</script>
</html>
