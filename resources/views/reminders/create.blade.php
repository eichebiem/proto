@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Create Reminder</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Create Reminder</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- Default box -->
          <div class="box">

               <div class="box-header with-border">
                    <h3 class="box-title">Reminder</h3>
               </div>

               @include('partials.error')
               
               <form action="/reminders/create" method="POST">

                    @csrf
                    
                    <div class="box-body">
                    
                         <textarea class="textarea" placeholder="Place reminders here"
                                   style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content"></textarea>
                    
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="reset" class="btn btn-warning pull-right"><i class="fa fa-refresh"></i> Reset</button>
                         <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                    <!-- /.box-footer-->
               </form>
               

          </div>
          <!-- /.box -->

     </section>
     <!-- /.content -->
</div>


@endsection
