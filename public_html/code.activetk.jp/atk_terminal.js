/*!
 * ATK_terminal.js
 * import-script : ActiveTK.js | jQuery JavaScript Library v3.5.1 | platform.js
 * Copyright 2020 ActiveTK. All rights reserved.
 * Released under the MIT license
 * http://ActiveTK.CF/ActiveTK.JS/readme.txt
 */

// Import JavaScript
var script = {

	// add script
	add: function (url, callback) {

		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.src = url;

		if (s.readyState) {
			s.onreadystatechange = function () {
				if (s.readyState === 'loaded' || s.readyState === 'complete') {
					s.onreadystatechange = null;
					callback();
				};
			};
		} else {
			s.onload = function () {
				callback();
			};
		};

		document.getElementsByTagName('head')[0].appendChild(s);
	}

};

/*!***** atk_terminal *****/

; var starty = true;
try {
	starty = terminal.onloadexit;
} catch (e) { }

if (starty) {
	"use strict";

	/*!***** ActiveTK.js *****/
	script.add('http://code.activetk.cf/ActiveTK.only.min.js', function () {

		/*!***** jQuery JavaScript Library v3.5.1 *****/
		script.add('http://code.activetk.cf/jquery-3.5.1.slim.min.js', function () {

			/*!***** platform.js *****/
			script.add('http://code.activetk.cf/platform.min.js', function () {

				var terminal = new Object();
				var objectn = 0;

				window.onload = function () {

					// style
					document.body.style = "background-color: #000000;color: #ffffff;";

					// add main
					let pre = document.createElement("pre");
					pre.setAttribute("id", "terminal");
					document.body.appendChild(pre);

					// show message
					if (!(!terminal.settings.loadingmsg)) _("terminal").innerHTML = terminal.settings.loadingmsg;

					// add readline_button
					let re = document.createElement("input");
					re.setAttribute("id", "terminalreadline");
					re.setAttribute("type", "button");
					re.setAttribute("style", "display: none;");
					document.body.appendChild(re);

					// start main
					try {
						if (typeof Main == 'function') {
							_("terminal").innerHTML = terminal.text;
							terminal.Main.exitcode = "Main()";
						}
						else {
							throw new TypeError("Main is not a function.");
						}

					} catch (e) {
						if (terminal.settings.using) throw new Error("Main is not defined.");
					}

				};

				// Terminal
				terminal.Main = {};

				// loaded
				terminal.onloadexit = false;

				// text
				terminal.text = "";

				// settings
				terminal.settings = {
					using: true,			 // if using === false, We will throw new Error "Main is not defined."
					loadingmsg: "Loading..." // if loadingmsg === false, We will don't show the loading message.
				};

				// onkeydown event
				document.onkeydown = (t => terminal.key.down(t.key));

				// wait
				terminal.key = {
					wait: false,
					down: function (t) {
						if (!terminal.key.wait);
						else if (terminal.key.wait == 1) { // waitting any key from ReadLine()
							if ("Enter" == t || "enter" == t) {
								terminal.text += "<br>";
								document.getElementById("terminalreadline").click(); // start click event
							}
						}
					}
				};

				terminal.Write = function (text) {
					terminal.text = terminal.text + text;
					_("terminal").innerHTML = terminal.text;
				};

				terminal.WriteLine = function (text) {
					return terminal.Write(text + "<br>");
				};

				terminal.ReadLine = function () {
					terminal.key.wait = 1;

					(async () => {
						const awaitclick = target => {
							return new Promise(resolve => {
								const listener = resolve;
								target.addEventListener("click", listener, { once: true });
							});
						};
						await awaitclick($("#terminalreadline")[0]);
						//readline-end
						alert("ReadLine.End");
					})();

				};

				terminal.die = function (errorcode) {
					if (!errorcode) errorcode = "0x000000(undefined)";
					_("Main").innerHTML = '<br><p><font color="#ff4500">Error</font></p><br><font color="#ffffff">errorcode : ' + errorcode + '<br><br>Press [Alt] + [R] or click <button onclick="window.location.reload(true);">here</button> to restart.</font><br>';
					_("bodys").style = "background-color: #0000cd;";
					return true;
				}

			});

		});

	});

};