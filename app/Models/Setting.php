<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable =[
        'setting_name',
        'setting_value'
    ];
    static $gloabllSettingNames=[
        'app_title',
        'app_tagline',
        'app_description',
        'app_logo',
        'app_favicon',
        'dashboard_info'
    ];

    public static function globalAll(){

        // Cache::forget('globalSettingsCache');
        $result = Cache::remember('globalSettingsCache', 600, function () {
        $settingsArr=[];
       
        $resultArr = self::whereIN('setting_name', self::$gloabllSettingNames )->get();
        $resultArr = $resultArr ? $resultArr->toArray() : [];

       foreach($resultArr as $row){
        $settingsArr[$row['setting_name']]=$row['setting_value'];
        }
        return $settingsArr;
       
        });

       return $result;
    }
}
