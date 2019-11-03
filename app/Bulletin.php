<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    /**
     * 與模型關聯的資料表。
     * 按照laravel命名習慣，資料表命名應該用複數並小寫，可以用底線(_)分隔字詞
     *
     * @var string
     */
    protected $table = 'bulletins';

    /**
     * 自行定義資料庫中的主鍵。
     * 預設是叫做"id"，所以如果一樣叫做id可以不用設
     *
     * @var string
     */
    protected $primarykey = "id";

    /**
     * 說明模型是否應該被戳記時間。
     * 若需要，則預設新增日期欄位叫做created_at，更新日期欄位叫做updated_at
     *
     * @var bool
     */
    public $timestamps = false;

    public function getTableColumns() {
        return \Schema::getColumnListing($this->table);
    }

}
