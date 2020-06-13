<?php

namespace App\Http\Controllers;

use App\Currency;
use App\services\rss\RssService;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function index()
    {
        $latestDate = Currency::latest('recorded_at')->first()->recorded_at;
        $currenciesData = Currency::where('recorded_at','=',$latestDate)->paginate(8);
        return view('currencies.index', compact('currenciesData'));
    }

    public function store(Request $request)
    {
        (new RssService($request->get('xmlUrl')))->recordRssCurrencies();
        return back()->with('success','Currencies data updated !');
    }

    public function show(string $currency)
    {
        $currenciesData = Currency::all()->whereIn('currency', $currency)->sortByDesc('recorded_at');
        return view('currencies.show', compact('currenciesData'));
    }
}
