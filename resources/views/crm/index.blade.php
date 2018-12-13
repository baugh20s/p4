@extends('layouts.master')

@section('content')

    {{-- list of contacts: put cap on number --}}
    <section>
        <h2>My Contacts</h2>
        <p>here is a list of my contacts!</p>
        <ul>
            @foreach ($contacts as $contact)
            <li><a href='/contacts/{{ $contact->id }}'>{{ $contact->full_name }}</a></li>
            @endforeach
        </ul>
    </section>

@endsection