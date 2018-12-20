@extends('layouts.master')

@section('content')

    <section>
        <h3>{{$contact->full_name}}</h3>
        <div>
            <label>Email:</label> <em>({{$contact->email_type}})</em>
            <p>{{$contact->email}}</p>
            <label>Phone:</label> <em>({{$contact->phone_type}})</em>
            <p>{{$contact->phone}}</p>
            <label>Hobbies:</label>
            <ul>
                @foreach($contact->hobbies as $hobby)
                    <li>{{ $hobby->hobby_name }}</li>
                @endforeach
             </ul>
        </div>
    </section>
    <section class='navMenu'>
        <p class='nav'><a href='/contacts/{{ $contact->id }}/edit'>Edit</a></p>
        <p class='nav'><a href='/contacts'>Return to List</a></p>
        <p class='nav'><a href='/contacts/{{ $contact->id }}/delete'>Delete</a></p>
    </section>

@endsection