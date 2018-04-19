@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Reminders</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Reminders</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of rooms box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">List of Reminders</h3>
               </div>
               
               <div class="box-body">
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Posted By</th>
                                   <th>Message</th>
                                   <th>Date Posted</th>
                                   <th>Status</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($reminders as $reminder)
                                   <tr>
                                        <td>{{ $reminder->user->name }}</td>
                                        <td>{!! $reminder->content !!}</td>
                                        <td>{{ $reminder->created_at->toDayDateTimeString() }}</td>
                                        <td>@if($reminder->status == 1) <button type="button" class="btn btn-success btn-xs">Active</button> @else <button type="button" class="btn btn-danger btn-xs">Inactive</button> @endif</td>
                                        <td>
                                             <button type="button" class="btn btn-warning">Edit</button>

                                             <button type="button" class="btn btn-danger">Delete</button>
                                        </td>
                                   </tr>
                              @endforeach
                              
                         </tbody>

                    </table>

               </div>
               <!-- /.box-body -->

          </div>
          <!-- /.box -->

     </section>
     <!-- /.content -->
</div>

@endsection
