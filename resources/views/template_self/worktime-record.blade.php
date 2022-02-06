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
            <input type="date" name="record_date" id="" class="@error('record_date') is-invalid @enderror"
              value="{{ old('record_date') }}">
            @error('record_date')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div>
              <input type="radio" name="workday-type" id="weekday" v-on:change="selectWeekday" value="" checked>
              <label for="weekday" style="margin-right: 20px;">平日</label>
              <input type="radio" name="workday-type" id="holiday" v-on:change="selectHoliday" value="">
              <label for="holiday" style="color: red;">休日</label>
            </div>

            {{-- vueのdataを確認 --}}
            {{-- <pre>@{{$data}}</pre> --}}
            
          </div>
        </section>

        {{-- 申請時間 --}}
        <section class="p-record__time">
          <div class="p-record__head"><i class="fas fa-clock u-mgr--10"></i>申請時間</div>

          <div class="p-record__body">

            {{-- 平日早朝 --}}
            <div class="p-record__multiplier-wrap @error('weekday_morning_end') is-invalid @enderror">
              <div class="p-record__multiplier-label --weekday--morning">
                平日早朝
              </div>
              <div class="p-record__time-select">
                {{-- 開始時刻 --}}
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>

                  <select name="weekday_morning_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($weekday_morning_start as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('weekday_morning_start')==date('H:i',$value))
                      selected @endif v-bind:disabled="disabledWeekday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                {{-- 終了時刻 --}}
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="weekday_morning_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($weekday_morning_end as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('weekday_morning_end')==date('H:i',$value)) selected
                      @endif v-bind:disabled="disabledWeekday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>

                </div>
              </div>
            </div>
            @error('weekday_morning_end')
            <span class="invalid-feedback" role="alert" style="position: relative;top:-18px;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- 平日 --}}
            <div class="p-record__multiplier-wrap @error('weekday_normal_end') is-invalid @enderror">
              <div class="p-record__multiplier-label --weekday">
                平日一般
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="weekday_normal_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($weekday_normal_start as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('weekday_normal_start')==date('H:i',$value))
                      selected @endif v-bind:disabled="disabledWeekday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="weekday_normal_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($weekday_normal_end as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('weekday_normal_end')==date('H:i',$value)) selected
                      @endif v-bind:disabled="disabledWeekday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            @error('weekday_normal_end')
            <span class="invalid-feedback" role="alert" style="position: relative;top:-18px;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- 平日深夜 --}}
            <div class="p-record__multiplier-wrap @error('weekday_midnight_end') is-invalid @enderror">
              <div class="p-record__multiplier-label --weekday--midnight">
                平日深夜
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="weekday_midnight_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($weekday_midnight_start as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('weekday_midnight_start')==date('H:i',$value))
                      selected @endif v-bind:disabled="disabledWeekday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="weekday_midnight_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($weekday_midnight_end as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('weekday_midnight_end')==date('H:i',$value))
                      selected @endif v-bind:disabled="disabledWeekday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            @error('weekday_midnight_end')
            <span class="invalid-feedback" role="alert" style="position: relative;top:-18px;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- 休日 --}}
            <div class="p-record__multiplier-wrap @error('holiday_end') is-invalid @enderror">
              <div class="p-record__multiplier-label --holiday">
                休日一般
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="holiday_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($holiday_start as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('holiday_start')==date('H:i',$value)) selected
                      @endif v-bind:disabled="disabledHoliday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="holiday_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($holiday_end as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('holiday_end')==date('H:i',$value)) selected @endif
                      v-bind:disabled="disabledHoliday">
                      {{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            @error('holiday_end')
            <span class="invalid-feedback" role="alert" style="position: relative;top:-18px;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- 深夜 --}}
            <div class="p-record__multiplier-wrap @error('holiday_midnight_end') is-invalid @enderror">
              <div class="p-record__multiplier-label --holiday--midnight">
                休日深夜
              </div>
              <div class="p-record__time-select">
                <div class="p-record__time-start">
                  <div class="c-card u-mgr--10">開始</div>
                  <select name="holiday_midnight_start" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($holiday_midnight_start as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('holiday_midnight_start')==date('H:i',$value))
                      selected @endif v-bind:disabled="disabledHoliday">
                      {{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="p-record__time-end">
                  <div class="c-card u-mgr--10">終了</div>
                  <select name="holiday_midnight_end" id="" class="c-cp_ipselect c-cp_sl02">
                    <option value="">未選択</option>
                    @foreach ($holiday_midnight_end as $value)
                    <option value="{{date('H:i',$value)}}" @if (old('holiday_midnight_end')==date('H:i',$value))
                      selected @endif v-bind:disabled="disabledHoliday">{{date('H:i',$value)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            @error('holiday_midnight_end')
            <span class="invalid-feedback" role="alert" style="position: relative;top:-18px;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- 全ての勤務時間入力フォームが空だった場合のバリデーションチェック用のフォーム --}}
            <input type="hidden" name="worktimes" value="" class="@error('worktimes') is-invalid @enderror">
            @error('worktimes')
            <span class="invalid-feedback" role="alert" style="position: relative;top:-18px;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


        </section>

        {{-- 超勤理由 --}}
        <section class="p-record__reason">
          <div class="p-record__head"><i class="fas fa-desktop u-mgr--10"></i>超勤理由</div>
          <div class="p-record__body">
            <textarea name="work_content" id="" rows="3" placeholder="超勤理由を入力してください"
              class="p-record__reason-text @error('work_content') is-invalid @enderror">{{old('work_content')}}</textarea>
            @error('work_content')
            <span class="invalid-feedback" role="alert" style="position: relative;top:-18px;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </section>



        {{-- 超勤記録ボタン --}}
        <button type="submit" class="c-button p-record__btn">記録する</button>

      </form>
    </div>
  </div>
</div>
@endsection