@extends('app')

@section('title','超勤記録画面')

@section('content')
<div class="l-container">
  <div class="p-record">
    <div class="p-record__form">
      <h1 class="p-record__title u-mgb--40">超勤記録画面</h1>
      <form action="">
        @csrf
        {{-- 申請日 --}}
        <section class="p-record__date">
          <div class="p-record__head"><i class="fas fa-calendar-alt u-mgr--10"></i>申請日</div>
          <div class="p-record__body">
            <input type="date" name="" id="">
          </div>
        </section>

        {{-- 申請時間 --}}
        <section class="p-record__time">
          <div class="p-record__head"><i class="fas fa-clock u-mgr--10"></i>申請時間</div>

          <div class="p-record__body">

            {{-- 平日 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --weekday">
                平日乗率
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">××時××分</option>
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">××時××分</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- 休日 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --holiday">
                休日乗率
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">××時××分</option>
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">××時××分</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- 深夜 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --midnight">
                深夜乗率
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">××時××分</option>
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">××時××分</option>
                  </select>
                </div>
              </div>
            </div>

          </div>


        </section>

        {{-- 超勤理由 --}}
        <section class="p-record__reason">
          <div class="p-record__head"><i class="fas fa-desktop u-mgr--10"></i>超勤理由</div>
          <div class="p-record__body">
            <textarea name="" id="" rows="3" placeholder="超勤理由を入力してください" class="p-record__reason-text"></textarea>
          </div>
        </section>

        {{-- 超勤記録ボタン --}}
        <button type="submit" class="c-button p-record__btn">記録する</button>

      </form>
    </div>
  </div>
</div>
@endsection