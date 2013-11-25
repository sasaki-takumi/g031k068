<?php
	echo $this->Html->tag('h4',$this->Html->link(
		'投稿する','http://49.212.46.130/~g031k068/g031k068/cake/boards/create'
	));

	foreach ($data as $value) {
		echo $value['Board']['comment'].' ';//コメントを表示
		echo $value['Board']['created'].' ';//投稿年月日、時間を表示

		echo $this->Html->link('編集',array('action' => 'edit', $value['Board']['id'])).' ';
		echo $this->Html->link('削除',array('action' => 'delete', $value['Board']['id']));
		
		echo $this->Html->tag('br /');
		echo $this->Html->tag('hr /');
	}