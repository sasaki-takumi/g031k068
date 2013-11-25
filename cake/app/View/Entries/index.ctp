<?php
	echo $this->element('showentry');

	if(isset($data)){
		echo '名前 | メール | 登録時間';
		echo $this->Html->tag('br /');
		echo $this->Html->tag('hr /');
		foreach ($data as $value) {
			echo $value['User']['name'].' | ';//コメントを表示
			echo $value['User']['email'].' | ';//コメントを表示
			echo $value['User']['created'].' ';//投稿年月日、時間を表示

			echo $this->Html->tag('br /');
			echo $this->Html->tag('hr /');
		}
	}