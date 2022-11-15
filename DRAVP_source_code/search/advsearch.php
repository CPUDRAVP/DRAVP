<!DOCTYPE html>
<html lang="en">

<!--  advsearch   -->

<head>
    <title>Advance-Search</title>
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
    <div class="row" style="padding-top:100px;">
        <ol class="breadcrumb">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dravp.cpu-bioinfor.org/search">Search</a></li>
            <li class="active">Advanced Search</li>
        </ol>
    </div>
    <div class="row mt40"></div>
        

   <!-- the content -->
    <div style="width:1200px; margin-left:100px;">
        <div class="col-md-offset-1  col-md-8 mt30" >
            <div class="row highlight">
                  <p class="text-center text-info"><h2 class="text-center text-info" style="color:#034a73;">Advanced Search</h2></p>
                  <form role="advanced search" action="advanced_search.php" method="get">



                    <div class="form-group">
                        <fieldset style="padding: 0">
                        <legend>
                          Sequence
                        </legend>
			                   <div class="col-md-12">
                              <textarea name="Sequence" class="form-control" cols="30"  rows="3" wrap="virtual" placeholder="e.g. INLKAIAALAKKLL"></textarea>
                        </div>

			</fieldset>
                    </div>




                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Peptide Name</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Name" class="form-control" id="words" placeholder="e.g.Mastoparan M" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Sequence Length</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Sequence_Length" class="form-control" id="words" placeholder="Any figure like 14" />
                              </div>
                          </fieldset>
                      </div>
                      
                      <!--<div class="form-group">-->
                      <!--    <fieldset style="padding: 0">-->
                      <!--    <legend>Mass</legend>-->
                      <!--     <div class="col-md-12">-->
                      <!--    <input type="text" name="wweh" class="form-control" id="words" placeholder="Any figure like 302071" />-->
                      <!--    </div>-->
                      <!--    </fieldset>-->
                      <!--</div>-->
                      
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Source</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Source" class="form-control" id="words" placeholder="e.g.Hornet Vespa mandarinia" />
                              </div>
                          </fieldset>
                      </div>


                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Target Organism</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Target_Organism" class="form-control" id="words" placeholder="e.g.HIV" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Linear/Cyclic</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Linear_Cyclic" class="form-control" id="words" placeholder="e.g.Linear"/>
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Stereochemistry</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Stereochemistry" class="form-control" id="words" placeholder="L" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>UniProt ID</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Uniprot_ID" class="form-control" id="words" placeholder="e.g.P04205" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>PDB ID</legend>
                              <div class="col-md-12">
                                  <input type="text" name="PDB_ID" class="form-control" id="words" placeholder="e.g.1ZMP" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Binding Target</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Binding_Target" class="form-control" id="words" placeholder="e.g.Integrase" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Pubmed ID</legend>
                              <div class="col-md-12">
                                  <input type="text" name="Pubmed_ID" class="form-control" id="words" placeholder="e.g.20086159" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Dataset</legend>
                              <select name="db" class="form-control" id="slt_loc">
                                  <option name="db['general']" selected>General</option>
                                  <option name="db['protein']">Protein</option>
                              </select> 
                          </fieldset>
                      </div>



                    <button type="submit" class="btn btn-default">Submit</button>
                    <input type="reset" id="reset_" name="sub_reset" value="Reset" class="btn btn-default"/>
                  </form>

            </div>
        </div>
    </div>
</div>

<?php

   require_once ("../head/footer.php");

?>

</body>
</html>
