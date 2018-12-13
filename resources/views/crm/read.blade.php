@extends('layouts.master')

@section('content')

    <section>
        <h3>{{$contact->full_name}}</h3>
        <ul>
            <li>Email: ({{$contact->email_type}}) {{$contact->email}}</li>
            <li>Phone: ({{$contact->phone_type}}) {{$contact->phone}}</li>
            {{--<li>Hobbies: {{$contact->hobbies}}</li>--}}
        </ul>
    </section>
    <section>
        <ul>
            <li><a href=''>Edit</a></li>
            <li><a href='/contacts'>Return to List</a></li>
            <li><a href='/contacts/{id}/delete'>Delete</a></li>
        </ul>
    </section>

@endsection