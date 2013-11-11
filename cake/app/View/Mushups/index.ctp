<?php
	//タイトルを表示
	echo $this->Html->tag('h2',$this->Html->link(
		$api['mytitle'],$api['mylink']
	));

	$i = 0;
	foreach ($api['item'] as $value) {
		echo $this->Html->tag('h3','['.$i.']'.$value->title);//タイトルを表示
		echo $this->Html->tag('br /');
		//リンク先を表示
		echo $this->Html->tag('h4',$this->Html->link(
			$value->link,$value->link
		));
		echo $this->Html->tag('h4',$value->description);//コメントを表示
		echo $this->Html->tag('br /');
		echo $this->Html->tag('h4','キーワード：'.$api['keyword'][$i]);//キーワードを表示
		echo $this->Html->tag('br /');
		$i++;
	}
