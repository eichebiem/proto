@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Curriculum</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Curriculum</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of curriculum box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">Curriculum List</h3>
               </div>
               
               <div class="box-body">
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Curriculum Name</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($curriculums as $curriculum)
                                   <tr>
                                        <td>{{ $curriculum->name }}</td>
                                        <td>
                                             <button type="button" class="btn btn-warning btn-sm edit" value="{{ $curriculum->id }}"><i class="fa fa-edit"></i> Edit</button>

                                             <button type="button" class="btn btn-danger btn-sm delete" value="{{ $curriculum->id }}"><i class="fa fa-times"></i> Delete</button>
                                        </td>
                                   </tr>
                              @endforeach
                              
                         </tbody>

                    </table>

               </div>
               <!-- /.box-body -->

          </div>
          <!-- /.box -->


          <!-- create curriculum box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Add Curriculum</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Curriculum successfully created.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="curriculum_name" class="col-sm-2 control-label">Curriculum Name</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="curriculum_name" placeholder="Curriculum Name" name="name">
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="grade_id" class="col-sm-2 control-label">Grade Level</label>

                              <div class="col-sm-10">
                                   <select name="level_id" id="level_id" class="form-control">
                                        <option value="" selected disabled>Select Grade Level</option>

                                        @foreach($levels as $level)
                                             <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="curriculum_details" class="col-sm-2 control-label">Details</label>

                              <div class="col-sm-10">
                                   <textarea name="details" id="curriculum_details" class="form-control" placeholder="Grade Name" cols="30" rows="5"></textarea>
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
                    },
                    level_id: {
                         required: true,
                    },
                    details: {
                         required: true,
                         minlength: 5
                    },
               },

               messages: {
                    name: {
                         required: "Room Name is required"
                    },
                    level_id: {
                         required: "Grade Level is required"
                    },
                    details: {
                         required: "Details is required"
                    }
               },

               submitHandler: function(){
                    var curriculum_name = $('#curriculum_name').val();
                    var level_id = $('#level_id').val();
                    var curriculum_details = $('#curriculum_details').val();

                    $.ajax({
                         type: 'POST',
                         url: '/settings/curriculum',
                         data: {
                              'name':curriculum_name,
                              'level_id':level_id,
                              'details':curriculum_details
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#curriculum_name').val('');
                              $('#level_id').val('');
                              $('#curriculum_details').val('');
                              // console.log(data);
                              setTimeout('location.reload(true);', 3000);
                         }
                    });
               }

          });

          $('.edit').click(function(){
               var curriculum_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Edit this Curriculum?',
                    type: 'orange',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function () {
                                   location.href = '/settings/curriculum/'+curriculum_id;
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
                    content: 'Delete this Curriculum?',
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