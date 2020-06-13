@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="/currencies" accept-charset="UTF-8" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="url" name="xmlUrl" value="https://www.bank.lv/vk/ecb_rss.xml"
                               class="form-control mx-sm-3">
                        <button type="submit" class="btn btn-primary mb-2">Get data</button>
                    </div>
                </form>
                @if (session()->has('success'))
                    <div class="alert alert-success text-md-center font-weight-bolder">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                @foreach($currenciesData as $currency)
                    <div class="card card-body bg-primary mb-3">
                        <a href="/currencies/{{$currency->currency}}">
                            <div class="d-flex justify-content-between">
                                <div class="font-weight-bolder">
                                    {{$currency->currency}}
                                </div>
                                <div>
                                    {{$currency->recorded_at}}
                                </div>
                                <div>
                                    {{$currency->value}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <?php if (isset($currenciesData)) {
                    echo $currenciesData->render();
                }?>
            </div>
        </div>
    </div>
@endsection




