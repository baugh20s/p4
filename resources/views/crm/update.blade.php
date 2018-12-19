@extends('layouts.master')

@section('content')
    <div class='container'>
        <form method='POST' action='/contacts/{{ $contact->id }}'>

            {{ method_field('put') }}
            {{ csrf_field() }}

            <h3>Add A Contact</h3>

            <div class='form-group'>
                <label for='firstName'>First Name
                </label><br>
                <input type='text'
                       name='firstName'
                       id='firstName'
                       class='form-control'
                       value='{{old('firstName', $contact->first_name)}}'>
            </div>

            <div class='form-group'>
                <label for='lastName'>Last Name
                </label><br>
                <input type='text'
                       name='lastName'
                       id='lastName'
                       class='form-control'
                       value='{{old('lastName', $contact->last_name)}}'>
            </div>

            <div class='form-group'>
                <label for='emailType'>Email Type
                </label>
                <input type='text'
                       name='emailType'
                       id='emailType'
                       class='form-control'
                       value='{{old('emailType', $contact->email_type)}}'>
            </div>

            <div class='form-group'>
                <label for='email'>Email
                </label>
                <input type='text'
                       name='email'
                       id='email'
                       class='form-control'
                       value='{{old('email', $contact->email)}}'>
            </div>

            <div class='form-group'>
                <label for='phoneType'>Phone Type
                </label>
                <input type='text'
                       name='phoneType'
                       id='phoneType'
                       class='form-control'
                       value='{{old('phoneType', $contact->phone_type)}}'>
            </div>

            <div class='form-group'>
                <label for='phone'>Number
                </label>
                <input type='text'
                       name='phone'
                       id='phone'
                       class='form-control'
                       value='{{old('phone', $contact->phone)}}'>
            </div>

            <div class='form-group'>
                <label for='hobbies'>Hobbies
                </label>
                @foreach($hobbies as $hobbyId => $hobbyName)
                    <div><label><input {{ (in_array($hobbyId, $hobbiesForContact )) ? 'checked' : '' }}
                                       type='checkbox'
                                       {{--brackets tells php to accept multiple selections and put into array--}}
                                       name='hobbies[]'
                                       value='{{ $hobbyId }}'
                                       class='form-control'> {{ $hobbyName }} </label></div>
                @endforeach
            </div>

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