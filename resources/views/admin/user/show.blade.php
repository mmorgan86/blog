@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')
    }}">
@endsection

@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users Page
                <small>The Gang</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">

                    <h3 class="box-title">Admin Users</h3>

                    <a href="{{ route('user.create') }}"
                       class="btn btn-success col-lg-offset-5">Add Admin</a>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Admins</h3>
                        </div>

                        @include('includes.messages')
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>User.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}">
                                                <i class="fa fa-pencil-square-o fa-lg"aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('user.destroy', $user->id) }}"
                                                  method="POST"
                                                  id="delete-user-{{ $user->id }}"
                                            >
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href=""
                                               onclick="if(confirm('Are you sure, You want to delete this?'))
                                                   {
                                                   event.preventDefault();
                                                   document.getElementById('delete-user-{{ $user->id }}')
                                                   .submit();
                                                   } else {
                                                   event.preventDefault();
                                                   }
                                                   "
                                            >
                                                <i class="fa fa-trash-o text-danger fa-lg"
                                                   aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Data found</p>
                                @endforelse

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>User.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @section('footerSection')
        <!-- DataTables -->
        <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')
                }}"></script>
        <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')
                }}"></script>

        <script>
            $(function () {
                $('#example1').DataTable();
            });
        </script>

    @endsection
@endsection
