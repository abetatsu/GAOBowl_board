<template>
     <div id="Diagnosis" class="Diagnosis">
     <div class="menubox" v-bind:class="nemu_active">
          <transition-group name="fade" transition-mode="out-in">
          <div class="menuItem" key="1" v-if="current_num==0">
               <div class="menuttl">
               質問1
               <span class="txt">お酒は飲みますか？</span>
               </div>
               <div class="menuRadio">
               <label>
               <input name="alcohol" type="radio" value="0" v-on:change="check" v-model="alcohol" />
               <span class="btn"></span>
               <span class="btn-txt">飲まない</span>
               </label>
               <label>
               <input name="alcohol" type="radio" value="1" v-on:change="check" v-model="alcohol" />
               <span class="btn"></span>
               <span class="btn-txt">飲む</span>
               </label>
               </div>
          </div>
          <div class="menuItem" key="2" v-if="current_num==1">
               <div class="menuttl">
               質問2
               <span class="txt">タバコは吸いますか？</span>
               </div>
               <div class="menuRadio">
               <label>
               <input name="cigarette" type="radio" value="0" v-on:change="check" v-model="cigarette" />
               <span class="btn"></span>
               <span class="btn-txt">吸わない</span>
               </label>
               <label>
               <input name="cigarette" type="radio" value="1" v-on:change="check" v-model="cigarette" />
               <span class="btn"></span>
               <span class="btn-txt">吸う</span>
               </label>
               </div>
          </div>
          <div class="menuItem" key="3" v-if="current_num==2">
               <div class="menuttl">
               質問3
               <span class="txt">最近ストレスを感じていますか？</span>
               </div>
               <div class="menuRadio">
               <label>
               <input name="stress" type="radio" value="0" v-on:change="check" v-model="stress" />
               <span class="btn"></span>
               <span class="btn-txt">ほぼない</span>
               </label>
               <label>
               <input name="stress" type="radio" value="1" v-on:change="check" v-model="stress" />
               <span class="btn"></span>
               <span class="btn-txt">ストレスだらけ</span>
               </label>
               </div>
          </div>
          <div class="menuItem" key="4" v-if="current_num==3">
               <div class="menuttl">
               質問4
               <span class="txt">睡眠時間は？</span>
               </div>
               <div class="menuRadio">
               <label>
               <input name="sleep" type="radio" value="0" v-on:change="check" v-model="sleep" />
               <span class="btn"></span>
               <span class="btn-txt">8時間以上</span>
               </label>
               <label>
               <input name="sleep" type="radio" value="1" v-on:change="check" v-model="sleep" />
               <span class="btn"></span>
               <span class="btn-txt">6〜8時間</span>
               </label>
               <label>
               <input name="sleep" type="radio" value="2" v-on:change="check" v-model="sleep" />
               <span class="btn"></span>
               <span class="btn-txt">6時間未満</span>
               </label>
               </div>
          </div>
          </transition-group>
     </div>

     <div class="result" v-bind:class="result_active">
          <div class="result_inner">
          <transition-group name="fade">
               <div class="result_contents" key="1" v-if="result_num==1">診断結果 それはちょっと寝過ぎ</div>
               <div class="result_contents" key="2" v-if="result_num==2">診断結果 ハゲとは無縁です</div>
               <div class="result_contents" key="3" v-if="result_num==3">診断結果 ちゃんと寝て</div>
               <div class="result_contents" key="4" v-if="result_num==4">診断結果 ストレスで寝過ぎてるの？</div>
               <div class="result_contents" key="5" v-if="result_num==5">診断結果 ストレスマネジメント大事</div>
               <div class="result_contents" key="6" v-if="result_num==6">診断結果 とりあえず寝ようか</div>
               <div class="result_contents" key="7" v-if="result_num==7">診断結果 タバコやめようか</div>
               <div class="result_contents" key="8" v-if="result_num==8">診断結果 タバコやめたらストレス？</div>
               <div class="result_contents" key="9" v-if="result_num==9">診断結果 タバコやめてちゃんと寝よう</div>
               <div class="result_contents" key="10" v-if="result_num==10">診断結果 タバコやめて筋トレしてみてはいかが？</div>
               <div class="result_contents" key="11" v-if="result_num==11">診断結果 普通です</div>
               <div class="result_contents" key="12" v-if="result_num==12">診断結果 小動物？</div>
               <div class="result_contents" key="13" v-if="result_num==13">診断結果 ポッチャリさんです</div>
               <div class="result_contents" key="14" v-if="result_num==14">診断結果 普通です</div>
               <div class="result_contents" key="15" v-if="result_num==15">診断結果 なぜ最後ナッツ入れた？</div>
               <div class="result_contents" key="16" v-if="result_num==16">診断結果 なぜグミいれた？</div>
               <div class="result_contents" key="17" v-if="result_num==17">診断結果 なぜグミいれた？</div>
               <div class="result_contents" key="18" v-if="result_num==18">診断結果 夜食べない派？</div>
               <div class="result_contents" key="19" v-if="result_num==19">診断結果 十分です</div>
               <div class="result_contents" key="20" v-if="result_num==20">診断結果 結構余裕ありますね</div>
               <div class="result_contents" key="21" v-if="result_num==21">診断結果 なぜ最後ナッツ？</div>
               <div class="result_contents" key="22" v-if="result_num==22">診断結果 けっこうええもん食うてる</div>
               <div class="result_contents" key="23" v-if="result_num==23">診断結果 大丈夫です</div>
               <div class="result_contents" key="24" v-if="result_num==24">診断結果 バイトしよか</div>
          </transition-group>
          </div>
     </div>
     <div class="detail">{{result_txt}}</div>
     </div>
</template>

<script>
var queData = [
     ['飲まない','飲む'],
     ['吸わない','吸う'],
     ['ほぼない','ストレスだらけ'],
     ['8時間以上','6時間','3時間']
     ]
export default {
     data() {
          return {
               answer:[],
               answer_num:$('.menuItem').length,
               alcohol:'',
               current_num:0,
               cigarette:'',
               stress:'',
               sleep:'',
               result_active:'',
               nemu_active:'',
               result_txt:'',
               result:{
                    '0000':1,
                    '0001':2,
                    '0002':3,
                    '0010':4,
                    '0011':5,
                    '0012':6,
                    '0100':7,
                    '0101':8,
                    '0102':9,
                    '0110':10,
                    '0111':11,
                    '0112':12,
                    '1000':13,
                    '1001':14,
                    '1002':15,
                    '1010':16,
                    '1011':17,
                    '1012':18,
                    '1100':19,
                    '1101':20,
                    '1102':21,
                    '1110':22,
                    '1111':23,
                    '1112':24
               },
               result_num:''
          }
     },
     watch: {
          result_num:function(n,o){
          this.result_txt = queData[0][this.alcohol]+' >> ' + queData[1][this.cigarette] +' >> ' +queData[2][this.stress] +' >> ' +queData[3][this.sleep] + ' を選択した時のコンテンツ'
          }
     },
     created:function(){
     var _t = this;
     setTimeout(function(){
          _t.nemu_active = '__active';
     },400);
     },
     methods:{
     check:function(){
          this.answer[0] = this.alcohol;
          this.answer[1] = this.cigarette;
          this.answer[2] = this.stress;
          this.answer[3] = this.sleep;
          this.current_num = this.answer.indexOf('');

          if(this.answer.indexOf('')==-1){
          this.nemu_active = '__hide';
          this.result_active = '__active';
          this.result_num = this.result[this.answer.join('')];
          }
     }
     }
}
</script>
