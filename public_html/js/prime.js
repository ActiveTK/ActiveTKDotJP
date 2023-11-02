/*!
 * prime.js
 * (c) 2023 ActiveTK. <+activetk.jp>
 * Released under the MIT license
 */
(function(undefined) {
  "use strict";

  var primejs = {};
  primejs.NotPrimeLastChars = ["0", "2", "4", "5", "7", "8"];
  primejs.found = 0;
  primejs.notfound = 0;

  /* BigInt用のsqrt関数 */
  // 参考: Chromium#Main::src/third_party/zephyr/main/lib/libc/minimal/source/math/sqrt.c
  primejs.sqrt = function(value) {
    let sqrt = value / 3n;
    if (value <= 0n) return 0n;
    for (let i = 0; i < 6; i++)
      sqrt = (sqrt + value / sqrt) / 2n;
    return sqrt;
  }

  /* 素数判定関数 */
  primejs.IsPrime = function(num) {

    // 最後の桁によって偶数と5の倍数を除外
    if (primejs.NotPrimeLastChars.indexOf(("" + num + "").slice( -1 )) !== -1) return false;

    // 3以上かつ数字の平方根より小さい数で割り切れないか試す。numRoot mod n === 0 の時点で終了
    // BigIntは小数点以下を扱わないため、Math.ceilは不要
    let numRoot = primejs.sqrt(num);
    for (let i = BigInt(3); i < numRoot; i++)
      if (num % i === 0n) return false;

    // 素数の場合の処理
    return true;

  }

  /* エントリーポイント */
  // n=82589933は過去に発見された最大のメルセンヌ数
  // n=95000000くらいまでは既に計算されてるだろうなぁという勝手な予想に基づきハードコードしておきます
  primejs.StartNum = 82589933 + 1300000 + Math.floor( Math.random() * 20000000 );
  primejs.n = BigInt(primejs.StartNum);
  for (; primejs.notfound < 20; primejs.n++)
  {
    console.log("prime.js => n=" + primejs.n + ", 2^n-1.length=" + ((2n ** primejs.n) - 1n).toString().length +
      ", PrimeFoundCount=" + primejs.found + ", NotPrimeCount=" + primejs.notfound);
    if (primejs.IsPrime((2n ** primejs.n - 1n)))
    {
      primejs.found++;
      console.log("prime.js => Found: n=" + primejs.n);
      fetch("https://project.activetk.jp/Prime.js/FindPrime.php?n=" + primejs.n);
    }
    else
      primejs.notfound++;
  }

}(void(0)));
