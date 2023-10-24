{{-- 格闘家の情報を表示するビューを作成します --}}
@extends('layouts.app')

@section('content')
    <h2>選手</h2>
    <ul>
        @foreach ($fighters as $fighter)
          <li>{{ $fighter->name }} - {{ $fighter->entrance_music }} by {{ $fighter->artist }}</li>
        @endforeach
    </ul>
    <h2>楽曲</h2>
    <ul id="tracks"></ul>  {{-- ここに楽曲情報を表示します --}}
@endsection

<script src="{{ mix('js/app.js') }}"></script>