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

$sql="select * from patent_peptides where DRAVP_ID='$tit'";
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
    <title>Patent Information</title>
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
        p>span{
            font-weight:549;
            font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        strong{
            font-family: arial,verdana,helvetica,sans-serif;
        }
        p{
           font-size:16px;
           margin: 12px 10px;
        }
    </style>
</head>


<body>

<?php
require_once ("../head/head_content.php");
?>

<div class="container">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb" style="margin-top:20px;">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dravp.cpu-bioinfor.org/browse/GeneralData.php">Browse</a></li>
            <li class="active"><?php  echo "{$row['DRAVP_ID']}"?></li>
	        <li style="float:right;"><a href="<?php echo $_SERVER['HTTP_REFERER'];  ?>"><span class="glyphicon glyphicon-arrow-left">Back</span></a></li>
        </ol>
    </div>


    <div class="col-md-offset-1  col-md-8 mt30" style="margin:-10px 0 0 75px;width:1000px;">

            <h2>Patent Information</h2>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">

                  <p>
                      <span style="color: #4478b1;font-size:19px;">DRAVP ID</span>&nbsp; <?php echo $row['DRAVP_ID']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:19px;">Peptide Name</span>&nbsp;&nbsp; <?php echo $row['Name']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:19px;">Sequence</span>&nbsp; <?php echo $row['Sequence']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:19px;">Sequence Length</span> &nbsp;<?php echo $row['Sequence_Length']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:19px;">Source</span>&nbsp; <?php echo $row['Source']?>
                  </p>
                  <p>
                  <span style="color: #4478b1;font-size:19px;">Target Organism</span>&nbsp; <?php echo $row['Target_Organism']?>
                  </p>
                  <p>
                    <span style="color: #4478b1;font-size:19px;">Patent Type</span>&nbsp; <?php echo $row['Patent_Type']?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:19px;">Publication Date</span>&nbsp; <?php echo $row['Publication_Date']?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:19px;">Patent No</span>&nbsp; <a target="_blank"  href="http://www.lens.org/lens/patent/<?php $patent_link=preg_replace('/ |\//','_',$row['Patent_No']);  echo $patent_link;  ?>"><?php  echo "{$row['Patent_No']}";  ?></a>
                </p> 
                <p>
                      <span style="color: #4478b1;font-size:19px;">Family Info</span>&nbsp;
                      <?php
                     
                          $pieces = explode("##", $row['Family_Info']);
                          $num = count($pieces);        
                          $arr=array();
                          for($i=0;$i<$num;$i++){
                              $link=$pieces[$i];
                              
                              $temp='<a href="http://www.google.com/patents/'.$link.'">'.$link.'</a>';
                              array_push($arr,$temp);
                            }
                            $temp=implode(", ",$arr);
                            echo "$temp";
                      
                      ?>
                  </p>
                 <p>
                    <span style="color: #4478b1;font-size:19px;">Patent Title</span>&nbsp; <?php echo $row['Patent_Title']?></span>
                </p>
                
                <p>
                    <span style="color: #4478b1;font-size:19px;">Comment</span>&nbsp; 
                <?php echo $row['Comment']?>
                </p>
                <p>
                    
                    <span style="color: #4478b1;font-size:19px;">Abstract</span>&nbsp; <?php echo $row['Abstract']?>
                </p>
                  
                  
              

          </div>


    </div>
</div>




<?php

require_once("../head/footer.php");

?>



</body>



