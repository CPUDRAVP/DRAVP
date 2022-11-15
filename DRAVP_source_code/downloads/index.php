<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome To DRAVP</title>
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

<div class="container" style="padding-bottom:30px;">
    <div class="row" style="padding-top:100px;">
        <ol class="breadcrumb">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Downloads</li>
        </ol>
    </div>
</div>


<div class="container">
    <table class="table table-bordered text-center">
		<thead>
          <tr>
            <th rowspan="1" class="text-center">Data</th>
            <th class="text-center">xlsx</th>
            <th class="text-center">txt</th>
            <th class="text-center">Fasta</th>
          </tr>
        </thead>
		<tbody>
          <tr>
            <td>General</td>
            <td><a href="download.php?filename=data/antiviral_peptides.xlsx">antiviral_peptides.xlsx</a></td>
            <td><a href="download.php?filename=data/antiviral_peptides.txt">antiviral_peptides.txt</a></td>
            <td><a href="download.php?filename=data/antiviral_peptides.fasta">antiviral_peptides.fasta</a></td>
          </tr>
          <tr>
            <td>Protein</td>
            <td><a href="download.php?filename=data/antiviral_protein.xlsx">antiviral_protein.xlsx</a></td>
            <td><a href="download.php?filename=data/antiviral_protein.txt">antiviral_protein.txt</a></td>
            <td><a href="download.php?filename=data/antiviral_protein.fasta">antiviral_protein.fasta</a></td>
          </tr>
          <tr>
            <td>Patent</td>
            <td><a href="download.php?filename=data/patent_peptides.xlsx">patent_peptides.xlsx</a></td>
            <td><a href="download.php?filename=data/patent_peptides.txt">patent_peptides.txt</a></td>
            <td><a href="download.php?filename=data/patent_peptides.fasta">patent_peptides.fasta</a></td>
          </tr>
          <tr>
            <td>Clinical</td>
            <td><a href="download.php?filename=data/clinical_peptides.xlsx">clinical_data.xlsx</a></td>
            <td><a href="download.php?filename=data/clinical_peptides.xlsx">clinical_data.txt</a></td>
            <td>-</td>
          </tr>
          <tr>
            <td>Predicted structure</td>
            <td colspan="3"><a href="download.php?filename=data/predicted_structure.zip">Predicted structure.zip</a></td>
          </tr>
          
          
          
		</tbody>
    </table>           

  <!--  <table class="table table-bordered text-center">-->
		<!--<thead>-->
  <!--        <tr>-->
  <!--          <th class="text-center">Activity</th>-->
  <!--          <th class="text-center">xlsx</th>-->
  <!--          <th class="text-center">txt</th>-->
  <!--          <th class="text-center">Fasta</th>-->
  <!--        </tr>-->
  <!--      </thead>-->
		<!--<tbody>-->
		<!--  <tr>-->
  <!--          <td>Antimicrobial</td>-->
  <!--          <td><a href="download.php?filename=data/Antimicrobial_avps.xlsx">Antimicrobial_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antimicrobial_avps.txt">Antimicrobial_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antimicrobial_avps.fasta">Antimicrobial_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--        <tr>-->
  <!--          <td>Antibacteral</td>-->
  <!--          <td><a href="download.php?filename=data/Antibacterial_avps.xlsx">Antibacterial_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antibacterial_avps.txt">Antibacterial_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antibacterial_avps.fasta">Antibacterial_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Anti-Gram+</td>-->
  <!--          <td><a href="download.php?filename=data/Anti-Gram+_avps.xlsx">Anti-Gram+_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anti-Gram+_avps.txt">Anti-Gram+_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anti-Gram+_avps.fasta">Anti-Gram+_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Anti-Gram-</td>-->
  <!--          <td><a href="download.php?filename=data/Anti-Gram-_avps.xlsx">Anti-Gram-_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anti-Gram-_avps.txt">Anti-Gram-_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anti-Gram-_avps.fasta">Anti-Gram-_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Antifungal</td>-->
  <!--          <td><a href="download.php?filename=data/Antifungal_avps.xlsx">Antifungal_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antifungal_avps.txt">Antifungal_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antifungal_avps.fasta">Antifungal_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Antiviral</td>-->
  <!--          <td><a href="download.php?filename=data/Antiviral_avps.xlsx">Antiviral_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antiviral_avps.txt">Antiviral_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antiviral_avps.fasta">Antiviral_avps.fasta</a></td>-->
  <!--        </tr>-->
		<!--      <tr>-->
  <!--          <td>Anticancer</td>-->
  <!--          <td><a href="download.php?filename=data/Anticancer_avps.xlsx">Anticancer_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anticancer_avps.txt">Anticancer_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anticancer_avps.fasta">Anticancer_avps.fasta</a></td>-->
  <!--        </tr>-->
		<!--      <tr>-->
  <!--          <td>Anti-SARS-CoV-2</td>-->
  <!--          <td><a href="download.php?filename=data/Anti-SARS-CoV-2_avps.xlsx">Anti-SARS-CoV-2_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anti-SARS-CoV-2_avps.txt">Anti-SARS-CoV-2_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Anti-SARS-CoV-2_avps.fasta">Anti-SARS-CoV-2_avps.fasta</a></td>-->
  <!--        </tr>-->
		<!--      <tr>-->
  <!--          <td>Antiparasitic</td>-->
  <!--          <td><a href="download.php?filename=data/Antiparasitic_avps.xlsx">Antiparasitic_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antiparasitic_avps.txt">Antiparasitic_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Antiparasitic_avps.fasta">Antiparasitic_avps.fasta</a></td>-->
  <!--        </tr>-->
		<!--      <tr>-->
  <!--          <td>Insecticidal</td>-->
  <!--          <td><a href="download.php?filename=data/Insecticidal_avps.xlsx">Insecticidal_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/Insecticidal_avps.txt">Insecticidal_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/Insecticidal_avps.fasta">Insecticidal_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--      </tbody>-->
  <!--  </table>-->
	
  <!--  <table class="table table-bordered text-center">-->
		<!--<thead>-->
  <!--        <tr>-->
  <!--          <th rowspan="1" class="text-center">Subclass</th>-->
  <!--          <th class="text-center">xlsx</th>-->
  <!--          <th class="text-center">txt</th>-->
  <!--          <th class="text-center">Fasta</th>-->
  <!--        </tr>-->
  <!--      </thead>-->
		<!--<tbody>-->
  <!--        <tr>-->
  <!--          <td>Natural avps</td>-->
  <!--          <td><a href="download.php?filename=data/natual_avps.xlsx">natual_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/natual_avps.txt">natual_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/natual_avps.fasta">natual_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Synthetic avps</td>-->
  <!--          <td><a href="download.php?filename=data/synthetic_avps.xlsx">synthetic_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/synthetic_avps.txt">synthetic_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/synthetic_avps.fasta">synthetic_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Plant avps</td>-->
  <!--          <td><a href="download.php?filename=data/plant_avps.xlsx">plant_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/plant_avps.txt">plant_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/plant_avps.fasta">plant_avps.fasta</a></td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Stapled avps</td>-->
  <!--          <td><a href="download.php?filename=data/stapled_avps.xlsx">stapled_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/stapled_avps.txt">stapled_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/stapled_avps.fasta">stapled_avps.fasta</a></td>-->
            <!-- <td>Allows to download stapled avps after August 1, 2021</td> -->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>Candidate avps</td>-->
  <!--          <td><a href="download.php?filename=data/candidate_avps.xlsx">candidate_avps.xlsx</a></td>-->
  <!--          <td><a href="download.php?filename=data/candidate_avps.txt">candidate_avps.txt</a></td>-->
  <!--          <td><a href="download.php?filename=data/candidate_avps.fasta">candidate_avps.fasta</a></td>-->
  <!--        </tr>-->
		<!--</tbody>-->
  <!--  </table>     -->

		
    <table class="table table-bordered text-center">
		<thead >
          <tr>
            <th rowspan="2" class="text-center">Software</th>
            <th colspan="3" class="text-center">URL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>BLAST</td>
            <td><a href="https://blast.ncbi.nlm.nih.gov/Blast.cgi?CMD=Web&PAGE_TYPE=BlastDocs&DOC_TYPE=Download">Download BLAST Software and Databases</a></td>
          </tr>
        </tbody>
    </table>
	
	<table class="table table-bordered text-center">
		<thead>
          <tr>
            <th rowspan="2" class="text-center">Source code</th>
            <th colspan="3" class="text-center">URL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Original DRAVP</td>
            <td><a href="https://github.com/CPUDRAVP/DRAVP">Download the source code of DRAVP</a></td>
          </tr>
        </tbody>
    </table>
</div>


<?php

    require_once ("../head/footer.php");

?>




</body>
</html>
