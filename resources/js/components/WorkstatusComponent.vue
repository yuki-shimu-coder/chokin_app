<template>
  <div class="p-work-status__history-contents">
          <time class="p-work-status__history-date" v-bind:datetime="record_date">{{record_date}}</time>


           <div class="p-work-status__history-worktime">
            <span>{{ oneday_worktime_hour }}</span>時間
            <div style="display:inline;margin-right: 5px;"></div>
            <span>{{ oneday_worktime_minute }}</span>分
          </div>


          <div class="p-work-status__history-subject">
            {{ work_content }}
          </div>
          <div class="p-work-status__history-edit-trigger" v-on:click="openEditWrap">
            <i class="fas fa-ellipsis-h"></i>
          </div>

        <!-- isActiveに合わせてactiveをcalssに付与 -->
          <div class="p-work-status__history-edit-wrap"  v-bind:class="{active:isActive}">

            <i class="fas fa-times-circle p-work-status__history-edit-close" style="color: #fff;" v-on:click="closeEditWrap"></i>
            <div class="u-mgb--10">
              <a href="" class="c-button --edit">編集</a>
            </div>
            <form action="" method="POST">
              <!-- @csrf -->
              <input type="hidden" name="_token" v-bind:value="csrf">
              <button class="c-button --delete">削除</button>
            </form>
          </div> 
          
          <!-- vueのdataを確認  -->
            <!-- <pre>
                {{$data}}
             </pre>  -->

  </div>
</template>

<script>

export default {
    // 親コンポーネントからデータを受け取る
    props:{
        record_date:{},
        oneday_worktime_hour:{},
        oneday_worktime_minute:{},
        work_content:{},
        csrf:{
          type: String,
          required: true
        }
    },
    data: function () {
        return {
            isActive: false,
        };
    },
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        openEditWrap:function () {
            this.isActive = true;
        },
        closeEditWrap:function(){
            this.isActive = false;
        }
    }
};
</script>
