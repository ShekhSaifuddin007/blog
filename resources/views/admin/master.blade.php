


<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function()
        {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar()
        {
            window.scrollTo(0,1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/dash') }}/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{ asset('/dash') }}/css/style.css" rel='stylesheet' type='text/css' />
    <!----Calender -------->
    <link rel="stylesheet" href="{{ asset('/dash') }}/css/clndr.css" type="text/css" />
    <!---- //Calender -------->
    <!-- map -->
    <link href="{{ asset('/dash') }}/css/jqvmap.css" rel='stylesheet' type='text/css' />
    <!-- //map -->
    <!-- Graph CSS -->
    <link href="{{ asset('/dash') }}/css/lines.css" rel='stylesheet' type='text/css' />
    <link href="{{ asset('/dash') }}/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('/dash') }}/js/jquery.min.js"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Nav CSS -->
    <link href="{{ asset('/dash') }}/css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/dash') }}/js/metisMenu.min.js"></script>
    <script src="{{ asset('/dash') }}/js/custom.js"></script>
    <!-- Graph JavaScript -->
    <script src="{{ asset('/dash') }}/js/d3.v3.js"></script>
    <script src="{{ asset('/dash') }}/js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
        @include('admin.includes.menu')

    <div id="page-wrapper">
        <div class="graphs">


        @yield('main')

            <div class="copy">
                <p>Copyright &copy; 2018 Blog All Rights Reserved | Design by <a href="">Shekh Saifuddin</a> </p>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/dash') }}/js/bootstrap.min.js"></script>

<!----Calender -------->
<script src="{{ asset('/dash') }}/js/underscore-min.js" type="text/javascript"></script>
<script src= "{{ asset('/dash') }}/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="{{ asset('/dash') }}/js/clndr.js" type="text/javascript"></script>
<script src="{{ asset('/dash') }}/js/site.js" type="text/javascript"></script>
<!----End Calender -------->

<script>

    var seriesData = [ [], [], [], [], [] ];
    var random = new Rickshaw.Fixtures.RandomData(50);

    for (var i = 0; i < 75; i++) {
        random.addData(seriesData);
    }

    var graph = new Rickshaw.Graph( {
        element: document.getElementById("chart"),
        renderer: 'multi',

        dotSize: 5,
        series: [
            {
                name: 'temperature',
                data: seriesData.shift(),
                color: '#AFE9FF',
                renderer: 'stack'
            }, {
                name: 'heat index',
                data: seriesData.shift(),
                color: '#FFCAC0',
                renderer: 'stack'
            }, {
                name: 'dewpoint',
                data: seriesData.shift(),
                color: '#555',
                renderer: 'scatterplot'
            }, {
                name: 'pop',
                data: seriesData.shift().map(function(d) { return { x: d.x, y: d.y / 4 } }),
                color: '#555',
                renderer: 'bar'
            }, {
                name: 'humidity',
                data: seriesData.shift().map(function(d) { return { x: d.x, y: d.y * 1.5 } }),
                renderer: 'line',
                color: '#ef553a'
            }
        ]
    } );


    graph.render();

    var detail = new Rickshaw.Graph.HoverDetail({
        graph: graph
    });
</script>

<!-- map -->
<script src="{{ asset('/dash') }}/js/jquery.vmap.js"></script>
<script src="{{ asset('/dash') }}/js/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="{{ asset('/dash') }}/js/jquery.vmap.world.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: '#333333',
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
        });
    });
</script>
<!-- //map -->



<script src="{{ asset('/') }}/ckeditor/ckeditor.js"></script>
<script src="{{ asset('/') }}/ckeditor/samples/js/sample.js"></script>

<script>
    initSample();
</script>

</body>
</html>
