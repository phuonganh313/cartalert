<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shops';
    protected $fillable=['id','shopify_domain','shopify_token','id_shop_owner','active','created_at','updated_at','charge_id','grandfathered'];

    public static $default_setting = ['font_family'=>'sans-serif','font_style'=>'bold','position'=>'upleft','animation'=>'slide','icon_color'=>'E30000','text_color'=>'FFFFFF','shape'=>'circle','flicker_timing'=>'2','sound_effect'=>'dingdong.mp3','repeat'=>'1','frequency'=>'2'];
    
    /**
     * Relationship: setting
     * @return Object Setting
     */
    public function setting() {
        return $this->hasOne('App\Setting','id_shop','id');
    }

    /**
     * Relationship: shopOwner
     * @return Object ShopOwner
     */
    public function shopOwner() {
        return $this->belongsTo('App\ShopOwner','id_shop_owner');
    }

    /**
     * @param string $domain
     * @return array
     * <pre>
     * array (
     *  'id' => int,
     *  'name' => string,
     *  'email' => string,
     *  'address' => string,
     *  'created_at' => timestamp,
     *  'updated_at' => timestamp
     * )
     */
    public static function getInfoByDomain($domain) {
        return $sql = DB::table('shops')
                    ->where('shopify_domain', $domain)
                    ->first();
    }

    /**
     * @param string $domain
     * @return Object Setting
     */
    public static function getSettingsByDomain($domain) {
        $shop_info = self::getInfoByDomain($domain);
        $shop = $shop_info ? self::find($shop_info->id): null;
        return $shop_setting = $shop->setting ?? (object) self::$default_setting;
    }
}
