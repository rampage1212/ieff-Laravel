@extends('layouts.frontend')

@section('description', 'Platform for community and governmental discussions.')
@section('title')
@if (isset($thread))
    {{ $thread->title }} -
@endif
@if (isset($category))
    {{ $category->title }} -
@endif
Governance
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('/images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

    <div class="container clearfix">
        <h1>Forum</h1>
        <span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forum</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<img class="mb-1" src="/images/forum.png" style="width: 100%">
 
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap pt-5">
        <div class="container clearfix">

            <p class="mb-0" style="font-weight: 600;">In the forum there are requirements on high-level discussions around topics that aim for suggestions, betterments and changes of the national and/or the international E-football scene. </p>
            
            <div class="row mb-5">
                <div class="col-12">
                    @include ('forum::partials.alerts')
                </div>
            </div>
           
            @yield('content')

            <hr>
            <p class="mt-5 mb-3">
                <b>Forum rules</b>
                <ul style="list-style-position: inside;">
                    <li> As a Forum member you are not allowed to spread any inside information outside of the Forum. </li>
                    <li> You are not allowed to use inappropriate language in the Forum, such as swearing towards something or someone. </li>
                    <li> When a topic is made, you are obligated to follow it and be on-topic. </li>
                    <li> You are not allowed to spam the same message twice times or more. </li>
                    <li> It is prohibited to reveal more of an another members identity than what is shown on his Player card. </li>
                    <li> You are not allowed to send advertising messages in the Forum. </li>
                </ul>
            </p>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
var toggle = $('input[type=checkbox][data-toggle-all]');
var checkboxes = $('table tbody input[type=checkbox]');
var actions = $('[data-actions]');
var forms = $('[data-actions-form]');
var confirmString = "{{ trans('forum::general.generic_confirm') }}";

function setToggleStates() {
    checkboxes.prop('checked', toggle.is(':checked')).change();
}

function setSelectionStates() {
    checkboxes.each(function() {
        var tr = $(this).parents('tr');

        $(this).is(':checked') ? tr.addClass('active') : tr.removeClass('active');

        checkboxes.filter(':checked').length ? $('[data-bulk-actions]').removeClass('hidden') : $('[data-bulk-actions]').addClass('hidden');
    });
}

function setActionStates() {
    forms.each(function() {
        var form = $(this);
        var method = form.find('input[name=_method]');
        var selected = form.find('select[name=action] option:selected');
        var depends = form.find('[data-depends]');

        selected.each(function() {
            if ($(this).attr('data-method')) {
                method.val($(this).data('method'));
            } else {
                method.val('patch');
            }
        });

        depends.each(function() {
            (selected.val() == $(this).data('depends')) ? $(this).removeClass('hidden') : $(this).addClass('hidden');
        });
    });
}

setToggleStates();
setSelectionStates();
setActionStates();

toggle.click(setToggleStates);
checkboxes.change(setSelectionStates);
actions.change(setActionStates);

forms.submit(function() {
    var action = $(this).find('[data-actions]').find(':selected');

    if (action.is('[data-confirm]')) {
        return confirm(confirmString);
    }

    return true;
});

$('form[data-confirm]').submit(function() {
    return confirm(confirmString);
});
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR5J57bbQzcLUyjHILUcWxE4yXyjiEMRI&callback" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@if(isset($data['voteResults']))
<script type="text/javascript">
percentages = @json($data['voteResults']);

jQuery.each(percentages, function(key, answers){
    
    const piechart   = [];
    piechart.push(['Player', 'Percentage']);

    jQuery.each(answers, function(key, value){
        var loopNumber = key;

        jQuery.each(value, function(key, value){
            $('#answer'+key).html(' - '+value+'%');

            piechart.push([key, value]);
        });

        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable(piechart);

          // Optional; add a title and set the width and height of the chart
          var options = {'width':550, 'height':400};

          // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('piechart-'+loopNumber));
          chart.draw(data, options);
        }

        $('#vote-form-'+loopNumber).hide();
    });
});   
</script>
@endif

@foreach($data['governanceQuestions'] as $key => $question)
    <script type="text/javascript">
    $("#submit-vote-form-{{ $key }}").on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
        $.ajax({
            data: $('#vote-form-{{ $key }}').serialize(),
            url: "{{ route('vote') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) 
            {
                console.log(data);
                if(data.success) 
                {
                    console.log(data.success);
                    const piechart   = [];
                    piechart.push(['Player', 'Percentage']);

                    jQuery.each(data.success, function(key, value){
                        jQuery.each(value, function(key, value){
                            $('#answer'+key).html(' - '+value+'%');

                            piechart.push([key, value]);
                        });
                    });

                    console.log(piechart);

                    $('#vote-form-{{ $key }}').hide();
                    $('.form-check-input-{{ $key }}').hide();
                    $('#submit-vote-form- {{ $key }}').hide();

                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(piechart);

                      // Optional; add a title and set the width and height of the chart
                      var options = {'width':550, 'height':400};

                      // Display the chart inside the <div> element with id="piechart"
                      var chart = new google.visualization.PieChart(document.getElementById('piechart-{{ $key }}'));
                      chart.draw(data, options);
                    }
                }
                else 
                {
                    alert(data.error);
                }
            },
            error: function (data) {
                alert("An unknown error occured. Please refresh the page and try again, if the problem persists please contact us: wijo@ie-ff.com");
            }
        });
    });
    </script>

    <script type="text/javascript">
        $("#addAnswer").click(function () {
            alert('test')
            $('.answers').append('<div><p>test</p></div>')
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="mb-3"><input type="text" name="answers[]" class="form-control"></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endforeach
@endsection