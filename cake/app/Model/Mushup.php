<?php
	class Mushup extends Model{
		public $name = 'Mushup';
		public $useTable = false;

		public function load(){
			$aid = 'dj0zaiZpPVBkWGN6UU1IaEduWCZzPWNvbnN1bWVyc2VjcmV0Jng9MDI-';//yahooID

			$rss = simplexml_load_file('http://b.hatena.ne.jp/s-takumi/rss');
			//var_dump($rss);

			//マイページのリンク先とタイトルを配列に入れる
			$res['mytitle'] = $rss->channel->title;
			$res['mylink'] = $rss->channel->link;

			$res['item'] = $rss->item;

			$i = 0;
			foreach ($rss->item as $item) {//キーワードを配列に入れる
				$content = $item->title;
				$xml = simplexml_load_file('http://jlp.yahooapis.jp/KeyphraseService/V1/extract?appid='.$aid.'&sentence='.urlencode($content).'');
				//var_dump($xml);
				$res['keyword'][$i] = $xml->Result->Keyphrase;
				$i++;
			}

			return $res;
		}
	}