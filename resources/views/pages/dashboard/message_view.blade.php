@extends('layouts.sideNav')

@section('content')
    @include('components.message.reply_message')
@endsection

@section('footer_script')
    @include('components.message.message_js')
@endsection