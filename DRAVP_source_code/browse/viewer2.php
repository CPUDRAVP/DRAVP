<?php
@header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dravp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');

@$tit=$_GET['id'];


$sql="select * from antiviral_peptides where DRAVP='$tit'";
$rs=mysqli_query($conn,$sql);

if(mysqli_num_rows($rs)>0){
    $row=mysqli_fetch_assoc($rs);
}else{
    echo '<script>location.href="http://dravp.cpu-bioinfor.org/"</script>';exit;
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/mol_viewer/pdbe-molstar-light-3.0.0.css">
    <script type="text/javascript" src="http://dravp.cpu-bioinfor.org/lazysheep/mol_viewer/pdbe-molstar-plugin-3.0.0.js"></script>
    <style>
      * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }
      .msp-plugin ::-webkit-scrollbar-thumb {
          background-color: #474748 !important;
      }
      .viewerSection {
        margin: 110px 0 0 0;
      }
      #myViewer{
        width:400px;
        height: 400px;
        position:relative;
      }
    </style>
  </head>

  <body>

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
            echo '<div class="viewerSection">';
            $ic=0;
            
            // $linkd='http://dracp.cpu-bioinfor.org/Structure/'.$row['Structure'].'"';
//             while($ic<$numb){
//                 $linkc=$piecesb[$ic];
//                 $linkd="http://dracp.cpu-bioinfor.org/Structure/'.$linkc.'"
// ;
//                 if($ic==0){
//                     echo ' <div id="myViewer" style="height: 400px; width: 400px; position: relative;" id="'.$ic.'"  data-href="http://dracp.cpu-bioinfor.org/Structure/'.$linkc.'" ></div>';

//                 }else{
//                     echo ' <div id="myViewer" style="height: 400px; width: 400px; position: relative;display: none" id="'.$ic.'"></div>';

//                 }

//                 $ic++;
//             }
            echo '<div id="myViewer"></div>';
    ?>
      <!-- Molstar container -->
      
    
    <script>
        
      //Create plugin instance
      var viewerInstance = new PDBeMolstarPlugin();
      var link = '<?php echo $linkd;?>'
      //Set options (Checkout available options list in the documentation)
      var options = {
        customData: {
          url: 'link',
          format: 'cif'
        },
        alphafoldView: true,
        bgColor: {r:255, g:255, b:255},
        hideCanvasControls: ['selection', 'animation', 'controlToggle', 'controlInfo']
      }
      
      //Get element from HTML/Template to place the viewer 
      var viewerContainer = document.getElementById('myViewer');
  
      //Call render method to display the 3D view
      viewerInstance.render(viewerContainer, options);
      
    </script>
    
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