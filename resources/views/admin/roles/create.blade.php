@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-lock"> @lang('site.roles') </x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('roles.store') }}">
                    @csrf
                    @method('post')

                    {{-- @include('partials._errors') --}}

                    {{--name--}}
                    <div class="form-group">
                        <label>@lang('roles.name') <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="{{ old('name') }}" >
                    </div>

                    <h5>@lang('roles.permissions') <span class="text-danger">*</span></h5>

                    @php
                        $models = ['roles', 'users', 'settings', 'customers', 'drivers', 'trips', 'daily-trips', 'reviews', 'accounting'];
                    @endphp

                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('roles.model')</th>
                            <th>@lang('roles.permissions')</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($models as $model)
                            <tr>
                                <td>@lang($model . '.' . $model)</td>
                                <td>
                                    <div class="animated-checkbox mx-2" style="display:inline-block;">
                                        <label class="m-0">
                                            <input type="checkbox" value="" name="" class="all-roles">
                                            <span class="label-text">@lang('site.all')</span>
                                        </label>
                                    </div>

                                    @php
                                        //create_roles, read_roles, update_roles, delete_roles
                                            $permissionMaps = ['create', 'read', 'update', 'delete'];
                                    @endphp

                                    @foreach ($permissionMaps as $permissionMap)
                                        <div class="animated-checkbox mx-2" style="display:inline-block;">
                                            <label class="m-0">
                                                <input type="checkbox" value="{{ $model . '-' . $permissionMap }}" name="permissions[]" class="role">
                                                <span class="label-text">@lang('site.' . $permissionMap)</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table><!-- end of table -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


