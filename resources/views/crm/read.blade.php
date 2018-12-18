@extends('layouts.master')

@section('content')

    <section>
        <h3>{{$contact->full_name}}</h3>
        <div>
            <p>Email: ({{$contact->email_type}}) {{$contact->email}}</p>
            <p>Phone: ({{$contact->phone_type}}) {{$contact->phone}}</p>
            <p>Hobbies:</p>
            <p>
                @foreach($contact->hobbies as $hobby)
                    {{ $hobby->hobby_name }}
                @endforeach
            </p>
        </div>
    </section>
    <section>
        <ul>
            <li><a href='/contacts/{{ $contact->id }}/edit'>Edit</a></li>
            <li><a href='/contacts'>Return to List</a></li>
            <li><a href='/contacts/{{ $contact->id }}/delete'>Delete</a></li>
        </ul>
    </section>

@endsection