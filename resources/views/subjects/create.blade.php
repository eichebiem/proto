@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Create Subject</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Create Subject</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- create room box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Subject Details</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Subject successfully created.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group col-sm-12">
                              <label for="curr_id" class="col-sm-2 control-label">Curriculum *</label>

                              <div class="col-sm-7">
                                   <select name="curr_id" id="curr_id" class="form-control">
                                        <option value="" selected disabled>Select Curriculum</option>
                                        @foreach($curriculums as $curriculum)
                                             <option value="{{ $curriculum->id }}">{{ $curriculum->name }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="code" class="col-sm-2 control-label">Subject Code *</label>

                              <div class="col-sm-3">
                                   <input type="text" name="code" id="code" class="form-control">
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="description" class="col-sm-2 control-label">Subject Description *</label>

                              <div class="col-sm-7">
                                   <input type="text" name="description" id="description" class="form-control">
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="yearlvl" class="col-sm-2 control-label">Year Level *</label>

                              <div class="col-sm-3">
                                   <select name="yearlvl" id="yearlvl" class="form-control">
                                        <option value="" selected disabled>Select Year Level</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                   </select>
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="units" class="col-sm-2 control-label">Units *</label>

                              <div class="col-sm-3">
                                   <input type="text" name="units" id="units" class="form-control">
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="semester" class="col-sm-2 control-label">Semester *</label>

                              <div class="col-sm-3">
                                   <select name="semester" id="semester" class="form-control">
                                        <option value="" selected disabled>Select Semester</option>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                        <option value="Summer">Summer</option>
                                   </select>
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="prereq" class="col-sm-2 control-label">Pre Requisite</label>

                              <div class="col-sm-7">
                                   <input type="text" name="prereq" id="prereq" class="form-control">
                              </div>
                         </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i> Reset</button>

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
                    curr_id: {
                         required: true,
                    },
                    code: {
                         required: true,
                    },
                    description: {
                         required: true,
                    },
                    yearlvl: {
                         required: true,
                    },
                    units: {
                         required: true,
                    },
                    semester: {
                         required: true,
                    }
               },

               messages: {
                    curr_id: {
                         required: "Curriculum is required",
                    },
                    code: {
                         required: "Subject Code is required",
                    },
                    description: {
                         required: "Subject Description is required",
                    },
                    yearlvl: {
                         required: "Year Level is required",
                    },
                    units: {
                         required: "Units is required",
                    },
                    semester: {
                         required: "Semester is required",
                    }
               },

               submitHandler: function(){
                    var curr_id = $('#curr_id').val();
                    var code = $('#code').val();
                    var description = $('#description').val();
                    var yearlvl = $('#yearlvl').val();
                    var units = $('#units').val();
                    var semester = $('#semester').val();
                    var prereq = $('#prereq').val();

                    $.ajax({
                         type: 'POST',
                         url: '/subjects/create',
                         data: {
                              curr_id:curr_id,
                              code:code,
                              description:description,
                              yearlvl:yearlvl,
                              units:units,
                              semester:semester
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(5000).fadeOut();
                              $('#curr_id').val('');
                              $('#code').val('');
                              $('#description').val('');
                              $('#yearlvl').val('');
                              $('#units').val('');
                              $('#semester').val('');
                              $('#prereq').val('');
                              // console.log('data saved');
                         }
                    });
               }

          });

     });

</script>
@endsection