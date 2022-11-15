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

$sql="select * from antiviral_peptides where DRAVP_ID='$tit'";
$rs=mysqli_query($conn,$sql);

if(mysqli_num_rows($rs)>0){
    $row=mysqli_fetch_assoc($rs);
}else{
    echo '<script>location.href="http://dravp.cpu-bioinfor.org/"</script>';exit;
}

$sql1="select * from physical where DRAVP_ID='$tit'";
$rs1=mysqli_query($conn,$sql1);

if(mysqli_num_rows($rs1)>0){
    $physical_info=mysqli_fetch_assoc($rs1);
}else{
    echo '<script>location.href="http://dravp.cpu-bioinfor.org/"</script>';exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>General Information</title>
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
    </style>
</head>


<body>

<?php
require_once ("../head/head_content.php");
?>

<div class="container">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dravp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dravp.cpu-bioinfor.org/browse/GeneralData.php">Browse</a></li>
            <li class="active"><?php  echo "{$row['DRAVP_ID']}"?></li>
	        <li style="float:right;"><a href="<?php echo $_SERVER['HTTP_REFERER'];  ?>"><span class="glyphicon glyphicon-arrow-left">Back</span></a></li>
        </ol>
    </div>



    <div class="row mt40">
        <div class="col-md-3 mt30">

            <div class="row">
                <div class="panel panel-info" style="position: fixed;">

                    <div class="panel-footer">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#General Information">General Information</a></li>
                            <li><a href="#Activity Information">Activity Information</a></li>
                            <li><a href="#Structure Information">Structure Information</a></li>
                            <li><a href="#Physicochemical Information">Physicochemical Information</a></li>
                            <li><a href="#Literature Information">Literature Information</a></li>

                        </ul>
                    </div>
                </div>
            </div>



        </div>

        <!-- the content -->
        <div class="col-md-offset-1  col-md-8 mt30" >

        <!--general information-->
            <p id="General Information" name="General Information">
                <strong style="font-size: 22px">General Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">

                  <p>
                      <span style="color: #4478b1;font-size:18px;">DRAVP ID</span>&nbsp; <?php echo $row['DRAVP_ID']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Peptide Name</span>&nbsp;&nbsp; <?php echo $row['Name']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Sequence</span>&nbsp; <?php echo $row['Sequence']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Sequence Length</span> &nbsp;<?php echo $row['Sequence_Length']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">UniProt ID</span>&nbsp;
                      <?php

                      //1##2##3
                      //                <a href=""> $row['UniProt_ID']<!--</a>-->
                     if($row['Uniprot_ID']=="No entry found"){
                          echo "{$row['Uniprot_ID']}";
                      }else{
                          $pieces = explode("##", $row['Uniprot_ID']);
                          $num = count($pieces);        //count最好放到for外面，可以让函数只执行一次 count统计数组中元素的个数。
                          $i=0;
                          while($i<$num){
                              $link=$pieces[$i];
                              
                              echo '<a href="https://www.uniprot.org/uniprot/'.$link.'">'.$link.'</a>&nbsp; ';
        
                              $i++;
                            }
                      }
                      
                      ?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Source</span>&nbsp; <?php echo $row['Source']?>
                  </p>

          </div>


         <br><br>
         <p id="Activity Information" name="Activity Information">
             <strong style="font-size: 22px">Activity Information</strong>
         </p>
         <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
         <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
                <p>
                  <span style="color: #4478b1;font-size:18px;">Target Organism</span>&nbsp; <?php echo $row['Target_Organism']?>
                </p>
               
                <p>
                    <span style="color: #4478b1;font-size:18px;">Activity</span>&nbsp; 
                    
                    <?php 
                    
                        if (strpos($row['Activity'],':')!==false) {
							$target_organism=$row['Activity'];

					    	$target_organism_array=explode("##", $target_organism);

					    	echo "<ul class='list-unstyled'>";

					    	for ($i=0; $i < count($target_organism_array) ; $i++ ) { 

			 		    		$temp=preg_replace("/\:/", ":</b>", $target_organism_array[$i]);
			 		    							
			 		    		echo "<li><b>$temp</b></li>";
			 		    			//echo "<b>$temp</b>";
					    	}

					    	echo "</ul>";  
					    } else {
							
							echo "{$row['Activity']}";
						}
						
                    ?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Hemolytic Activity</span>&nbsp; 
                    
                    <?php 
                    
                        if ($row['Hemolytic_Activity'] == "No hemolysis information or data found in the reference(s) presented in this entry") {

				    		echo $row['Hemolytic_Activity'];
				    							
				    	}else{

				    		$hemolytic_activity=$row['Hemolytic_Activity'];

					    	$hemolytic_activity_array=explode("##", $hemolytic_activity);

					    	echo "<ul class='list-unstyled'>";

					    	for ($i=0; $i < count($hemolytic_activity_array) ; $i++ ) { 

			 		    		$temp1=preg_replace("/\:/", ":</b>", $hemolytic_activity_array[$i]);
			 		    							
			 		    		echo "<li>$temp1</li>";
					    						
					    	}

					    	echo "</ul>";  
					    					
				    	}

                    ?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Cytotoxicity</span>&nbsp; 
                    
                    <?php
											
				    	if ($row['Cytotoxicity_Activity'] == "No cytotoxicity information found in the reference(s) presented") {

				    		echo $row['Cytotoxicity_Activity'];
				    							
				    	}else{

				    		$cytotoxicity_activity=$row['Cytotoxicity_Activity'];

					    	$cytotoxicity_activity_array=explode("##", $cytotoxicity_activity);

					    	echo "<ul class='list-unstyled'>";

					    	for ($i=0; $i < count($cytotoxicity_activity_array) ; $i++ ) { 

			 		    		$temp2=preg_replace("/\:/", ":</b>", $cytotoxicity_activity_array[$i]);
			 		    							
			 		    		echo "<li>$temp2</li>";
	  				    	
					    	}

					    	echo "</ul>";  
					    
				    	}
                    ?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Binding Target</span>&nbsp; <?php echo $row['Binding_Target']?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Mechanism</span>&nbsp; <?php echo $row['Mechanism']?>
                </p>


            </div>


            <br><br>
            <p id="Structure Information" name="Structure Information">
                <strong style="font-size: 22px">Structure Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
                <p>
                    <span style="color: #4478b1;font-size:18px;">PDB ID</span>&nbsp;
                    <?php
                        
                        if($row['PDB_ID']=="None"){
                            echo $row['PDB_ID'];
                        }else{
                            $piecesa = explode("##", $row['PDB_ID']);
                            $numa = count($piecesa);
                            $ia=0;
                            while($ia<$numa){
                                $linka=$piecesa[$ia];
        
                                echo '<a href="https://www.rcsb.org/structure/'.$linka.'">'.$linka.'</a>&nbsp; ';
        
                                $ia++;
                            }
                        }
                    ?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Predicted Structure ID</span>&nbsp; <a href="http://dravp.cpu-bioinfor.org/Structure/predicted_structure/<?php echo $row['Structure']?>"><?php echo $row['Predicted_structure_ID']?></a>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Structure</span>&nbsp;
                    <?php

                    $piecesb = explode("##", $row['Structure']);
                    $numb = count($piecesb);
                    $ib=0;
                    while($ib<$numb){
                        $linkb=$piecesb[$ib];


                        if($ib==0){
                            echo '<span class="btn btn-info" onclick="showDivs('.$ib.')" id="a'.$ib.'">'.$linkb.'</span>';
                        }else{
                            echo '<span class="btn btn-default" style="background:#e6e6e6;" onclick="showDivs('.$ib.')" id="a'.$ib.'">'.$linkb.'</span>';
                        }
                        $ib++;
                    }
                    $ic=0;
                    while($ic<$numb){
                        $linkc=$piecesb[$ic];



                        if($ic==0){
                            echo ' <p style="height: 400px; width: 400px; position: relative;" id="'.$ic.'" class="viewer_3Dmoljs" data-href="http://dravp.cpu-bioinfor.org/Structure/predicted_structure/'.$linkc.'" data-backgroundcolor="0xffffff" data-style="cartoon:color=spectrum" data-ui="config"></p>';

                        }else{
                            echo ' <p style="height: 400px; width: 400px; position: relative;display: none" id="'.$ic.'" class="viewer_3Dmoljs" data-href="http://dravp.cpu-bioinfor.org/Structure/predicted_structure/PDB/'.$linkc.'" data-backgroundcolor="0xffffff" data-style="cartoon:color=spectrum" data-ui="config"></p>';

                        }

                        $ic++;
                    }
                    ?>
                </p>



                <p>
                    <span style="color: #4478b1;font-size:18px;">Linear/Cyclic</span>&nbsp; <?php echo $row['Linear_Cyclic']?>
                </p>

                <p>
                    <span style="color: #4478b1;font-size:18px;">N-terminal Modification</span>&nbsp; <span style="font-size:15px;color:black"><?php echo $row['N-terminal_Modification']?></span>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">C-terminal Modification</span>&nbsp; <?php echo $row['C-terminal_Modification']?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Other Modification</span>&nbsp; <?php echo $row['Other_Modification']?>
                </p>
                <p>
                    <span style="color: #4478b1;font-size:18px;">Stereochemistry</span>&nbsp; <?php echo $row['Stereochemistry']?>
                </p>

            </div>


            <br><br>
            <p id="Physicochemical Information" name="Physicochemical Information">
                <strong style="font-size: 22px">Physicochemical Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">

                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Formula</span>&nbsp; <?php echo $row['Formula']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Absent amino acids</span>&nbsp; <?php echo $row['Absent_amino_acids']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Common amino acids</span>&nbsp; <?php echo $row['Common_amino_acids']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Mass</span>&nbsp; <?php echo $row['Mass']?>
                        </p>

                        <p>
                            <span style="color: #4478b1;font-size:18px;">Pl</span>&nbsp; <?php echo $row['pI']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Basic residues</span>&nbsp; <?php echo $row['Basic_residues']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Acidic residues</span>&nbsp; <?php echo $row['Acidic_residues']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Hydrophobic residues</span>&nbsp; <?php echo $row['Hydrophobic_residues']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Net charge</span>&nbsp; <?php echo $row['Net_charge']?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Boman Index</span>&nbsp; <?php echo $row['Boman_Index']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Hydrophobicity</span>&nbsp; <?php echo $row['Hydrophobicity']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Aliphatic Index</span>&nbsp; <?php echo $row['Aliphatic_Index']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Half Life</span>&nbsp; <br>
   								<ul class="list-unstyled">
   									<li>&nbsp;&nbsp;&nbsp;&nbsp;<? echo "Mammalian:{$row['Half_Life_Mammalian_']}"; ?></li>
   									<li>&nbsp;&nbsp;&nbsp;&nbsp;<? echo "Yeast:{$row['Half_Life__Yeast_']}"; ?></li>
   									<li>&nbsp;&nbsp;&nbsp;&nbsp;<? echo "E.coli:{$row['Half_Life__E_coli_']}"; ?></li>
   								</ul>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Extinction Coefficient cystines</span>&nbsp; <?php echo $row['Extinction_Coefficient_cystines']?>
                        </p>
                        <p>
                            <span style="color: #4478b1;font-size:18px;">Absorbance 280nm</span>&nbsp; <?php echo $row['Absorbance_280nm']?>
                        </p>

                        <p>
                            <span style="color: #4478b1;font-size:18px;">Polar residues</span>&nbsp; <?php echo $row['Polar_residues']?>
                        </p>
                    </div>
                </div>
                

                <style>
				            #chartContainer{
				                border:solid 1px #999;
				                
				            }
				        </style>

				        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/H5Draw.js"></script>
				        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/h5Charts.js"></script>
				        
				        <script>
				            window.onload = function(){
				            var chart = new h5Charts.SerialChart();
				            chart.dataProvider = [{acid:"A",number:<?php echo "{$physical_info['Alanine']}"; ?>},{acid:"R",number:<?php echo "{$physical_info['Arginine']}"; ?>},{acid:"N",number:<?php echo "{$physical_info['Asparagine']}"; ?>},{acid:"D",number:<?php echo "{$physical_info['Aspartic Acid']}"; ?>},{acid:"C",number:<?php echo "{$physical_info['Cysteine']}"; ?>},{acid:"E",number:<?php echo "{$physical_info['Glutamic Acid']}"; ?>},{acid:"Q",number:<?php echo "{$physical_info['Glutamine']}"; ?>},{acid:"G",number:<?php echo "{$physical_info['Glycine']}"; ?>},{acid:"H",number:<?php echo "{$physical_info['Histidine']}"; ?>},{acid:"I",number:<?php echo "{$physical_info['Isoleucine']}"; ?>},{acid:"L",number:<?php echo "{$physical_info['Leucine']}"; ?>},{acid:"K",number:<?php echo "{$physical_info['Lysine']}"; ?>},{acid:"M",number:<?php echo "{$physical_info['Methionine']}"; ?>},{acid:"F",number:<?php echo "{$physical_info['Phenylalanine']}"; ?>},{acid:"P",number:<?php echo "{$physical_info['Proline']}"; ?>},{acid:"S",number:<?php echo "{$physical_info['Serine']}"; ?>},{acid:"T",number:<?php echo "{$physical_info['Threonine']}"; ?>},{acid:"W",number:<?php echo "{$physical_info['Tryptophan']}"; ?>},{acid:"Y",number:<?php echo "{$physical_info['Tyrosine']}"; ?>},{acid:"V",number:<?php echo "{$physical_info['Valine']}"; ?>}];
				            chart.categoryField = "acid";
				            chart.valueField = "number";
				            chart.type = "column";
				            chart.columnWidth = 30;
				            chart.colors = ["#f00","#0f0","#0ff","#d649b3","#00e0ee","#59266c","#00f","#0f0","#056a4c","#f00","#f00","#909648","#0ff","#c87ae5","#0ff","#0f0","#899508","#0f0","#056a4c","#f00","#6f1391"];
				            chart.addTo("chartContainer");
				            };
				        </script>

				    	
				    	
				        <canvas id="chartContainer" width="700" height="350">
				             
								</canvas>
								<script type="text/javascript">
									function goBarChart(dataArr) {
										var canvas, ctx;
										var cWidth, cHeight, cMargin, cSpace;
										var originX, originY;
										var bMargin, tobalBars, bWidth, maxValue;
										var totalYNomber;
										var gradient;

										var ctr, numctr, speed;
										var mousePosition = {};

										canvas = document.getElementById("chartContainer");
										if (canvas && canvas.getContext) {
											ctx = canvas.getContext("2d");
										}
										initChart(); 

										function initChart() {
											cMargin = 20;
											cSpace = 30;
											cHeight = canvas.height - cMargin * 2 - cSpace;
											cWidth = canvas.width - cMargin * 2 - cSpace;
											originX = cMargin + cSpace;
											originY = cMargin + cHeight;

											bMargin = 15;
											tobalBars = dataArr.length;
											bWidth = parseInt(cWidth / tobalBars - bMargin);
											maxValue = 0;
											for (var i = 0; i < dataArr.length; i++) {
												var barVal = parseInt(dataArr[i][1]);
												if (barVal > maxValue) {
													maxValue = barVal;
												}
											}
											maxValue += 1;
											totalYNomber = maxValue;
											ctr = 1;
											numctr = 100;
											speed = 10;

											gradient = ctx.createLinearGradient(0, 0, 0, 300);
											//gradient.addColorStop(0, 'rgba(99 184 255)');
        							gradient.addColorStop(1, 'rgba(50,100,150,.8)');

										}
										drawLineLabelMarkers();

										function drawLineLabelMarkers() {
											ctx.translate(0.5, 0.5); 
											ctx.font = "12px Arial";
											ctx.lineWidth = 0.5;
											ctx.fillStyle = "#000";
											ctx.strokeStyle = "#000";
											drawLine(originX, originY, originX, cMargin);
											drawLine(originX, originY, originX + cWidth, originY);

											drawMarkers();
											ctx.translate(-0.5, -0.5); 
										}

										function drawLine(x, y, X, Y) {
											ctx.beginPath();
											ctx.moveTo(x, y);
											ctx.lineTo(X, Y);
											ctx.stroke();
											ctx.closePath();
										}

										function drawMarkers() {
											ctx.strokeStyle = "#E0E0E0";
											var oneVal = parseInt(maxValue / totalYNomber);
											ctx.textAlign = "right";
											for (var i = 0; i <= totalYNomber; i++) {
												var markerVal = i * oneVal;
												var xMarker = originX - 5;
												var yMarker = parseInt(cHeight * (1 - markerVal / maxValue)) + cMargin;
												//console.log(xMarker, yMarker+3,markerVal/maxValue,originY);
												ctx.fillText(markerVal, xMarker, yMarker + 3, cSpace); 
												if (i > 0) {
													drawLine(originX, yMarker, originX + cWidth, yMarker);
												}
											}
											ctx.textAlign = "center";
											for (var i = 0; i < tobalBars; i++) {
												var markerVal = dataArr[i][0];
												var xMarker = parseInt(originX + cWidth * (i / tobalBars) + bMargin + bWidth / 2);
												var yMarker = originY + 15;
												ctx.fillText(markerVal, xMarker, yMarker, cSpace); 
											}
											ctx.save();
											ctx.rotate(-Math.PI / 2);
											ctx.fillText("number", -canvas.height /2.2, cSpace - 10);
											ctx.restore();
											ctx.fillText("Amino Acid Distribution", originX + cWidth / 2, originY + cSpace / 2 + 20);


        							//ctx.fillText("18261", originX + cWidth - 40, cSpace - 10);
										};
										drawBarAnimate();
										function drawBarAnimate(mouseMove) {
											for (var i = 0; i < tobalBars; i++) {
												var oneVal = parseInt(maxValue / totalYNomber);
												var barVal = dataArr[i][1];
												var barH = parseInt(cHeight * barVal / maxValue * ctr / numctr);
												var y = originY - barH;
												var x = originX + (bWidth + bMargin) * i + bMargin;
												drawRect(x, y, bWidth, barH, mouseMove); 
												ctx.fillText(parseInt(barVal * ctr / numctr), x + 10, y - 8); 
											}
											if (ctr < numctr) {
												ctr++;
												setTimeout(function () {
													ctx.clearRect(0, 0, canvas.width, canvas.height);
													drawLineLabelMarkers();
													drawBarAnimate();
												}, speed);
											}
										}
										function drawRect(x, y, X, Y, mouseMove) {

											ctx.beginPath();
											ctx.rect(x, y, X, Y);
											if (mouseMove && ctx.isPointInPath(mousePosition.x, mousePosition.y)) { 
												ctx.fillStyle = "blue";
											} else {
												ctx.fillStyle = gradient;
												ctx.strokeStyle = gradient;
											}
											ctx.fill();
											ctx.closePath();

										}
										var mouseTimer = null;
										canvas.addEventListener("mousemove", function (e) {
											e = e || window.event;
											if (e.offsetX || e.offsetX == 0) {
												mousePosition.x = e.offsetX;
												mousePosition.y = e.offsetY;
											} else if (e.layerX || e.layerX == 0) {
												mousePosition.x = e.layerX;
												mousePosition.y = e.layerY;
											}

											clearTimeout(mouseTimer);
											mouseTimer = setTimeout(function () {
												ctx.clearRect(0, 0, canvas.width, canvas.height);
												drawLineLabelMarkers();
												drawBarAnimate(true);
											},50);
										});
										canvas.onclick = function () {
											initChart(); 
											drawLineLabelMarkers(); 
											drawBarAnimate(); 
										};
									};
									goBarChart(
										[
											['Ala', <?php echo($physical_info['Alanine']); ?>],
											['Arg', <?php echo($physical_info['Arginine']); ?>],
											['Asn', <?php echo($physical_info['Asparagine']); ?>],
											['Asp', <?php echo($physical_info['Aspartic Acid']); ?>],
											['Cys', <?php echo($physical_info['Cysteine']); ?>],
											['Glu', <?php echo($physical_info['Glutamic Acid']); ?>],
											['Gln', <?php echo($physical_info['Glutamine']); ?>],
											['Gly', <?php echo($physical_info['Glycine']); ?>],
											['His', <?php echo($physical_info['Histidine']); ?>],
											['Ile', <?php echo($physical_info['Isoleucine']); ?>],
											['Leu', <?php echo($physical_info['Leucine']); ?>],
											['Lys', <?php echo($physical_info['Lysine']); ?>],
											['Met', <?php echo($physical_info['Methionine']); ?>],
											['Phe', <?php echo($physical_info['Phenylalanine']); ?>],
											['Pro', <?php echo($physical_info['Proline']); ?>],
											['Ser', <?php echo($physical_info['Serine']); ?>],
											['Thr', <?php echo($physical_info['Threonine']); ?>],
											['Trp', <?php echo($physical_info['Tryptophan']); ?>],
											['Tyr', <?php echo($physical_info['Tyrosine']); ?>],
											['Val', <?php echo($physical_info['Valine']); ?>]
										]
									)
								</script>
                
                
               

            </div>



            <br><br>
            <p id="Literature Information" name="Literature Information">
                <strong style="font-size: 22px">Literature Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
                
                
            <?php
                $title = explode("##", $row['Title']);						
							$pubmed_id = explode("##", $row['Pubmed_ID']);
							$author = explode("##", $row['Author']);
							$reference = explode("##", $row['Reference']);
							$doi = explode("##",$row['Doi']);

	
							for ($i= 0;$i< count($pubmed_id); $i++){
								$num=$i+1;
echo<<<LL_IN
                    <p>
                        <span style="color: #333;;font-size:18px;">Literature {$num}</span>
                    </p>
                    <p>
                        <span style="color: #4478b1;font-size:18px;">Title</span>&nbsp;&nbsp; {$title[$i]}
                    </p>
                    <p>
                        <span style="color: #4478b1;font-size:18px;">Pubmed ID &nbsp;
                        <a target='_blank'  href="http://www.ncbi.nlm.nih.gov/pubmed/{$pubmed_id[$i]}" style="font-size:15px;">{$pubmed_id[$i]}</a>
                        </span>
                    </p>
                    <p>
                        <span style="color: #4478b1;font-size:18px;">Reference</span>&nbsp;&nbsp; {$reference[$i]}
                    </p>
                    <p>
                        <span style="color: #4478b1;font-size:18px;">Author</span>&nbsp;&nbsp; {$author[$i]}
                    </p>
                    <p>
                        <span style="color: #4478b1;font-size:18px;">Doi &nbsp;
                            <a target="_blank"  href="https://doi.org/{$doi[$i]}" style="font-size:15px;">{$doi[$i]}</a>
                        </span>
                    </p>

LL_IN;
						

							}
                ?>
            </div>
            <br><br>

        </div>
    </div>
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
</body>
