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

<div class="viewerSection">';
    <div id="myViewer" style="height: 400px; width: 400px; position: relative;" ></div>
</div>
<?php 
    $linkd='http://dravp.cpu-bioinfor.org/Structure/predicted_structure/'.$row['Predicted_structure_ID'].'.pdb';
?>   
    <script>
      var viewerInstance = new PDBeMolstarPlugin();
      var link = '<?php echo $linkd;?>'
      //Set options (Checkout available options list in the documentation)
      var options = {
        customData: {
          url: link,
          format: 'pdb'
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
