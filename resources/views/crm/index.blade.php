@extends('layouts.master')

@section('content')

    <section>
        <h3>My Contacts</h3>
        <div class='list'>
        @foreach ($contacts as $contact)
            <p><a href='/contacts/{{ $contact->id }}'>{{ $contact->full_name }}</a><p>
        @endforeach
        </div>
    </section>

@endsection