function eventclick(id){$.get("termine_details5445.html?id="+id,function(data){$.jGrowl(data,{sticky:true});});}
function replace1(value,id){var id1=id;var value1=value;value1=value1.replace(/ /g,'-');value1=value1.replace(/ä/ig,'ae');value1=value1.replace(/ö/ig,'oe');value1=value1.replace(/ü/ig,'ue');value1=value1.replace(/ß/ig,'ss');value1=value1.replace(/\./g,'');value1=value1.replace(/&/g,'und');value1=value1.replace(/&amp;/g,'und');value1=value1.toLowerCase();document.location='/musterhaeuser/hersteller/'+id+'/'+value1+'.html';return true;}
function popup(aussteller){new_win=open('http://www.fertighauswelt.de/german/aussteller/aussteller.html?aussteller='+aussteller+'','popup','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=249,height=400,screenY=250,left=200,top=150');new_win.focus();}
function hideline(idname){}
function hideline2(idname){im=document.getElementById(idname);im.src='%5bRELATIVPFAD%5d/images/tpl/leer.html';}
var MENUname=new Array();var MENUtiefe=new Array();var MENUc=0;function dohide(L){document.getElementById(L).style.visibility="hidden";}
function doshow(L){document.getElementById(L).style.visibility="visible";}
function showMenu(ID,Tiefe){for(i=0;i<MENUc;i++){if(MENUtiefe[i]>Tiefe){dohide(MENUname[i]);}}
for(i=0;i<MENUc;i++){if(MENUname[i]=="XMenu"+ID){doshow(MENUname[i]);break;}}}
var AutoCloseCount=-1;function autoclose(){if(AutoCloseCount>0){AutoCloseCount--;}else if(AutoCloseCount==0){AutoCloseCount=-1;for(i=0;i<MENUc;i++){if(MENUtiefe[i]>1){dohide(MENUname[i]);}}}
setTimeout("autoclose()",400);}
setTimeout("autoclose()",400);function closeMenu(ID,Tiefe){for(i=0;i<MENUc;i++){if(MENUtiefe[i]>Tiefe){dohide(MENUname[i]);}}}