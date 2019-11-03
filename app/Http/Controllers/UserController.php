<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Bulletin;

class UserController extends Controller
{
    /**
     * 顯示所有應用程式的使用者清單。
     *
     * @return Response
     */
    public function index()
    {
        //原生SQL版本
        // $bind = [
        //     ':status' => 1,
        // ];
        // $bulletins = DB::select('select * from bulletins where IsShow = :status', $bind);
        // $bulletins = App\Bulletin::all();
        //use 預設是Bulletin，也可用絕對路徑App\Bulletin或者用 use App\Bulletin as Bulletins 並改用Bulletins::
        $bulletins = $this->get();

        return view('user.index', ['bulletin' => $bulletins]);
    }

    public function add()
    {
        //一般來說會需要先檢查必填欄位，不過為了做測試先忽略
        $this->put('', 1, '測試', '測試', 2, date('Y-m-d H:i:s'));
        //顯示新增後的結果
        $bulletins = $this->get();

        return view('user.index', ['bulletin' => $bulletins]);
    }

    public function update()
    {
        //一般來說會需要先檢查必填欄位，不過為了做測試先忽略
        $this->put(15, '', '修改測試');
        //顯示修改後的結果
        $bulletins = $this->get();

        return view('user.index', ['bulletin' => $bulletins]);
    }

    public function delete()
    {
        $bulletins = Bulletin::find(15);
        $bulletins->delete();
        //顯示修改後的結果
        $bulletins = $this->get();

        return view('user.index', ['bulletin' => $bulletins]);
    }

    public function get()
    {
        $bulletins = Bulletin::where('IsShow', '=', 1)
                    ->orderBy('StartTime', 'desc')
                    ->skip(2) //偏移值offset
                    ->take(13) //限制筆數limit
                    ->get();
        return $bulletins;
    }

    public function put(
        $referenceId = '',
        $sNo = '',
        $title = '',
        $info = '',
        $type = 1,
        $createTime = '',
        $isShow = 1,
        $isRead = 0,
        $startTime = '',
        $endTime = '',
        $file = ''
    ) {
        if (!empty($referenceId)) {
            //更新
            $bulletins = Bulletin::find($referenceId);
        } else {
            //新增
            $bulletins = new Bulletin;
        }

        $columns = $bulletins->getTableColumns();
        //會自動更新的欄位(不需要設定)
        $skip_column = ['id', 'ModifyTime'];
        $valArr = [
            'SNo' => $sNo,
            'Title' => $title,
            'Info' => $info,
            'IsShow' => $isShow,
            'Type' => $type,
            'Readed' => $isRead,
            'StartTime' => $startTime,
            'EndTime' => $endTime,
            'File' => $file,
            'CreatedTime' => $createTime,
        ];
        foreach($columns as $cols) {
            if (in_array($cols, $skip_column)) {
                continue;
            }
            if (empty($valArr[$cols])) {
                //若空值則表示沒有新增或修改
                continue;
            }
            $bulletins->$cols = $valArr[$cols];
        }
        $bulletins->save();
    }

}
