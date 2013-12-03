<?php
	echo $this->Html->tag('h4',$this->Html->link(
		'投稿する','http://www31092u.sakura.ne.jp/~g031k068/g031k068/cake/fbboards/create'
	));
	foreach ($data as $value) {
		echo 'ユーザ名：'.$value['User']['name'].' , ';//ユーザ名を表示
		echo 'アドレス：'.$value['User']['email'];//メールアドレスを表示
		echo $this->Html->tag('br /');
		echo 'コメント：'.$value['Board']['comment'].' , ';//コメントを表示
		echo $value['Board']['created'];//投稿年月日、時間を表示

		if($user['id'] == $value['Board']['user_id']){
			echo $this->Html->link('編集',array('action' => 'edit', $value['Board']['id'])).' ';
			echo $this->Html->link('削除',array('action' => 'delete', $value['Board']['id']));
		}
		
		echo $this->Html->tag('hr /');
	}

	$this->start('left_sidebar');//左にサイドバー(left_sidebar)ブロックスを作成
		echo 'ようこそ'.$user['name'].'さん';
		echo $this->Html->tag('br /');
		echo $this->Html->link('ログアウト',array('action' => 'logout'));
	$this->end();

	$this->start('right_sidebar');//右にサイドバー(right_sidebar)ブロックスを作成
		echo $this->element('commentSearch');
		if (isset($result)){
			echo $this->Html->tag('hr /');
			foreach ($result as $res) {
				echo 'ユーザ名：'.$res['User']['name'].' , ';//ユーザ名を表示
				echo 'アドレス：'.$res['User']['email'];//メールアドレスを表示
				echo $this->Html->tag('br /');
				echo 'コメント：'.$res['Board']['comment'].' , ';//コメントを表示
				echo $res['Board']['created'];//投稿年月日、時間を表示

				echo $this->Html->tag('hr /');
			}
		}
	$this->end();