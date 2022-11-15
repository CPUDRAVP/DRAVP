<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dravp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');


@$sequence=$_GET['Sequence'];
@$name=$_GET['Name'];
@$Sequence_Length=$_GET['Sequence_Length'];

@$Source=$_GET['Source'];

@$target_organism=$_GET['Target_Organism'];

@$Linear_cyclic=$_GET['Linear_Cyclic'];
@$stereochemistry=$_GET['Stereochemistry'];
@$uniprot_ID=$_GET['Uniprot_ID'];
@$binding_target=$_GET['Binding_Target'];
@$pubmed_ID=$_GET['Pubmed_ID'];
@$db_name=$_GET['db'];
@$pdb_ID=$_GET['PDB_ID'];
@$ra=$_GET['wwer'];
@$sa=$_GET['wwes'];

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


$sequence=escapeString($sequence);
$sequence=safe_replace($sequence);

$pubmed_IDme=escapeString($pubmed_IDme);
$pubmed_IDme=safe_replace($pubmed_IDme);

$Sequence_Length=escapeString($Sequence_Length);
$Sequence_Length=safe_replace($Sequence_Length);

$ga=escapeString($ga);
$ga=safe_replace($ga);

$Source=escapeString($Source);
$Source=safe_replace($Source);

$target_organism=escapeString($target_organism);
$target_organism=safe_replace($target_organism);

$Linear_cyclic=escapeString($Linear_cyclic);
$Linear_cyclic=safe_replace($Linear_cyclic);

$stereochemistry=escapeString($stereochemistry);
$stereochemistry=safe_replace($stereochemistry);

$uniprot_ID=escapeString($uniprot_ID);
$uniprot_ID=safe_replace($uniprot_ID);

$binding_target=escapeString($binding_target);
$binding_target=safe_replace($binding_target);

$pubmed_ID=escapeString($pubmed_ID);
$pubmed_ID=safe_replace($pubmed_ID);

$pdb_ID=escapeString($pdb_ID);
$pdb_ID=safe_replace($pdb_ID);
$ra=escapeString($ra);
$ra=safe_replace($ra);
$sa=escapeString($sa);
$sa=safe_replace($sa);

$hdeh=$page;


?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
	<title>Advanced Search</title>
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
			<li><a href="http://dravp.cpu-bioinfor.org/search">Search</a></li>
			<li class="active">Advanced Search</li>
			<li style="float:right;"><a href="<?php echo $_SERVER['HTTP_REFERER'];  ?>"><span class="glyphicon glyphicon-arrow-left">Back</span></a></li>
		</ol>
	</div>
    <div class="row mt40" style="padding-top: 20px">



		<table class="table table-bordered">
			<thead>
			<tr>
                <th>DRAVP ID</th>
                <th>Peptide Name</th>
                <th>Sequence</th>
                <th>Sequence Length</th>
                <th>Source</th>
			</tr>
			</thead>
			<tbody>


            <?php
            $showpages=7;
            $page_eff=($showpages-1)/2;
            $pagesize=30;

            $sq="select * from antiviral_peptides  where Sequence like '%$sequence%' and Name like '%$name%'  and Sequence_Length like '%$Sequence_Length%' and Source like '%$Source%'  and Target_Organism like '%$target_organism%'  and Linear_Cyclic like '%$Linear_cyclic%'  and Stereochemistry like '%$stereochemistry%'  and UniProt_ID like '%$uniprot_ID%'  and PDB_ID like '%$pdb_ID%'  and Binding_Target like '%$binding_target%'  and Pubmed_ID like '%$pubmed_ID%' order by DRAVP_ID asc";
            $r=mysqli_query($conn,$sq);
            if(!$r){
                printf("Error:%s\n",mysqli_error($conn));
                exit();
            }
            $records=mysqli_num_rows($r);
            $pagecount=ceil($records/$pagesize);
            $start=($page-1)*$pagesize;
            $i=1;
            $i=($page-1)*$pagesize+$i;


            $sqld="select * from antiviral_peptides  where Sequence like '%$sequence%' and Name like '%$name%'  and Sequence_Length like '%$Sequence_Length%' and Source like '%$Source%'  and Target_Organism like '%$target_organism%'  and Linear_Cyclic like '%$Linear_cyclic%'  and Stereochemistry like '%$stereochemistry%'  and UniProt_ID like '%$uniprot_ID%'  and PDB_ID like '%$pdb_ID%'  and Binding_Target like '%$binding_target%'  and Pubmed_ID like '%$pubmed_ID%' order by DRAVP_ID asc limit $start,$pagesize";
            $rsd=mysqli_query($conn,$sqld);
            while($row=mysqli_fetch_assoc($rsd)) {

                echo ' <tr>
                <td><a href="http://dravp.cpu-bioinfor.org/browse/general_information.php?id='.$row['DRAVP_ID'].'" >'.$row['DRAVP_ID'].'</a></td>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Sequence'].'</td>
                <td>'.$row['Sequence_Length'].'</td>
                <td>'.$row['Source'].'</td>
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
        echo ' <a href="advanced_search.php?page=1&Sequence='.$sequence.'&Name='.$name.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-default">First</a>';


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
                    echo ' <a href="advanced_search.php?page='.$i.'&Sequence='.$sequence.'&Name='.$name.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-primary">'.$i.'</a> ';
                }else{
                    echo ' <a href="advanced_search.php?page='.$i.'&Sequence='.$sequence.'&Name='.$pubmed_IDme.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-default" >'.$i.'</a> ';
                }
            }
        }else{
            for($i=$start;$i<=$end;$i++) {
                if($i==$page){
                    echo ' <a href="advanced_search.php?page='.$i.'&Sequence='.$sequence.'&Name='.$pubmed_IDme.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-primary">'.$i.'</a> ';
                }else{
                    echo ' <a href="advanced_search.php?page='.$i.'&Sequence='.$sequence.'&Name='.$pubmed_IDme.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-default" >'.$i.'</a> ';
                }
            }
        }
        if($page<0){
            $uid=$end-$showpages+1;
            for($i=$uid;$i<=$end;$i++) {
                if($i==$hdeh){
                    echo ' <a href="advanced_search.php?page='.$i.'&Sequence='.$sequence.'&Name='.$pubmed_IDme.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-primary">'.$i.'</a> ';
                }else{
                    echo ' <a href="advanced_search.php?page='.$i.'&Sequence='.$sequence.'&Name='.$pubmed_IDme.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-default" >'.$i.'</a> ';
                }
            }
        }

        echo ' <a href="advanced_search.php?page='.$pagecount.'&Sequence='.$sequence.'&Name='.$pubmed_IDme.'&Sequence_Length='.$Sequence_Length.'&Source='.$Source.'&Target_Organism='.$target_organism.'&Linear_Cyclic='.$Linear_cyclic.'&Stereochemistry='.$stereochemistry.'&Uniprot_ID='.$uniprot_ID.'&Binding_Target='.$binding_target.'&Pubmed_ID='.$pubmed_ID.'&PDB_ID='.$pdb_ID.'" class="btn btn-default">Last</a> ';

        ?>



	</div>
</div>


<div style="height: 300px"></div>

<?php

require_once("../head/footer.php");

?>



</body>
</html>

