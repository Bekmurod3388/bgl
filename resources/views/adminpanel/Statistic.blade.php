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
                                <h3>100</h3>
                                <p>Yirik Polochka</p>
                            </div>

                            <div>
                                <h3>100</h3>
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
                                <h3>100</h3>
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
                                <h3>100 </h3>
                                <p>Shu oy</p>
                            </div>

                            <div>
                                <h3>100</h3>
                                <p>Bugun</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer">Kesilgan Slays ( kg )</h4>
                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-indigo">
                        <div class="inner d-flex justify-content-between pl-5 pr-5">

                            <div>
                                <h3>100</h3>
                                <p>Shu oy</p>
                            </div>

                            <div>
                                <h3>100</h3>
                                <p>Bugun</p>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <h4 class="small-box-footer">Kesilgan Tabletka ( kg )</h4>

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
                <div class="row">

                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Chiqimlar Umumiy</h3>
                            </div>

                            <div style="height: 350px; width: 600px; margin: auto;">
                                <canvas id="barChart">
                                </canvas>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title"> Sotish Umumiy </h3>
                            </div>

                            <div style="height: 350px; width: 600px; margin: auto;">
                                <canvas id="barChart1">
                                </canvas>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title"> Ishchilar Umumiy </h3>
                            </div>

                            <div style="height: 350px; width: 600px; margin: auto;">
                                <canvas id="barChart2">
                                </canvas>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="card">

                            <div class="card-header border-0">
                                <h3 class="card-title">Chiqimlar Kundalik</h3>
                            </div>

                            <div style="height: 350px; width: 600px; margin: auto;">
                                <canvas id="barChart0">
                                </canvas>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Sotish Kundalik </h3>
                            </div>

                            <div style="height: 350px; width: 600px; margin: auto;">
                                <canvas id="barChart01">
                                </canvas>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Ishichlar Kundalik </h3>
                            </div>

                            <div style="height: 350px; width: 600px; margin: auto;">
                                <canvas id="barChart02">
                                </canvas>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.row -->


            </div>

        </div>

    </section>



    <script>
        $(function () {

            // Outs
            var firms = <?php echo json_encode($firms); ?>;
            var names = <?php echo json_encode($names); ?>;
            var all_sum = <?php echo json_encode($all_sum); ?>;

            var outs_allsum =<?php echo json_encode($outs_allsum); ?>;
            var outs_name =<?php echo json_encode($outs_name); ?>;


            //sells
            var sells = <?php echo json_encode($sells); ?>;
            var sell_names = <?php echo json_encode($sell_names); ?>;
            var sell_sum = <?php echo json_encode($sell_value); ?>;

            var sells_allsum = <?php echo json_encode($sells_allsum); ?>;

            // workers

            var workers = <?php echo json_encode($workers); ?>;
            var worker_names = <?php echo json_encode($worker_names); ?>;
            var worker_sum = <?php echo json_encode($worker_summ); ?>;
            var worker_allsum = <?php echo json_encode($worker_allsum); ?>;


            var barCanvas = $("#barChart");
            var barCanvas1 = $("#barChart1");
            var barCanvas2 = $("#barChart2");

            var barCanvas0 = $("#barChart0");
            var barCanvas01 = $("#barChart01");
            var barCanvas02 = $("#barChart02");


            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels: names,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: all_sum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var barChart = new Chart(barCanvas1, {
                type: 'bar',
                data: {
                    labels: sell_names,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: sell_sum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var barChart = new Chart(barCanvas2, {
                type: 'bar',
                data: {
                    labels: worker_names,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: worker_sum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


            var barChart = new Chart(barCanvas0, {
                type: 'bar',
                data: {
                    labels: outs_name,
                    datasets: [{
                        label: 'Kundalik Summa',
                        data: outs_allsum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var barChart = new Chart(barCanvas01, {
                type: 'bar',
                data: {
                    labels: outs_name,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: sells_allsum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var barChart = new Chart(barCanvas02, {
                type: 'bar',
                data: {
                    labels: outs_name,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: worker_allsum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        })

    </script>

@endsection
