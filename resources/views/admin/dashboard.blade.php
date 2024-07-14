@extends('admin.layout')
@section('head')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawUserChart();
        drawBookingChart();
    }

    function drawUserChart() {
        var data = google.visualization.arrayToDataTable([
            ['Hostel', 'Number of Users'],
            @foreach($hostelUserStats as $item)
                ['{{ $item['name'] }}', {{ $item['user_count'] }}],
            @endforeach
        ]);

        var options = {
            title: 'Number of Users in Each Hostel',
            backgroundColor: 'transparent',
            legendTextStyle: { color: 'black' },
            titleTextStyle: { color: 'black' }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    function drawBookingChart() {
        var data = google.visualization.arrayToDataTable([
            ['Hostel', 'Confirmed', 'Cancelled', 'Pending'],
            @foreach($hostelBookingDetails as $item)
                ['{{ $item['name'] }}', {{ $item['confirmed_count'] }}, {{ $item['cancelled_count'] }}, {{ $item['pending_count'] }}],
            @endforeach
        ]);

        var options = {
            width: 450,
            height: 300,
            legend: { position: 'top', maxLines: 3, textStyle: { color: 'black' } },
            bar: { groupWidth: '75%' },
            isStacked: true,
            title: 'Booking Status in Each Hostel',
            backgroundColor: 'transparent',
            titleTextStyle: { color: 'black' },
            hAxis: {
                textStyle: { color: 'black' }
            },
            vAxis: {
                textStyle: { color: 'black' }
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

        chart.draw(data, options);
    }
</script>
<style>
    body {
        background: linear-gradient(to right, #ff6c6c, #9af0ff);
        color: white;
    }
    .dashboard-container {
        text-align: center;
        margin-top: 50px;
    }
    .charts-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 50px;
    }
    .chart {
        width: 450px;
        height: 300px;
        border: 1px solid white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .welcome-message {
        font-size: 2em;
        margin-bottom: 20px;
    }
</style>

@endsection

@section('content')
<div class="dashboard-container">
    <h1 class="welcome-message">Welcome,  {{ Auth::guard('admin')->user()->admin_name }}</h1>
    <p>This is the admin dashboard where you can manage hostels, users, and bookings.</p>
    <div class="charts-container">
        <div id="piechart" class="chart"></div>
        <div id="barchart" class="chart"></div>
    </div>
</div>
@endsection
