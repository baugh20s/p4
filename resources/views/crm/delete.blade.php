@extends('layouts.master')

@section('content')

    <h2>Are you sure you want to delete this contact?</h2>

    <form method='POST' action='/contacts/{{ $contact->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete record.' class='btn btn-danger'>
    </form>

@endsection