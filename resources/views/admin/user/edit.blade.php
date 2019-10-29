@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit {{ $user->name }}
                <small>New Person</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- errors -->
                @include('includes.messages')

                <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Admin</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="box-body">

                                <div class="col-lg-offset-3 col-lg-6">

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name='name'
                                               placeholder="Enter Name"
                                               value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Enter Email"
                                               value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif"
                                        >

                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Enter Phone Number"
                                               value="@if(old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif"
                                        >
                                    </div>


{{--                                    <div class="form-group">--}}
{{--                                        <label for="password">Password</label>--}}
{{--                                        <input type="password" class="form-control" id="password" name="password"--}}
{{--                                               placeholder="Enter Password">--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <label for="password_confirmation">Confirm Password</label>--}}
{{--                                        <input type="password" class="form-control" id="password_confirmation"--}}
{{--                                               name="password_confirmation"--}}
{{--                                               placeholder="Re-enter Password">--}}
{{--                                    </div>--}}

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="checkbox">
                                            <label for="checkbox">
                                                <input type="checkbox"
                                                       name="status"
                                                       value="1"

                                                       @if(old('status') == 1 || $user->status == 1)
                                                                checked
                                                            @endif
                                                >
                                                Status
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Assign Roles</label>
                                        <div class="row">
                                            @foreach($roles as $role)

                                                <div class="col-sm-4">
                                                    <div class="checkbox">
                                                        <label for="checkbox">
                                                            <input type="checkbox"
                                                                   name="role[]"
                                                                   value="{{ $role->id }}"
                                                            >
                                                            {{ $role->name }}
                                                        </label>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
                                    </div>

                                </div>

                        </form>
                    </div>


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
