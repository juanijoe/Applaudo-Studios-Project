@extends('layouts.app')

@section('template_title')
    {{ $recruiter->name ?? 'Show Recruiter' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Recruiter</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recruiters.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $recruiter->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $recruiter->email }}
                        </div>
                        <div class="form-group">
                            <strong>Is Recruiter:</strong>
                            {{ $recruiter->is_recruiter }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
