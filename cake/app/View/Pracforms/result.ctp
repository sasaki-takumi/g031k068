<?php
	if (!empty($user)){
		echo '名前：'.$user['name'];//名前を表示
		echo $this->Html->tag('br /');
		echo '性別：'.$user['sex'];//性別を表示
		echo $this->Html->tag('br /');
		echo '学年：'.$user['year'];//学年を表示
		echo $this->Html->tag('br /');
		echo '趣味：';
		foreach ($user['hobby'] as $value) {//趣味を表示
			echo $value;
		}
		echo $this->Html->tag('br /');
		echo 'コメント：'.$user['comment'];//コメントを表示
		echo $this->Html->tag('br /');
		echo 'パスワード：'.$user['pass'];//パスワードを表示
		echo $this->Html->tag('br /');
		echo '登録時間：'.$user['time'];//登録時間を表示

		echo $this->Form->create('result',array(//送信ボタンを表示
				'type' => 'post',
				'url' => 'result'
			));
		echo $this->Form->submit('登録');
		echo $this->Form->end();
	}else{
		echo $this->Html->tag('h2','ありがとうございました。');

		echo $this->Html->tag('h4',$this->Html->link(
			'最初に戻る','http://49.212.46.130/~g031k068/g031k068/cake/Pracforms/index'
		));
	}
