@extends('layer.master')
	{{ Html::script('https://code.jquery.com/jquery-3.1.1.min.js') }}
    {{ Html::script('https://code.highcharts.com/highcharts.js') }}
    {{ Html::script('https://code.highcharts.com/modules/exporting.js') }}
    {{ Html::script('https://code.highcharts.com/modules/export-data.js') }}
@section('content')

	<div id="container" data-order="{{ $orderYear }}"></div>

@endsection
@push('js')

<script type="text/javascript">
	$(document).ready(function(){
    var order = $('#container').data('order');
    var listOfValue = [];
    var listOfYear = [];
    order.forEach(function(element){
        listOfYear.push(element.getMonth);
        listOfValue.push(element.value);
    });
    console.log(listOfValue);
    var chart = Highcharts.chart('container', {

        title: {
            text: 'Orders by years'
        },

        subtitle: {
            text: 'Plain'
        },

        xAxis: {
            categories: listOfYear,
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: listOfValue,
            showInLegend: false
        }]
    });
    
    $('#plain').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: false
            },
            subtitle: {
                text: 'Plain'
            }
        });
    });

    $('#inverted').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: false
            },
            subtitle: {
                text: 'Inverted'
            }
        });
    });

    $('#polar').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: true
            },
            subtitle: {
                text: 'Polar'
            }
        });
    });
});

</script>
@endpush