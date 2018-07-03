<?php
$queryDND = "select preference from preferences where (ix'".."');";
  	$resultDND = $GLOBALS['myCon']->query($queryDND);
  	$savedIndexes=null;
  	if($resultDND->num_rows > 0)
  	{
    	$lineDND = $resultDND->fetch_array(MYSQLI_ASSOC);
  	  $savedIndexes=$lineDND["preference"];
  	} 

  	 if(!$savedIndexes)
       $savedIndexes="0,1,2,3,4,5,6,7,8,9,10,11:000000000000";
    
  	$savedIndexes=split(":",$savedIndexes);
    $draggedBoxes=split(",",$savedIndexes[0]);
    ?>
    <script type="text/javascript">

 function replaceAt(index, replacement,string) {

   return string.substr(0, index) + replacement + string.substr(parseInt(index)+replacement.length);
}

function toggle(item)
{
	 var bodyElement=$(item.offsetParent).find(".portlet-body")[0];
	 
     //$(bodyElement).fadeToggle("slow");
     
     var ele=item.offsetParent.id.substr(1);
	 if($(item).hasClass("fa-caret-up"))
	 {
	  $(item.offsetParent).find(".fa-sync-alt").hide();
	  $(item).removeClass("fa-caret-up").addClass("fa-caret-down");
	  $(item).attr('data-content', "<?php echo $GLOBALS["langarr_file"]->get('toggleOut')?>");
	  if(toggleBoxes[ele]==1)
	     	return;
	  
	  toggleBoxes=replaceAt(ele,"1",toggleBoxes);
	 
	 }
	else {
	  $(item).removeClass("fa-caret-down").addClass("fa-caret-up");
	  $(item).attr('data-content', "<?php echo $GLOBALS["langarr_file"]->get('toggleIn')?>");
      $(item.offsetParent).find(".fa-sync-alt").show();
      $(item.offsetParent).find(".fa-sync-alt").trigger("click"); 
	   toggleBoxes=replaceAt(ele,"0",toggleBoxes);
	 }
	$(bodyElement).fadeToggle("slow"); 
  saveDNDprefer();

}

 var draggedBoxes="<?php echo $savedIndexes[0]; ?>".split(",");
 var boxes=$(".portlet-boxed");
 for (var i = 0; i < boxes.length; i++)
      boxes[i].id='b'+draggedBoxes[i];
 var toggleBoxes="<?php echo $savedIndexes[1]; ?>";
 if(toggleBoxes)
  	{
  	for (var i = 0; i < toggleBoxes.length; i++)
  	    if(toggleBoxes[i]==1)
  	    {
  	    	var ele=document.getElementById("b"+i).getElementsByClassName("fa-caret-up");
  	       toggle(ele[0]);
  	     }
  	}
function saveDNDprefer(){
 savedIndexes=draggedBoxes.join(",");
 savedIndexes+=":"+toggleBoxes;
  $.post("saveDNDprefer.php?savedIndexes="+savedIndexes+"&auth=<?php echo $_COOKIE['authenticated'] ?>", function(data){
   });
};

</script>
