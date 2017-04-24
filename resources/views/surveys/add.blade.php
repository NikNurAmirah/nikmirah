@extends('layouts.master')

@section('title', 'Question Create')

@section('content')
    <script type="text/javascript">
        var subcol='#e5e5e5';
        var indent=30;

        function coll()
        {
            var r = document.getElementById('menu').getElementsByTagName('input');
            var d = document.getElementById('menu').getElementsByTagName('div');
            var num=0;
            for(j=0;j<r.length;j++)
            {
                if(r[j].checked==true)
                    num=j;
            }

            for(i=0;i<d.length;i++)
            {
                if(i==num)
                {
                    d[i].style.display='block';
                    d[i].style.position='relative';
                    d[i].style.backgroundColor=subcol;
                    d[i].style.left=indent+'px';
                }

                else
                    d[i].style.display='none';
            }
            return true;
        }
    </script>


    <h2>Create &amp; Add Question to - {{ $survey->title }}</h2>

    {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createquestion')) !!}
    {{ Form::hidden(csrf_token()) }}

    <div class="row col-sm-12 col-lg-12">
        {!! Form::hidden('survey_id', $survey->id, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Question:') !!}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('require', 'Required?') !!}
        {{ Form::radio('require', 1) }} Yes <br>
        {{ Form::radio('require', 0) }} No
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('question_type', 'Question Type:') !!}
        {{ Form::radio('question_type', 'radio') }} Multiple Choice <br>
        {{ Form::radio('question_type', 'checkbox') }} Checkboxes <br>
        {{ Form::radio('question_type', 'textbox') }} Text Box <br>
        {{ Form::radio('question_type', 'tof') }} True&#47;False <br>
    </div>


    <br>

    <div class="row large-4 columns">
        {!! Form::submit('Add Question', ['class' => 'button']) !!}
    </div>
    {!! Form::close() !!}


@endsection