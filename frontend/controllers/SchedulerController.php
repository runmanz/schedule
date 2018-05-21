<?php
namespace frontend\controllers;

use frontend\models\Scheduler;
use Yii;
use yii\web\Controller;

class SchedulerController extends Controller{
    public function actionIndex(){
        return $this->render('index',[]);
    }

    public function actionAddScheduler(){
        if(Yii::$app->request->isPost) {
            $post = Yii::$app->request->post(); /// 获取post值
            if(empty($post['name'])){
                Yii::$app->response->format = 'json';
                return ['status' => 1003, 'msg' => "姓名不能为空"];
            }
            $model = new Scheduler(); /// 添加新记录
            $model->created_at = $model->updated_at = time();
            Yii::$app->response->format = 'json'; /// 返回格式为json
            if(!($model->load($post, '') && $model->validate())){ /// 数据验证
                return ['status' => 1003, 'msg' => "姓名不能重复"];
            }

            if($model->save()) { /// 数据保存
                return ['status' => 1001];
            }else{
                return ['status' => 1003, 'msg' => "啊啊啊，SB字母有毒，把网络搞炸了，没得玩了，再重新提交一下看能不能行吧"];
            }
        }else{
            Yii::$app->response->format = 'json';
            return ['status' => 1002, 'msg' => '地址访问出错'];
        }
    }

    public function actionList(){
        $data = (new Scheduler())->getSchedulers();
        Yii::$app->response->format = 'json';
        if(empty($data)){
            return ["status" => 1002, "msg" => "天哪, 蛇皮字母吃人啦, 吃得连人名都不留下, 真可怕!"];
        }else{
            return ['status' => 1001, 'schedulers' => $data];
        }
    }

    public function actionDelScheduler($id){
        if(Yii::$app->request->isPost){
            if(empty($id)){ /// 当id没有传入，返回报错
                Yii::$app->response->format = 'json';
                return ['status' => 1002, "msg" => '地址访问出错'];
            }
            $model = $this->findScheduler($id);

            if(empty($model)){ /// 当未找到该值班人员，返回报错
                Yii::$app->response->format = 'json';
                return ['status' => 1002, "msg" => '地址访问出错'];
            }elseif($model->delete()){
                Yii::$app->response->format = 'json';
                return ['status' => 1001];
            }else{
                Yii::$app->response->format = 'json';
                return ['status' => 1003, "msg" => '字母又来吃人了，真可怕'];
            }
        }else{ /// 非post请求返回错误
            Yii::$app->response->format = 'json';
            return ['status' => 1002, 'msg' => '地址访问出错'];
        }
    }

    protected function findScheduler($id){
        if(($model = Scheduler::findOne([$id])) !== false){
            return $model;
        }else{
            return null;
        }
    }
}