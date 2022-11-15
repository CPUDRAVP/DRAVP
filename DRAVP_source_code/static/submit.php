<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit</title>
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
            <li class="active">Submission</li>
        </ol>
        </div>
</div>
<div style="width:1000px; margin-left:500px;margin-top:-120px">
    <div class="row">
    	<div class="col-md-6">
            <h2 style="text-align:center;color:#034a73;">Submission</h2>
            <form  method="post" action="upload.php">
              <div class="main_form">
                <br/>
                <p>Peptide Name:</p>
                <input type="text" name="pepname" class="form-control"/>
                <br/>
                <p>Sequence:</p>
                <input type="text" name="sequence" class="form-control" />
                <br/>
                <p>Origin:</p>
                <input type="text" name="origin" class="form-control" />
                <br/>
                <p>Nature:</p>
                <input type="text" name="nature" class="form-control" />
                <br/>
                <p>Activity:</p>
                <input type="text" name="activity" class="form-control" />
                <br/>
                <p>Binding Target:</p>
                <input type="text" name="binding_target" class="form-control" />
                <br/>
                <p>UniProt ID:</p>
                <input type="text" name="uniprot_id" class="form-control" />
                <br/>
                <p>PDB ID:</p>
                <input type="text" name="pdb_id" class="form-control" />
                <br/>
                <p>Literature Title:</p>
                <input type="text" name="liter_title" class="form-control" />
                <br/>
                <p>Literature Doi:</p>
                <input type="text" name="doi" class="form-control" />
                <br/>
                <p>Pubmed ID:</p>
                <input type="text" name="pubmed_id" class="form-control" />
                <br/>
                <p>Any Additions:</p>
                <textarea name="additions" class="form-control" rows="3"></textarea>
                </div> 
                <div class="main_form">
                <br/>                 
                <div class="fm_title" id="title2">Your Information</div>
                <p>Your Name:</p>
                <input type="text" name="client_name" class="form-control"/>
                <br/>
                <p>Contact E-mail Address:</p>
                <input type="text" name="e_mail" class="form-control"/> 
                </div>
                <div class="btn_box" style="margin-top:20px;text-align:center;"> 
                <input type="submit" id="smt_" name="sub_smt" value="Submit" class="btn btn-default" style="margin-right:25px;"/> 
                <input type="reset" id="reset_" name="sub_reset" value="Reset" class="btn btn-default" />
              </div> 
           </form>   
     	</div>
    </div>
</div>


<?php

require_once ("../head/footer.php");

?>

</body>
</html>
