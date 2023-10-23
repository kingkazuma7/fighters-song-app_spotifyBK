{{-- 格闘家の情報を表示するビューを作成します --}}
@extends('layouts.app')

@section('content')
    <h1>選手</h1>
    <ul>
        @foreach ($fighters as $fighter)
          <li>{{ $fighter->name }} - {{ $fighter->entrance_music }} by {{ $fighter->artist }}</li>
        @endforeach
        
    </ul>
@endsection

<script src="{{ mix('js/app.js') }}"></script>