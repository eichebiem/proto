@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Academic Year</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Academic Year</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of acadyears box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">List of Academic Year</h3>
               </div>

               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_update">
                    <i class="fa fa-check"></i> Academic Year successfully updated.
               </div>
               <!-- !Success Message -->
               
               <div class="box-body">
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Academic Year</th>
                                   <th>Semester</th>
                                   <th>Status</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($acadyears as $acadyear)
                                   <tr>
                                        <td>{{ $acadyear->year }}</td>
                                        <td>{{ $acadyear->semester }}</td>
                                        <td>
                                             @if($acadyear->status == 1)
                                                  <label class="label label-success">Active</label>
                                             @else
                                                  <label class="label label-danger">Inactive</label>
                                             @endif
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-success btn-sm set" value="{{ $acadyear->id }}" {{ ($acadyear->status == 1) ? 'style=display:none' : '' }}>Set</button>
                                        </td>
                                   </tr>
                              @endforeach
                              
                         </tbody>

                    </table>

               </div>
               <!-- /.box-body -->

          </div>
          <!-- /.box -->


          <!-- create acadyear box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Create Academic Year</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Academic Year successfully created.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="room_name" class="col-sm-2 control-label">Academic Year</label>

                              <div class="col-sm-2">
                                   <input type="text" class="form-control" id="year1" name="year">
                              </div>
                              <div class="col-sm-2">
                                   <input disabled type="text" class="form-control" id="year2">
                              </div>

                              <label for="room_name" class="col-sm-2 control-label">Semester</label>

                              <div class="col-sm-3">
                                   <select name="semester" id="semester" class="form-control">
                                        <option value="" selected disabled>Select Academic Year</option>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                        <option value="Summer">Summer</option>
                                   </select>
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

          $('#year1').mask('0000');
          
          $year2 = $('#year2');

          $('#year1').keyup(function(){
               $year1 = parseInt($('#year1').val());
               $year2.val($year1+1);
          });

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
                    year: {
                         required: true,
                         minlength: 4
                    },
                    semester: {
                         required: true
                    }
               },

               messages: {
                    year: {
                         required: "Year is required",
                         minlength: "Invalid Year"
                    },
                    semester: {
                         required: "Semester is required"
                    }
               },

               submitHandler: function(){
                    var year = $('#year1').val() +-+ $('#year2').val();
                    var semester = $('#semester').val();

                    console.log(year);
                    console.log(semester);

                    $.ajax({
                         type: 'POST',
                         url: '/acadyear',
                         data: {
                              year:year,
                              semester:semester
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#year1').val('');
                              $('#year2').val('');
                              $('#semester').val('');
                              // console.log('data saved');
                              setTimeout('location.reload(true);', 3000);
                         }
                    });
               }

          });

          $('.set').click(function(){
               var acadyear_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Update Academic Year?',
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
                                        type: 'PATCH',
                                        url: '/acadyear/'+acadyear_id,
                                        success: function(data){
                                             $('#alert_update').show();
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