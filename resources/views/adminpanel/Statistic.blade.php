@extends('adminpanel.master')
@section('title','Statistika')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>{{$firms_allsum}}</h3>
                                <p>Shu oy</p>
                            </div>

                            <div>
                                <h3>{{$sum_firms[0]}}</h3>
                                <p>Bugun</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer">Sof Ildizlar ( kg )</h4>
                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>{{ number_format($yirik,0,',',' ') }}</h3>
                                <p>Yirik Polochka</p>
                            </div>

                            <div>
                                <h3>{{ number_format($mayda,0,',',' ') }}</h3>
                                <p>Mayda Polochka</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <h4 class="small-box-footer"> Bugungi ( kg ) </h4>

                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>{{ number_format($moykalar,0,',',' ') }}</h3>
                                <p>Bugun</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <h4 class="small-box-footer"> Moyka ( dona ) </h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-blue  ">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3> {{number_format($all_sla_kg ,0,',', ' ' )}} </h3>
                                <p>Jami kg </p>
                            </div>
                            <div>
                                <h3> {{number_format($all_sla_h ,0,',', ' ' )}}  </h3>
                                <p>Jami soat</p>
                            </div>

                            <div>
                                <p>   </p>
                            </div>

                            <div>
                                <h3> {{number_format($sla_kg ,0,',', ' ' )}} </h3>
                                <p>Bugun kg </p>
                            </div>

                            <div>
                                <h3> {{number_format($sla_h ,0,',', ' ' )}} </h3>
                                <p>Bugun soat </p>
                            </div>


                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer">Kesilgan Slays </h4>
                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-indigo">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3> {{number_format($all_tab_kg ,0,',', ' ' )}} </h3>
                                <p>Jami kg </p>
                            </div>
                            <div>
                                <h3> {{number_format($all_tab_h ,0,',', ' ' )}}  </h3>
                                <p>Jami soat</p>
                            </div>

                            <div>
                                <p>   </p>
                            </div>

                            <div>
                                <h3> {{number_format($tab_kg ,0,',', ' ' )}} </h3>
                                <p>Bugun kg </p>
                            </div>

                            <div>
                                <h3> {{number_format($tab_h ,0,',', ' ' )}} </h3>
                                <p>Bugun soat </p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <h4 class="small-box-footer">Kesilgan Tabletka </h4>

                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-teal">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>{{number_format($finished_moon_allsum,0,',',' ')}}</h3>
                                <p>Shu oy</p>
                            </div>

                            <div>
                                <h3>{{number_format($finished_today_allsum,0,',',' ')}}</h3>
                                <p>Bugun</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <h4 class="small-box-footer"> Tayyor maxshulot ( kg ) </h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-orange">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>{{number_format($workers_moon_allsum,0,',',' ')}}</h3>
                                <p>Shu oy</p>
                            </div>

                            <div>
                                <h3> {{ number_format($workers_today_allsum, 0, ',', ' ') }} </h3>
                                <p>Bugun</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer"> Ishchilar ish haqqi ( so`m ) </h4>
                    </div>


                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>{{number_format($communal_moon_allsum,0,',',' ')}}</h3>
                                <p>Shu oy</p>
                            </div>

                            <div>
                                <h3>{{number_format($communal_today_allsum,0,',',' ')}}</h3>
                                <p>Bugun</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer"> Kamunal ( so`m ) </h4>
                    </div>

                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>{{number_format($outs_all,0,',',' ')}}</h3>
                                <p>Shu paytgacha</p>
                            </div>


                            <div>
                                <h3>{{number_format($outs_allsum_today,0,',',' ')}}</h3>
                                <p>Bugun</p>
                            </div>


                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer"> Bugun </h4>
                    </div>

                </div>


                <!-- Main row -->
{{--                <div class="row">--}}

{{--                    <div class="col-lg-6">--}}

{{--                        <div class="card overflow-auto">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title">Chiqimlar Umumiy</h3>--}}
{{--                            </div>--}}

{{--                            <div style="height: 350px; width: 600px; margin: auto;">--}}
{{--                                <canvas id="barChart">--}}
{{--                                </canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card overflow-auto">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title"> Sotish Umumiy </h3>--}}
{{--                            </div>--}}

{{--                            <div style="height: 350px; width: 600px; margin: auto;">--}}
{{--                                <canvas id="barChart1">--}}
{{--                                </canvas>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="card overflow-auto">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title"> Ishchilar Umumiy </h3>--}}
{{--                            </div>--}}

{{--                            <div style="height: 350px; width: 600px; margin: auto;">--}}
{{--                                <canvas id="barChart2">--}}
{{--                                </canvas>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-6">--}}

{{--                        <div class="card overflow-auto">--}}

{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title">Chiqimlar Kundalik</h3>--}}
{{--                            </div>--}}

{{--                            <div style="height: 350px; width: 600px; margin: auto;">--}}
{{--                                <canvas id="barChart0">--}}
{{--                                </canvas>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="card overflow-auto">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title">Sotish Kundalik </h3>--}}
{{--                            </div>--}}

{{--                            <div style="height: 350px; width: 600px; margin: auto;">--}}
{{--                                <canvas id="barChart01">--}}
{{--                                </canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card overflow-auto">--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="card-title">Ishichlar Kundalik </h3>--}}
{{--                            </div>--}}

{{--                            <div style="height: 350px; width: 600px; margin: auto;">--}}
{{--                                <canvas id="barChart02">--}}
{{--                                </canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                </div>--}}
                <!-- /.row -->


            </div>

        </div>
{{--        ghhhhhhhjkj--}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DONUT CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">
                        <!-- LINE CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- STACKED BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart6" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
{{--tyuioouytfghj--}}



    </section>


    <script>
        $(function () {

            var areaChartData = {
                labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label               : 'Digital Goods',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label               : 'Electronics',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart1').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            var barChartCanvas = $('#barChart2').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            var barChartCanvas = $('#barChart3').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            var barChartCanvas = $('#barChart4').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            var barChartCanvas = $('#barChart5').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            var barChartCanvas = $('#barChart6').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })


        {{--$(function () {--}}

        {{--    // Outs--}}
        {{--    var firms = @json($firms);--}}
        {{--    var names = @json($names);--}}
        {{--    var all_sum = @json($all_sum);--}}

        {{--    var outs_allsum =@json($outs_allsum);--}}
        {{--    var outs_name =@json($outs_name);--}}


        {{--    //sells--}}
        {{--    var sells = @json($sells);--}}
        {{--    var sell_names = @json($sell_names);--}}
        {{--    var sell_sum = @json($sell_value);--}}

        {{--    var sells_allsum = @json($sells_allsum);--}}

        {{--    // workers--}}

        {{--    var workers = @json($workers);--}}
        {{--    var worker_names = @json($worker_names);--}}
        {{--    var worker_sum = @json($worker_summ);--}}
        {{--    var worker_allsum = @json($worker_allsum);--}}


        {{--    var barCanvas = $("#barChart");--}}
        {{--    var barCanvas1 = $("#barChart1");--}}
        {{--    var barCanvas2 = $("#barChart2");--}}

        {{--    var barCanvas0 = $("#barChart0");--}}
        {{--    var barCanvas01 = $("#barChart01");--}}
        {{--    var barCanvas02 = $("#barChart02");--}}


        {{--    var barChart = new Chart(barCanvas, {--}}
        {{--        type: 'bar',--}}
        {{--        data: {--}}
        {{--            labels: names,--}}
        {{--            datasets: [{--}}
        {{--                label: 'Umumiy summa',--}}
        {{--                data: all_sum,--}}
        {{--                backgroundColor: [--}}
        {{--                    'rgba(255, 99, 132, 0.2)',--}}
        {{--                    'rgba(54, 162, 235, 0.2)',--}}
        {{--                    'rgba(255, 206, 86, 0.2)',--}}
        {{--                    'rgba(75, 192, 192, 0.2)',--}}
        {{--                    'rgba(153, 102, 255, 0.2)',--}}
        {{--                    'rgba(255, 159, 64, 0.2)'--}}
        {{--                ],--}}
        {{--                borderColor: [--}}
        {{--                    'rgba(255,99,132,1)',--}}
        {{--                    'rgba(54, 162, 235, 1)',--}}
        {{--                    'rgba(255, 206, 86, 1)',--}}
        {{--                    'rgba(75, 192, 192, 1)',--}}
        {{--                    'rgba(153, 102, 255, 1)',--}}
        {{--                    'rgba(255, 159, 64, 1)'--}}
        {{--                ],--}}
        {{--                borderWidth: 1--}}
        {{--            }]--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            scales: {--}}
        {{--                yAxes: [{--}}
        {{--                    ticks: {--}}
        {{--                        beginAtZero: true--}}
        {{--                    }--}}
        {{--                }]--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--    var barChart = new Chart(barCanvas1, {--}}
        {{--        type: 'bar',--}}
        {{--        data: {--}}
        {{--            labels: sell_names,--}}
        {{--            datasets: [{--}}
        {{--                label: 'Umumiy summa',--}}
        {{--                data: sell_sum,--}}
        {{--                backgroundColor: [--}}
        {{--                    'rgba(255, 99, 132, 0.2)',--}}
        {{--                    'rgba(54, 162, 235, 0.2)',--}}
        {{--                    'rgba(255, 206, 86, 0.2)',--}}
        {{--                    'rgba(75, 192, 192, 0.2)',--}}
        {{--                    'rgba(153, 102, 255, 0.2)',--}}
        {{--                    'rgba(255, 159, 64, 0.2)'--}}
        {{--                ],--}}
        {{--                borderColor: [--}}
        {{--                    'rgba(255,99,132,1)',--}}
        {{--                    'rgba(54, 162, 235, 1)',--}}
        {{--                    'rgba(255, 206, 86, 1)',--}}
        {{--                    'rgba(75, 192, 192, 1)',--}}
        {{--                    'rgba(153, 102, 255, 1)',--}}
        {{--                    'rgba(255, 159, 64, 1)'--}}
        {{--                ],--}}
        {{--                borderWidth: 1--}}
        {{--            }]--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            scales: {--}}
        {{--                yAxes: [{--}}
        {{--                    ticks: {--}}
        {{--                        beginAtZero: true--}}
        {{--                    }--}}
        {{--                }]--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--    var barChart = new Chart(barCanvas2, {--}}
        {{--        type: 'bar',--}}
        {{--        data: {--}}
        {{--            labels: worker_names,--}}
        {{--            datasets: [{--}}
        {{--                label: 'Umumiy summa',--}}
        {{--                data: worker_sum,--}}
        {{--                backgroundColor: [--}}
        {{--                    'rgba(255, 99, 132, 0.2)',--}}
        {{--                    'rgba(54, 162, 235, 0.2)',--}}
        {{--                    'rgba(255, 206, 86, 0.2)',--}}
        {{--                    'rgba(75, 192, 192, 0.2)',--}}
        {{--                    'rgba(153, 102, 255, 0.2)',--}}
        {{--                    'rgba(255, 159, 64, 0.2)'--}}
        {{--                ],--}}
        {{--                borderColor: [--}}
        {{--                    'rgba(255,99,132,1)',--}}
        {{--                    'rgba(54, 162, 235, 1)',--}}
        {{--                    'rgba(255, 206, 86, 1)',--}}
        {{--                    'rgba(75, 192, 192, 1)',--}}
        {{--                    'rgba(153, 102, 255, 1)',--}}
        {{--                    'rgba(255, 159, 64, 1)'--}}
        {{--                ],--}}
        {{--                borderWidth: 1--}}
        {{--            }]--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            scales: {--}}
        {{--                yAxes: [{--}}
        {{--                    ticks: {--}}
        {{--                        beginAtZero: true--}}
        {{--                    }--}}
        {{--                }]--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}


        {{--    var barChart = new Chart(barCanvas0, {--}}
        {{--        type: 'bar',--}}
        {{--        data: {--}}
        {{--            labels: outs_name,--}}
        {{--            datasets: [{--}}
        {{--                label: 'Kundalik Summa',--}}
        {{--                data: outs_allsum,--}}
        {{--                backgroundColor: [--}}
        {{--                    'rgba(255, 99, 132, 0.2)',--}}
        {{--                    'rgba(54, 162, 235, 0.2)',--}}
        {{--                    'rgba(255, 206, 86, 0.2)',--}}
        {{--                    'rgba(75, 192, 192, 0.2)',--}}
        {{--                    'rgba(153, 102, 255, 0.2)',--}}
        {{--                    'rgba(255, 159, 64, 0.2)'--}}
        {{--                ],--}}
        {{--                borderColor: [--}}
        {{--                    'rgba(255,99,132,1)',--}}
        {{--                    'rgba(54, 162, 235, 1)',--}}
        {{--                    'rgba(255, 206, 86, 1)',--}}
        {{--                    'rgba(75, 192, 192, 1)',--}}
        {{--                    'rgba(153, 102, 255, 1)',--}}
        {{--                    'rgba(255, 159, 64, 1)'--}}
        {{--                ],--}}
        {{--                borderWidth: 1--}}
        {{--            }]--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            scales: {--}}
        {{--                yAxes: [{--}}
        {{--                    ticks: {--}}
        {{--                        beginAtZero: true--}}
        {{--                    }--}}
        {{--                }]--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--    var barChart = new Chart(barCanvas01, {--}}
        {{--        type: 'bar',--}}
        {{--        data: {--}}
        {{--            labels: outs_name,--}}
        {{--            datasets: [{--}}
        {{--                label: 'Umumiy summa',--}}
        {{--                data: sells_allsum,--}}
        {{--                backgroundColor: [--}}
        {{--                    'rgba(255, 99, 132, 0.2)',--}}
        {{--                    'rgba(54, 162, 235, 0.2)',--}}
        {{--                    'rgba(255, 206, 86, 0.2)',--}}
        {{--                    'rgba(75, 192, 192, 0.2)',--}}
        {{--                    'rgba(153, 102, 255, 0.2)',--}}
        {{--                    'rgba(255, 159, 64, 0.2)'--}}
        {{--                ],--}}
        {{--                borderColor: [--}}
        {{--                    'rgba(255,99,132,1)',--}}
        {{--                    'rgba(54, 162, 235, 1)',--}}
        {{--                    'rgba(255, 206, 86, 1)',--}}
        {{--                    'rgba(75, 192, 192, 1)',--}}
        {{--                    'rgba(153, 102, 255, 1)',--}}
        {{--                    'rgba(255, 159, 64, 1)'--}}
        {{--                ],--}}
        {{--                borderWidth: 1--}}
        {{--            }]--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            scales: {--}}
        {{--                yAxes: [{--}}
        {{--                    ticks: {--}}
        {{--                        beginAtZero: true--}}
        {{--                    }--}}
        {{--                }]--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--    var barChart = new Chart(barCanvas02, {--}}
        {{--        type: 'bar',--}}
        {{--        data: {--}}
        {{--            labels: outs_name,--}}
        {{--            datasets: [{--}}
        {{--                label: 'Umumiy summa',--}}
        {{--                data: worker_allsum,--}}
        {{--                backgroundColor: [--}}
        {{--                    'rgba(255, 99, 132, 0.2)',--}}
        {{--                    'rgba(54, 162, 235, 0.2)',--}}
        {{--                    'rgba(255, 206, 86, 0.2)',--}}
        {{--                    'rgba(75, 192, 192, 0.2)',--}}
        {{--                    'rgba(153, 102, 255, 0.2)',--}}
        {{--                    'rgba(255, 159, 64, 0.2)'--}}
        {{--                ],--}}
        {{--                borderColor: [--}}
        {{--                    'rgba(255,99,132,1)',--}}
        {{--                    'rgba(54, 162, 235, 1)',--}}
        {{--                    'rgba(255, 206, 86, 1)',--}}
        {{--                    'rgba(75, 192, 192, 1)',--}}
        {{--                    'rgba(153, 102, 255, 1)',--}}
        {{--                    'rgba(255, 159, 64, 1)'--}}
        {{--                ],--}}
        {{--                borderWidth: 1--}}
        {{--            }]--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            scales: {--}}
        {{--                yAxes: [{--}}
        {{--                    ticks: {--}}
        {{--                        beginAtZero: true--}}
        {{--                    }--}}
        {{--                }]--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}

        {{--})--}}

    </script>

@endsection
