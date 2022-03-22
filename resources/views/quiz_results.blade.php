@extends('layouts')
@section('title')
Quiz | Results
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12" style="margin-top: 2%">
      <h2 class="text-center">Quiz Results</h2>
      @if(session('success'))
          <span class="alert alert-info">{{session('success')}}</span>
      @endif
      
      <div class="text-right">
        <a href="{{ route('mcq') }}"> <button class="btn btn-secondary">Join Quiz</button> </a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Total Question</th>
            <th scope="col">Correct Answare</th>
            <th scope="col">Wrong Answare</th>
            <th scope="col">Created</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($quiz_results as $key => $quiz_result)
            <tr>
              <th scope="row">{{ $key+ 1 }}</th>
              <td>{{ $quiz_result->name }}</td>
              <td>{{ $quiz_result->email }}</td>
              <td>{{ $quiz_result->quiz_score }}</td>
              <td>{{ $quiz_result->achieved_score }}</td>
              <td>{{ $quiz_result->wrong_score }}</td>
              <td>{{ $quiz_result->created_at }}</td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
@endsection
   
