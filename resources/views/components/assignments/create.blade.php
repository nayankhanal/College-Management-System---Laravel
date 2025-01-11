<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Enrollments</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('components.partials.header')
  <!-- Left side column. contains the logo and sidebar -->

  @include('components.partials.sidebar')
  <!-- include() -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- @if($errors->has('student_course_combination'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('student_course_combination')}}</span>
        <div class="container">
          <div class="alert alert-danger">
              {{$errors->first('student_course_combination')}}
          </div>
        </div>
  @endif -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Give Assignments
        <!-- <small>Create Department</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Assignments</a></li>
        <li class="active">Assign</li>
      </ol>
    </section>

    <!-- Main content -->

    <!-- HERE THE MAIN FORM TO CREATE DEPARTMENT -->

<div class="container">
    <form action="{{route('assignments.store')}}" method="post"><br><br>
        @csrf
      <div class="form-group">
          <label for="subject_id">Subject</label>
              <select name="subject_id" id="subject_id" class="form-control">
                  <option value="">Select Subject</option>
                  @foreach($subjects as $subject)
                  <option value="{{$subject->id}}">
                    {{$subject->name}}
                  </option>
                  @endforeach
              </select>
          @if($errors->has('subject_id'))
          <span class="help-block text-danger" style="color: red;">{{$errors->first('subject_id')}}</span>
          @endif
      </div>

      <div class="form-group">
        <label for="title">Assignment title</label>
        <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" aria-describedby="title" placeholder="Enter assignment title">
        @if($errors->has('title'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('title')}}</span>
        @endif
      </div>
      <div class="form-group">
          <label for="description">Description</label>
          <textarea class="ckeditor form-control" name="description" value="{{old('description')}}" id="description" cols="30" rows="10" placeholder="Description here">{{old('description')}}</textarea>
          @if($errors->has('description'))
          <span class="help-block text-danger" style="color: red;">{{$errors->first('description')}}</span>
          @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

  </div>

  @include('components.partials.footer')


  <div class="control-sidebar-bg"></div>
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="../../bower_components/fastclick/lib/fastclick.js"></script>

<script src="../../dist/js/adminlte.min.js"></script>

<script src="../../dist/js/demo.js"></script>
</body>
</html>
