@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/passwords/sended') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('correo_electronico') ? ' has-error' : '' }}">
                            <label for="correo_electronico" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="correo_electronico" type="correo_electronico" class="form-control" name="correo_electronico" value="{{ old('correo_electronico') }}" required>

                                @if ($errors->has('correo_electronico'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('correo_electronico') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
