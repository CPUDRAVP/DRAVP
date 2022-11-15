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

$sql="select * from antiviral_protein where DRAVPR_ID='$tit'";
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
    <title>General Information</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/public.css">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/css/molstar.css" />
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
            <li class="active"><?php  echo "{$row['DRAVPR_ID']}"?></li>
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
                            <li><a href="#Comment">Comment</a></li>
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
                      <span style="color: #4478b1;font-size:18px;">DRAVPR ID</span>&nbsp; <?php echo $row['DRAVPR_ID']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Name</span>&nbsp;&nbsp; <?php echo $row['Name']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Sequence</span>&nbsp; <?php echo '<textarea style="width:700px;line-height:30px;margin-top:7px;">'.$row['Sequence'].'</textarea>'?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Sequence Length</span> &nbsp;<?php echo $row['Sequence_Length']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Source</span>&nbsp; <?php echo $row['Source']?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">UniProt ID</span>&nbsp;<?php echo '<a href="https://www.uniprot.org/uniprot/'.$row['Uniprot_ID'].'">'.$row['Uniprot_ID'].'</a>';?>
                  </p>
                  <p>
                      <span style="color: #4478b1;font-size:18px;">Gene</span>&nbsp;<?php echo $row['Gene'];?>
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
                <!--<p>-->
                <!--    <span style="color: #4478b1;font-size:18px;">Binding Target</span>&nbsp; <?php echo $row['Binding_Target']?>-->
                <!--</p>-->
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
                    <span style="color: #4478b1;font-size:18px;">Predicted Structure Download</span>&nbsp; 
                    <a href="http://dravp.cpu-bioinfor.org/Structure/download.php?filename=./predicted_structure/<?php echo $row['Predicted_structure_ID']?>.pdb"><?php echo $row['Predicted_structure_ID']?></a>
                </p>
                <p>
                    <!--<span style="color: #4478b1;font-size:18px;">Structure</span>&nbsp;-->
                    <?php

                    // $piecesb = explode("##", $row['Structure']);
                    // $numb = count($piecesb);
                    // $ib=0;
                    // while($ib<$numb){
                    //     $linkb=$piecesb[$ib];


                    //     if($ib==0){
                    //         echo '<span class="btn btn-info" onclick="showDivs('.$ib.')" id="a'.$ib.'">'.$linkb.'</span>';
                    //     }else{
                    //         echo '<span class="btn btn-default" style="background:#e6e6e6;" onclick="showDivs('.$ib.')" id="a'.$ib.'">'.$linkb.'</span>';
                    //     }
                    //     $ib++;
                    // }
                    // $ic=0;
                    // while($ic<$numb){
                    //     $linkc=$piecesb[$ic];



                    //     if($ic==0){
                    //         echo ' <p style="height: 400px; width: 400px; position: relative;" id="'.$ic.'" class="viewer_3Dmoljs" data-href="http://dravp.cpu-bioinfor.org/Structure/predicted_structure/'.$linkc.'" data-backgroundcolor="0xffffff" data-style="cartoon:color=spectrum" data-ui="config"></p>';

                    //     }else{
                    //         echo ' <p style="height: 400px; width: 400px; position: relative;display: none" id="'.$ic.'" class="viewer_3Dmoljs" data-href="http://dravp.cpu-bioinfor.org/Structure/predicted_structure/PDB/'.$linkc.'" data-backgroundcolor="0xffffff" data-style="cartoon:color=spectrum" data-ui="config"></p>';

                    //     }

                    //     $ic++;
                    // }
                    // ?>
                    <?php 
                        include_once("./viewer1.php");
                    ?>
                </p>

                <p>
                    <span style="color: #4478b1;font-size:18px;">Modification</span>&nbsp; <?php echo $row['Modification']?>
                </p>
            </div>


            <br><br>
            <p id="Comment" name="Comment">
                <strong style="font-size: 22px">Comment</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
                <p>
                    <?php echo $row['Comment']?>
                </p>
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
				// 			$reference = explode("##", $row['Reference']);
				// 			$doi = explode("##",$row['Doi']);

	
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
                        <span style="color: #4478b1;font-size:18px;">Author</span>&nbsp;&nbsp; {$author[$i]}
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

<script type="text/javascript" src="http://dravp.cpu-bioinfor.org/lazysheep/js/molstar.js"></script>
        <script type="text/javascript">
            molstar.Viewer.create('app', {
                layoutIsExpanded: true,
                layoutShowControls: false,
                layoutShowRemoteState: false,
                layoutShowSequence: true,
                layoutShowLog: false,
                layoutShowLeftPanel: true,

                viewportShowExpand: true,
                viewportShowSelectionMode: false,
                viewportShowAnimation: false,

                pdbProvider: 'http://dravp.cpu-bioinfor.org/',
                emdbProvider: 'rcsb',
            }).then(viewer => {
                viewer.loadPdb('7bv2');
                viewer.loadEmdb('EMD-30210', { detail: 6 });
                // viewer.loadAllModelsOrAssemblyFromUrl('https://cs.litemol.org/5ire/full', 'mmcif', false, { representationParams: { theme: { globalName: 'operator-name' } } })
                // viewer.loadStructureFromUrl('my url', 'pdb', false, {
                //     representationParams: {
                //         theme: {
                //             globalName: 'uniform',
                //             globalColorParams: { value: 0xff0000 }
                //         }
                //     },
                //     label: 'my structure'
                // });
            });
        </script>


</body>
