@extends('layouts.master')

@section('content')
    <div class='container'>
        <form method='POST' action='/contacts'>

            <h2>Add A Contact</h2>

            <div class='form-group'>
                <label for='firstName'>First Name
                </label><br>
                <input type='text'
                       name='firstName'
                       id='firstName'
                       class='form-control'
                       value='{{old('firstName')}}'>
            </div>

            <div class='form-group'>
                <label for='lastName'>Last Name
                </label><br>
                <input type='text'
                       name='lastName'
                       id='lastName'
                       class='form-control'
                       value='{{old('lastName')}}'>
            </div>

            <div class='form-group'>
                <label for='emailType'>Email Type
                </label>
                <input type='text'
                       name='emailType'
                       id='emailType'
                       class='form-control'
                       value='{{old('emailType')}}'>
            </div>

            <div class='form-group'>
                <label for='email'>Email
                </label>
                <input type='text'
                       name='email'
                       id='email'
                       class='form-control'
                       value='{{old('email')}}'>
            </div>

            <div class='form-group'>
                <label for='phoneType'>Phone Type
                </label>
                <input type='text'
                       name='phoneType'
                       id='phoneType'
                       class='form-control'
                       value='{{old('phoneType')}}'>
            </div>

            <div class='form-group'>
                <label for='phone'>Number
                </label>
                <input type='text'
                       name='phone'
                       id='phone'
                       class='form-control'
                       value='{{old('phone')}}'>
            </div>

            {{--
            <div class='form-group'>
                <label for='hobbies'>Hobbies and Interests
                </label>
                <p>Add one hobby, interest, or activity per line.</p>
                <br>
                <input type='text'
                        name='hobbies'
                        id='hobbies'
                        class='form-control'>
            </div>
            --}}

            {{--submit button--}}
            <div>
                <input type='submit' value='Add' class='btn btn-primary'>
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