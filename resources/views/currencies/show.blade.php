@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div>
                    @foreach($currenciesData as $data)
                        <div class="card card-body bg-primary mb-3">
                            <a href="">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        {{$data->currency}}
                                    </div>
                                    <div>
                                        {{$data->recorded_at}}
                                    </div>
                                    <div>
                                        {{$data->value}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-right">
                    <a href="/currencies" class="btn btn-success">Go back</a>
                </div>
            </div>
        </div>
    </div>
@endsection




