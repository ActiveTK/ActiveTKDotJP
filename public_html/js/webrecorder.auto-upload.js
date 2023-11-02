
var result_html_data_  = "", data_, time = "";
self.addEventListener('message', async (message) => {
    time  = message.data.UnixTime;
    data_ = message.data.Data_;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://www.activetk.jp/tools/webrecorder?upload", false);;
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        result_html_data_ = xhr.responseText
      };
    }
    let formData = new FormData();
    formData.append("file", new Blob(data_, {type: 'application/octet-stream'}, "data.wav"));
    xhr.send(formData);
    self.postMessage({
        result_unixtime_: time,
        result_html_data_: result_html_data_
    });
});

