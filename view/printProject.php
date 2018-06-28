
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              '<html><head><link href="static/fontawesome-all.css" rel="stylesheet"><title></title></head><body>' + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            location.reload();
            
            
            
            
        }
    </script>

<div id="printablediv"  style="background-color:white; width:16cm">

<div style="color:grey; margin-bottom:2em"><i>POWERED BY TODORIZER</i></div>
    <?php
        //session_start();
        
        $project=unserialize($_SESSION['project']);
        
        $nodeList = $project->getNodeList();
        
       $assoNodeList=array();
       foreach ($nodeList as $node){
         $assoNodeList[$node->getNodePath()]=$node;
         $sortedListOfPath[]=$node->getNodePath();
       }
    ?>    

        <div id="print_ProjectName" style="padding-bottom:1em;">
            <u><?php echo $project->getName(); ?></u>
        </div>

        <?php    
              
        sort($sortedListOfPath);
        foreach ($sortedListOfPath as $np){
                $rearangedNodeList[$np]=$assoNodeList[$np];
        }
 
        $depth=0;
        $indent=0;
        foreach ($rearangedNodeList as $nodePath => $node) { 
                echo "<br>";
                $temp_depth=count(explode('.',$nodePath));
                if ($depth<$temp_depth){
                    $indent++;
                }
                else{
                    $indent--;
                }
                
                indentation($depth);
                echo '<img src="assets/images/point.png" style="width:8px"> &nbsp &nbsp';
                
                echo $node->getTitle()."&nbsp &nbsp";
                
                $progress=$node->getProgress();
                if ($progress==10){ echo '<img src="assets/images/check.png" style="width:20px">';}
                
                echo "<br>";

                if ($node->getDescription()){
                    indentation($depth);                   
                    echo "&nbsp &nbsp &nbsp &nbsp".$node->getDescription()."<br>";
                }
        }

                
function indentation($depth){
    for ($i=0;$i<$depth;$i++){
        echo "&nbsp";
    }
}
 ?>
        <br><br>
        <input type="button" value="imprimer" onclick="javascript:printDiv('printablediv')" />

</div>
