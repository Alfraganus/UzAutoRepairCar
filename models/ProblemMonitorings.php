<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem_monitorings".
 *
 * @property int $id
 * @property int $sector
 * @property string $shift
 * @property string $date
 * @property string $model
 * @property int $department
 * @property string $PO
 * @property string $problem
 * @property int $spent_on
 * @property int $repair_case
 * @property string $comment
 * @property string $winno
 * @property string $money_spent
 * @property int $user_id
 * @property string $created_at
 */
class ProblemMonitorings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem_monitorings';
    }
    public $search;
    public $tag;
    public $dateSearch;
	const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sector', 'department', 'spent_on', 'user_id'], 'integer'],
             [['tag'], 'required','message'=>'Eng kamida bir dona defekt kodi kiriting!'],
            [['date', 'created_at','repair_case','money_spent','finished_at','problem_status'], 'safe'],
            [['problem', 'comment'], 'string'],
            [['shift'], 'string', 'max' => 10],
            [['model'], 'string', 'max' => 150],
            [['PO', 'winno'], 'string', 'max' => 100],
            [['ponno','search','tag','dateSearch','res_person_tabel'],'safe'],
            [['search'], 'required', 'on' => self::SCENARIO_CREATE,'message'=>'Ushbu madonni to\'ldirish majburiy'],
//            [['spent_on'], 'required','message'=>'Ushbu maydonni to\'ldirish majburiy']
        ];
    }

/* formdagi dropdown orqali kelgan ID ni API dan topib, malumotlarini uzatadi*/



	public function GetStatisticsDateStart($date)
	{
		$date = explode(' - ',$date);
		return $date[0];
	}

	public function GetStatisticsDateEnd($date)
	{
		$date = explode(' - ',$date);
		return $date[1];
	}


	public function SplitTagsString($tags)
	{
		$stringTags = explode(",",$tags);

		foreach($stringTags as $tag)
		{
			if(is_numeric($tag))
			{
				$arrayTags[]=$tag;
			}

		}
		return $arrayTags;
	}

	public function FinancialLossCurrentMonth()
	{
		$amountCars = ProblemMonitorings::find()->where(['>=','date',date('Y-m-01')])->sum('money_spent');
		return $amountCars;
	}
	
	public function FindCarData($api,$index) {
		$api = "http://web.uzautomotors.com/empc/getVehicleInfo/".$api;
		$opts = [
			"http" => [
				"method" => "GET",
				"header" => "slip_token: ZmYwFWzbf9\r\n".
					"Accept: application/json\r\n"
			]
		];
		$context = stream_context_create($opts);
		$sFile = file_get_contents($api, false, $context);
		$ready = json_decode($sFile);

		$assoc = [];
		foreach($ready->data as $read){
			$string = $read->pono.' model: '.$read->model.' vinno: '.$read->vinno;
			$assoc[] = $string;
		}

	return $assoc[$index];
	}

	/*remont qilingan mashinani minutga asosida narxini xisoblash*/

		public function CalculatePrice($sector_id,$model,$case,$starting_time,$finishing_time)
		{
			if($model=='1CR48' or $model=='1CP48' or $model=='1MW48') {
				$model='1CQ48';
			} else if ($model=='1TH69') {
				$model='1TF69';
			}

			 if($case==1)
			 {
				 $case='is_little';
			 } else if($case==2)
			 {
				 $case='is_medium';
			 } else if($case==3)
			 {
				 $case='is_large';
			 }
			/* finding time interval*/
			$datetime1 = date_create($starting_time);
			$datetime2 = date_create($finishing_time);

			$interval = date_diff($datetime1, $datetime2);
			/*get time*/
			$minutes = $interval->format('%i');
			$hours = $interval->format('%h');
			($hours>0)?$hours = $hours*60:null;
			$overallTime = $minutes+$hours;

			$priceList = ServicePrice::find()
			                         ->where(['sector_id'=>$sector_id])
																->andWhere(['model'=>$model])
																->one();

				$prise = $priceList->$case*$overallTime;

			 return $prise;
		}


		public function AniqlanganZarar($starting_time,$finishing_time) {
			$uchastkalar = Sectors::find()->all();
			foreach($uchastkalar as $uchastka){
				$sums[] = ProblemMonitorings::find()
				                            ->where(['>=', 'date',$starting_time])
				                            ->andWhere(['<=', 'date', $finishing_time])
				                            ->andwhere(['sector' => $uchastka->id])
				                            ->sum('money_spent');

			}
		}

		/*statistikalar */
	public function TodaysCars()
	{
		$amountCars = ProblemMonitorings::find()
			->where(['>=','created_at',date('Y-m-d 08:00:00')])
			->andWhere(['<=','created_at',date('Y-m-d 20:00:00')])
		  ->count();
		return $amountCars;
	}

	public function YesterdayNightsCars()
	{
		$day = date('d')-1;
		$yesterdayNight = date('Y-m-'.$day.' 20:00:00');
		$amountCars = ProblemMonitorings::find()
		                                ->where(['>=','created_at',$yesterdayNight])
		                                ->andWhere(['<=','created_at',date('Y-m-d 08:00:00')])
		                                ->count();
		return $amountCars;
	}

	public function CarsCurrentMonth()
	{
		$amountCars = ProblemMonitorings::find()->where(['>=','date',date('Y-m-01')])->count();
		return $amountCars;
	}

	public function CarsPreviousMonth()
	{
		$previousMonth = date('m')-1;
		$year = date('Y');
		$day = date('01');
		$amountCars = ProblemMonitorings::find()
		                                ->where(['>=','date',$year.'-'.$previousMonth.'-'.$day])
		                                ->andWhere(['<=','date',$year.'-'.$previousMonth.'-'.date('t')])
		                                ->count();
		return $amountCars;
	}

	public function Comparative()
	{
		$lastMonth = ProblemMonitorings::CarsPreviousMonth();
		$currentMonth = ProblemMonitorings::CarsCurrentMonth();
		if($lastMonth>0 and $currentMonth>0){
		$percentage = $currentMonth/$lastMonth*100-100;
		$percentage =intval($percentage);
		} else {
			$percentage=0;
		}

		return $percentage;
	}


	public function ExportDatas()
	{
		$file = \Yii::createObject([
			                           'class' => 'codemix\excelexport\ExcelFile',
			                           'sheets' => [
				                           'Users' => [
					                           'class' => 'codemix\excelexport\ActiveExcelSheet',
					                           'query' => ProblemMonitorings::find(),
					                           'attributes' => [
					                           	'date',
						                           'uchastka.name',
						                           'shift',
						                           'model',
						                           'res_person_tabel',
						                           'department',    // Related attribute
						                           'PO',
					                            'winno',
					                            'defectName.tag_id',
					                            'spent_on',
					                            'userinfo.fullname',
					                            'comment',
					                            'created_at',
					                            'finished_at',
					                            'money_spent',
					                            'repair_case'
					                           ],
				                           ]
			                           ]
		                           ]);
		return $file->send(date('d-m-Y').'repairlar.xlsx');
	}


	/* statistikalar tugadi*/


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
	        'id' => 'ID',
	        'problem_status' => 'Ta\'mir xolati:',
            'sector' => 'Uchastka',
            'res_person_tabel' => 'Nuqson uchun javobgar xodimning tabel raqami',
            'money_spent'=>'Xarajat qiymati',
            'repair_case' => 'Nuqson hajmi',
            'shift' => 'Smena',
            'date' => 'Sana',
            'model' => 'Model',
            'department' => 'Bo\'lim',
            'PO' => 'P/O',
            'problem' => 'Muammo',
            'spent_on' => 'Sarflangan vaqt (minutda)',
            'comment' => 'Izoh',
            'winno' => 'Win kod',
            'user_id' => 'Ma\'sul foydalanuvchi',
	        'created_at' => 'Open bo\'lgan vaqti',
	        'finished_at' => 'Close bo\'lgan vaqti',
            'search' => 'Tizimdan izlash (Win kodi, P/O yoki model bo\'yicha)',
            'tag' => 'Defekt kodlar',
        ];
    }

	public function getUchastka()
	{
		return $this->hasOne(Sectors::className(), ['id' => 'sector']);
	}

	public function getBolim()
	{
		return $this->hasOne(Departments::className(), ['id' => 'department']);
	}
	public function getUserinfo()
	{
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}
	public function getDefectName()
	{
		return $this->hasOne(TagAssign::className(), ['post_id' => 'id']);
	}

}
