<?php
	$aid = 'dj0zaiZpPVBkWGN6UU1IaEduWCZzPWNvbnN1bWVyc2VjcmV0Jng9MDI-';//yahooID

	$rss = simplexml_load_file('http://b.hatena.ne.jp/s-takumi/rss');
	//var_dump($rss);

	//マイページのリンク先とタイトルを表示
	echo $this->Html->tag('h2',$this->Html->link(
		$rss->channel->title,$rss->channel->link
	));

	$i = 1;//
	foreach ($rss->item as $item) {//リンク、タイトル、コメント、キーワードを表示
		echo $this->Html->tag('h3','['.$i.']'.$item->title);//タイトルを表示
		//ページのリンク先を表示
		echo $this->Html->tag('h4',$this->Html->link(
			$item->link,$item->link
		));
		echo $this->Html->tag('h4',$item->description);//コメント表示
		$content = $item->title;//はてなブックマークのタイトルを取得
		$xml = simplexml_load_file('http://jlp.yahooapis.jp/KeyphraseService/V1/extract?appid='.$aid.'&sentence='.urlencode($content).'');
		//var_dump($rss);
		echo $this->Html->tag('h4','キーワード：'.$xml->Result->Keyphrase);//キーワードを表示

		$i++;
	}