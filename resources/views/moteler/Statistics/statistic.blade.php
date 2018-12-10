@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Thống Kê</div>
    <div class="card-body">
        <div class="card-body" style="">
            <div id="status_roomAll">
                <canvas id="doughnut-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="moteler_asset/vendor/chart.js/Chart.min.js"></script>
<script>
    window.onload = function () {
        var testTitle = 'Tình trạng phòng trọ (' + {!! $allroom !!} + ' phòng)' ;
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
        width: 500px;
        height: 500px;
    }
</style>
@endsection
