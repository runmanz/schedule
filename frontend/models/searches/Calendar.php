<?php

namespace frontend\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Calendar as CalendarModel;

/**
 * Calendar represents the model behind the search form of `frontend\models\Calendar`.
 */
class Calendar extends CalendarModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 's_id', 'time', 'created_at'], 'integer'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CalendarModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            's_id' => $this->s_id,
            'time' => $this->time,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }

    /**
     * Get calendar by month
     *
     * @param array $params
     *
     * @return array
    */
    public function getCalendars($params){
        /**
         * @var integer $month 0 last month, 1 current month, 2 next month
        */
        $month = isset($params['month']) ? $params['month'] : 1;
        switch ($month){
            case 0:$date = date("Y-m-1",strtotime("-1 month"));break;
            case 1:$date = date("Y-m-1",time());break;
            case 2:$date = date("Y-m-1",strtotime("+1 month"));break;
            default:$date = date("Y-m-1",time());break;
        }
        $month = intval(date("m",strtotime($date)));
        $week = date("w",strtotime($date));
        $start = strtotime($date) - $week * 24 * 3600;
        $end = $start + 41 * 24 * 3600;

        $cser = $this->searchByTime($start,$end); /// 排班表内容
        $data = [];
        for ($i = 0; $i < 42; $i++){
            $i_time = $start + $i * 24 * 3600;
            $i_month = intval(date("m",$i_time));
            $data[$i]['day'] = intval(date("d",$i_time));
            $data[$i]['date'] = date("Y-m-d",$i_time);
            $data[$i]['off'] = $i_month != $month ? true : false;
            $data[$i]['on'] = date("Y-m-d",time()) == $data[$i]['date'] ? true : false;
            $flag = false;
            foreach ($cser as $k => $cs){
                if($cs['time'] == $i_time){
                    $data[$i]['name'] = $cs['scheduler']['name'];
                    $data[$i]['id'] = $cs['s_id'];
                    $flag = true;
                    unset($cser[$k]);
                    break;
                }
                if($cs['time'] < $i_time){
                    break;
                }
            }
            if(!$flag){
                $data[$i]['name'] = '无';
                $data[$i]['id'] = null;
            }
        }
        return $data;
    }

    public function searchByTime($start, $end){
        $query = CalendarModel::find();

        $query->joinWith(['scheduler']);

        $query->andFilterWhere(['>=','time',$start])
            ->andFilterWhere(['<=','time',$end]);

        return $query->asArray()->all();
    }
}
