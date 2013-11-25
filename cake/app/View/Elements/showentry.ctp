<?php
	echo $this->Html->tag('h2','ユーザ登録フォーム');
	echo $this->Html->tag('br /');

	echo $this->Form->create('entry',array(
			'type' => 'post',
			'url' => 'result'
		));

	echo $this->Form->label('entry.name','名前');//ラベルの表示
	echo $this->Html->tag('br /');
	echo $this->Form->text('entry.name',array('required' => 'required'));
	echo $this->Html->tag('br /');

	echo $this->Form->error('User.name');

	echo $this->Form->label('entry.email','メール');//ラベルの表示
	echo $this->Html->tag('br /');
	echo $this->Form->text('entry.email',array('type' => 'email','required' => 'required'));
	echo $this->Html->tag('br /');

	echo $this->Form->error('User.email');

	echo $this->Form->label('entry.sex','性別');//ラベルの表示
	echo $this->Html->tag('br /');
	echo $this->Form->radio('entry.sex',
		array(0 => '男',1 => '女'),
		array('legend' => false, 'label'=> true, 'value' => 1)
	);
	echo $this->Html->tag('br /');

	echo $this->Form->label('entry.pass','パスワード');//ラベルの表示
	echo $this->Html->tag('br /');
	echo $this->Form->password('entry.pass',array('required' => 'required'));
	echo $this->Html->tag('br /');

	echo $this->Form->submit('登録する',array('div' => false,'class' => 'btn btn-primary'));
	echo $this->Form->end();