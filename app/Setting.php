<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'setting';
    protected $fillable = ['id','id_shop','font_family','font_style','position','animation','icon_color','text_color','shape','flicker_timing','sound_effect','repeat','frequency','created_at','updated_at'];

    public $ca_font_family = ['Arial','Verdana','Times New Roman','Calibri','sans-serif'];
    public $ca_font_style = ['normal','italic','bold','lighter'];
    public $ca_position = ['up'=>'Top Right','down'=>'Bottom Right','left'=>'Bottom Left','upleft'=>'Top Left'];
    public $ca_animation = ['slide','fade','pop','popFade'];
    public $ca_shape = ['circle','rectangle'];
    public $ca_flicker_timing = ['1','2','3','5'];
    public $ca_sound_effect = ['off' => 'Off','chimedingdong.mp3' => 'Chime Ding Dong Door Bell','dingdong.mp3' => 'Ding Dong Door Bell','slowdingdong.mp3' => 'Slow Ding Dong Door Bell','tubulardingdong.mp3' => 'Tubular Bells Ding Dong'];
    public $ca_repeat = ['1'=>'once','2'=>'twice','3'=>'thrice','5'=>'Five times'];
    public $ca_frequency = ['1','2','3','5'];

    /**
     * Relationship: shop
     * @return Object Shop
     */
    public function shop() {
        return $this->belongsTo('App\Shop','id_shop','id');
    }

}
