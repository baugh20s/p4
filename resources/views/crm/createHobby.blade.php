@extends('layouts.master')

@section('content')

    <div class='container'>
        <form method='POST' action='/hobbies'>

            {{ csrf_field() }}

            <h3>Add a Hobby</h3>

            <div class='form-group'>
                <label for='hobbyName'>Hobby Name
                </label><br>
                <input type='text'
                       name='hobbyName'
                       id='hobbyName'
                       class='form-control'
                       value='{{old('hobbyName')}}'>
            </div>

            {{--submit button--}}
            <div>
                <input type='submit' value='Create Hobby' class='btn btn-primary'>
            </div>

        </form>

        <div class='form-group contactForm'>
            @if(count($errors) > 0)
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection