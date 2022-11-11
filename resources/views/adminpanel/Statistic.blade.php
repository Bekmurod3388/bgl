@extends('adminpanel.master')
@section('title')
    <div class=" d-flex justify-content ">
        <h1><b>Statistika</b></h1>
        <form action="{{ route('search') }}" method="post" class="d-flex justify-content-around align-items-center">
            @csrf
            {{--        <input type="hidden" name="id" value="{{ $id }}">--}}
            <input type="date" name="from_date" class="form-control" id="from_date" style="margin-left: 1rem" value="">
            <label for="from_date" style="margin-left: 0.5rem"> dan </label>
            <input type="date" name="to_date" class="form-control" id="to_date" style="margin-left: 1rem" value="">
            <label for="to_date" style="margin-left: 0.5rem"> gacha </label>
            <button type="submit" class="btn btn-primary" style="margin-left: 1rem">Saqlash</button>

            <a href="{{route('all')}}" class="btn btn-primary" style="margin-left: 1rem">Jami:</a>
        </form>
    </div>

@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5> Kg: {{$ildiz}}</h5>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <h4 class="small-box-footer">Sof Ildizlar</h4>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-teal">
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5> Kg: {{number_format($mahsulot,0,',',' ')}}</h5>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <h4 class="small-box-footer"> Tayyor maxshulot </h4>
                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner  pl-5 pr-5">

                            <div>
                                <h5>Dona: {{ number_format($moyka,0,',',' ') }}</h5>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <h4 class="small-box-footer"> Moyka </h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-blue  ">
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5>Kg: {{number_format($kesilgan_slays_kg,0,',', ' ' )}} </h5>
                            </div>
                            <div>
                                <h5>Soat: {{number_format($kesilgan_slays_soat,0,',', ' ' )}}  </h5>
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
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5>Kg: {{number_format($kesilgan_tabletka_kg ,0,',', ' ' )}} </h5>
                            </div>
                            <div>
                                <h5>Soat: {{number_format($kesilgan_tabletka_soat ,0,',', ' ' )}}  </h5>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <h4 class="small-box-footer">Kesilgan Tabletka </h4>

                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5>Yirik : {{ number_format($yirik_palochka,0,',',' ') }}</h5>
                                {{--                                <p>Yirik Polochka</p>--}}
                            </div>

                            <div>
                                <h5>Mayda : {{ number_format($mayda_palochka,0,',',' ') }}</h5>
                                {{--                                <p>Mayda Polochka</p>--}}
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <h4 class="small-box-footer"> Palochka </h4>

                    </div>
                </div>


            </div>

            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-orange">
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5>So'm: {{number_format($ishchilar_ish_haqqi,0,',',' ')}}</h5>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer"> Ishchilar ish haqqi </h4>
                    </div>


                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5>So'm: {{number_format($komunal,0,',',' ')}}</h5>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer"> Kamunal </h4>
                    </div>

                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner pl-5 pr-5">

                            <div>
                                <h5>So'm: {{number_format($chiqim,0,',',' ')}}</h5>
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <h4 class="small-box-footer"> Chiqim </h4>
                    </div>

                </div>

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
                                    <canvas id="barChart1"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                    <canvas id="barChart2"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                    <canvas id="barChart3"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                    <canvas id="barChart4"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                    <canvas id="barChart5"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                    <canvas id="barChart6"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
        {{--console.log(@json($firms));--}}
        $(function () {

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label: 'Ildizlar',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
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
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
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
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
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
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
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
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
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
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
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
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })


    </script>

@endsection
