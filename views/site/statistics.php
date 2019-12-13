<?php
	use app\models\ProblemMonitorings;
	use app\models\Sectors;
	use app\models\TagAssign;

	$sectorlar= Sectors::find()->all();
	$previousMonth = date('m')-1;

	/* 1 oy uchun  Repair uchastkalariga kirgan avtomobillar */


	$statisticsDateBegin = ($statisticsDateBegin!==null)?$statisticsDateBegin:date('Y-m-01');
	$statisticsDateFinish = ($statisticsDateFinish!==null)?$statisticsDateFinish:date('Y-m-t');


	foreach($sectorlar as $sector){
		$cars = ProblemMonitorings::find()
		                          ->where(['sector' => $sector->id])
		                          ->andWhere(['model' => '1JX69'])
		                          ->andWhere(['>=', 'created_at', $statisticsDateBegin])
		                          ->andWhere(['<=', 'created_at', $statisticsDateFinish])
		                          ->count();
		$cobalt[] = ProblemMonitorings::find()
		                              ->where(['sector' => $sector->id])
		                              ->andWhere(['model' => '1JX69'])
			->andWhere(['>', 'created_at', $statisticsDateBegin])
			->andWhere(['<', 'created_at', $statisticsDateFinish])
		                              ->count();
		$gentra[] = ProblemMonitorings::find()
		                              ->where(['sector' => $sector->id])
		                              ->andWhere(['model' => '13U19'])
			->andWhere(['>', 'created_at', $statisticsDateBegin])
			->andWhere(['<', 'created_at', $statisticsDateFinish])
		                              ->count();
		$spark[] = ProblemMonitorings::find()
		                             ->where(['sector' => $sector->id])
		                             ->andWhere(['model' => '1CQ48'])
			->andWhere(['>', 'created_at', $statisticsDateBegin])
			->andWhere(['<', 'created_at', $statisticsDateFinish])
		                             ->count();
		$nexia[] = ProblemMonitorings::find()
		                             ->where(['sector' => $sector->id])
		                             ->andWhere(['model' => '1TH69'])
			->andWhere(['>', 'created_at', $statisticsDateBegin])
			->andWhere(['<', 'created_at', $statisticsDateFinish])
		                             ->count();
		/* tugadi */

	 

	}


	/*top 15 defekt kodlar*/

	$getStatistics = TagAssign::find()
	                              ->select(['model', 'post_id', 'tag_id, COUNT(*) as cnt'])
	                              ->groupBy(['tag_id'])
	                              ->orderBy('cnt desc, tag_id desc')
	                              ->limit(15)
	                              ->all();


	foreach($getStatistics as $statistisc){
		$problemCodes[]=$statistisc->tag_id;
		/* top defektlar */
		$cobaltcodes[]=TagAssign::find()
		                        ->where(['tag_id'=>$statistisc
			                        ->tag_id])
		                        ->andWhere(['model'=>'1JX69'])
		                        ->andWhere(['>=', 'date', $statisticsDateBegin])
		                          ->andWhere(['<=', 'date', $statisticsDateFinish])
		                        ->count();

		$gentacodes[]=TagAssign::find()
		                       ->where(['tag_id'=>$statistisc
			                       ->tag_id])
		                       ->andWhere(['model'=>'13U19'])
		                       ->andWhere(['>=', 'date', $statisticsDateBegin])
		                          ->andWhere(['<=', 'date', $statisticsDateFinish])
		                       ->count();

		$nexiacodes[]=TagAssign::find()
		                       ->where(['tag_id'=>$statistisc
			                       ->tag_id])
		                       ->andWhere(['model'=>'1TF69'])
		                       ->andWhere(['>=', 'date', $statisticsDateBegin])
		                          ->andWhere(['<=', 'date', $statisticsDateFinish])
		                       ->count();

		$sparkCodes[]=TagAssign::find()
		                       ->where(['tag_id'=>$statistisc
			                       ->tag_id])
		                       ->andWhere(['model'=>'1CQ48'])
		                       ->andWhere(['>=', 'date', $statisticsDateBegin])
		                          ->andWhere(['<=', 'date', $statisticsDateFinish])
		                       ->count();




	}

	/*top defekt kodlar tugadi*/

		$uchastkalar = Sectors::find()->all();


		?>