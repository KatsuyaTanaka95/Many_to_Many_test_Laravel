<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function tags()
    {
        // belongsToManyメソッドで多対多として関連付けしています。withTimestampsメソッドで中間テーブルのタイムスタンプを更新します。
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
}
