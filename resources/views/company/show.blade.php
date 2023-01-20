@extends('layouts.app')

@section('template_title')
    {{ $company->name ?? 'Show Company' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Company</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $company->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $company->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
