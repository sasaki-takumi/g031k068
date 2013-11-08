<?php
	for ($i=0; $i<10; $i++) {
		echo "<b>[".$i."]".$bm[$i]['title']."</b>";
		echo "<br />";
		echo $this->Html->link(
			$bm[$i]['link'],$bm[$i]['link'],array(
				'target' => '_blank',
				 'newline' => "\n"
				)
			);
		echo $bm[$i]['description']."<br /><br />";
	