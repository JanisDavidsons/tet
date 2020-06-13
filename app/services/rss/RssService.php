<?php

namespace App\services\rss;

use App\Currency;
use Illuminate\Support\Facades\DB;

class RssService
{
    private string $ssrUrl;

    public function __construct(string $rssUrl = null)
    {
        if (is_null($rssUrl)){
            $this->ssrUrl = 'https://www.bank.lv/vk/ecb_rss.xml';
        }else{
            $this->ssrUrl = $rssUrl;
        }
    }

    public function recordRssCurrencies():void
    {
        $xml = $this->getRawXml();

        foreach ($xml->channel->item as $item) {
            $currencyRaw = trim((string)$item->description);
            $chunks = array_chunk(preg_split('/( )/', $currencyRaw), 2);
            $currencies = array_column($chunks, 0);
            $values = array_column($chunks, 1);
            $date = substr((string)$item->pubDate,5,11);
            $combined = array_combine($currencies, $values);

            foreach ($combined as $currency=>$value){

                if (!(DB::table('currencies')
                    ->where('recorded_at', '=', $date)
                    ->where('currency', '=', $currency)
                    ->exists())) {
                    $currencyModel = new Currency();
                    $currencyModel->currency = $currency;
                    $currencyModel->value = $value;
                    $currencyModel->recorded_at = $date;
                    $currencyModel->save();
                }
            }
        }
    }

    private function getRawXml()
    {
        return simplexml_load_file($this->ssrUrl, null, LIBXML_NOCDATA);
    }
}
