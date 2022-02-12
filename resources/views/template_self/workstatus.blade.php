@extends('template_self.app')

@section('title','超勤状況確認ページ')

@section('content')
<div class="l-container">
  <div class="p-work-status">
    <h1 class="p-work-status__title u-mgb--40">{{$user_name}}さんの超勤状況</h1>
    {{-- 超勤状況一覧 --}}
    <section class="p-work-status__history">
      <div class="p-work-status__history-head">
        超勤状況一覧
      </div>
      <div class="p-work-status__history-body">

        @foreach ($work_status as $value)
        {{-- <div class="p-work-status__history-contents">
          <time class="p-work-status__history-date" datetime="{{$value->record_date}}">{{$value->record_date}}</time>


          <div class="p-work-status__history-worktime">
            <span>{{ $value->oneday_worktime_hour }}</span>時間
            <div style="display:inline;margin-right: 5px;"></div>
            <span>{{ $value->oneday_worktime_minute }}</span>分
          </div>


          <div class="p-work-status__history-subject">
            {{$value->work_content}}
          </div>
          <div class="p-work-status__history-edit-trigger">
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <div class="p-work-status__history-edit-wrap">

            <i class="fas fa-times-circle p-work-status__history-edit-close" style="color: #fff;"></i>
            <div class="u-mgb--10">
              <a href="" class="c-button --edit">編集</a>
            </div>
            <form action="" method="POST">
              @csrf
              <button class="c-button --delete">削除</button>
            </form>
          </div>
        </div> --}}

        <workstatus-component record_date="{{$value->record_date}}"
          oneday_worktime_hour="{{$value->oneday_worktime_hour}}"
          oneday_worktime_minute="{{$value->oneday_worktime_minute}}" work_content="{{$value->work_content}}"
          v-bind:csrf="{{ json_encode(csrf_token()) }}"></workstatus-component>
        @endforeach

      </div>


    </section>

  </div>
</div>

@endsection