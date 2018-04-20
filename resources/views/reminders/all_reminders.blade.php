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

               @if(session()->has('message'))
                    <div class="alert alert-success" id="alert_message">
                         <i class="fa fa-check"></i> {{ session()->get('message') }}
                    </div>
               @endif

               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_deactivate">
                    <i class="fa fa-check"></i> Reminder successfully Deactivated.
               </div>

               <div class="alert alert-success" style="display:none;" id="alert_activate">
                    <i class="fa fa-check"></i> Reminder successfully Activated.
               </div>

               <div class="alert alert-success" style="display:none;" id="alert_delete">
                    <i class="fa fa-check"></i> Reminder successfully Deleted.
               </div>
               <!-- !Success Message -->
               
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
                                        <td>
                                             @if($reminder->status == 1)
                                                  <button type="button" class="btn btn-success btn-xs on" value="{{ $reminder->id }}"><i class="fa fa-check"></i> Active</button>
                                             @else
                                                  <button type="button" class="btn btn-danger btn-xs off" value="{{ $reminder->id }}"><i class="fa fa-times"></i> Inactive</button>
                                             @endif</td>
                                        <td>
                                             <button type="button" class="btn btn-warning btn-sm edit" value="{{ $reminder->id }}"><i class="fa fa-edit"></i> Edit</button>

                                             <button type="button" class="btn btn-danger btn-sm delete" value="{{ $reminder->id }}"><i class="fa fa-times"></i> Delete</button>
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

          $('.on').click(function(){
               var reminder_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Reminder will be Deactivated',
                    type: 'orange',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function () {
                                   $.ajax({
                                        type: 'POST',
                                        url: '/reminders/update_active/'+reminder_id,
                                        success: function(){
                                             $('#alert_deactivate').show();
                                             setTimeout('location.reload(true);', 3000);
                                        }
                                   });
                              }
                         },
                         cancel: {
                              text: 'No',
                              btnClass: 'btn-danger'
                         }
                    }
               });
          });

          $('.off').click(function(){
               var reminder_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Reminder will be Activated',
                    type: 'orange',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function() {
                                   $.ajax({
                                        type: 'POST',
                                        url: '/reminders/update_inactive/'+reminder_id,
                                        success: function(){
                                             $('#alert_activate').show();
                                             setTimeout('location.reload(true);', 3000);
                                        }
                                   });
                              }
                         },
                         cancel: {
                              text: 'No',
                              btnClass: 'btn-danger'
                         }
                    }
               });
          });

          $('.edit').click(function(){
               var reminder_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Edit this Reminder?',
                    type: 'orange',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function() {
                                   location.href = '/reminders/'+reminder_id;
                              }
                         },
                         cancel: {
                              text: 'No',
                              btnClass: 'btn-danger'
                         }
                    }
               });
          });

          $('.delete').click(function(){
               var reminder_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Delete this reminder?',
                    type: 'red',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function() {
                                   $.ajax({
                                        type: 'POST',
                                        url: '/reminders/'+reminder_id,
                                        success: function(){
                                             $('#alert_delete').show();
                                             setTimeout('location.reload(true);', 3000);
                                        }
                                   });
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