@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Order</div>

                <div class="panel-body" id="menue">
                  <ul class="list-group">
                      <li class="list-group-item" id="0">
                        <p>マー油豚骨醤油</p>
                        <div id="foodid" style="display:none;">0</div>
                        <span class="badge">0</span>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#orderModal" onclick="selectorder(0)">選択</button>
                      </li>
                      <li class="list-group-item" id="1">
                        <p>味噌豚骨醤油</p>
                        <div id="foodid" style="display:none;">1</div>
                        <span class="badge">0</span>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#orderModal" onclick="selectorder(1)">選択</button>
                      </li>
                      <li class="list-group-item" id="2">
                        <p>豚骨醤油</p>
                        <div id="foodid" style="display:none;">2</div>
                        <span class="badge">0</span>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#orderModal" onclick="selectorder(2)">選択</button>
                      </li>
                  </ul>
                  <script>
                    function selectorder(id){
                        var num = $("#"+ id + " span")[0].innerHTML;
                        var food = $("#"+ id + " p")[0].innerHTML;
                        $("#orderModal #foodname")[0].innerHTML = food;
                        $("#orderModal #foodid")[0].innerHTML = id;
                    }
                    function setordernum(){
                        var ordernum = $("#orderModal #num").val();
                        var id = $('#orderModal #foodid')[0].innerHTML;
                        $("#" + id + " span")[0].innerHTML = ordernum;
                    }
                  </script>
                    <!-- モーダル・ダイアログ -->
                  <div class="modal fade" id="orderModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                          <h4 class="modal-title">数量選択</h4>
                        </div>
                        <div class="modal-body">
                          <div id="foodname"></div>
                          <div id="foodid" style="display:none;"></div>
                          <div class="form-group">
                            <select class="form-control" id="num" name="数量">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          </div>
                          <button type="button" class="btn-primary" data-dismiss="modal" onclick="setordernum()">確定</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#submitModal" onclick="ordersubmit()">注文</button>
                  <script>
                    function ordersubmit(){
                        var nullflag = 1;
                        $.each($("#menue li #foodid"), function(){
                            var id = this.innerHTML;
                            var num = $("#"+id+" .badge")[0].innerHTML;
                            var food = $("#"+id+" p")[0].innerHTML;
                            if(num != 0){
                                nullflag = 0;
                                $("#submitModal tbody")[0].innerHTML += `
                                    <tr>
                                        <th scope="row">`+id+`</th>
                                        <td>`+food+`</td>
                                        <td>`+num+`</td>
                                    </tr>
                                    `;
                            }
                        });
                        if(nullflag){
                            $("#submitModal #ordertable")[0].innerHTML = `
                                <p>選択されてる商品がありません</p>
                                `;
                        }
                    }
                    function clearsubmittable(){
                            $("#submitModal #ordertable")[0].innerHTML = `
                                <table class="table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Menu</th>
                                        <th>Num</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                `;
                    }
                  </script>
                  <!-- モーダル・ダイアログ -->
                  <div class="modal fade" id="submitModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                          <h4 class="modal-title">注文確認</h4>
                        </div>
                        <div class="modal-body">
                        <div id="ordertable">
                          <table class="table">
                              <thead>
                                  <th>ID</th>
                                  <th>Menu</th>
                                  <th>Num</th>
                              </thead>
                              <tbody>
                              </tbody>
                          </table>
                        </div>
                        <button type="button" class="btn-primary" data-dismiss="modal" onclick="clearsubmittable()">確定</button>
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
