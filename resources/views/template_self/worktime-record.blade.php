@extends('template_self.app')

@section('title','超勤記録画面')

@section('content')
<div class="l-container">
  <div class="p-record">
    <div class="p-record__form">
      <h1 class="p-record__title u-mgb--40">超勤記録画面</h1>
      <form action="{{ route('worktime-record_request') }}" method="POST">
        @csrf
        {{-- 申請日 --}}
        <section class="p-record__date">
          <div class="p-record__head"><i class="fas fa-calendar-alt u-mgr--10"></i>申請日</div>
          <div class="p-record__body">
            <input type="date" name="record_date" id="">
          </div>
        </section>

        {{-- 申請時間 --}}
        <section class="p-record__time">
          <div class="p-record__head"><i class="fas fa-clock u-mgr--10"></i>申請時間</div>

          <div class="p-record__body">

            {{-- 平日早朝 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --weekday--morning">
                平日早朝
              </div>
              <div class="p-record__time-select">
                {{-- 開始時刻 --}}
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>

                  <select name="weekday_morning_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($weekday_morning_start as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                {{-- 終了時刻 --}}
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="weekday_morning_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($weekday_morning_end as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- 平日 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --weekday">
                平日一般
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="weekday_normal_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($weekday_normal_start as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="weekday_normal_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($weekday_normal_end as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- 平日深夜 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --weekday--midnight">
                平日深夜
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="weekday_midnight_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($weekday_midnight_start as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="weekday_midnight_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($weekday_midnight_end as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- 休日 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --holiday">
                休日一般
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="holiday_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($holiday_start as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="holiday_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($holiday_end as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- 深夜 --}}
            <div class="p-record__multiplier-wrap">
              <div class="p-record__multiplier-label --holiday--midnight">
                休日深夜
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="holiday_midnight_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($holiday_midnight_start as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="holiday_midnight_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="0">未選択</option>
                    @foreach ($holiday_midnight_end as $value)
                    <option value="{{date('H:i',$value)}}">{{date('H:i',$value)}}</option>
                    @endforeach
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
            <textarea name="work_content" id="" rows="3" placeholder="超勤理由を入力してください"
              class="p-record__reason-text"></textarea>
          </div>
        </section>

        {{-- 超勤記録ボタン --}}
        <button type="submit" class="c-button p-record__btn">記録する</button>

      </form>
    </div>
  </div>
</div>
@endsection