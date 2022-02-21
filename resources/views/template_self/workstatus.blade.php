@extends('template_self.app')

@section('title','超勤状況確認ページ')

@section('content')
<div class="l-container">
  <div class="p-work-status">
    <div class="p-work-status__top-wrapper">
      <div>
        <h1 class="p-work-status__title">{{$user_name}}さんの超勤状況</h1>
      </div>
      <div class="p-work-status__total-time">
        <p>超勤時間の総計</p>
        <span>{{ $total_worktime_hour}}</span>時間
        <div style="display:inline;margin-right: 5px;"></div>
        <span>{{$total_worktime_minute}}</span>分
      </div>
    </div>


    {{-- 超勤状況一覧 --}}
    <section class="p-work-status__history">
      <div class="p-work-status__history-head">
        超勤状況一覧
      </div>
      <div class="p-work-status__history-body">

        {{-- 超勤時間の記録がないとき --}}
        @if (empty($total))

        まだ記録がありません。

        @else

        @foreach ($work_status_pagination as $value)

        {{-- vueコンポーネントで超勤記録時間の一覧表示 --}}
        <workstatus-component record_date="{{$value->record_date}}"
          oneday_worktime_hour="{{$value->oneday_worktime_hour}}"
          oneday_worktime_minute="{{$value->oneday_worktime_minute}}" work_content="{{$value->work_content}}"
          v-bind:csrf="{{ json_encode(csrf_token()) }}" edit="{{ route('worktime-edit', ['id' => $value->id]) }}"
          destroy="{{ route('worktime-delete', ['id' => $value->id]) }}"></workstatus-component>

        @endforeach

        {{ $work_status_pagination->links() }}

        @endif
      </div>
    </section>



  </div>
</div>

@endsection