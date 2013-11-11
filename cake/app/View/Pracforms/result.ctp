<?php
	if(isset($this->request->data['hoge'])){//送信ボタンを押していたら
		echo $this->Html->tag('h2','この情報を登録してもいいですか？');

		echo '名前：'.$this->request->data['entry']['lastname'].' '.$this->request->data['entry']['firstname'];//名字を表示
		echo $this->Html->tag('br /');

		echo $sex = ($this->request->data['entry']['sex'] == 0)?'性別：男':'性別：女';//性別を表示

		echo $this->Html->tag('br /');
		echo '学年：'.$this->request->data['entry']['year'];//学年を表示

		echo $this->Html->tag('br /');
		echo '趣味：';
		foreach ($this->request->data['entry']['hobby'] as $value) {//趣味を表示
			if (!empty($value)) {
				echo $value.' ';
			}
		}
		echo $this->Html->tag('br /');

		echo 'コメント：'.$this->request->data['entry']['comment'];//コメントを表示
		echo $this->Html->tag('br /');

		echo 'パスワード：'.$this->request->data['entry']['pass'];//パスワードを表示
		echo $this->Html->tag('br /');

		echo '登録時間：'.$this->request->data['entry']['time'];//時間を表示

		echo $this->Form->create('entry',array(
			'type' => 'post',
			'url' => 'result'
		));

		echo $this->Form->submit('登録',array('name' => 'test'));
		echo $this->Form->end();
	}

	if(isset($this->request->data['test'])){//登録ボタンを押したら
		echo $this->Html->tag('h2','ありがとうございました。');

		echo $this->Html->tag('h4',$this->Html->link(
			'最初に戻る','http://49.212.46.130/~g031k068/g031k068/cake/Pracforms/index'
		));
	}