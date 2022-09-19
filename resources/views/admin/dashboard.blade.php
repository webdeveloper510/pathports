@extends('admin.layouts.app')

@section('title','Dashboard || PathPorts')

@section('content')
<?php   
 
 $url= url('')."/login/".@$encode;
 $role = Auth::user()->role_id;
 $firstName = Auth::user()->firstName;
 $lastName = Auth::user()->lastName;
 $name = $firstName." ".$lastName;


?>
    <style>
    
    .app-content.content {
    background: #fff;
    padding: 0px 0;
    box-shadow: -8px 12px 18px 0 #dadee8 !important;
    margin: 0 27px 0 288px;
    border-radius: 21px;
}


    </style>
<script src="https://kit.fontawesome.com/3ad9d71c5b.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="wlcome-page">
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>

    <div class="content-body d-flex flex-column">
        <!-- users list start -->

        <div class="row">
            <div class="col-4  mb-2">
                    <h2 class="content-header-title float-start mb-0">Dashboard</h2>
            </div> 
            <div class="col-8  mb-2">
                @if($role != 1)  
                    <div class="portal h-700">
                        <div class="linkboder"style="display: flex; border-bottom: 1px solid;padding-bottom: 3px;">
                            <h5 style="color:#38c9ff !important; padding:0px; padding-top: 4px !important; margin-bottom: 0px !important;">Your Portal link: </h5>
                                <!-- <h5 class="link"></h5> -->
                            <button class="copy-link" onclick="myFunction('{{$url}}')">  Copy Link <i class="fa fa-clone"></i></button> 
                        </div> 
                    </div> 
                @endif
            </div> 
            </div>
        <div class="wlc-john-main">  
            <h2 class="wlc-john">Welcome {{ $name }}!</h2> 
            @if( $role == 4)
                <p class="tab-john-content">To sign up for a meeting with a student to share your interest areas and professional experience <a href="{{ route('meeting.create') }}">Click Here</a></p>
                <p class="tab-john-content">To have another meeting with the last student <b>"{{$users_name}}"</b> <a href="{{ route('meeting.edit',$meeting_id) }}">Click Here</a></p>
            @endif 
        </div>
       
        <!-- users list ends -->
    </div>
</div>
</div>
@if($role == 1)  
<section id="chartjs-chart">
    <div class="container">
    <div class="row content-chartjs-chart">
        

       <!-- Polar Area Chart Starts -->
      
        <div class="col-md-6">
            <div class="card">
               
                <h4 class="card-title" style="margin-top: 19px; margin-left: 24px; ">Placements Rate By Universities</h4>
               <div
               id="myChart" style="width:100%; max-width:650px; height:310px;">
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-12" style="display: flex;
                       font-size: 12px;justify-content: space-around;">
                       <div class="Placchart">
                             <div class="d-flex justify-content-between  mb-1 last">
                                <div class="d-flex align-items-center" style="padding-left: 15x;">
                                    <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                                    <span class="fw-bold ms-75 me-25">WSU Spokane</span>
                                  
                                </div>
                                <div style="padding-right: 11px;padding-left: 12px;">
                                    <span>2%</span>
                                    <i data-feather="arrow-up" class="text-success"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center" style="padding-left: 15x;">
                                    <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                    <span class="fw-bold ms-75 me-25">WSU Vancouver</span>
                                  
                                </div>
                                <div style="padding-right: 11px;padding-left: 12px;">
                                    <span>8%</span>
                                    <i data-feather="arrow-up" class="text-success"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center" style="padding-left: 15x;">
                                    <i data-feather="tablet" class="font-medium-2 text-success"></i>
                                    <span class="fw-bold ms-75 me-25">WSU Tri-Cities</span>
                                   
                                </div>
                                <div style="padding-right: 11px;padding-left: 12px;">
                                    <span>-5%</span>
                                    <i data-feather="arrow-down" class="text-danger"></i>
                                </div>
                            </div>
                        </div>
                        <div class="Placchart">
                            <div class="d-flex justify-content-between  mb-1">
                                <div class="d-flex align-items-center" style="padding-left: 18px;">
                                    <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                    <span class="fw-bold ms-75 me-25">WSU Everett</span>
                                  
                                </div>
                                <div style="padding-right: 11px;padding-left: 12px;">
                                    <span>8%</span>
                                    <i data-feather="arrow-up" class="text-success"></i>
                                </div>
                            </div>
                              <div class="d-flex justify-content-between  mb-1">
                                <div class="d-flex align-items-center" style="padding-left: 18px;">
                                    <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                    <span class="fw-bold ms-75 me-25">Washington State University</span>
                                 
                                </div>
                                <div style="padding-right: 11px;padding-left: 12px;">
                                    <span>6%</span>
                                    <i data-feather="arrow-up" class="text-success"></i>
                                </div>
                            </div>
                             <div class="d-flex justify-content-between  mb-1">
                                <div class="d-flex align-items-center" style="padding-left: 15px;">
                                    <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                                    <span class="fw-bold ms-75 me-25">WSU World Wide</span>
                                   
                                </div>
                                <div style="padding-right: 11px; padding-left: 12px;">  
                                    <span>2%</span>
                                    <i data-feather="arrow-up" class="text-success"></i>
                                </div>
                            </div>
                        </div>
                </div>
            </div> -->

            </div>
        </div>
        <!-- Polar Area Chart Ends-->

         <!-- Donut Chart Starts -->

                     <div class="col-md-6">   
                        <div class="card">
                            <div class="card-header"style="padding-bottom: 16px;">
                                <h4 class="card-title-Salary">Salary By Universities</h4>
                            </div>
                            <div class="card-body pb-0">
                                <div class="doughnut" style="padding-bottom:6px;">
                                <canvas id="doughnut-chart" style="width:100%;max-width:400px;height:300px"></canvas>
                              
                            </div>
                            <!-- <div class="row"style="padding-top: 8px;">
                                <div class="col-md-12" style="display: flex; justify-content: space-around;
                                   font-size: 12px;">
                                     <div class="Placchart">


                                <div class="d-flex justify-content-between mt-5 mb-1 pt-5">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                                        <span class="fw-bold ms-75 me-25">WSU Spokane</span>
                                      
                                    </div>
                                    <div style="padding-right: 11px;padding-left: 12px;">
                                        <span>2%</span>
                                        <i data-feather="arrow-up" class="text-success"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                        <span class="fw-bold ms-75 me-25">WSU Vancouver</span>
                                      
                                    </div>
                                     <div style="padding-right: 11px;padding-left: 12px;">
                                        <span>8%</span>
                                        <i data-feather="arrow-up" class="text-success"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="tablet" class="font-medium-2 text-success"></i>
                                        <span class="fw-bold ms-75 me-25">WSU Tri-Cities</span>
                                       
                                    </div>
                                     <div style="padding-right: 11px;padding-left: 12px;">
                                        <span>-5%</span>
                                        <i data-feather="arrow-down" class="text-danger"></i>
                                    </div>
                                </div>
                            </div>
                              <div class="Placchart">
                                <div class="d-flex justify-content-between mt-5 mb-1 pt-5">
                                    <div class="d-flex align-items-center"style="padding-left: 18px;">
                                        <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                        <span class="fw-bold ms-75 me-25">WSU Everett</span>
                                      
                                    </div>
                                     <div style="padding-right: 11px;padding-left: 12px;">
                                        <span>8%</span>
                                        <i data-feather="arrow-up" class="text-success"></i>
                                    </div>
                                </div>
                                  <div class="d-flex justify-content-between mt-1 mb-1">
                                    <div class="d-flex align-items-center"style="padding-left: 18px;">
                                        <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                        <span class="fw-bold ms-75 me-25">Washington State University</span>
                                     
                                    </div>
                                     <div style="padding-right: 11px;padding-left: 12px;">
                                        <span>6%</span>
                                        <i data-feather="arrow-up" class="text-success"></i>
                                    </div>
                                </div>
                                 <div class="d-flex justify-content-between mt-1 mb-1">
                                    <div class="d-flex align-items-center"style="padding-left: 18px;">
                                        <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                                        <span class="fw-bold ms-75 me-25">WSU World Wide</span>
                                       
                                    </div>
                                    <div style="padding-right: 11px;padding-left: 12px;">
                                        <span>2%</span>
                                        <i data-feather="arrow-up" class="text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">Income By Major</h4>
                            <canvas id="myCharts" style="width:100%;max-width:430px"></canvas>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card">
                           <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">Econ Majors</h4>
                           <div id="myChart4" style="width:100%; max-width:450px; height:215px;">
                               
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                        <div class="card">
                           <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">MBA's</h4>
                           <div id="myChart5" style="width:100%; max-width:450px; height:215px;">
                               
                           </div>
                       </div>
                        <div class="Day">
                           <div class="card">
                <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">Agenda</h4>
                <canvas id="agendachart"></canvas>
                </div>
            </div>   
                        </div>
                        <div class="col-md-6">
                        <div class="card">
                           <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">Spokane Med School</h4>
                           <figure class="highcharts-figure">
                                <div id="container"></div>
                               
                                <div id="sliders">
                                    <table>
                                        <tr>
                                            <td><label for="alpha">Alpha Angle</label></td>
                                            <td><input id="alpha" type="range" min="0" max="45" value="15"/> <span id="alpha-value" class="value"></span></td>
                                        </tr>
                                        <tr>
                    
                                            <td><label for="beta">Beta Angle</label></td>
                                            <td><input id="beta" type="range" min="-45" max="45" value="15"/> <span id="beta-value" class="value"></span></td>
                                        </tr>
                                        <tr>
                                            <td><label for="depth">Depth</label></td>
                                            <td><input id="depth" type="range" min="20" max="100" value="50"/> <span id="depth-value" class="value"></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </figure>
                       </div>
                       <div class="daybay">
                       <div class="col-md-6">
                            <div class="card">
                                <div class="chartCard monthlyChart">
                                        <div class="chartBox daysbox">
                                        <!-- <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">Meetings</h4> -->
                                         <button  onclick="timeFrame(this)" value="day">Day</button>
                                        <button onclick="timeFrame(this)" value="week">Week</button>
                                        <button onclick="timeFrame(this)" value="month">Month</button>
                                        <canvas id="meetChart"></canvas>
                                        </div>
                                 </div>
                            </div>   
                        </div> 
                        </div>
                   </div>

                    
                   
        <!-- Donut Chart Starts -->
        
        <!-- <canvas id="myChart7" style="width:100%;max-width:600px"></canvas> -->
        
    </div>

    
                       
    
        <!-- <div class="col-md-6">
            <div class="card">
                <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">Meetings</h4>
                <div id="meetingChart" style="width:100%; max-width:650px; height:450px;">
                </div>
            </div>
        </div> -->
                
         
    </div>
          
    
</div>
                     
</div> 

</div>
@endif



@if($role == 3)  

<div class="row inerMatched">
    <div class="col-md-6  d-flex">
      <h2 class="py-0"style="font-size: 19px;font-weight: 700; color: #38c9ff;">Matched Alumni with Your InterestAreas</h2>
        </div>
                <div class="col-md-6"style="display: flex;justify-content: center;">
                        @foreach($matched_alumni as $matched_alumni_data)
                    <a class="matched_alum" href="http://wellspringinfotech.com/pathports/meeting/create/?id={{ base64_encode($matched_alumni_data['id']) }}">                   {{  $matched_alumni_data['firstName']." ".$matched_alumni_data['lastName'] }}</a>
                       <br>
                   @endforeach
                </div>
            
        </div>


<section id="chartjs-chart" >
    <div class="container" >
    <div class="row content-chartjs-chart">
        

       <!-- Polar Area Chart Starts -->
      
        <div class="col-md-12" style="height:330px">
            
        </div>
       
    </div>
    <div class="chartCard monthlyChart">
      <div class="chartBox daysbox">
      <!-- <h4 class="card-title" style="margin-top: 19px; margin-left: 24px;">Meetings</h4> -->
         <button  onclick="timeFrame(this)" value="day">Day</button>
        <button onclick="timeFrame(this)" value="week">Week</button>
        <button onclick="timeFrame(this)" value="month">Month</button>
        <canvas id="meetChart"></canvas>
       
      </div>
    </div>
</div>
</div>
</div>
@endif
        <script>
  
            var xValues = <?php echo json_encode($uni_name_array)?>;
           
            var yValues = <?php echo json_encode($values_array)?>;
            var barColors = [ "pink","orange","#00dac7","purple"];

            new Chart("myChart7", {
            type: "bar",
            data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                    legend: {display: false},
                    title: {
                    display: true,
                    text: "Meeting With Students"
                    }
            }
            });


        </script>
        <script>
            var xValues = ["WSU Spokane", "WSU Vancouver", "WSU Tri-Cities", "WSU Everett", "Washington State University","WSU World Wide"];
            var yValues = [55, 49, 44, 24, 15,30];
            var barColors = [
            "#38c9ff",
            "#95DBE5FF",
            "#0095b6",
            "#299AFF",
            "#84D0FF",
            "#0892d0",
            ];

            new Chart("doughnut-chart", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
                
            },
            options: {
                
                title: {
                
                display: true,
                
                }
            }
            });
</script>

    <script>

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

                var data = google.visualization.arrayToDataTable
                ([
                    ['University', 'Mhl'],
                    ['WSU Spokane',54.8],
                    ['WSU Vancouver',48.6],
                    ['WSU Tri-Cities',44.4],
                    ['WSU Everett',23.9],
                    ['Washington State University',14.5],
                    ['WSU World Wide',14.5]
                ]);

            var options = {
        
                    is3D:true,
                    colors: ['#38c9ff', '#2c9aff', '#73c2fb', '#0892d0', '#87cefa','#0892d0'],
                    'chartArea': {'width': '60%', 'height': '60%','left':80,'top':30,},
                    'legend': {'position': 'none'},
                
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>  
   
   

    <script>
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

                    
            var data = google.visualization.arrayToDataTable
                ([
                    ['University', 'Mhl'],
                    ['WSU Spokane',54.8],
                    ['WSU Vancouver',48.6],
                    ['WSU Tri-Cities',44.4],
                    ['WSU Everett',23.9],
                    ['Washington State University',14.5],
                    ['WSU World Wide',14.5],
            ]);

            var options = {
                           
                    is3D:true,
                    colors: ['#38c9ff', '#2c9aff', '#73c2fb', '#0892d0', '#87cefa','#0892d0'],
                    
                    'chartArea': {'width': '60%', 'height': '60%','left':80,'top':30,},
                    'legend': {'position': 'none'},
            };

            var chart = new google.visualization.PieChart(document.getElementById('meetingChart'));
            chart.draw(data, options);

        }
    </script>   

        @endsection
        @section('styles')
        @endsection
        @section('scripts')

        <script src="{{ asset('/')}}assets/admin/vendors/js/charts/chart.min.js"></script>
        <script src="{{ asset('/')}}assets/admin/js/scripts/charts/chart-chartjs.js"></script>


    <script type="text/javascript">

        function myFunction(val, event) 
        {
            var inp = document.createElement('input');
            document.body.appendChild(inp)
            inp.value = val;
            inp.select();
            document.execCommand('copy', false);
            inp.remove();
            alert('URL Copied');
        }
        
        
            // LIne chart script
            var xValues = ["Business","Enginering","Communication","Education","Bio Tech","Agrcultural","Vet Science","Fedral","Real estate","Comp Science"];

           new Chart("myCharts", 
           {
                type: "line",
            data: {
                        labels: xValues,

                datasets: [{ 
                        data: [250000,2500000,300000,380000,450000,550000,1000000,1500000,2000000,3500000],
                        borderColor: "#2c9aff",
                        fill: false
                    }, 
                { 
                        data: [1600000,1700000,500000,900000,1000000,1700000,500000,2000000,2500000,3000000],
                        borderColor: "#73c2fb",
                        fill: false
                    }, 
                { 
                        data: [500000,1000000,1500000,550000,1500000,2500000,1500000,2500000,1500000,2000000],
                        borderColor: "#0892d0",
                        fill: false
                }]
            },

            options: {
                        legend: {display: false}
            }
        });


            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);


    function drawChart() {

            var data = google.visualization.arrayToDataTable([
                        ['Contry', ''],
                        ['Tech',350],
                        ['Entra preneur',200],
                        ['Professional',170],
                        ['Business',100],
                        ['Education',200],
                        ['Medical',150],
            ]);

            var options = {
                    
                        'chartArea': {'top':5,},
                        colors: ['#73c2fb'],
                        'legend': {'position': 'none'},
            };

            var chart = new google.visualization.BarChart(document.getElementById('myChart4'));
            chart.draw(data, options);
        }

    </script>


    <script>
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

                var data = google.visualization.arrayToDataTable([
                        ['Contry', ''],
                        ['Tech',370],
                        ['Entra preneur',280],
                        ['Professional',170],
                        ['Business',100],
                        ['Education',370],
                        ['Medical',250],
                ]);

                var options = {
                       'chartArea': {'top':5,},
                        colors: ['#0892d0'],
                       'legend': {'position': 'none'},
                };

                var chart = new google.visualization.BarChart(document.getElementById('myChart5'));
                chart.draw(data, options);
        }

    </script>


    <script>
        const chart = new Highcharts.Chart({
                chart: {
                        renderTo: 'container',
                        type: 'column',
                        options3d: {
                                enabled: true,
                                alpha: 15,
                                beta: 15,
                                depth: 50,
                                viewDistance: 25
                            }
                    },
                xAxis: {
                        categories: ['Nursing', 'Grade', 'Income','Executive', 'MD']
                },
    
                legend: {
                    enabled: false
                },

                plotOptions: {
                    column: {
                        depth: 25
                    }
                },

                series: [{
                    data: [1318, 1073, 1060, 813, 775],
                    colorByPoint: true
                }]
        });

    function showValues() {

            document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
            document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
            document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
    }

// Activate the sliders
        document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
            chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
            showValues();
            chart.redraw(false);
        }));

            showValues();


</script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<script>
      var yVal = <?php echo json_encode($meeting_count)?>;
      var xVal = <?php echo json_encode($meeting_date)?>;
      console.log(xVal)
        const day =[

          {x:Date.parse('2021-11-01 '),y:12},
          {x:Date.parse('2021-11-02 '),y:12},
          {x:Date.parse('2021-11-03 '),y:6},
          {x:Date.parse('2021-11-04 '),y:9},
          {x:Date.parse('2021-11-05 '),y:3},
        ];
    
        const week =[
          {x:Date.parse('2021-10-31 '),y:50},
          {x:Date.parse('2021-11-07 '),y:70},
          {x:Date.parse('2021-11-14 '),y:100},
          {x:Date.parse('2021-11-21 '),y:60},
          {x:Date.parse('2021-11-28 '),y:30}
         
        ];
        const month =[
          {x:Date.parse('2021-08-01 '),y:500},
          {x:Date.parse('2021-09-01 '),y:700},
          {x:Date.parse('2021-10-01 '),y:500},
          {x:Date.parse('2021-11-01 '),y:600},
          {x:Date.parse('2021-12-01 '),y:300}
         
        ];
    // setup 
    const data = {
      //labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: day,
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
              x: {
                type: 'time',
                time: {
                    unit: 'day',
                }
            },
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const meetChart = new Chart(
      document.getElementById('meetChart'),
      config
    );
    function timeFrame(period){
        console.log(period.value);
        if(period.value == 'day'){
          meetChart.config.options.scales.x.time.unit=period.value;
          meetChart.config.data.datasets[0].data= day;

        }
        if(period.value == 'week'){
          meetChart.config.options.scales.x.time.unit=period.value;
          meetChart.config.data.datasets[0].data= week;

        }
        if(period.value == 'month'){
          meetChart.config.options.scales.x.time.unit=period.value;
          meetChart.config.data.datasets[0].data= month;

        }
        meetChart.update();
    }


    $(".matched_alum").click(function() {
        var link = $(this).attr('var');
        $('.post').attr("value",link);
        $('.redirect').submit();
    });
    </script>
 <script>
      var xValues = <?php echo json_encode($agenda_name_array)?>;
      var yValues = <?php echo json_encode($agenda_value)?>;
// var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
// var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("agendachart", {
  type: "pie",
  height:100,
  width:100,
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
   
    legend: {
            display: false,
            position: 'bottom',

        },
   
  }
});
</script>
@endsection
