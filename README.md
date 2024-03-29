# dpmt

『[増補改訂版 Java 言語で学ぶデザインパターン入門 マルチスレッド編](https://www.hyuki.com/dp/dp2.html)』のサンプルプログラムを PHP で模倣したものです。

## 動作環境

プログラムは PHP 7.3.4 (ZTS) + [pthreads 拡張モジュール](https://github.com/krakjoe/pthreads)で動作を確認しています。

実行例を以下に示します。ファイル名の末尾が `_Main.php` であるものが実行可能な PHP プログラムです。

```
$ php src/Chapter01/List_01_01_Main.php
Testing Gate, hit CTRL+C to exit.
Alice BEGIN
Bobby BEGIN
Chris BEGIN
***** BROKEN ***** No.154815: Alice, Alaska
***** BROKEN ***** No.198148: Chris, Alaska
***** BROKEN ***** No.202683: Alice, Canada
***** BROKEN ***** No.253770: Chris, Alaska
***** BROKEN ***** No.242399: Alice, Canada
***** BROKEN ***** No.249625: Chris, Brazil
***** BROKEN ***** No.276464: Bobby, Brazil
***** BROKEN ***** No.376630: Alice, Canada
***** BROKEN ***** No.414421: Bobby, Alaska
***** BROKEN ***** No.426178: Alice, Brazil
```

## オリジナルのプログラムに関する表示

オリジナルのサンプルプログラムは The zlib/libpng License で公開されており、以下の URL から入手できます。

https://www.hyuki.com/dp/dp2.html#download

```
Copyright (C) 2002,2006 Hiroshi Yuki.
http://www.hyuki.com/dp/dp2.html
hyuki@hyuki.com

This software is provided 'as-is', without any express or implied warranty.
In no event will the authors be held liable for any damages
arising from the use of this software.

Permission is granted to anyone to use this software for any purpose,
including commercial applications, and to alter it and redistribute it freely,
subject to the following restrictions:

1. The origin of this software must not be misrepresented; you must not claim
that you wrote the original software. If you use this software in a product,
an acknowledgment in the product documentation would be appreciated but is not
required.

2. Altered source versions must be plainly marked as such, and must not be
misrepresented as being the original software.

3. This notice may not be removed or altered from any source distribution.

（以下、参考訳）
このソフトウェアは現状のまま提供されるものであり、
明示的にあるいは暗黙のうちにどんな保証もしない。
このソフトウェアを使うことによって生じるいかなる損害に対しても、
作者はまったく責任を負わない。

以下の制限を守る限りにおいて、誰であっても、
このソフトウェアを商用アプリケーションを含む任意の目的に使用すること、
このソフトウェアを変更すること、そして自由に再配布することができる。

1. このソフトウェアの起源を誤って提示してはならない。すなわち、
あなたは元のソフトウェアを自分が書いたと主張してはならない。
もしもこのソフトウェアを製品の中で使用するときには、製品の文書中で
謝意を示すことは歓迎する。しかしそれは必須ではない。

2. 変更したソースの版ははっきりとそれがわかるようにしなければならず、
元のソフトウェアと混同されるようにしてはいけない。

3. いかなるソース配布からも、この注意書きは削除したり変更したりしてはならない。
```
