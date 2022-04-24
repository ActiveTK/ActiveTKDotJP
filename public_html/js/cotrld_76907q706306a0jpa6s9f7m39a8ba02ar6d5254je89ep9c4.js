function cotrld(callback) {
   _("pv").innerText += "合計:" + (callback["user-total"] * 1 - 3139 + 13150) + "人";
   _("pv").innerHTML += "&ensp;";
   _("pv").innerText += "本日:" + callback["user-today"] + "人";
   _("pv").innerHTML += "&ensp;";
   _("pv").innerText += "昨日:" + callback["user-yesterday"] + "人\n";
   _("pv").innerText += "カウント開始日:2020/10/24 本日:" + callback["info-today"].slice(0,4) + "/" + callback["info-today"].slice(4,6) + "/" + callback["info-today"].slice(-2) + "\n";
}