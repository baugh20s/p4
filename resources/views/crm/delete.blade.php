@extends('layouts.master')

@section('content')

    <h3>Delete Record</h3>

    <h5>Are you sure you'd like to delete this record?</h5>

    <form method='POST' action='/contacts/{{ $contact->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete record.' class='btn btn-danger'>
    </form>

@endsection