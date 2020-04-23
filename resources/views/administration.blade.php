<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "{{URL::asset('//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>管理平台</title>
</head>
<body>
    <script src = "{{URL::asset('//code.jquery.com/jquery-3.4.1.slim.min.js')}}" integrity = "sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin = "anonymous"></script>
    <script src = "{{URL::asset('//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}" integrity = "sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src = "{{URL::asset('//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}" integrity = "sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <div style="min-width:2250px" class="jumbotron">
        <h1 class="display-4">管理平台</h1>
        <hr class="my-4">
        <p>可更改平台遊戲 , 顯示注單</p>
    </div>
    <div class="container-fluid">
        <div class="row" style="margin-top: 15px;">
            <div class="col-12" style="margin: 15px 50px;">
                <a class="btn btn-info" href="manage">更改顯示平台遊戲</a>
            </div>
            <div class="col-12" style="margin: 15px 50px;">
                <form action="betrecord" method="get" onsubmit="return date();">
                    <div class="form-row">
                        <label style="margin: 5px 5px 0px 10px;">取得下注記錄</label>
                        <label style="margin: 5px 5px 0px 10px;">起始日期</label>
                        <input type="date" name="starttime" id="starttime" style="border-radius: 5px;border: darkgrey 1px solid;background-color: rgb(247, 247, 247);">
                        <label style="margin: 5px 5px 0px 10px;">結束日期</label>
                        <input type="date" name="endtime" id="endtime" style="border-radius: 5px;border: darkgrey 1px solid;background-color: rgb(247, 247, 247);">
                        <label style="margin: 5px 5px 0px 10px;">更新筆數</label>
                        <select name="pagelimit" id="pagelimit">
                            @for ($i = 10; $i <= 100; $i+=10)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <input style="margin: 0px 5px 0px 30px;" class="btn btn-dark" type="submit" value="提交">
                    </div>
                </form>
            </div>
            <div class="col-12" style="margin: 30px 50px;">
                <form action="administration" method="get">
                    <div class="form-row">
                        <label style="margin: 5px 0px 0px 60px;">查詢注單</label>
                        <label style="margin: 5px 15px 0px 15px;">日期</label>
                        <input type="date" name="date" id="date" style="border-radius: 5px;border: darkgrey 1px solid;background-color: rgb(247, 247, 247);"
                        @if (isset($date))
                            value="<?php echo $date?>"
                        @endif
                        >
                        <label style="margin: 5px 15px 0px 15px;">時間</label>
                        <select name="time" id="time">
                            <option value="0">請選擇</option>
                            <option value="00"
                            @if (isset($time) && $time == "00")
                                selected
                            @endif                            
                            >0</option>
                            <option value="01"
                            @if (isset($time) && $time == "01")
                                selected
                            @endif                            
                            >1</option>
                            <option value="02"
                            @if (isset($time) && $time == "02")
                                selected
                            @endif
                            >2</option>
                            <option value="03"
                            @if (isset($time) && $time == "03")
                                selected
                            @endif
                            >3</option>
                            <option value="04"
                            @if (isset($time) && $time == "04")
                                selected
                            @endif
                            >4</option>
                            <option value="05"
                            @if (isset($time) && $time == "05")
                                selected
                            @endif
                            >5</option>
                            <option value="06"
                            @if (isset($time) && $time == "06")
                                selected
                            @endif
                            >6</option>
                            <option value="07"
                            @if (isset($time) && $time == "07")
                                selected
                            @endif
                            >7</option>
                            <option value="08"
                            @if (isset($time) && $time == "08")
                                selected
                            @endif
                            >8</option>
                            <option value="09"
                            @if (isset($time) && $time == "09")
                                selected
                            @endif
                            >9</option>
                            <option value="10"
                            @if (isset($time) && $time == "10")
                                selected
                            @endif
                            >10</option>
                            <option value="11"
                            @if (isset($time) && $time == "11")
                                selected
                            @endif
                            >11</option>
                            <option value="12"
                            @if (isset($time) && $time == "12")
                                selected
                            @endif
                            >12</option>
                            <option value="13"
                            @if (isset($time) && $time == "13")
                                selected
                            @endif
                            >13</option>
                            <option value="14"
                            @if (isset($time) && $time == "14")
                                selected
                            @endif
                            >14</option>
                            <option value="15"
                            @if (isset($time) && $time == "15")
                                selected
                            @endif
                            >15</option>
                            <option value="16"
                            @if (isset($time) && $time == "16")
                                selected
                            @endif
                            >16</option>
                            <option value="17"
                            @if (isset($time) && $time == "17")
                                selected
                            @endif
                            >17</option>
                            <option value="18"
                            @if (isset($time) && $time == "18")
                                selected
                            @endif
                            >18</option>
                            <option value="19"
                            @if (isset($time) && $time == "19")
                                selected
                            @endif
                            >19</option>
                            <option value="20"
                            @if (isset($time) && $time == "20")
                                selected
                            @endif
                            >20</option>
                            <option value="21"
                            @if (isset($time) && $time == "21")
                                selected
                            @endif
                            >21</option>
                            <option value="22"
                            @if (isset($time) && $time == "22")
                                selected
                            @endif
                            >22</option>
                            <option value="23"
                            @if (isset($time) && $time == "23")
                                selected
                            @endif
                            >23</option>
                        </select>
                        <label style="margin: 5px 15px 0px 5px;">點</label>
                        <input class="btn btn-dark" style="margin: 0px 15px 0px 15px;" type="submit" onclick="send();">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (isset($time) && isset($date))
        @if (count($records) != 0)
        <div class="container-fluid">
            <table class="table" style="margin: 30px 0px;">
                <thead>
                    <tr>
                        <th>RecordSn</th>
                        <th>LoginName</th>
                        <th>AccountType</th>
                        <th>GameSerialID</th>
                        <th>CreateTime</th>
                        <th>ValueType</th>
                        <th>Reason</th>
                        <th>WinAmount</th>
                        <th>GameID</th>
                        <th>BetAmount</th>
                        <th>Commissionable</th>
                        <th>GameClientIP</th>
                        <th>DeviceInfo</th>
                        <th>GrandJPContribution</th>
                        <th>MajorJPContribution</th>
                        <th>MinorJPContribution</th>
                        <th>MiniJPContribution</th>
                        <th>JPBet</th>
                    </tr>
                </thead>
                @foreach ($records as $record)
                <tbody>
                    <tr>
                        <td>{{ $record->RecordSn }}</td>
                        <td>{{ $record->LoginName }}</td>
                        <td>{{ $record->AccountType }}</td>
                        <td>{{ $record->GameSerialID }}</td>
                        <td>{{ $record->CreateTime }}</td>
                        <td>{{ $record->ValueType }}</td>
                        <td>{{ $record->Reason }}</td>
                        <td>{{ $record->WinAmount }}</td>
                        <td>{{ $record->GameID }}</td>
                        <td>{{ $record->BetAmount }}</td>
                        <td>{{ $record->Commissionable }}</td>
                        <td>{{ $record->GameClientIP }}</td>
                        <td>{{ $record->DeviceInfo }}</td>
                        <td>{{ $record->GrandJPContribution }}</td>
                        <td>{{ $record->MajorJPContribution }}</td>
                        <td>{{ $record->MinorJPContribution }}</td>
                        <td>{{ $record->MiniJPContribution }}</td>
                        <td>{{ $record->JPBet }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4" style="margin-top: 30px;">
                    <h3>查無資料</h3>
                </div>                
            </div>                
        </div>
        @endif
    @endif
    <script>
    function send() {
        var date = document.getElementById("date").value;
        var time = document.getElementById("time").value;
        if (!date || time=="0") {
            alert('請重新選擇查詢注單');
        }
    }
    function date() {
        var starttime = document.getElementById("starttime").value;
        var endtime = document.getElementById("endtime").value;
        if ((starttime > endtime) || (!starttime || !endtime)) {
            alert('日期輸入錯誤');
            return false;
        }
    }
    </script>   
</body>
</html>