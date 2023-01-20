<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('candidate_id') }}
            {{ Form::text('candidate_id', $postulation->candidate_id, ['class' => 'form-control' . ($errors->has('candidate_id') ? ' is-invalid' : ''), 'placeholder' => 'Candidate Id']) }}
            {!! $errors->first('candidate_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_id') }}
            {{ Form::text('status_id', $postulation->status_id, ['class' => 'form-control' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => 'Status Id']) }}
            {!! $errors->first('status_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('position_id') }}
            {{ Form::text('position_id', $postulation->position_id, ['class' => 'form-control' . ($errors->has('position_id') ? ' is-invalid' : ''), 'placeholder' => 'Position Id']) }}
            {!! $errors->first('position_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
