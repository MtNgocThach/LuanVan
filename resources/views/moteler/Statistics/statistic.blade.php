@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Tình trạng cho thuê trọ</div>
    <div class="card-body">
        <div class="card-body" style="">
            <div id="status_roomAll">
                <canvas id="doughnut-chart" width="800" height="450"></canvas>
                <div> <u>Tổng nợ tồn các phòng:</u> <span style="color: red; font-weight: bold; font-style: italic">{{ $debt }}</span> vnđ

                <ul style="margin-left: 10px;">
                    @foreach($roomdebt as $item)
                        <li style="font-style: italic">
                            - {{ $item->name }} : {{ $item->debt }} vnđ
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="moteler_asset/vendor/chart.js/Chart.min.js"></script>
<script>
    window.onload = function () {
        var testTitle = 'Tổng phòng trọ: ' + {!! $allroom !!} ;
        var chart = new Chart(document.getElementById("doughnut-chart"), {
            type: 'doughnut',
            data: {
                labels: ["Đã thuê", "Còn trống"],
                datasets: [
                    {
                        label: "Population (millions)",
                        backgroundColor: ["#3e95cd", "#8e5ea2"],
                        data: [{!! $room_1 !!},{!! $room_0 !!}]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: testTitle
                }
            }
        });
    }
</script>
<style>
    #status_roomAll{
        margin: 5px auto;
        width: 700px;
        height: 700px;
    }
</style>
@endsection
