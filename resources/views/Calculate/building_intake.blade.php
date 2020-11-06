@extends('layouts.app')

@section('title', '効率よく筋肉量を増やすための目標カロリー計算')

{{-- ナビゲーションバー --}}
@section('navbar-left')
<li>
    <a class="nav-link" href="{{ url('/admin/articles') }}">
        みんなの投稿一覧
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/admin/users') }}">
        みんなのプロフィール一覧
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/building_intake') }}">
        目標摂取カロリー計算
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h3 class="mt-3 mb-3">効率よく筋肉を増やすための目標摂取カロリーを計算しよう</h3>
            <img class="eye-catche mb-3" src="{{ '/images/training.jpg' }}">
            <br>
            <p>しっかりと筋トレをしているのになかなか筋肉が増えない！</p>
            <p>その原因は大きく分けて、</p>
            <ul>
                <li>腸内環境の悪化で十分に栄養が吸収できていない</li>
                <li>ホルモンバランスの異常で代謝が低下している</li>
                <li>単純にカロリー不足</li>
            </ul>
            <p>などが考えられますが、ほとんどの場合は単純に摂取カロリーが不足しているだけだと考えてよいでしょう。</p>
            <p>効率よく筋肉量を増やすなら「脂肪が増えすぎないレベルの適度な摂取カロリー」を把握しておかねばなりません。</p>
            <br>
            <p>ここでは以下のフォームから体重と体脂肪率から目標の摂取量を簡単に算出することができます。</p>
            <p>またタンパク質・脂質・糖質の目安の摂取量も併せて算出します。</p>
            <br>
            <form action="{{ action('Calculate\BuildingIntakeController@create') }}" method="post"
                enctype="multipart/form-data" id="js_building_submit">
                {{-- 体重の入力 --}}
                <div class="form-group row">
                    <label class="col-md-3" for="body_weight">現在の体重(kg)</label>
                    <div class="col-md-2">
                        <select type="number" class="form-control js-building-intake" name="body_weight">
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60" selected>60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                        </select>
                    </div>
                </div>
                <br>
                {{-- 体脂肪率の入力 --}}
                <div class="form-group row">
                    <label class="col-md-3" for="body_fat_percentage">現在の体脂肪率(%)</label>
                    <div class="col-md-2">
                        <select type="number" class="form-control js-building-intake" name="body_fat_percentage">
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15" selected>15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <br>

                {{-- 計算結果を表形式で表示する(初期値は0でajaxで計算結果を上書きする) --}}
                <table border="1" width="300" class="ml-4 text-center">
                    <tr>
                        <th>項目</th>
                        <th>計算結果</th>
                    </tr>
                    <tr>
                        <td>除脂肪体重(kg)</td>
                        <td class="lean-body-mass">0</td>
                    </tr>
                    <tr>
                        <td>1日の目標カロリー(kCal)</td>
                        <td class="building-target-calories">0</td>
                    </tr>
                    <tr>
                        <td>目標たんぱく質摂取量(g)</td>
                        <td class="building-target-protein">0</td>
                    </tr>
                    <tr>
                        <td>目標脂質摂取量(g)</td>
                        <td class="building-target-lipid">0</td>
                    </tr>
                    <tr>
                        <td>目標糖質摂取量(g)</td>
                        <td class="building-target-carbohydrate">0</td>
                    </tr>
                </table>
                <br>
                <p>以下の計算方法にて算出しています。(各種研究結果等を参考に設定)</p>
                <ol>
                    <li>目標総カロリー(kCal) = 除脂肪体重(kg) × 44</li>
                    <li>目標タンパク質摂取量(g) = 体重(kg) × 1.6(g)</li>
                    <li>目標脂質摂取量(g) = 目標総カロリー(kCal) × 30% / 9</li>
                    <li>目標糖質摂取量(g) = (目標総カロリー(kCal) - (目標タンパク質摂取量(g) * 4) - (目標脂質摂取量(g) * 9)) / 4</li>
                </ol>
                <p>また計算結果を登録すればマイページでいつでも確認することができます。</p>
                {{-- 登録/更新ボタン --}}
                <br>
                <div class="form-group row mb-4 mx-auto">
                    <div class="col-md-8">
                        {{-- <input type="hidden" name="id" value="{{ Auth::user()->id }}"> --}}
                        <input type="hidden" name="lean-body-mass" value="">
                        <input type="hidden" name="building-target-calories" value="">
                        <input type="hidden" name="building-target-protein" value="">
                        <input type="hidden" name="building-target-lipid" value="">
                        <input type="hidden" name="building-target-carbohydrate" value="">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="マイデータに登録/更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection