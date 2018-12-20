@extends('layouts.master')

@section('content')

    <section>
        <h3>Hobbies</h3>
        <div class='buttonRight'>
            <h5 class='btn btn-primary'><a id='linkSpecial' href='/hobbies/create'>Add New Hobby</a></h5>
        </div>
        <div class='list'>
            @foreach ($hobbies as $hobby)
                <p>{{ $hobby->hobby_name }}<p>
            @endforeach
        </div>
    </section>

@endsection