@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Grade Level</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Grade Level</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of grade levels box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">Grade Levels</h3>
               </div>

               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_delete">
                    <i class="fa fa-check"></i> Grade Level successfully deleted.
               </div>
               <!-- !Success Message -->
               
               <div class="box-body">
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Grade Name</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($levels as $level)
                                   <tr>
                                        <td>{{ $level->name }}</td>
                                        <td>
                                             <button type="button" class="btn btn-warning btn-sm edit" value="{{ $level->id }}"><i class="fa fa-edit"></i> Edit</button>

                                             <button type="button" class="btn btn-danger btn-sm delete" value="{{ $level->id }}"><i class="fa fa-times"></i> Delete</button>
                                        </td>
                                   </tr>
                              @endforeach
                              
                         </tbody>

                    </table>

               </div>
               <!-- /.box-body -->

          </div>
          <!-- /.box -->


          <!-- create grade level box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Create Grade Level</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Grade Level successfully created.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="grade_name" class="col-sm-2 control-label">Grade Name</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="grade_name" placeholder="Grade Name" name="name">
                              </div>
                         </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="reset" class="btn btn-warning btn-sm pull-right"><i class="fa fa-refresh"></i> Reset</button>

                         <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-floppy-o"></i> Save</button>
                    </div>
                    <!-- /.box-footer -->
               </form>

          </div>
          <!-- /.box -->

     </section>
     <!-- /.content -->
</div>

@endsection


@section('ajax')
<script>

     $(function(){

          $.validator.setDefaults({
               errorClass: 'help-block',
               highlight: function(element) {
                    $(element)
                         .closest('.form-group')
                         .addClass('has-error');
               },
               unhighlight: function(element) {
                    $(element)
                         .closest('.form-group')
                         .removeClass('has-error');
               }
          });

          $('#form-validate').validate({

               rules: {
                    name: {
                         required: true,
                         minlength: 5
                    }
               },

               messages: {
                    name: {
                         required: "Grade Level is required"
                    }
               },

               submitHandler: function(){
                    var grade_name = $('#grade_name').val();

                    $.ajax({
                         type: 'POST',
                         url: '/settings/level',
                         data: {
                              name:grade_name
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#grade_name').val('');
                              // console.log('data saved');
                              setTimeout('location.reload(true);', 3000);
                         }
                    });
               }

          });

          $('.edit').click(function(){
               var level_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Edit this Grade Level?',
                    type: 'orange',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function () {
                                   location.href = '/settings/level/'+level_id;
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
               var level_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Delete this room?',
                    type: 'red',
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
                                        url: '/settings/level/'+level_id,
                                        success: function(data){
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

     });

</script>
@endsection