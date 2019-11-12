<?php

namespace App\Listeners;

use App\Events\InstallEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Shop;
use Mail;

class SendEmailAfterInstall
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  InstallEvent  $event
     * @return void
     */
    public function handle(InstallEvent $event)
    {
        $shop_info = Shop::getInfoByDomain($event->domain);
        $shop = $shop_info ? Shop::findOrFail($shop_info->id) : null;
        $shop_owner = $shop ? $shop->shopOwner->toArray() : null;
        if ($shop_owner) {
            Mail::send('default.'.$event->template, $shop_owner, function($message) use ($shop_owner, $event) {
                $message->to($shop_owner['email']);
                $message->subject($event->title);
            }); 
        }
    }
}
