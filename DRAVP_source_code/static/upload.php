<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dravp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');



@$pepname=$_POST['pepname'];
@$sequence=$_POST['sequence'];
@$origin=$_POST['origin'];
@$nature=$_POST['nature'];
@$activity=$_POST['activity'];
@$binding_target=$_POST['binding_target'];
@$uniprot_id=$_POST['uniprot_id'];
@$pdb_id=$_POST['pdb_id'];
@$liter_title=$_POST['liter_title'];
@$doi=$_POST['doi'];
@$pubmed_id=$_POST['pubmed_id'];
@$additions=$_POST['additions'];
@$client_name=$_POST['client_name'];
@$e_mail=$_POST['e_mail'];



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
$pepname=escapeString($pepname);
$pepname=safe_replace($pepname);
$sequence=escapeString($sequence);
$sequence=safe_replace($sequence);
$origin=escapeString($origin);
$origin=safe_replace($origin);
$nature=escapeString($nature);
$nature=safe_replace($nature);
$activity=escapeString($activity);
$activity=safe_replace($activity);
$binding_target=escapeString($binding_target);
$binding_target=safe_replace($binding_target);
$uniprot_id=escapeString($uniprot_id);
$uniprot_id=safe_replace($uniprot_id);
$pdb_id=escapeString($pdb_id);
$pdb_id=safe_replace($pdb_id);
$liter_title=escapeString($liter_title);
$liter_title=safe_replace($liter_title);
$doi=escapeString($doi);
$doi=safe_replace($doi);
$pubmed_id=escapeString($pubmed_id);
$pubmed_id=safe_replace($pubmed_id);
$additions=escapeString($additions);
$additions=safe_replace($additions);
$client_name=escapeString($client_name);
$client_name=safe_replace($client_name);
$e_mail=escapeString($e_mail);
$e_mail=safe_replace($e_mail);




$sql="insert into Submit(Peptide_Name,Sequence,Origin,Nature,Activity,Binding_Target,UniProt_ID,PDB_ID,Literature_Title,Literature_Doi,Pubmed_ID,Any_Additions,Name,Email_Address) values('$pepname','$sequence','$organism','$genename','$bioactivity','$tar_org','$binding','$pdb_id','$liter_title','$pubmed_id','$swiss_prot','$comments','$client_name','$e_mail')";
$r=mysqli_query($conn,$sql);
if($r){
    echo '<script>alert("Submitted successfully, thank you！");location.href="http://dravp.cpu-bioinfor.org/"</script>';
    exit;
}else{
    echo '<script>location.href="http://dravp.cpu-bioinfor.org/"</script>';
    exit;
}