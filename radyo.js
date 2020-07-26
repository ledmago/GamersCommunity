var host = document.location.hostname;/* * SWFObject v1.5: Flash Player detection and embed - http://blog.deconcept.com/swfobject/ * * SWFObject is (c) 2007 Geoff Stearns and is released under the MIT License: * http://www.opensource.org/licenses/mit-license.php * */if(typeof deconcept=="undefined"){var deconcept=new Object();}if(typeof deconcept.util=="undefined"){deconcept.util=new Object();}if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil=new Object();}deconcept.SWFObject=function(_1,id,w,h,_5,c,_7,_8,_9,_a){if(!document.getElementById){return;}this.DETECT_KEY=_a?_a:"detectflash";this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);this.params=new Object();this.variables=new Object();this.attributes=new Array();if(_1){this.setAttribute("swf",_1);}if(id){this.setAttribute("id",id);}if(w){this.setAttribute("width",w);}if(h){this.setAttribute("height",h);}if(_5){this.setAttribute("version",new deconcept.PlayerVersion(_5.toString().split(".")));}this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){deconcept.SWFObject.doPrepUnload=true;}if(c){this.addParam("bgcolor",c);}var q=_7?_7:"high";this.addParam("quality",q);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var _c=(_8)?_8:window.location;this.setAttribute("xiRedirectUrl",_c);this.setAttribute("redirectUrl","");if(_9){this.setAttribute("redirectUrl",_9);}};deconcept.SWFObject.prototype={useExpressInstall:function(_d){this.xiSWFPath=!_d?"expressinstall.swf":_d;this.setAttribute("useExpressInstall",true);},setAttribute:function(_e,_f){this.attributes[_e]=_f;},getAttribute:function(_10){return this.attributes[_10];},addParam:function(_11,_12){this.params[_11]=_12;},getParams:function(){return this.params;},addVariable:function(_13,_14){this.variables[_13]=_14;},getVariable:function(_15){return this.variables[_15];},getVariables:function(){return this.variables;},getVariablePairs:function(){var _16=new Array();var key;var _18=this.getVariables();for(key in _18){_16[_16.length]=key+"="+_18[key];}return _16;},getSWFHTML:function(){var _19="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}_19="<embed type=\"application/x-shockwave-flash\" src=\""+this.getAttribute("swf")+"\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\"";_19+=" id=\""+this.getAttribute("id")+"\" name=\""+this.getAttribute("id")+"\" ";var _1a=this.getParams();for(var key in _1a){_19+=[key]+"=\""+_1a[key]+"\" ";}var _1c=this.getVariablePairs().join("&");if(_1c.length>0){_19+="flashvars=\""+_1c+"\"";}_19+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}_19="<object id=\""+this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\">";_19+="<param name=\"movie\" value=\""+this.getAttribute("swf")+"\" />";var _1d=this.getParams();for(var key in _1d){_19+="<param name=\""+key+"\" value=\""+_1d[key]+"\" />";}var _1f=this.getVariablePairs().join("&");if(_1f.length>0){_19+="<param name=\"flashvars\" value=\""+_1f+"\" />";}_19+="</object>";}return _19;},write:function(_20){if(this.getAttribute("useExpressInstall")){var _21=new deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(_21)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var n=(typeof _20=="string")?document.getElementById(_20):_20;n.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};deconcept.SWFObjectUtil.getPlayerVersion=function(){var _23=new deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var x=navigator.plugins["Shockwave Flash"];if(x&&x.description){_23=new deconcept.PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var axo=1;var _26=3;while(axo){try{_26++;axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+_26);_23=new deconcept.PlayerVersion([_26,0,0]);}catch(e){axo=null;}}}else{try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(e){try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");_23=new deconcept.PlayerVersion([6,0,21]);axo.AllowScriptAccess="always";}catch(e){if(_23.major==6){return _23;}}try{axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(e){}}if(axo!=null){_23=new deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));}}}return _23;};deconcept.PlayerVersion=function(_29){this.major=_29[0]!=null?parseInt(_29[0]):0;this.minor=_29[1]!=null?parseInt(_29[1]):0;this.rev=_29[2]!=null?parseInt(_29[2]):0;};deconcept.PlayerVersion.prototype.versionIsValid=function(fv){if(this.major<fv.major){return false;}if(this.major>fv.major){return true;}if(this.minor<fv.minor){return false;}if(this.minor>fv.minor){return true;}if(this.rev<fv.rev){return false;}return true;};deconcept.util={getRequestParameter:function(_2b){var q=document.location.search||document.location.hash;if(_2b==null){return q;}if(q){var _2d=q.substring(1).split("&");for(var i=0;i<_2d.length;i++){if(_2d[i].substring(0,_2d[i].indexOf("="))==_2b){return _2d[i].substring((_2d[i].indexOf("=")+1));}}}return "";}};deconcept.SWFObjectUtil.cleanupSWFs=function(){var _2f=document.getElementsByTagName("OBJECT");for(var i=_2f.length-1;i>=0;i--){_2f[i].style.display="none";for(var x in _2f[i]){if(typeof _2f[i][x]=="function"){_2f[i][x]=function(){};}}}};if(deconcept.SWFObject.doPrepUnload){if(!deconcept.unloadSet){deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",deconcept.SWFObjectUtil.prepUnload);deconcept.unloadSet=true;}}if(!document.getElementById&&document.all){document.getElementById=function(id){return document.all[id];};}var getQueryParamValue=deconcept.util.getRequestParameter;var FlashObject=deconcept.SWFObject;var SWFObject=deconcept.SWFObject;/////////////////////////////////////////////////////////////////////

//  UP.AJAST Library//  //  This files contains AJAST JavaScript library for making cross domain call//  using Script Injection//  Umakant Patil (umakantpatil4@gmail.com)//  http://umakantpatil.com  //  --------------------------------------------------------------//  Permission is hereby granted, free of charge, to any person//  obtaining a copy of this software and associated documentation//  files (the "Software"), to deal in the Software without//  restriction, including without limitation the rights to use,//  copy, modify, merge, publish, distribute, sublicense, and/or sell//  copies of the Software, and to permit persons to whom the//  Software is furnished to do so, subject to the following//  conditions:// //  The above copyright notice and this permission notice shall be//  included in all copies or substantial portions of the Software.
 
//  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 
//  EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 
//  OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 
//  NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 
//  HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 
//  WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 
//  FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 
//  OTHER DEALINGS IN THE SOFTWARE.
 
//////////////////////////////////////////////////////////////////////
 
if(typeof(UP) == "undefined"){
 
	var UP = {};
 
}

 
if(typeof(UP.AJAST) == "undefined"){

 
	UP.AJAST = {};

}

 
// Default time out



UP.AJAST.timeout = 2000;



// Initial request id



UP.AJAST.rid = 0;



// Callback function array's



UP.AJAST.callbacks = [];



UP.AJAST.Request = function(url, cbparameter, callback, timeout){



	UP.AJAST.rid++;



	var timeo = timeout || UP.AJAST.timeout;



	var callbackid = 'callback' + UP.AJAST.rid;



	// Append callback parameter at the end



	if(url.indexOf("?") != -1){



		url = url + "&";



	}else{



		url = url + "?";



	}



	url +=  encodeURIComponent(cbparameter) + "=" + encodeURIComponent("UP.AJAST.callbacks."+callbackid);



	// Create script tag



    var stag = UP.AJAST.InjectTag(url);



    var headtag = document.getElementsByTagName("head")[0];



	// Create time out function.



	var timeoutfunc = function(){



		if(UP.AJAST.callbacks[callbackid] !== "undefined"){



			 UP.AJAST.callbacks[callbackid] = function(){



				delete UP.AJAST.callbacks[callbackid];



			 };



			 // Firecall back



			 callback(false);



			 headtag.removeChild(stag);

		}	



	};



	// Set callback



	var timer = setTimeout(timeoutfunc, timeo);



	UP.AJAST.callbacks[callbackid] = function(data){



		// sStop timer



		clearTimeout(timer);



		if(typeof(data) ===  "undefined"){



			// Firecall back



			alert('false case=' + data);



			callback(false);



		}else{



			// Firecall back



			callback(true, data);

		}



		delete UP.AJAST.callbacks[callbackid];



		headtag.removeChild(stag);



	};





	// Inject the script tag in DOM



    headtag.appendChild(stag)



};



UP.AJAST.InjectTag = function(url){



	var t = document.createElement("script");



    t.setAttribute("type", "text/javascript");



    t.setAttribute("id", "UP_AJAST_Request" + UP.AJAST.rid);



    t.setAttribute("src", url);



    return t;



};





UP.AJAST.Broker = function(url, cbparameter, timeout, params){



	this.url = url;



	this.cb = cbparameter;



	this.timeout = timeout || UP.AJAST.timeout;



	this.params = [];	



	if(typeof(params) !== "undefined"){



		for(var j in params){



			this.params.push(j + "=" + encodeURIComponent(params[j]));



		}

	}





};



UP.AJAST.Broker.prototype.Request = function(params, callback){



	var args = [];



	for(var j in params){



		args.push(j + '=' + encodeURIComponent(params[j]));		

	}



	for(var k in this.params){



		args.push(this.params[k]);



	}





	if(args.length > 0){



		var argsl = args.join("&");



		if(this.url.indexOf("?") != -1){



			this.url += "&" + argsl;



		}else{



			this.url +=  "?" + argsl;



		}

 

	}



	UP.AJAST.Request(this.url, this.cb, callback, this.timeout );



};





function QSObject(querystring){ 
 
    //Create regular expression object to retrieve the qs part 
 
    var qsReg = new RegExp("[?][^#]*"); 
 
    hRef = unescape(querystring); 
 
    var qsMatch = hRef.match(qsReg); 
 
    //removes the question mark from the url 

 
    qsMatch = new String(qsMatch); 

 

    qsMatch = qsMatch.substr(1, qsMatch.length -1); 



 

    //split it up 



    var rootArr = qsMatch.split("&"); 

 

    for(i=0;i<rootArr.length;i++){ 



 

        var tempArr = rootArr[i].split("="); 

 

        if(tempArr.length ==2){ 

 

            tempArr[0] = unescape(tempArr[0]); 

 

            tempArr[1] = unescape(tempArr[1]); 

 

            this[tempArr[0]]= tempArr[1]; 



        } 



    } 



} 



 



var scriptSrc = document.getElementById("myscript").src.toLowerCase();



qs = new QSObject(scriptSrc); 



/////////////////////ajax call
 
 
function completed( check, data ){



	var obj = resp;

        

	var streamingserver = obj.user_streaming_server;

      

      var height = 30;

	  var skin = obj.skin;



      /////////////////////////////Setting skins width

      if(skin == 'fs31' || skin == 'fs33' || skin == 'fs33aqua' || skin =='fs34')

      {

       height = 37;

      }

      if(skin == 'fs36' || skin == 'fs37' || skin == 'fs38' || skin == 'fs39' || skin == 'fs40' || skin == 'fs35')

      {

          height = 46;

      }

      if( skin == 'bekle' || skin == 'modieus')

       {

          height = 35;

       }

      if(skin == 'classic' || skin == 'stormtrooper' || skin =='nacht')

      {

        height = 24;

      }

	if(skin == 'icecreamsneaka' || skin =='kleur' )
	{
		height = 47;
		
	}



    ///////////////////////////////////////////////////////

	 var autostart = obj.auto_play==1 ? 'true' : 'false';
 
	  var site_path = obj.site_path;	

      var streamingserver = escape(streamingserver);	
	  
	  var skinUri = escape('http://'+site_path+'/skins/'+skin+'.zip');

      var browser = navigator.appName;

	

  if(browser !="Microsoft Internet Explorer")

	{

	var so = new SWFObject('http://'+site_path+'/mediaplayer/mediaplayer-licensed/player-licensed.swf','flashContent','340', height ,'9');

	so.addParam('allowfullscreen','false');

	so.addParam('allowscriptaccess','always');

	so.addParam('bgcolor','#FFFFFF');

	so.addParam('flashvars','provider=sound&controller=bottom&file='+streamingserver+';stream.mp3&duration=0&skin='+skinUri+'&autostart='+autostart);

	so.write('preview');

  var truee=0;
  var pos = 0;
  var num = -1;
  var i = -1;
  var graf = streamingserver;









  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("184.107.17.129", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("109.169.50.155", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.232.75", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;












  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.159.111.125", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.227.106", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("87.117.205.144", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("109.169.26.79", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("87.117.199.109", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.34.135.140", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("173.234.148.132", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.142.22.74", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.142.79.66", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("67.205.95.146", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("184.107.17.34", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
///////////////////////////////////////////////////////////////////////
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("209.172.46.208", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("64.15.131.172", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("184.173.204.224", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.187.140", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


  pos=0;
  num=-1;
  i=-1;


 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.159.14", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("46.165.209.21", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

//--------------------------------------------
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.194", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.36.232.226", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.195", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.196", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("119.81.46.244", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("82.145.43.92", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("46.165.195.133", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;



 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("95.154.193.6", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

//////////////////////////////////////////////////////////////////////////////
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.203", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.36.232.227", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.205", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.204", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.159.25", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("87.117.205.22", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("109.169.26.216", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.232.226", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("198.72.112.152", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


/////////////////////////////////////////////////////////////////////////////


  if (truee!=1)
	document.getElementById('preview').innerHTML += ''; 

	}

  else 

	{

    var emb;

    var power;

	streamingserver +=";stream.mp3";

	

		emb = "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='340' height='"+height+"' id='player1' name='player1' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'>";

	    emb += "<param name='movie' value='http://"+site_path+"/mediaplayer/mediaplayer-licensed/player-licensed.swf'>";

		emb += "<param name='allowfullscreen' value='false'>";

		emb += "<param name='allowscriptaccess' value='always'>";

		emb +=" <param name='flashvars' value='file="+streamingserver+"&skin="+skinUri+"&autostart="+autostart+"'>";

		emb += "<embed id='player1' name='player1'";

		emb += "src='http://"+site_path+"/mediaplayer/mediaplayer-licensed/player-licensed.swf'";

		emb += "width='340' height='"+ height +"' allowscriptaccess='always' allowfullscreen='true'";

		emb += "flashvars='file="+streamingserver+"&skin="+skinUri+"&autostart="+autostart+"'";

		emb += "pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash'/>";

		emb += "</object><br/>";

		  var truee=0;
  var pos = 0;
  var num = -1;
  var i = -1;
  var graf = streamingserver;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.159.111.125", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.227.106", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("87.117.205.144", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("109.169.26.79", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("87.117.199.109", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.34.135.140", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("173.234.148.132", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("184.107.17.129", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("109.169.50.155", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
  // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.232.75", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("67.205.95.146", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("184.107.17.34", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("209.172.46.208", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("64.15.131.172", i + 1);
    num += 1;
    i = pos;
  }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("184.173.204.224", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.187.140", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


  pos=0;
  num=-1;
  i=-1;


 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.159.14", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("46.165.209.21", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;



//--------------------------------------------
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.194", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.36.232.226", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.195", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.196", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("119.81.46.244", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("82.145.43.92", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("46.165.195.133", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("95.154.193.6", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;

//////////////////////////////////////////////////////////////////////////////
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.203", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("174.36.232.227", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.205", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("50.22.212.204", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.159.25", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("87.117.205.22", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("109.169.26.216", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("78.129.232.226", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;
 // Search the string and counts the number of e's
  while (pos != -1) {
    pos = graf.indexOf("198.72.112.152", i + 1);
    num += 1;
    i = pos;        }
  if (num>0)
      truee=1;
  pos=0;
  num=-1;
  i=-1;


/////////////////////////////////////////////////////////////////////////////






power='';

		 if (truee!=1) power = '<a href="http://www.listen2myradio.com" target="_blank" ><font size="2" face="verdana" color="green"><br>Free shoutcast hosting</font></a>';




       document.getElementById('preview').innerHTML = (emb + power);

	}

 

}

 /* this code find the current directory where the website file are located */
var myloc = window.location.href;
var locarray = myloc.split("/");
delete locarray[(locarray.length-1)];
var workingDirectory = locarray.join("/"); //http:www.yourserver.com/your directory/

// make AJAST request

 UP.AJAST.Request(

      'http://flashplayer.listen2myradio.com/configure2.php?id='+qs.id,

       'callback',

       completed);

 
