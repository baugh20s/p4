@extends('layouts.master')

@section('content')

    {{-- list of contacts: put cap on number --}}
    <section>
        <h3>My Contacts</h3>
        @foreach ($contacts as $contact)
            <p><a href='/contacts/{{ $contact->id }}'>{{ $contact->full_name }}</a><p>
        @endforeach
    </section>

@endsection