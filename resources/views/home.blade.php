@extends('layouts.app')

@section('content')
    <h1>Home</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus, asperiores necessitatibus. Nesciunt consectetur perspiciatis enim odit ex. Repellat sapiente eligendi nulla, porro quo officiis eos quia perferendis, consequuntur blanditiis at.</p>
@endsection

@section('sidebar')
    @parent
    <p>This is the append sidebar</p>
@endsection
