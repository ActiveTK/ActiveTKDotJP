
      window.onload = function () {

        window.scroll({top: 0, behavior: 'smooth'});

        window.MyNameStatus = -1;
        window.MyName = "My_Name_is_ActiveTK.";
        window.MyProfile1Status = -1;
        window.MyProfile2Status = -1;
        window.MyProfile1 = "ダークウェブについて詳しい学生。";
        window.MyProfile2 = "得意な言語はC#、PHP、JavaScript。";
        window.MyHistory_2019 = "2019年:　自分のPCを持ち、C言語とHTMLを勉強。また、ダークウェブの存在を知った。";
        window.MyHistory_2020 = "2020年:　C#、JavaScriptを勉強。初めて自分のウェブサイトを公開。";
        window.MyHistory_2021 = "2021年:　PHP、MySQLを勉強。匿名集団アノニマスに興味を持った。";
        window.MyHistory_2022 = "2022年:　本サイト「ActiveTK.jp」を作成。";
        window.MyHistory_2019_status = -1;
        window.MyHistory_2020_status = -1;
        window.MyHistory_2021_status = -1;
        window.MyHistory_2022_status = -1;
        window.WelcomeMsg = "welCOME_to_My_Website!";
        window.WelcomeMsg_status = -1;
        setInterval(() => {
          window.MyNameStatus++;
          if (window.MyNameStatus < window.MyName.length)
          {
            console.log("(interval) Window.MyName:: Length=" + window.MyName.length + ", Status=" + window.MyNameStatus + ", New-Char=" + window.MyName.charAt(window.MyNameStatus));
            if (window.MyNameStatus < 11)
            {
              _("mynameis").innerText += window.MyName.charAt(window.MyNameStatus);
              _("mynameis").innerHTML = _("mynameis").innerText.replace("_", "&nbsp;");
            }
            else
              _("myname").innerText += window.MyName.charAt(window.MyNameStatus);
          }
          else if (window.MyNameStatus == window.MyName.length + 5)
          {
            let position = $("#dec").offset().top;
            $("html, body").animate({scrollTop:position}, 500, "swing");
          }
          else if (window.MyNameStatus == window.MyName.length + 7)
          {
            setInterval(() => {
              window.MyProfile1Status++;
              if (window.MyProfile1Status < window.MyProfile1.length)
              {
                console.log("(interval) Window.MyProfile1:: Length=" + window.MyProfile1.length + ", Status=" + window.MyProfile1Status + ", New-Char=" + window.MyProfile1.charAt(window.MyProfile1Status));
                _("MyProfile1").innerText += window.MyProfile1.charAt(window.MyProfile1Status);
              }
              else if (window.MyProfile1Status == window.MyProfile1.length + 3)
              {
                setInterval(() => {
                  window.MyProfile2Status++;
                  if (window.MyProfile2Status < window.MyProfile2.length)
                  {
                    console.log("(interval) Window.MyProfile2:: Length=" + window.MyProfile2.length + ", Status=" + window.MyProfile2Status + ", New-Char=" + window.MyProfile2.charAt(window.MyProfile2Status));
                    _("MyProfile2").innerText += window.MyProfile2.charAt(window.MyProfile2Status);
                  }
                  else if (window.MyProfile2Status == window.MyProfile2.length + 7)
                  {
                    let position2 = $("#history").offset().top;
                    $("html, body").animate({scrollTop:position2}, 500, "swing");
                    setInterval(() => {
                      window.MyHistory_2019_status++;
                      if (window.MyHistory_2019_status < window.MyHistory_2019.length)
                      {
                        console.log("(interval) Window.MyHistory_2019:: Length=" + window.MyHistory_2019.length + ", Status=" + window.MyHistory_2019_status + ", New-Char=" + window.MyHistory_2019.charAt(window.MyHistory_2019_status));
                        _("history2019").innerText += window.MyHistory_2019.charAt(window.MyHistory_2019_status);
                      }
                      else if (window.MyHistory_2019_status == window.MyHistory_2019.length + 7)
                      {
                        setInterval(() => {
                          window.MyHistory_2020_status++;
                          if (window.MyHistory_2020_status < window.MyHistory_2020.length)
                          {
                            console.log("(interval) Window.MyHistory_2020:: Length=" + window.MyHistory_2020.length + ", Status=" + window.MyHistory_2020_status + ", New-Char=" + window.MyHistory_2020.charAt(window.MyHistory_2020_status));
                            _("history2020").innerText += window.MyHistory_2020.charAt(window.MyHistory_2020_status);
                          }
                          else if (window.MyHistory_2020_status == window.MyHistory_2020.length + 7)
                          {
                            setInterval(() => {
                              window.MyHistory_2021_status++;
                              if (window.MyHistory_2021_status < window.MyHistory_2021.length)
                              {
                                console.log("(interval) Window.MyHistory_2021:: Length=" + window.MyHistory_2021.length + ", Status=" + window.MyHistory_2021_status + ", New-Char=" + window.MyHistory_2021.charAt(window.MyHistory_2021_status));
                                _("history2021").innerText += window.MyHistory_2021.charAt(window.MyHistory_2021_status);
                              }
                              else if (window.MyHistory_2021_status == window.MyHistory_2021.length + 7)
                              {
                                setInterval(() => {
                                  window.MyHistory_2022_status++;
                                  if (window.MyHistory_2022_status < window.MyHistory_2022.length)
                                  {
                                    console.log("(interval) Window.MyHistory_2022:: Length=" + window.MyHistory_2022.length + ", Status=" + window.MyHistory_2022_status + ", New-Char=" + window.MyHistory_2022.charAt(window.MyHistory_2022_status));
                                    _("history2022").innerText += window.MyHistory_2022.charAt(window.MyHistory_2022_status);
                                  }
                                  else if (window.MyHistory_2022_status == window.MyHistory_2022.length + 7)
                                  {
                                    let position3 = $("#links").offset().top;
                                    $("html, body").animate({scrollTop:position3}, 500, "swing");
                                    setInterval(() => {
                                      window.WelcomeMsg_status++;
                                      if (window.WelcomeMsg_status < window.WelcomeMsg.length)
                                      {
                                        console.log("(interval) Window.WelcomeMsg:: Length=" + window.WelcomeMsg.length + ", Status=" + window.WelcomeMsg_status + ", New-Char=" + window.WelcomeMsg.charAt(window.WelcomeMsg_status));
                                        _("welcome").innerText += window.WelcomeMsg.charAt(window.WelcomeMsg_status);
                                        _("welcome").innerHTML = _("welcome").innerText.replace("_", "&nbsp;");
                                      }
                                    }, 140);
                                  }
                                }, 40);
                              }
                            }, 40);
                          }
                        }, 40);
                      }
                    }, 40);
                  }
                }, 90);
              }
            }, 90);
          }
        }, 80);

      }