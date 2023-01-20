@extends('layouts.app')

@section('template_title')
    {{ $postulation->name ?? 'Show Postulation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Postulation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Candidate Id:</strong>
                            {{ $postulation->candidate_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status Id:</strong>
                            {{ $postulation->status_id }}
                        </div>
                        <div class="form-group">
                            <strong>Position Id:</strong>
                            {{ $postulation->position_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
