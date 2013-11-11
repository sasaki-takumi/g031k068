<?php
	echo $this->Html->tag('h2','ユーザ登録フォーム');

	echo $this->Form->create('entry',array(
		'type' => 'post',
		'url' => 'result'
	));

	echo $this->Form->label('entry.lastname','名字');
	echo $this->Form->text('entry.lastname');//テキスト入力欄を表示

	echo $this->Form->label('entry.firstname','名前');
	echo $this->Form->text('entry.firstname');//テキスト入力欄を表示

	echo $this->Form->label('entry.sex','性別');
	//ラジオボタンを表示
	echo $this->Form->radio('entry.sex',
		array(0 => '男',1 => '女'),
		array('legend' => false, 'label'=> true, 'value' => 1)
	);

	echo $this->Form->label('entry.year','学年');
	//ドロップダウンリストを表示
	echo $this->Form->select('entry.year',
		array('学部1年' => '学部1年','学部2年' => '学部2年','学部3年' => '学部3年','学部4年' => '学部4年'),
		array('value' => '学部2年')
	);

	echo $this->Html->tag('br /','趣味');
	//チェックボックスを表示
	echo $this->Form->checkbox('entry.hobby.a',array('checked' => true,'value' => 'スポーツ'));
	echo $this->Form->label('entry.hobby.a','スポーツ');
	echo $this->Form->checkbox('entry.hobby.b',array('value' => '読書'));
	echo $this->Form->label('entry.hobby.b','読書');
	echo $this->Form->checkbox('entry.hobby.c',array('checked' => true,'value' => '音楽鑑賞'));
	echo $this->Form->label('entry.hobby.c','音楽鑑賞');

	echo $this->Form->label('entry.comment','コメント');
	//テキストエリアを表示
	echo $this->Form->textarea('entry.comment', array('cols' => 40, 'rows' => 5));

	echo $this->Form->label('entry.pass','パスワード');
	echo $this->Form->password('entry.pass');//パスワード入力欄を表示

	//時間をhiddenで取得
	echo $this->Form->hidden('entry.time',array('value' => date('G:i:s')));

	echo $this->Form->submit('送信',array('name' => 'hoge'));
	echo $this->Form->end();