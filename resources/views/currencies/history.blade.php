@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                @foreach($currenciesData as $data)
                    @foreach($data as $currency => $value)
                        <a href="/history">
                            <div class="d-flex justify-content-between mb-3" style="background-color: #cfe9ff">
                                <div>
                                    {{$currency}}
                                </div>
                                <div>
                                    {{$value}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection




