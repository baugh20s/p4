@extends('layouts.master')

@section('content')
    <div class='container'>
        <form method='GET' action='contacts/search-process'>

            <h2>Search for a Contact</h2>

            <div class='form-group'>
                <label for='firstName'>First Name
                </label><br>
                <input type='text'
                       name='firstName'
                       id='firstName'
                       class='form-control'
                       value='{{$firstNameSearch}}'>
            </div>

            <div class='form-group'>
                <label for='lastName'>Last Name
                </label><br>
                <input type='text'
                       name='lastName'
                       id='lastName'
                       class='form-control'
                       value='{{$lastNameSearch}}'>
            </div>

            {{--submit button--}}
            <div>
                <input type='submit' value='Search' class='btn btn-primary'>
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
            @if($firstNameSearch OR $lastNameSearch)
                <div>
                    @if(count($searchResults) == 0)
                        No matches found.
                    @else
                        <ul>
                            @foreach($searchResults as $contact)
                                <li><a href='/contacts/{{ $contact->id }}'>{{ $contact->full_name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif
        </div>

    </div>

@endsection