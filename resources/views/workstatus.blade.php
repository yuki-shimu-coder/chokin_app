@extends('app')

@section('title','超勤状況確認ページ')

@section('content')
<div class="l-container">
  <div class="p-work-status">
    <h1 class="p-work-status__title">〇〇さんの超勤状況</h1>
    {{-- 超勤状況一覧 --}}
    <section class="p-work-status__history">
      

    </section>


    {{-- 一月分の超勤時間 --}}
    <section class="p-work-status__month-worktime">

    </section>

    {{-- 一月分の超勤手当 --}}
    <section class="p-work-status__month-allowance">

    </section>
  </div>
</div>

@endsection