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

          <!-- create curriculum box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Add Curriculum</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Curriculum successfully updated.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="curriculum_name" class="col-sm-2 control-label">Curriculum Name</label>

                              <input type="hidden" id="curriculum_id" value="{{ $curriculum->id }}">

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="curriculum_name" placeholder="Curriculum Name" name="name" value="{{ $curriculum->name }}">
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="program_id" class="col-sm-2 control-label">Program Description</label>

                              <div class="col-sm-10">
                                   <select name="program_id" id="program_id" class="form-control">
                                        @foreach($programs as $program)
                                             <option value="{{ $program->id }}" {{ ($program->id == $curriculum->program_id) ? 'selected' : '' }}>{{ $program->description }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="curriculum_details" class="col-sm-2 control-label">Details</label>

                              <div class="col-sm-10">
                                   <textarea name="details" id="curriculum_details" class="form-control" placeholder="Grade Name" cols="30" rows="5">{{ $curriculum->details }}</textarea>
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
                    program_id: {
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
                    program_id: {
                         required: "Grade Level is required"
                    },
                    details: {
                         required: "Details is required"
                    }
               },

               submitHandler: function(){
                    var curriculum_name = $('#curriculum_name').val();
                    var program_id = $('#program_id').val();
                    var curriculum_details = $('#curriculum_details').val();
                    var curriculum_id = $('#curriculum_id').val();

                    $.ajax({
                         type: 'PATCH',
                         url: '/settings/curriculum/'+curriculum_id,
                         data: {
                              'name':curriculum_name,
                              'program_id':program_id,
                              'details':curriculum_details
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#curriculum_name').val('');
                              $('#program_id').val('');
                              $('#curriculum_details').val('');
                              // console.log(data);
                              setTimeout('location.href="/settings/curriculum";', 3000);
                         }
                    });
               }

          });

     });

</script>
@endsection