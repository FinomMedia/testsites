<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template


 function repeaterItemsToTree($arr, $currentLevel = 0) {
	$root = array();
  
	foreach ($arr as $elem){
	  if ($elem->depth == $currentLevel) {
		$root[] = $elem;
		//unset($elem);
	  } else if ($elem->depth == $currentLevel + 1) {
		$root[count($root)-1]->subitems = repeaterItemsToTree($arr,$elem->depth);      
	  }
	}
  
	return $root;
  }

  function processMatrix($array, $depth = 0){

	
	foreach($array as $item){
		for($i=0;$i<$depth;$i++){
			echo " -";
		}
		echo " - ".$item->page_description." - <br>";
		//dump($item->children->count());
		
		if($item->subitems){
			processMatrix($item->subitems,$depth + 1);
		}
	}


  }


?>


<div id="content">
	XCT ze sites/*/templates
</div>	
<div class="description">
	
<?=$page->page_description?>

	
</div>

