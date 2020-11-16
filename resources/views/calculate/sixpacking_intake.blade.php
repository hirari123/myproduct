@extends('layouts.app')

@section('title', '最速で腹筋を割るための目標カロリー計算')

{{-- ナビゲーションバー --}}
@section('navbar-left')
<li>
    <a class="nav-link" href="{{ url('/admin/articles') }}">
        みんなの投稿
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/admin/users') }}">
        みんなのプロフィール
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/building_intake') }}">
        効率よく筋肉量を増やす
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/sixpacking_intake') }}">
        最速で腹筋を割る
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h3 class="my-4">最速で腹筋を割るための目標摂取カロリーを計算しよう</h3>
            <img class="eye-catche mb-4" src="{{ '/images/meat.jpg' }}">
            <br>
            <p>腹筋を割るためには腹筋運動だけをしても無駄なのは常識。</p>
            <p>前提としては、</p>
            <ul>
                <li>腹筋運動の前にまず脂肪を落とす。体脂肪率10%（女性は15%）が目標。</li>
                <li>そこまで落とすには厳しいカロリー制限が必要があるので万人向けではない。(結構なストレス)</li>
                <li>加工食品を避けてカロリーの質を考えつつ運動をすれば体脂肪率は自然とそのぐらいまで落ちるはず。</li>
                <li>まずは自然に体脂肪率13%（女性は18%）程度に落とした上で、判断するのもあり。</li>
            </ul>
            <p>といった具合です。</p>
            <br>
            <p>万人にオススメできるのは後者の「自然に体脂肪率13%（女性は18%）まで落とす」コースですが、</p>
            <p>今回は「筋肉を維持しながら本気でカロリー制限をして"最速で腹筋を割る"」ということを焦点に、</p>
            <p>体脂肪率10%（女性は15%）を目指すにあたって最適な摂取カロリーと三大栄養素を算出します。</p>
            <br>
            <p>以下のフォームで現在の体重を設定すると、
                目標の摂取カロリーと三大栄養素(タンパク質・脂質・糖質)の必要な摂取量を簡単に計算することができます。</p>
            <br>
            <form action="{{ action('Calculate\SixpackingIntakeController@create') }}" method="post"
                enctype="multipart/form-data" id="js_sixpacking_submit">
                {{-- 体重の入力(optionで選択する) --}}
                <div class="form-group row">
                    <label class="col-md-2" for="body_weight">現在の体重(kg)</label>
                    <div class="col-md-2">
                        <select type="number" class="form-control js-sixpacking-intake" name="body_weight">
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

                {{-- 計算結果を表形式で表示する(初期値は0でajaxで計算結果を上書きする) --}}
                <table border="1" width="300" class="ml-4 text-center">
                    <tr>
                        <th>項目</th>
                        <th>計算結果</th>
                    </tr>
                    <tr>
                        <td>1日の目標カロリー(kCal)</td>
                        <td class="sixpacking-target-calories">0</td>
                    </tr>
                    <tr>
                        <td>目標たんぱく質摂取量(g)</td>
                        <td class="sixpacking-target-protein">0</td>
                    </tr>
                    <tr>
                        <td>目標脂質摂取量(g)</td>
                        <td class="sixpacking-target-lipid">0</td>
                    </tr>
                    <tr>
                        <td>目標糖質摂取量(g)</td>
                        <td class="sixpacking-target-carbohydrate">0</td>
                    </tr>
                </table>
                <br>
                <p>以下の計算方法にて算出しています。(各種研究結果等を参考に設定)</p>
                <ol>
                    <li>目標総カロリー(kCal) = 体重(kg) × 22</li>
                    <li>目標タンパク質摂取量(g) = 目標総カロリー(kCal) × 0.30 / 4</li>
                    <li>目標脂質摂取量(g) = 目標総カロリー(kCal) x 0.50 / 9</li>
                    <li>目標糖質摂取量(g) = 目標総カロリー(kCal) × 0.15 / 4</li>
                </ol>
                <br>
                <p>三大栄養素の考え方としては、</p>
                <ol>
                    <li>筋肉を維持しながら脂肪を落とすにはタンパク質の量の確保は最重要。</li>
                    <li>ホルモンバランスを崩さないためには脂質も50%程度は必要。</li>
                    <li>結果として糖質は減らす必要があり、根菜類や緑黄色野菜を中心に摂る。</li>
                    <li>（白米やパン、パスタのような精製糖質は入る余地がなくなる）</li>
                </ol>
                <p>のようになります。</p>
                <br>
                <p>今回の計算結果はこちらから登録すればマイページでいつでも確認することができます。</p>
                {{-- 登録/更新ボタン --}}
                <br>
                <div class="form-group row mb-4 mx-auto">
                    <div class="col-md-8">
                        {{-- <input type="hidden" name="id" value="{{ Auth::user()->id }}"> --}}
                        <input type="hidden" name="lean-body-mass" value="">
                        <input type="hidden" name="sixpacking-target-calories" value="">
                        <input type="hidden" name="sixpacking-target-protein" value="">
                        <input type="hidden" name="sixpacking-target-carbohydrate" value="">
                        <input type="hidden" name="sixpacking-target-lipid" value="">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="マイデータに登録/更新">
                    </div>
                </div>
            </form>
            <p>なお普段の食事メニューのカロリーや栄養素を把握するには<a href="https://calorie.slism.jp/">こちら</a>のようなサイトで、摂取したものを調べてみるのが良いと思います。</p>
            <p>ただ毎日やるのは面倒で続かないので、家計簿診断のように「たまに計算して現状を把握する」という使い方がオススメです。</p>
            <br>
        </div>
    </div>
</div>
@endsection