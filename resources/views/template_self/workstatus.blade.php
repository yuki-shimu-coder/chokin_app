@extends('template_self.app')

@section('title','超勤状況確認ページ')

@section('content')
<div class="l-container">
  <div class="p-work-status">
    <h1 class="p-work-status__title u-mgb--40">〇〇さんの超勤状況</h1>
    {{-- 超勤状況一覧 --}}
    <section class="p-work-status__history">
      <div class="p-work-status__history-head">
        超勤状況一覧
      </div>
      <div class="p-work-status__history-body">

        <div class="p-work-status__history-contents">
          <time class="p-work-status__history-date" datetime="2022-01-01">2022年1月1日</time>
          <div class="p-work-status__history-worktime">
            <span>3</span>時間
            <div style="display:inline;margin-right: 5px;"></div>
            <span>45</span>分
          </div>
          <div class="p-work-status__history-subject">
            国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調
          </div>
          <div class="p-work-status__history-edit-trigger">
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <div class="p-work-status__history-edit-wrap">

            <i class="fas fa-times-circle p-work-status__history-edit-close"></i>
            <div class="u-mgb--10">
              <a href="" class="c-button --edit">編集</a>
            </div>
            <form action="" method="POST">
              @csrf
              <button class="c-button --delete">削除</button>
            </form>
          </div>
        </div>

        <div class="p-work-status__history-contents">
          <time class="p-work-status__history-date" datetime="2022-01-01">2022年1月1日</time>
          <div class="p-work-status__history-worktime">
            <span>3</span>時間
            <div style="display:inline;margin-right: 5px;"></div>
            <span>45</span>分
          </div>
          <div class="p-work-status__history-subject">
            国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調
          </div>
          <div class="p-work-status__history-edit-trigger">
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <div class="p-work-status__history-edit-wrap">
        
            <i class="fas fa-times-circle p-work-status__history-edit-close"></i>
            <div class="u-mgb--10">
              <a href="" class="c-button --edit">編集</a>
            </div>
            <form action="" method="POST">
              <button class="c-button --delete">削除</button>
            </form>
          </div>
        </div>

        <div class="p-work-status__history-contents">
          <time class="p-work-status__history-date" datetime="2022-01-01">2022年1月1日</time>
          <div class="p-work-status__history-worktime">
            <span>3</span>時間
            <div style="display:inline;margin-right: 5px;"></div>
            <span>45</span>分
          </div>
          <div class="p-work-status__history-subject">
            国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調査集計用務のため国勢調
          </div>
          <div class="p-work-status__history-edit-trigger">
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <div class="p-work-status__history-edit-wrap">
        
            <i class="fas fa-times-circle p-work-status__history-edit-close"></i>
            <div class="u-mgb--10">
              <a href="" class="c-button --edit">編集</a>
            </div>
            <form action="" method="POST">
              <button class="c-button --delete">削除</button>
            </form>
          </div>
        </div>

      </div>


    </section>

  </div>
</div>

@endsection