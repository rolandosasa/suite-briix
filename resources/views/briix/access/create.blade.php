@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.users.management') . ' | ' . trans('labels.briix.access.users.create'))

@section('page-header')
    <h1>
        {{ trans('labels.briix.access.users.management') }}
        <small>{{ trans('labels.briix.access.users.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'briix.access.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.briix.access.users.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('briix.access.includes.partials.header-buttons-users')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('enterprise_id', trans('validation.attributes.briix.access.users.enterprise'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-2">
                        
                        {!!Form::select('enterprise_id', $enterprises,null ,['class' => 'form-control','required' => '','autofocus'=>'', 'placeholder' => trans('validation.attributes.briix.access.users.enterprise')]);!!}
                        
                    </div><!--col-lg-10-->
                </div>
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.briix.access.users.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.users.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.briix.access.users.email'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.users.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.briix.access.users.password'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.briix.access.users.password')]) }}

                    <div class="col-lg-10">
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.briix.access.users.password_confirmation'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.briix.access.users.password_confirmation')]) }}

                    <div class="col-lg-10">
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.briix.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('confirmed', trans('validation.attributes.briix.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmed', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.briix.access.users.send_confirmation_email') }}<br/>
                        <small>{{ trans('strings.briix.access.users.if_confirmed_off') }}</small>
                    </label>

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmation_email', '1') }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.briix.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-3">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                <input type="checkbox" value="{{ $role->id }}" name="assignees_roles[]" id="role-{{ $role->id }}" /> <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                <a href="#" data-role="role_{{ $role->id }}" class="show-permissions small">
                                    (
                                        <span class="show-text">{{ trans('labels.general.show') }}</span>
                                        <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                        {{ trans('labels.briix.access.users.permissions') }}
                                    )
                                </a>
                                <br/>
                                <div class="permission-list hidden" data-role="role_{{ $role->id }}">
                                    @if ($role->all)
                                        {{ trans('labels.briix.access.users.all_permissions') }}<br/><br/>
                                    @else
                                        @if (count($role->permissions) > 0)
                                            <blockquote class="small">{{--
                                        --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                @endforeach
                                            </blockquote>
                                        @else
                                            {{ trans('labels.briix.access.users.no_permissions') }}<br/><br/>
                                        @endif
                                    @endif
                                </div><!--permission list-->
                            @endforeach
                        @else
                            {{ trans('labels.briix.access.users.no_roles') }}
                        @endif
                    </div><!--col-lg-3-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('briix.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts-end')
    {{ Html::script('js/briix/access/users/script.js') }}
@stop