var pixel=pixel||{pixelConfig:null,segmentConfig:null,extraParams:null,cookieDomain:null,domainList:[],clickTrackers:null,initialize:null,finalize:null,paramArray:[],segParams:[],pageLoadStatusFlag:false,checkReadyStateOnIntervals:null,pixelFireStatus:false,parse:function(){try{if(!(pixel.pixelFireStatus||pixel.checkReadyStateOnIntervals)){pixel.checkReadyStateOnIntervals=setInterval(function(){if(!pixel.pixelFireStatus){pixel.checkIfPageLoadComplete();if(pixel.pageLoadStatusFlag){try{var b=pixel.detectCampaign();pixel.initialize(b);if(typeof pixel.getExtraParams!="undefined"){pixel.getExtraParams();}pixel.getParams();pixel.finalize(b);pixel.removeDuplicatePids();pixel.fireAnalyze(pixel.getQueryString(pixel.paramArray));}catch(c){pixel.paramArray.param="999";pixel.paramArray.err=c;pixel.fireAnalyze(pixel.getQueryString(pixel.paramArray));}}}},500,"Javascript");}}catch(a){pixel.paramArray.param="999";pixel.paramArray.err=a;pixel.fireAnalyze(pixel.getQueryString(pixel.paramArray));}},removeDuplicatePids:function(){var e="",d="",c="";var b=pixel.paramArray.param.split("_")[0];try{if(b&&(b=="e400")){e=pixel.paramArray.pid1;d=pixel.paramArray.pid2;c=pixel.paramArray.pid3;if(e&&d&&(e==d)){pixel.deleteParam("2");}if(d&&c&&(d==c)){pixel.deleteParam("3");}if(e&&c&&(e==c)){pixel.deleteParam("3");}}}catch(a){}},deleteParam:function(b){try{delete pixel.paramArray["pid"+b];delete pixel.paramArray["catid"+b];delete pixel.paramArray["price"+b];delete pixel.paramArray["quantity"+b];}catch(a){}},checkIfPageLoadComplete:function(){if(document.readyState==="interactive"||document.readyState==="complete"){pixel.pageLoadStatusFlag=true;clearInterval(pixel.checkReadyStateOnIntervals);}else{pixel.pageLoadStatusFlag=false;}},getParams:function(){var f="",d="",i="",e="";var h="",j="",c="",b="",g="";for(var a in pixel.pixelConfig){g=a.split("_Z")[0];if(pixel.paramArray[g]){continue;}if(pixel.pixelConfig.hasOwnProperty(a)&&pixel.pixelConfig[a]){f=pixel.pixelConfig[a][1];d=pixel.pixelConfig[a][0];i=pixel.pixelConfig[a][2];e=pixel.pixelConfig[a][3];if(f){if(f==="xpath"&&d&&typeof pixel.getDataFromXPath!="undefined"){pixel.paramArray[g]=pixel.getDataFromXPath(d,i);}else{if(f==="url"&&d&&e){if(e=="regex"&&typeof pixel.getDataFromUrl!="undefined"){pixel.paramArray[g]=pixel.getDataFromUrl(d,i);}else{if(e=="qstring"&&typeof pixel.getParamFromUrl!="undefined"){pixel.paramArray[g]=pixel.getParamFromUrl(document.URL,d);}}}else{if(f=="jsvariable"&&d&&typeof pixel.getDataFromJSVar!="undefined"){pixel.paramArray[g]=pixel.getDataFromJSVar(d);}else{if(f=="udf"&&d&&typeof pixel.getDataFromUDF!="undefined"){pixel.paramArray[g]=pixel.getDataFromUDF(d,i);}else{if(f=="csspath"&&d&&typeof pixel.getDataFromCSSPath!="undefined"){pixel.paramArray[g]=pixel.getDataFromCSSPath(d,i);}else{if(f=="classname"&&d&&typeof pixel.getElementsByClass!="undefined"){pixel.paramArray[g]=pixel.getElementsByClass(d.split(",")[0],d.split(",")[1],d.split(",")[2]);}}}}}}h=pixel.pixelConfig[a][4];j=pixel.pixelConfig[a][5];c=pixel.pixelConfig[a][6];if(c&&typeof pixel.getNumericField!="undefined"){pixel.paramArray[g]=pixel.getNumericField(pixel.paramArray[g],c);}b=pixel.pixelConfig[a][7];if(h&&pixel.paramArray[g]){pixel.paramArray[g]=pixel.getSubstring(pixel.paramArray[g],h,j);}if(b&&b.toLowerCase()=="md5"&&typeof pixel.getMd5!="undefined"){pixel.paramArray[g]=pixel.getMd5(pixel.paramArray[g]);}if(b&&b.toLowerCase()=="sha256"&&typeof pixel.getSHA256!="undefined"){pixel.paramArray[g]=pixel.getSHA256(pixel.paramArray[g]);}}}}},getSubstring:function(h,b,a){var f=null;var e="";var d=1;var g;try{if(a){g=new RegExp(b,a);}else{g=new RegExp(b);}f=h.toString().match(g);if(f&&f[d]){return f[d];}}catch(c){e="";}return e;},getSegParams:function(){var g="",e="",l="",f="",a=document.URL;var j="",m="",d="",c="",i="",h="";for(var k in pixel.segmentConfig){if(pixel.segmentConfig.hasOwnProperty(k)){pixel.segParams[k]=[];for(var b in pixel.segmentConfig[k]){h=b.split("_Z")[0];if(pixel.segParams[k][h]){continue;}if(pixel.segmentConfig[k].hasOwnProperty(b)&&pixel.segmentConfig[k][b]){g=pixel.segmentConfig[k][b][1];e=pixel.segmentConfig[k][b][0];l=pixel.segmentConfig[k][b][2];f=pixel.segmentConfig[k][b][3];if(g){if(g==="xpath"&&e&&typeof pixel.getDataFromXPath!="undefined"){pixel.segParams[k][h]=pixel.getDataFromXPath(e,l);}else{if(g==="url"&&e&&f){if(f=="regex"&&typeof pixel.getDataFromUrl!="undefined"){pixel.segParams[k][h]=pixel.getDataFromUrl(e,l);}else{if(f=="qstring"&&typeof pixel.getParamFromUrl!="undefined"){pixel.segParams[k][h]=pixel.getParamFromUrl(a,e);}}}else{if(g=="jsvariable"&&e&&typeof pixel.getDataFromJSVar!="undefined"){pixel.segParams[k][h]=pixel.getDataFromJSVar(e);}else{if(g=="csspath"&&e&&typeof pixel.getDataFromCSSPath!="undefined"){pixel.segParams[k][h]=pixel.getDataFromCSSPath(e,l);}else{if(g=="udf"&&e&&typeof pixel.getDataFromUDF!="undefined"){pixel.segParams[k][h]=pixel.getDataFromUDF(e,l);}else{if(g=="classname"&&e&&typeof pixel.getElementsByClass!="undefined"){pixel.segParams[k][h]=pixel.getElementsByClass(e.split(",")[0],e.split(",")[1],e.split(",")[2]);}}}}}}j=pixel.segmentConfig[k][b][4];m=pixel.segmentConfig[k][b][5];d=pixel.segmentConfig[k][b][6];if(d&&typeof pixel.getNumericField!="undefined"){pixel.segParams[k][h]=pixel.getNumericField(pixel.segParams[k][h],d);}c=pixel.segmentConfig[k][b][7];i=(c&&c.toLowerCase()=="md5");if(j&&pixel.segParams[k][h]){pixel.segParams[k][h]=pixel.getSubstring(pixel.segParams[k][h],j,m);}}}}pixel.segParams[k]["URL"]=a;}}},getCookie:function(b){var d=document.cookie;if(!b){return"";}var a=d.split(";");for(var c in a){if(a.hasOwnProperty(c)){var e=a[c].match(/\s*(.*)=(.*)/);if(e){if(e[1]===b&&e[2]){return e[2];}}}}return"";},getMd5:function(D){if(D&&D!==""){var E;var y=function(b,a){return(b<<a)|(b>>>(32-a));};var I=function(k,b){var W,a,d,x,c;d=(k&2147483648);x=(b&2147483648);W=(k&1073741824);a=(b&1073741824);c=(k&1073741823)+(b&1073741823);if(W&a){return(c^2147483648^d^x);}if(W|a){if(c&1073741824){return(c^3221225472^d^x);}else{return(c^1073741824^d^x);}}else{return(c^d^x);}};var r=function(a,c,b){return(a&c)|((~a)&b);};var q=function(a,c,b){return(a&b)|(c&(~b));};var p=function(a,c,b){return(a^c^b);};var n=function(a,c,b){return(c^(a|(~b)));};var v=function(X,W,ab,aa,k,Y,Z){X=I(X,I(I(r(W,ab,aa),k),Z));return I(y(X,Y),W);};var f=function(X,W,ab,aa,k,Y,Z){X=I(X,I(I(q(W,ab,aa),k),Z));return I(y(X,Y),W);};var G=function(X,W,ab,aa,k,Y,Z){X=I(X,I(I(p(W,ab,aa),k),Z));return I(y(X,Y),W);};var u=function(X,W,ab,aa,k,Y,Z){X=I(X,I(I(n(W,ab,aa),k),Z));return I(y(X,Y),W);};var e=function(W){var X;var d=W.length;var c=d+8;var b=(c-(c%64))/64;var x=(b+1)*16;var Y=new Array(x-1);var a=0;var k=0;while(k<d){X=(k-(k%4))/4;a=(k%4)*8;Y[X]=(Y[X]|(W.charCodeAt(k)<<a));k++;}X=(k-(k%4))/4;a=(k%4)*8;Y[X]=Y[X]|(128<<a);Y[x-2]=d<<3;Y[x-1]=d>>>29;return Y;};var s=function(d){var a="",b="",k,c;for(c=0;c<=3;c++){k=(d>>>(c*8))&255;b="0"+k.toString(16);a=a+b.substr(b.length-2,2);}return a;};var t=function(a){if(a===null||typeof a==="undefined"){return"";}var Y=(a+"");var Z="",k,b;b=k=0;var c=Y.length;for(var d=0;d<c;d++){var X=Y.charCodeAt(d);var W=null;if(X<128){k++;}else{if(X>127&&X<2048){W=String.fromCharCode((X>>6)|192,(X&63)|128);}else{if((X&63488)!=55296){W=String.fromCharCode((X>>12)|224,((X>>6)&63)|128,(X&63)|128);}else{if((X&64512)!=55296){throw new RangeError("Unmatched trail surrogate at "+d);}var x=Y.charCodeAt(++d);if((x&64512)!=56320){throw new RangeError("Unmatched lead surrogate at "+(d-1));}X=((X&1023)<<10)+(x&1023)+65536;W=String.fromCharCode((X>>18)|240,((X>>12)&63)|128,((X>>6)&63)|128,(X&63)|128);}}}if(W!==null){if(k>b){Z+=Y.slice(b,k);}Z+=W;b=k=d+1;}}if(k>b){Z+=Y.slice(b,c);}return Z;};var F=[],M,h,H,w,g,V,U,T,S,P=7,N=12,K=17,J=22,C=5,B=9,A=14,z=20,o=4,m=11,l=16,j=23,R=6,Q=10,O=15,L=21;D=t(D);F=e(D);V=1732584193;U=4023233417;T=2562383102;S=271733878;E=F.length;for(M=0;M<E;M+=16){h=V;H=U;w=T;g=S;V=v(V,U,T,S,F[M+0],P,3614090360);S=v(S,V,U,T,F[M+1],N,3905402710);T=v(T,S,V,U,F[M+2],K,606105819);U=v(U,T,S,V,F[M+3],J,3250441966);V=v(V,U,T,S,F[M+4],P,4118548399);S=v(S,V,U,T,F[M+5],N,1200080426);T=v(T,S,V,U,F[M+6],K,2821735955);U=v(U,T,S,V,F[M+7],J,4249261313);V=v(V,U,T,S,F[M+8],P,1770035416);S=v(S,V,U,T,F[M+9],N,2336552879);T=v(T,S,V,U,F[M+10],K,4294925233);U=v(U,T,S,V,F[M+11],J,2304563134);V=v(V,U,T,S,F[M+12],P,1804603682);S=v(S,V,U,T,F[M+13],N,4254626195);T=v(T,S,V,U,F[M+14],K,2792965006);U=v(U,T,S,V,F[M+15],J,1236535329);V=f(V,U,T,S,F[M+1],C,4129170786);S=f(S,V,U,T,F[M+6],B,3225465664);T=f(T,S,V,U,F[M+11],A,643717713);U=f(U,T,S,V,F[M+0],z,3921069994);V=f(V,U,T,S,F[M+5],C,3593408605);S=f(S,V,U,T,F[M+10],B,38016083);T=f(T,S,V,U,F[M+15],A,3634488961);U=f(U,T,S,V,F[M+4],z,3889429448);V=f(V,U,T,S,F[M+9],C,568446438);S=f(S,V,U,T,F[M+14],B,3275163606);T=f(T,S,V,U,F[M+3],A,4107603335);U=f(U,T,S,V,F[M+8],z,1163531501);V=f(V,U,T,S,F[M+13],C,2850285829);S=f(S,V,U,T,F[M+2],B,4243563512);T=f(T,S,V,U,F[M+7],A,1735328473);U=f(U,T,S,V,F[M+12],z,2368359562);V=G(V,U,T,S,F[M+5],o,4294588738);S=G(S,V,U,T,F[M+8],m,2272392833);T=G(T,S,V,U,F[M+11],l,1839030562);U=G(U,T,S,V,F[M+14],j,4259657740);V=G(V,U,T,S,F[M+1],o,2763975236);S=G(S,V,U,T,F[M+4],m,1272893353);T=G(T,S,V,U,F[M+7],l,4139469664);U=G(U,T,S,V,F[M+10],j,3200236656);V=G(V,U,T,S,F[M+13],o,681279174);S=G(S,V,U,T,F[M+0],m,3936430074);T=G(T,S,V,U,F[M+3],l,3572445317);U=G(U,T,S,V,F[M+6],j,76029189);V=G(V,U,T,S,F[M+9],o,3654602809);S=G(S,V,U,T,F[M+12],m,3873151461);T=G(T,S,V,U,F[M+15],l,530742520);U=G(U,T,S,V,F[M+2],j,3299628645);V=u(V,U,T,S,F[M+0],R,4096336452);S=u(S,V,U,T,F[M+7],Q,1126891415);T=u(T,S,V,U,F[M+14],O,2878612391);U=u(U,T,S,V,F[M+5],L,4237533241);V=u(V,U,T,S,F[M+12],R,1700485571);S=u(S,V,U,T,F[M+3],Q,2399980690);T=u(T,S,V,U,F[M+10],O,4293915773);U=u(U,T,S,V,F[M+1],L,2240044497);V=u(V,U,T,S,F[M+8],R,1873313359);S=u(S,V,U,T,F[M+15],Q,4264355552);T=u(T,S,V,U,F[M+6],O,2734768916);U=u(U,T,S,V,F[M+13],L,1309151649);V=u(V,U,T,S,F[M+4],R,4149444226);S=u(S,V,U,T,F[M+11],Q,3174756917);T=u(T,S,V,U,F[M+2],O,718787259);U=u(U,T,S,V,F[M+9],L,3951481745);V=I(V,h);U=I(U,H);T=I(T,w);S=I(S,g);}var i=s(V)+s(U)+s(T)+s(S);return i.toLowerCase();}return"";},removeJunk:function(a){if(a){a=a.toString();a=a.replace(/\&lt\;/g,"<").replace(/\&gt\;/g,">").replace(/\&quot\;/g,'"').replace(/\&amp\;/g,"&").replace(/\&nbsp\;/g," ");a=a.replace(/(<([^>]+)>)/ig,"").replace(/[ \t\r\n]+/g," ").replace(/^\s+|\s+$/g,"");return a;}return"";},getQueryString:function(a){var c=a.account_id;var e="?account_id="+c;delete a.account_id;var d="";for(var b in a){if(a.hasOwnProperty(b)){d=a[b];if(b=="param"){d=a[b].split("_")[0];}e+="&"+b+"="+this.encodeParam(d);}}return e;},selectTrafficSource:function(a){if(a){if(/https?:\/\/[^\/]*\.google\.[^\/]*/i.test(a)){if(/[^a-z]gclid[^a-z0-9]/i.test(a)){return"SEM";}else{return"SEO";}}else{if(/https?:\/\/[^\/]*\.linkedin\.[^\/]*/i.test(a)){return"linkedin";}else{if(/https?:\/\/t\.co/i.test(a)){return"twitter";}}}}else{return"";}},selectDomain:function(){if(pixel.cookieDomain&&~document.domain.indexOf(pixel.cookieDomain)&&(document.domain.indexOf(pixel.cookieDomain)+pixel.cookieDomain.length)===document.domain.length){return 1;}else{var a=pixel.domainList;for(var b=1;b<a.length;b++){if((document.domain.indexOf(a[b])+a[b].length)===document.domain.length){pixel.cookieDomain=a[b];return 0;}}}pixel.cookieDomain=document.domain;return -1;},matches:function(g,a,f){var d=null;var b=false;var e;try{if(a){e=new RegExp(f,a);}else{e=new RegExp(f);}d=g.match(e);if(d&&d.length>0){b=true;}}catch(c){b=false;}return b;},getDataFromJSVar:function(d){var e=d.split(".");var c=e.length;var b=null;var l=null;var f=/[\['"]?((\w|-|\s)+)['"\]]?/;var g,o,a;try{g=e[0];if(g.indexOf("[")>0){b=g.split("[");a=window[b[0]];for(var k=1;k<b.length;k++){l=b[k].match(f);a=a[l[1]];}}else{a=window[g];}}catch(n){return"";}var m=a;try{for(var k=1;k<c;k++){g=e[k];if(g.indexOf("[")>0){b=g.split("[");a=a[b[0]];for(var h=1;h<b.length;h++){l=b[h].match(f);a=a[l[1]];}}else{a=a[g];}}m=a;}catch(n){return"";}return(typeof m=="undefined"?"":m);},getDataFromUDF:function(e,c){var b="";try{var d=window.pixel[e];if(c){b=d(c);}else{b=d();}}catch(a){}return b;},getDataFromUrl:function(b,a){var e,d=document.URL;var c=1;var f;if(a){f=new RegExp(b,a);}else{f=new RegExp(b);}e=d.match(f);if(e&&e[c]){return e[c];}return"";},getDataFromXPath:function(j,k){var r=[],f=[],b=[];var h="",e,p="",d="";var q="";var g=0;var c=document.getElementsByTagName("body")[0];var a=true;e=j.replace("/html/body/","");if(j.indexOf('@id="')!==-1){r=j.match(/.*\[@id="(.+)"\].*/);if(r&&r.length>=1){h=r[1];}}if(h){c=document.getElementById(h);var o='/*[@id="'+h+'"]/';var n='//*[@id="'+h+'"]/';var l='//*[@id="'+h+'"]';var m='*//*[@id="'+h+'"]/';e=e.replace(m,"");e=e.replace(n,"");e=e.replace(o,"");e=e.replace(l,"");}if(!e){c=document.getElementById(h);}else{f=e.split("/");for(g=0;g<f.length;g++){if(f[g]){b=f[g].match(/(\w*)(\[(\d+)\])?/);if(b){q=b[1];p=1;if(b[3]){p=b[3];}}}if(c&&c!="No Data"){c=pixel.getCurrentNode(c,q,p);}else{a=false;break;}}}if(c&&a&&c!="No Data"){if(!k){if(c.innerHTML){d=c.innerHTML;}}else{if(c.getAttribute(k)&&(k!="href"||k!="src")){d=c.getAttribute(k);}if(k=="href"&&c.getAttribute("href")){d=c.href;}else{if(k=="src"&&c.getAttribute("src")){d=c.src;}else{if(k=="value"&&c.value){d=c.value;}}}}return pixel.removeJunk(d);}else{return"";}},getCurrentNode:function(e,c,f){var b="No Data";var a=1,d=0;if(e.childNodes){var g=e.childNodes;for(a=0;a<g.length;a++){if(g[a]&&g[a].tagName&&g[a].tagName.toLowerCase()===c){d++;}if(d==f){b=g[a];break;}}return b;}else{return null;}}};pixel.encodeParam=function(a){if(a){a=pixel.removeJunk(a);a=encodeURIComponent(a);return a;}return"";};pixel.getTrackEvent=function(){var b="";pixel.vizData="";if(typeof dataLayer!=="undefined"){for(var a=0;a<dataLayer.length;a++){if(dataLayer[a].trackEvent&&dataLayer[a].trackEvent[0]){b=dataLayer[a].trackEvent[0];pixel.vizData=dataLayer[a];break;}else{if(dataLayer[a].trackPage){pixel.vizData=dataLayer[a];b=dataLayer[a].trackPage;break;}}}}return b;};pixel.getElementsByAttribute=function(m,c,g,a){var b=document.getElementById(g)||document;var o=a||"*";var h=c||"";var j=m||"class";var l=new RegExp("(?:^|\\s)("+h+")(?:\\s|$)","i");var n=[],d=0,f=0;var e=(o==="*"&&b.all)?b.all:b.getElementsByTagName(o);for(f=d=0;f<e.length;f++){if(l.test(e[f].getAttribute(j))||(j=="class"&&l.test(e[f].className))){n[d++]=e[f];}}if(n.length>0){return n;}return[];};pixel.fireAnalyze=function(g){var b=("https:"==document.location.protocol?"https://us-pl":"http://us-pl")+".vizury.com/analyze/analyze.php";var d=pixel.cookieDomain;var f=("https:"==document.location.protocol?"https://ssl":"http://www")+".vizury.com/analyze/cookieCallback.php?cb="+d;clearInterval(pixel.checkReadyStateOnIntervals);if(!(pixel.pixelFireStatus)){var e=document.createElement("iframe");var c=pixel.vizidCookie("_vz",d);e.src=b+g+"&cb="+c+((pixel.isSafari())?"&csm=2":"");e.scrolling="no";e.width=1;e.height=1;e.marginheight=0;e.marginwidth=0;e.frameborder=0;e.style.display="none";pixel.pixelFireStatus=true;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(e,a);if(e.attachEvent){e.attachEvent("onload",pixel.callBackViz(f));}else{e.onload=pixel.callBackViz(f);}}};pixel.detectCampaign=function(){var a="VIZVRM5068";var b=document.URL;if((true)){a="VIZVRM5068";}return a;};pixel.initialize=function(c){var d=document.URL;var f=document.referrer;pixel.paramArray.URL=d;pixel.paramArray.referrer=f?f:"";pixel.paramArray.ts=pixel.selectTrafficSource(f);pixel.paramArray.fp34=pixel.getMd5(pixel.getCookie("_ga"));if(c=="VIZVRM5068"){pixel.paramArray.account_id=c;pixel.paramArray.param="e000";pixel.paramArray.section=1;pixel.paramArray.level=1;pixel.segmentConfig={e500:{pageType:["getTrackEvent","udf","","","(.*)","","",""]},e400:{pageType:["getTrackEvent","udf","","","(.*)","","",""]},e300:{pageType:["dataLayer[0].trackPage","jsvariable","","","(.*)","","",""],pageType_Z1:["getTrackEvent","udf","","","(.*)","","",""]},e200:{pageType:["dataLayer[0].trackPage","jsvariable","","","(.*)","","",""],pageType_Z1:["getTrackEvent","udf","","","(.*)","","",""]},e100:{pageType:["dataLayer[1].trackPage","jsvariable","","","(.*)","","",""]}};pixel.getSegParams();pixel.extraParams=[];pixel.cookieDomain=".olx.co.za";pixel.domainList=[".olx.co.za"];if(pixel.selectDomain){pixel.selectDomain();}pixel.clickTrackers="";var a={pid1:["pixel.vizData.item_id","jsvariable","","","(.*)","","",""],catid1:["pixel.vizData.category_level1_name","jsvariable","","","(.*)","","",""],pageType:["getTrackEvent","udf","","","(.*)","","",""]};var e={pid1:["pixel.vizData.item_id","jsvariable","","","(.*)","","",""],pid1_Z1:["chat\\/new\\/(\\d+)","url","i","regex","(.*)","","",""],pageType:["getTrackEvent","udf","","","(.*)","","",""]};var h={pid:["dataLayer[0].item_id","jsvariable","","","(.*)","","",""],pid_Z1:["pixel.vizData.item_id","jsvariable","","","(.*)","","",""],pname:['//*[@id="container"]/main/div/div/div[3]/section[2]/div/div/section/h1',"xpath","","","(.*)","","",""],pname_Z1:['//*[@id="container"]/ul/li[4]/a',"xpath","","","(.*)","","",""],pname_Z2:['//*[@id="container"]/ul/li[5]/a',"xpath","","","(.*)","","",""],lp:["(.*)","url","i","regex","(.*)","","",""],image:['//*[@id="container"]/main/div/div/div[2]/section[1]/div[1]/div/div/div[2]/div/figure/img',"xpath","src","","(.*)","","",""],image_Z1:['//*[@id="container"]/main/div/div/div[2]/section[1]/div/div/div/div/div/figure/img',"xpath","src","","(.*)","","",""],image_Z2:['//*[@id="container"]/main/div/div/div[2]/section[1]/div[1]/div/div/div[2]/div/figure/img',"xpath","src","","(.*)","","",""],catname:["dataLayer[0].category_level1_name","jsvariable","","","(.*)","","",""],catname_Z1:["pixel.vizData.category_level1_name","jsvariable","","","(.*)","","",""],catid:["dataLayer[0].category_level1_name","jsvariable","","","(.*)","","",""],catid_Z1:["pixel.vizData.category_level1_name","jsvariable","","","(.*)","","",""],"new":['//*[@id="container"]/main/div/div/div[3]/section[2]/div/div/section/span',"xpath","","","(.*)","","",""],old:['//*[@id="container"]/main/div/div/div[3]/section[2]/div/div/section/span',"xpath","","","(.*)","","",""],subcat1id:["dataLayer[0].category_level2_name","jsvariable","","","(.*)","","",""],subcat1id_Z1:["pixel.vizData.category_level2_name","jsvariable","","","(.*)","","",""],subcat1name:["dataLayer[0].category_level2_name","jsvariable","","","(.*)","","",""],subcat1name_Z1:["pixel.vizData.category_level2_name","jsvariable","","","(.*)","","",""],std_catid:["dataLayer[0].category_level1_name","jsvariable","","","(.*)","","",""],std_catid_Z1:["pixel.vizData.category_level1_name","jsvariable","","","(.*)","","",""],std_subcat1id:["dataLayer[0].category_level2_name","jsvariable","","","(.*)","","",""],std_subcat1id_Z1:["pixel.vizData.category_level2_name","jsvariable","","","(.*)","","",""],pageType:["dataLayer[0].trackPage","jsvariable","","","(.*)","","",""],pageType_Z1:["getTrackEvent","udf","","","(.*)","","",""]};var b={catid:["dataLayer[0].category_level1_name","jsvariable","","","(.*)","","",""],subcat1id:["dataLayer[0].category_level2_name","jsvariable","","","(.*)","","",""],pageType:["dataLayer[0].trackPage","jsvariable","","","(.*)","","",""],pageType_Z1:["getTrackEvent","udf","","","(.*)","","",""]};var g={pageType:["dataLayer[1].trackPage","jsvariable","","","(.*)","","",""]};if(pixel.segParams.e500["subcat1id"]!=undefined&&pixel.segParams.e500["subcat1id"]!=""&&pixel.segParams.e500["catid"]!=undefined&&pixel.segParams.e500["catid"]!=""){pixel.segParams.e500["subcat1id"]=pixel.segParams.e500["catid"]+"_"+pixel.segParams.e500["subcat1id"];}if(pixel.segParams.e500["subcat2id"]!=undefined&&pixel.segParams.e500["subcat2id"]!=""&&pixel.segParams.e500["catid"]!=undefined&&pixel.segParams.e500["catid"]!=""&&pixel.segParams.e500["subcat1id"]!=undefined&&pixel.segParams.e500["subcat1id"]!=""){pixel.segParams.e500["subcat2id"]=pixel.segParams.e500["subcat1id"]+"_"+pixel.segParams.e500["subcat2id"];}if(pixel.segParams.e400["subcat1id"]!=undefined&&pixel.segParams.e400["subcat1id"]!=""&&pixel.segParams.e400["catid"]!=undefined&&pixel.segParams.e400["catid"]!=""){pixel.segParams.e400["subcat1id"]=pixel.segParams.e400["catid"]+"_"+pixel.segParams.e400["subcat1id"];}if(pixel.segParams.e400["subcat2id"]!=undefined&&pixel.segParams.e400["subcat2id"]!=""&&pixel.segParams.e400["catid"]!=undefined&&pixel.segParams.e400["catid"]!=""&&pixel.segParams.e400["subcat1id"]!=undefined&&pixel.segParams.e400["subcat1id"]!=""){pixel.segParams.e400["subcat2id"]=pixel.segParams.e400["subcat1id"]+"_"+pixel.segParams.e400["subcat2id"];}if(pixel.segParams.e300["subcat1id"]!=undefined&&pixel.segParams.e300["subcat1id"]!=""&&pixel.segParams.e300["catid"]!=undefined&&pixel.segParams.e300["catid"]!=""){pixel.segParams.e300["subcat1id"]=pixel.segParams.e300["catid"]+"_"+pixel.segParams.e300["subcat1id"];}if(pixel.segParams.e300["subcat2id"]!=undefined&&pixel.segParams.e300["subcat2id"]!=""&&pixel.segParams.e300["catid"]!=undefined&&pixel.segParams.e300["catid"]!=""&&pixel.segParams.e300["subcat1id"]!=undefined&&pixel.segParams.e300["subcat1id"]!=""){pixel.segParams.e300["subcat2id"]=pixel.segParams.e300["subcat1id"]+"_"+pixel.segParams.e300["subcat2id"];}if(pixel.segParams.e200["subcat1id"]!=undefined&&pixel.segParams.e200["subcat1id"]!=""&&pixel.segParams.e200["catid"]!=undefined&&pixel.segParams.e200["catid"]!=""){pixel.segParams.e200["subcat1id"]=pixel.segParams.e200["catid"]+"_"+pixel.segParams.e200["subcat1id"];}if(pixel.segParams.e200["subcat2id"]!=undefined&&pixel.segParams.e200["subcat2id"]!=""&&pixel.segParams.e200["catid"]!=undefined&&pixel.segParams.e200["catid"]!=""&&pixel.segParams.e200["subcat1id"]!=undefined&&pixel.segParams.e200["subcat1id"]!=""){pixel.segParams.e200["subcat2id"]=pixel.segParams.e200["subcat1id"]+"_"+pixel.segParams.e200["subcat2id"];}if(pixel.segParams.e100["subcat1id"]!=undefined&&pixel.segParams.e100["subcat1id"]!=""&&pixel.segParams.e100["catid"]!=undefined&&pixel.segParams.e100["catid"]!=""){pixel.segParams.e100["subcat1id"]=pixel.segParams.e100["catid"]+"_"+pixel.segParams.e100["subcat1id"];}if(pixel.segParams.e100["subcat2id"]!=undefined&&pixel.segParams.e100["subcat2id"]!=""&&pixel.segParams.e100["catid"]!=undefined&&pixel.segParams.e100["catid"]!=""&&pixel.segParams.e100["subcat1id"]!=undefined&&pixel.segParams.e100["subcat1id"]!=""){pixel.segParams.e100["subcat2id"]=pixel.segParams.e100["subcat1id"]+"_"+pixel.segParams.e100["subcat2id"];}if(((pixel.matches(pixel.segParams.e500["pageType"],"i","item_tap_call|successful_reply")))){pixel.pixelConfig=a;pixel.paramArray.param="e500";}else{if(((pixel.matches(pixel.segParams.e400["pageType"],"i","chat_inbox|login_show")))){pixel.pixelConfig=e;pixel.paramArray.param="e400";}else{if(((pixel.matches(pixel.segParams.e300["pageType"],"i","view_item")))){pixel.pixelConfig=h;pixel.paramArray.param="e300";}else{if(((pixel.matches(pixel.segParams.e200["pageType"],"i","view_listings")))){pixel.pixelConfig=b;pixel.paramArray.param="e200";}else{if(((pixel.matches(pixel.segParams.e100["pageType"],"i","home")))){pixel.pixelConfig=g;pixel.paramArray.param="e100";}}}}}}};pixel.callBackViz=function(c){c=(pixel.isSafari())?(c+"&sf=y"):c;var a=document.getElementsByTagName("script")[0];var b=document.createElement("script");b.type="text/javascript";b.src=c;b.async=true;a.parentNode.insertBefore(b,a);};pixel.vizidCookie=function(b,c){var a=pixel.getCookie(b);if(!a){a=pixel.generateVizCookie();pixel.setCookie(b,a,365,c);}return a;};pixel.generateVizCookie=function(){var d=pixel.isSafari()?"vizSF_":"viz_";var a=7418186;var e=parseInt(new Date().getTime()/1000,10).toString(16);var c=(Math.floor(Math.random()*a)).toString(16);while(c.length<5){c=c+(Math.floor(Math.random()*a)).toString(16);}c=c.slice(c.length-5);var b=d+e+c;return b;};pixel.setCookie=function(b,f,c,e){var a=e?("; domain="+e):"";if(c>0){var g=new Date();g.setDate(g.getDate()+c);var d=encodeURIComponent(f)+((c==null)?"":"; expires="+g.toUTCString())+"; path=/"+a;document.cookie=b+"="+d;}else{document.cookie=b+"="+encodeURIComponent(f);}};pixel.isSafari=function(){return Object.prototype.toString.call(window.HTMLElement).indexOf("Constructor")>0||(function(a){return a.toString()==="[object SafariRemoteNotification]";})(!window.safari||safari.pushNotification);};pixel.finalize=function(a){if(a=="VIZVRM5068"){if(pixel.paramArray["new"]){pixel.paramArray["new"]=pixel.paramArray["new"].replace(/\s/g,"").replace(/[^0-9.,]/g,"");}if(pixel.paramArray.old){pixel.paramArray.old=pixel.paramArray.old.replace(/\s/g,"").replace(/[^0-9.,]/g,"");}if(pixel.paramArray.subcat1id!=undefined&&pixel.paramArray.subcat1id!=""&&pixel.paramArray.catid!=undefined&&pixel.paramArray.catid!=""){pixel.paramArray.subcat1id=pixel.paramArray.catid+"_"+pixel.paramArray.subcat1id;}if(pixel.paramArray.subcat2id!=undefined&&pixel.paramArray.subcat2id!=""&&pixel.paramArray.catid!=undefined&&pixel.paramArray.catid!=""&&pixel.paramArray.subcat1id!=undefined&&pixel.paramArray.subcat1id!=""){pixel.paramArray.subcat2id=pixel.paramArray.subcat1id+"_"+pixel.paramArray.subcat2id;}if(pixel.paramArray.param=="e500"){pixel.paramArray.section=1;pixel.paramArray.level=1;}else{if(pixel.paramArray.param=="e400"){pixel.paramArray.section=1;pixel.paramArray.level=1;}else{if(pixel.paramArray.param=="e300"){pixel.paramArray.section=1;pixel.paramArray.level=1;}else{if(pixel.paramArray.param=="e200"){pixel.paramArray.section=1;pixel.paramArray.level=1;}else{if(pixel.paramArray.param=="e100"){pixel.paramArray.section=1;pixel.paramArray.level=1;}}}}}}};if(typeof pixel!=="undefined"&&pixel&&typeof pixel.parse!=="undefined"){pixel.pixelFireStatus=false;pixel.checkReadyStateOnIntervals=null;pixel.paramArray=[];pixel.segParams=[];pixel.parse();}