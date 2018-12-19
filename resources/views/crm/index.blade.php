@extends('layouts.master')

@section('content')

    {{-- list of contacts: put cap on number --}}
    <section>
        <h3>My Contacts</h3>
        <ul>
            @foreach ($contacts as $contact)
            <li><a href='/contacts/{{ $contact->id }}'>{{ $contact->full_name }}</a></li>
            @endforeach
        </ul>
    </section>

@endsection