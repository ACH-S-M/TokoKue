@extends('Components.Menu')

@section('NavbarMenu')
    @include('Components.Navbar')
@endsection

@section('content')
    <h1>INI beda lagi nih</h1>
    <a href={{ route('home') }}>Kembali</a>
@endsection
