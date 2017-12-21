@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">kitchen</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Food</th>
                                <th>num</th>
                                <th>share</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $order)
                            <tr>
                                <td>{{$order["id"]}}</td>
                                <td>{{ $order["foodname"] }}</td>
                                <td>{{ $order["num"] }}</td>
                                <td>0 / {{ $order["num"] }}</td>
                                <td> <button class="btn-primary">完了</button> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
