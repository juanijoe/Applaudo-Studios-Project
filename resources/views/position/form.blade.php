<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('company_id') }}
            {{ Form::text('company_id', $position->company_id, ['class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''), 'placeholder' => 'Company Id']) }}
            {!! $errors->first('company_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recruiter_id') }}
            {{ Form::text('recruiter_id', $position->recruiter_id, ['class' => 'form-control' . ($errors->has('recruiter_id') ? ' is-invalid' : ''), 'placeholder' => 'Recruiter Id']) }}
            {!! $errors->first('recruiter_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salary') }}
            {{ Form::text('salary', $position->salary, ['class' => 'form-control' . ($errors->has('salary') ? ' is-invalid' : ''), 'placeholder' => 'Salary']) }}
            {!! $errors->first('salary', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $position->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('position_status') }}
            {{ Form::text('position_status', $position->position_status, ['class' => 'form-control' . ($errors->has('position_status') ? ' is-invalid' : ''), 'placeholder' => 'Position Status']) }}
            {!! $errors->first('position_status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
