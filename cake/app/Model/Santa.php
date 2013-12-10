<?php
	class Santa extends Model{
		public $name = 'Santa';
		public $useTable = false;

		public function load($data){
			// 211742'TV・オーディオ・カメラ'
			// 100371'レディースファッション'
			// 100005'花・ガーデン・DIY'
			// 558929'腕時計'
			// 216131'バッグ・小物・ブランド雑貨'
			// 101240'CD・DVD・楽器'
			// 551177'メンズファッション'
			// 100939'美容・コスメ・香水'
			// 216129'ジュエリー・アクセサリー'
			// 101164'おもちゃ・ホビー・ゲーム'
			// 558885'靴'
			// 100026'パソコン・周辺機器'
			// 510901'日本酒・焼酎'
			// 510915'ビール・洋酒'
			// 562637'家電'

			$father = array(211742,558929,551177,510901,510915);
			$mother = array(100371,100005,216131,100939,558885,562637);
			$son = array(211742,558929,101240,551177,101164,100026);
			$daughter = array(100371,558929,216131,101240,100939,216129,101164,558885,100026);
			$girlfriend = array(100371,100005,558929,216131,100939,216129,558885);
			$boyfriend = array(211742,558929,101240,551177);
			$friend = array(211742,100371,101240,551177);

			$url = array();
			$json = array();
			$obj = array();

			switch ($data['Santa']['type']){
			case '父親':
				for ($i=0; $i<3; $i++) {
					$url[$i] = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$father[mt_rand(0,4)];
				}

				// $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$father[mt_rand(0,4)];
				break;
			case '母親':
				for ($i=0; $i<3; $i++) {
					$url[$i] = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$mother[mt_rand(0,5)];
				}

				// $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$mother[mt_rand(0,5)];
				break;
			case '息子':
				for ($i=0; $i<3; $i++) {
					$url[$i] = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$son[mt_rand(0,5)];
				}

				// $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$son[mt_rand(0,5)];
				break;
			case '娘':
				for ($i=0; $i<3; $i++) {
					$url[$i] = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$daughter[mt_rand(0,8)];
				}

				// $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$daughter[mt_rand(0,8)];
				break;
			case '彼女':
				for ($i=0; $i<3; $i++) {
					$url[$i] = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$girlfriend[mt_rand(0,6)];
				}

				// $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$girlfriend[mt_rand(0,6)];
				break;
			case '彼氏':
				for ($i=0; $i<3; $i++) {
					$url[$i] = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$boyfriend[mt_rand(0,3)];
				}

				// $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$boyfriend[mt_rand(0,3)];
				break;
			case '友達':
				for ($i=0; $i<3; $i++) {
					$url[$i] = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$friend[mt_rand(0,3)];
				}

				// $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20120927?format=json&applicationId=1095935931224717871&genreId='.$friend[mt_rand(0,3)];
				break;
			default:
				break;
			}

			for ($i=0; $i<3; $i++) {
				$json[$i] = file_get_contents($url[$i]);
				$obj[$i] = json_decode($json[$i]);
			}

			return $obj;

			// $json = file_get_contents($url);
			// $obj = json_decode($json);

			// return $obj->Items;
		}
	}