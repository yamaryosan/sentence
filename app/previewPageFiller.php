<p>エクセルには二つの参照方式が採用されている。そのうち一つは皆さんもよくご存じのA1形式である。<br>
    A1形式はその名の通り、セルの一番左上が1行A列であるという意味で、行を1,2,3、列をA,B,Cと表記していくのだ。そしてもう一つ、あまりなじみがないであろう表記がある。<br>
    それがR1C1形式である。やはりこちらもセルの一番上がR1C1であるという意味なのだが、行をR(Row), 列をC(Column)で表すものである。<br>
    R1C1とは、あるセルを基準として、そこから相対的にどれだけ移動したかで表す形式である。A1形式が「絶対参照」、R1C1が「相対参照」というわけだ。<br>
    とはいえ、あなたがマクロ（VBA）を使うのでもなければ、R1C1形式は忘れてもらってよい。単にわかりづらく混乱するだけである。一方、マクロを用いた業務改善をお考えのあなたはぜひR1C1形式を使いこなせるようになっておこう！<br><br>
    マクロでR1C1形式が多用されるのは、相対位置でセルを指定し、操作することが非常に多いからである。<br>
    そもそもマクロ初心者の方は、どっちが行でどっちが列なのかも混乱するに違いない。私はそうでした。線形数学？なるものを学ぶと行と列が出てくるので嫌でも覚えるそうなのだが、あいにく私は数学が大の苦手で、教科書のエックスは悪魔の文字に見えていた。<br>
    「一列に並ぶ」というと、レジや受付に向かって「縦」に並ぶのをイメージするだろう。スーパーの待ち行列のことを「横に並ぶ」とは表現しないはずだ。自分が向いている方角はレジに向かっている。だから「縦に並ぶ」。<br>
    この覚え方でとりあえず「列は縦、行は横」と考えることができる（どちらか片方だけを抑えれば、もう片方は「そっちじゃないほう」でいける）。<br>
    だからA1形式は、画面の左に1,2,3が、上にA,B,Cが書いてあるのである。<br>
</p>