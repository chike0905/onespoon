@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Table</div>

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
                            <tr id='{{ $order["id"] }}'>
                                <td>{{ $order["id"] }}</td>
                                <td>{{ $order["foodname"] }}</td>
                                <td>{{ $order["num"] }}</td>
                                <td>{{ $order["share"] }} / {{ $order["num"] }}</td>
                                <td> <button class="btn btn-primary" data-toggle="modal" data-target="#shareModal" onclick="shareorder({{$order['id']}})">シェア注文</button> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        function shareorder(orderid){
                            $("#shareorderid")[0].innerHTML = orderid;
                            $("#sharefood")[0].innerHTML = $("tr#"+orderid +" td")[1].innerHTML;
                        }
                        function submitshare(){
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var orderid = $("#shareorderid")[0].innerHTML;
                            var data = {data: orderid};
                            $.ajax({
                                type : "post",
                                url : './table/share',
                                dataType : "json",
                                data: data,
                                success : function(json) {
                                    console.log(json);
                                    location.reload();
                                },
                                error : function(XMLHttpRequest, textStatus, errorThrown) {
                                    console.log("Error: " + textStatus + ":" + errorThrown);
                                }
                            });
                        }
                    </script>
                    <div class="modal fade" id="shareModal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            <h4 class="modal-title">注文確認</h4>
                          </div>
                          <div class="modal-body">
                          <span id="shareorderid" style="display:none"></span>
                          <p><span id="sharefood"></span>を一口注文します</p>
                          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submitshare()">確定</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
