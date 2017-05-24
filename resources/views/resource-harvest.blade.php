@extends('layouts.app')

@section('page-title')
    {{ ucwords($job->harvest->action . ' ' . $job->harvest->resource) }} | TEvo Harvester
@endsection
@section('page-header')
    Updating <i> {{ $job->harvest->action }} </i> {{ $job->harvest->resource }} <br/>
    <small> {{ $job->settings['perPage'] }} at a time with entries updated since {{ $job->startTime->format('r') }}</small>
@endsection

@section('content')
@endsection