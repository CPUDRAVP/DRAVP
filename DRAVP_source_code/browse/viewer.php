<link rel="stylesheet" type="text/css" href="http://dravp.cpu-bioinfor.org/lazysheep/mol_viewer/pdbe-molstar-light-3.0.0.css">
<script type="text/javascript" src="http://dravp.cpu-bioinfor.org/lazysheep/mol_viewer/pdbe-molstar-plugin-3.0.0.js"></script>
<style>
      .msp-plugin ::-webkit-scrollbar-thumb {
          background-color: #474748 !important;
      }
      .viewerSection {
        margin: 95px 0 0 0;
      }
      #myViewer{
        width:300px;
        height: 270px;
        position:relative;
      }
      .msp-sequence-wrapper-non-empty{
          background-color: #fff;
      }
</style>

    
    <?php

        $piecesb = explode("##", $row['Structure']);
        $numb = count($piecesb);
        $ib=0;
        // while($ib<$numb){
        //     $linkb=$piecesb[$ib];

        //     if($ib==0){
        //         echo '<span class="btn btn-info" onclick="showDivs('.$ib.')" Id="a'.$ib.'">'.$linkb.'</span>';
        //     }else{
        //         echo '<span class="btn btn-default" style="background:#e6e6e6;" onclick="showDivs('.$ib.')" Id="a'.$ib.'">'.$linkb.'</span>';
        //     }
        //     $ib++;
        // }
        echo '<div class="viewerSection">';
        $ic=0;
            
            // $linkd='http://dracp.cpu-bioinfor.org/Structure/'.$row['Structure'].'"';
            while($ic<$numb){
                $linkc=$piecesb[$ic];
                
                if($ic==0){
                    echo ' <div id="myViewer" style="height: 400px; width: 400px; position: relative;" id="'.$ic.'"  ></div>';
                   $linkd='http://dravp.cpu-bioinfor.org/Structure/predicted_structure_cif/'.$linkc.''; 
                }else{
                    echo ' <div id="myViewer" style="height: 400px; width: 400px; position: relative;display: none" id="'.$ic.'"></div>';
                    $linkd='http://dravp.cpu-bioinfor.org/Structure/predicted_structure_cif/'.$linkc.'';
                }

                $ic++;
            }
            echo '</div>';
    ?>
    
    <script>
      var viewerInstance = new PDBeMolstarPlugin();
      var link = '<?php echo $linkd;?>'
      //Set options (Checkout available options list in the documentation)
      var options = {
        customData: {
          url: link,
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