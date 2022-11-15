<!DOCTYPE html>
<html>
<head>
    <title> DRAVP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="./cs/blast.css"/>
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
            <li><a href="http://dravp.cpu-bioinfor.org/tools/similarity-search.php">Tools</a></li>
            <li class="active">Similarity search</li>
        </ol>
    </div>
</div>

<div id="blast-content" style="margin-top:-20px;">
     <div class="p-blast"><h2>BLAST</h2></div>
    
    <form method="get" action="http://dravp.cpu-bioinfor.org/cgi-bin/blast.cgi">
        <div class="wd_blast">
            <label for="seq_one" class="lb_blast">Sequence (FASTA)</label>
            <textarea  name="simi_area" rows="5" id="text_blast"  placeholder="Enter sequence in FASTA format.&#10;>DRAVP&#10;INLKAIAALAKKLL"></textarea>
        </div>

        <div class="wd_blast">
            <label for="seq_two" class="lb_blast">Scoring Matrix</label>
            <select class="form-control input-lg" style="width: 35%" name="matrix">

                <option value="BLOSUM45">BLOSUM45</option>
                <option value="BLOSUM50">BLOSUM50</option>
                <option value="BLOSUM62" selected="selected">BLOSUM62</option>
                <option value="BLOSUM80">BLOSUM80</option>
                <option value="BLOSUM90">BLOSUM90</option>
                <option value="PAM30">PAM30</option>
                <option value="PAM70">PAM70</option>
                <option value="PAM250">PAM250</option>

            </select>
        </div>
        <div class="wd_blast">
            <button type="reset" class="btn_blast" id="reset_blast">Reset</button>
            <button type="submit" class="btn_blast">Submit</button>
        </div>
    </form>
</div>
<div class="clear"></div>
<?php
require_once("../head/footer.php");

?>
</body>
</html>