@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Subject Information</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Subject Information</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of rooms box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">List of Subjects</h3>
               </div>

               @if(session()->has('message'))
                    <div class="alert alert-success" id="alert_message">
                         <i class="fa fa-check"></i> {{ session()->get('message') }}
                    </div>
               @endif

               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_delete">
                    <i class="fa fa-check"></i> Reminder successfully Deleted.
               </div>
               <!-- !Success Message -->

               
               
               
               
               <div class="box-body">

                    <div class="form-group">
                         <label for="prereq" class="col-sm-2 control-label">Curriculum</label>

                         <form action="/subjects/search" method="POST">

                              @csrf
                         
                              <div class="col-sm-7">
                                   <select id="curr_id" class="form-control">
                                        <option value="" selected disabled>Select Curriculum</option>
                                        @foreach($curriculums as $curr)
                                             <option value="{{ $curr->id }}">{{ $curr->name }}</option>
                                        @endforeach
                                   </select>
                              </div>

                              <div class="col-sm-3">
                                   <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>

                                   <button type="button" class="btn btn-danger refresh"><i class="fa fa-refresh"></i> Refresh</button>
                              </div>

                         </form>

                    </div>

                    <div class="col-sm-12">
                    <hr>
                    </div>
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Subject Code</th>
                                   <th>Subject Description</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($subjs as $subj)
                                   <tr>
                                        <td>{{ $subj->code }}</td>
                                        <td>{{ $subj->description }}</td>
                                        <td>
                                             <button type="button" class="btn btn-warning btn-sm edit" value="{{ $subj->id }}"><i class="fa fa-edit"></i> Edit</button>
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

@section('ajax')
<script>
     $(function(){
          $('#alert_message').delay(5000).fadeOut();

          $('.refresh').click(function(){

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Refresh page?',
                    type: 'red',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function() {
                                   location.reload();
                              }
                         },
                         cancel: {
                              text: 'No',
                              btnClass: 'btn-danger'
                         }
                    }
               });
          });

     })
</script>

@endsection