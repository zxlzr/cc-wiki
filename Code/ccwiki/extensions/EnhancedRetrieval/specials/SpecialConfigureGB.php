<?php
/*
 * Copyright (C) Vulcan Inc.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program.If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * @file
 * @ingroup FS_Special
 *
 * A special page for doing a faceted search on the semantic data in the wiki.
 *
 * @author Thomas Schweitzer
 */

if (!defined('MEDIAWIKI')) die();


global $IP;
require_once( $IP . "/includes/SpecialPage.php" );
$dir = dirname(__FILE__).'/';
require_once( $dir."../includes/FacetedSearch/FS_Settings.php" );


/*
 * Standard class that is responsible for the creation of the Special Page
 */
class SpecialConfigureGB extends SpecialPage {
	
	//--- Constants ---
	
	const SPECIAL_PAGE_HTML = '
<!-- required plugins -->
<script type="text/javascript" src="../extensions/EnhancedRetrieval/src/date.js"></script>

<!-- jquery.datePicker.js -->
<script type="text/javascript" src="../extensions/EnhancedRetrieval/src/jquery.datePicker.js"></script>
	<style>
	.btn_submit1{ width:65px; height:25px; background:url(../extensions/EnhancedRetrieval/src/images/btn_back04.png); border:0; color:#fff; margin-top:3px; vertical-align:middle; margin-right:4px; cursor:pointer;}
	</style>
	 <link type="text/css" rel="stylesheet" href="../extensions/EnhancedRetrieval/src/css/jscal2.css" />
    <link type="text/css" rel="stylesheet" href="../extensions/EnhancedRetrieval/src/css/border-radius.css" />
    <!-- <link type="text/css" rel="stylesheet" href="../extensions/EnhancedRetrieval/src/css/reduce-spacing.css" /> -->

    <link id="skin-win2k" title="Win 2K" type="text/css" rel="alternate stylesheet" href="../extensions/EnhancedRetrieval/src/css/win2k/win2k.css" />
    <link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="../extensions/EnhancedRetrieval/src/css/steel/steel.css" />
    <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../extensions/EnhancedRetrieval/src/css/gold/gold.css" />
    <link id="skin-matrix" title="Matrix" type="text/css" rel="alternate stylesheet" href="../extensions/EnhancedRetrieval/src/css/matrix/matrix.css" />

    <link id="skinhelper-compact" type="text/css" rel="alternate stylesheet" href="../extensions/EnhancedRetrieval/src/css/reduce-spacing.css" />

    <script src="../extensions/EnhancedRetrieval/src/js/jscal2.js"></script>
    <script src="../extensions/EnhancedRetrieval/src/js/unicode-letter.js"></script>


    <script src="../extensions/EnhancedRetrieval/src/js/lang/cn.js"></script>

    <script src="../extensions/EnhancedRetrieval/src/js/lang/en.js"></script>

	<script type="text/javascript" src="../extensions/EnhancedRetrieval/src/jquery-1.3.2.min.js"></script>

<script type="text/javascript"> 


  function request(paras)
    { 
        var url = location.href; 
        var paraString = url.substring(url.indexOf("?")+1,url.length).split("&"); 
        var paraObj = {} ;
        for (i=0; j=paraString[i]; i++){ 
        paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length); 
        } 
        var returnValue = paraObj[paras.toLowerCase()]; 
        if(typeof(returnValue)=="undefined"){ 
        return ""; 
        }else{ 
        return returnValue; 
        } 
    }

$(document).ready(function(){
tmpfrom="";
tmpto="";
 tmpfrom=request("from1");
 tmpto=request("to1");
if(tmpfrom!=""&&tmpto!=""){
var showfrom=tmpfrom.substring(4,6)+"/"+tmpfrom.substring(6,8)+"/"+tmpfrom.substring(0,4)
var showto=tmpto.substring(4,6)+"/"+tmpto.substring(6,8)+"/"+tmpto.substring(0,4)

$("#f_rangeEnd").val(showto);

$("#f_rangeStart").val(showfrom);

}
GolbalState=1;
var pagename=request("pagename");
var city1=request("city1");
var source1=request("source1");
if(city1=="")
{
$("#cityname option:selected").text("==select city==");
}
else{
$("#cityname option:selected").text(decodeURI(city1));

}

source1=decodeURI(source1);
if(source1=="美团"){
$("#meituan").attr("checked",true);


}
if(source1=="拉手"){
$("#lashou").attr("checked",true);


}
if(source1=="窝窝团"){
$("#wowotuan").attr("checked",true);


}
if(source1=="满座"){
$("#manzuo").attr("checked",true);


}

if(source1=="糯米"){
$("#nuomi").attr("checked",true);


}

$("#pagename").val(pagename);

//alert($("xfsResultTitle").text());

$("xfsResultTitle").each(function(){

//alert($(this).html());
/*
var s=$(this).children("td").eq(0).text();
if(s!=""){
var tmp="<input id=\"abc\" type=\"checkbox\"  name=\"checkbox\" value=\""+s+"\"/>选择";
//alert(tmp);

$(this).append(tmp);


} */

}); 




 
	
	
$(".flip").click(function(){
    $(".panel").slideToggle("slow");
  });
  
  
     $("#addtuangou").click(function(){

	

var abc=""; 

 /*

 var t = $(":checkbox:checked").each(function(){
 //alert($(this).val());
      abc = abc+"OR [["+$(this).val()+"]] ";
      
 });
 */
 

   if(GolbalArray.length==0){alert("您什么都没选");return ;}
    for(var i=0;i<GolbalArray.length;i++)
    {
       abc = abc+"OR [["+GolbalArray[i]+"]] ";
	  
    }
abc=abc.substring(3);

alert(abc);

	  website="../index.php/Special:ConfigureGB?state=1&DealAskWhere="+abc+"&pagename="+$("#pagename").val()+"";
	  location=href=website;
   
	 
    })
	
	
	

  
  
  
     $("#btn1").click(function(){

    $("[name=\'checkbox\']").attr("checked",\'true\');//全选
	GolbalArray=GolbalGoupbuy;


  
    })
	   $("#btn2").click(function(){
     
    $("[name=\'checkbox\']").removeAttr("checked");//取消全选
	GolbalArray=null;
  
    })
	
	
	 $("#meituan").click(function(){
  $("#lashou").attr("checked",false);
       $("#wowotuan").attr("checked",false);
	   $("#manzuo").attr("checked",false);
		
   $("#nuomi").attr("checked",false);
   
             	var mgr = FacetedSearch.singleton.FacetedSearchInstance.getAjaxSolrManager();
						mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:满座");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:拉手");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:窝窝团");
				mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:糯米");
			mgr.store.addByValue("fq", "smwh_attributes:smwh_Ontology_0/source_xsdvalue_t");
			   mgr.store.addByValue("fq", "smwh_Ontology_0/source_xsdvalue_s:美团");
		
				mgr.doRequest(0);
   
   
  
    })
	
		 $("#manzuo").click(function(){		 $("#lashou").attr("checked",false);
       $("#wowotuan").attr("checked",false);
	  // $("#manzuo").attr("checked",false);
		

         $("#nuomi").attr("checked",false);
		$("#meituan").attr("checked",false);
		
		   	var mgr = FacetedSearch.singleton.FacetedSearchInstance.getAjaxSolrManager();
		mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:美团");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:拉手");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:窝窝团");
				mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:糯米");
		
			mgr.store.addByValue("fq", "smwh_attributes:smwh_Ontology_0/source_xsdvalue_t");
			   mgr.store.addByValue("fq", "smwh_Ontology_0/source_xsdvalue_s:满座");
		 
		

				mgr.doRequest(0);
		 
		 
		 
		 })
		 		 $("#wowotuan").click(function(){
				 	 $("#lashou").attr("checked",false);
      // $("#wowotuan").attr("checked",false);
	   $("#manzuo").attr("checked",false);
		

         $("#nuomi").attr("checked",false);
		$("#meituan").attr("checked",false);
   	var mgr = FacetedSearch.singleton.FacetedSearchInstance.getAjaxSolrManager();
	mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:满座");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:拉手");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:美团");
				mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:糯米");
			mgr.store.addByValue("fq", "smwh_attributes:smwh_Ontology_0/source_xsdvalue_t");
			   mgr.store.addByValue("fq", "smwh_Ontology_0/source_xsdvalue_s:窝窝团");
		    
		

				mgr.doRequest(0);
		 
		 
		 
		 })
		 	 $("#nuomi").click(function(){
			     $("#lashou").attr("checked",false);
        $("#wowotuan").attr("checked",false);
	    $("#manzuo").attr("checked",false);
		

        // $("#nuomi").attr("checked",false);
		$("#meituan").attr("checked",false);
   	var mgr = FacetedSearch.singleton.FacetedSearchInstance.getAjaxSolrManager();
	mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:满座");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:拉手");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:窝窝团");
				mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:美团");
			mgr.store.addByValue("fq", "smwh_attributes:smwh_Ontology_0/source_xsdvalue_t");
			   mgr.store.addByValue("fq", "smwh_Ontology_0/source_xsdvalue_s:糯米");
		
		

				mgr.doRequest(0);
		 
		 
		 })
		
	 $("#lashou").click(function(){
	   //$("#lashou").attr("checked",false);
       $("#wowotuan").attr("checked",false);
	   $("#manzuo").attr("checked",false);
		

         $("#nuomi").attr("checked",false);
		$("#meituan").attr("checked",false);
   	var mgr = FacetedSearch.singleton.FacetedSearchInstance.getAjaxSolrManager();
			mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:满座");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:美团");
					mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:窝窝团");
				mgr.store.removeByValue("fq","smwh_Ontology_0/source_xsdvalue_s:糯米");
			mgr.store.addByValue("fq", "smwh_attributes:smwh_Ontology_0/source_xsdvalue_t");
			   mgr.store.addByValue("fq", "smwh_Ontology_0/source_xsdvalue_s:拉手");
		  
		

				mgr.doRequest(0);
  
  
    })
	
	
	
	
	
	//筛选
	
		 
		
});


function changeall(){
var city="";



 city=$("#cityname option:selected").text();
 if(city=="==select city=="){
 city="";
 }

var source="";
;
 if($("#meituan").attr("checked")==true)
	  {
	source="美团";
	  }
    else if($("#lashou").attr("checked")==true)
	  {
	source="拉手";
	  }
	  else if($("#wowotuan").attr("checked")==true)
	  {
	source="窝窝团";
	  }
	   else if($("#manzuo").attr("checked")==true)
	  {
	source="满座";
	  }
	    else if($("#nuomi").attr("checked")==true)
	  {
	source="糯米";
	  }

	  if(tmpfrom!=""&&tmpto!="")
	  {
	  //alert("aa");
	  if(city==""&&source=="")
{

 var ddurl="../index.php/Special:ConfigureGB?from="+tmpfrom+"&to="+tmpto+"&pagename="+$("#pagename").val();
 	

	 
location.href=ddurl;
}

if((city!="")&&(source==""))
{  var ddurl="../index.php/Special:ConfigureGB?from="+tmpfrom+"&to="+tmpto+"&city="+city+"&pagename="+$("#pagename").val();
 	

	 
location.href=ddurl;
}

if(city==""&&source!="")
{ddurl="../index.php/Special:ConfigureGB?from="+tmpfrom+"&to="+tmpto+"&source="+source+"&pagename="+$("#pagename").val()+"";
location.href=ddurl;
}
 if(city!=""&&source!="")
{
ddurl="../index.php/Special:ConfigureGB?from="+tmpfrom+"&to="+tmpto+"&city="+city+"&source="+source+"&pagename="+$("#pagename").val()+"";
location.href=ddurl;
}
	  
	  
	  
	  
	  }
	  else {
	  
	  
	  
if(city==""&&source=="")
{
}

if((city!="")&&(source==""))
{  var ddurl="../index.php/Special:ConfigureGB?city="+city+"&pagename="+$("#pagename").val();
 	

	 
location.href=ddurl;
}

if(city==""&&source!="")
{ddurl="../index.php/Special:ConfigureGB?source="+source+"&pagename="+$("#pagename").val()+"";
location.href=ddurl;
}
 if(city!=""&&source!="")
{
ddurl="../index.php/Special:ConfigureGB?city="+city+"&source="+source+"&pagename="+$("#pagename").val()+"";
location.href=ddurl;
}
	}
}
  Array.prototype.search=function(reg){
	var ta=this.slice(0),d="\0",str=d+ta.join(d)+d,regstr=reg.toString();
	reg=new RegExp(regstr.replace(/\/((.|\n)+)\/.*/g,"\\0$1\\0"),regstr.slice(regstr.lastIndexOf("/")+1));
	t=str.search(reg);if(t==-1)return -1;return str.slice(0,t).replace(/[^\0]/g,"").length;
}
//在数组中获取指定值的元素索引
Array.prototype.getIndexByValue= function(value)
{
    var index = -1;
    for (var i = 0; i < this.length; i++)
    {
        if (this[i] == value)
        {
            index = i;
            break;
        }
    }
    return index;
}
Array.prototype.remove=function(dx)
{
    if(isNaN(dx)||dx>this.length){return false;}
    for(var i=0,n=0;i<this.length;i++)
    {
        if(this[i]!=this[dx])
        {
            this[n++]=this[i]
        }
    }
    this.length-=1
}
   GolbalArray=new Array();
  function savechoosen(textid){

   if(GolbalArray.search("/"+textid.value+"/")!=-1){
   
GolbalArray.remove(GolbalArray.getIndexByValue(textid.value));
 //  alert("删掉");
  }
  else {
  
    GolbalArray.push(textid.value);
	 //alert("新的");
	}
 
  
  
  
  
  
  
  }
  


</script>
<script language="JavaScript">
var subcat = new Array();
subcat[1] = new Array("A","鞍山","鞍山,anshan")
subcat[2] = new Array("A","阿拉善","阿拉善,alashan")
subcat[3] = new Array("A","安庆","安庆,anqing")
subcat[4] = new Array("A","安阳","安阳,anyang")
subcat[5] = new Array("A","阿坝藏族羌族","阿坝藏族羌族,aba")
subcat[6] = new Array("A","安顺","安顺,anshun")
subcat[7] = new Array("A","阿里","阿里,ali")
subcat[8] = new Array("A","安康","安康,ankang")
subcat[9] = new Array("A","阿克苏","阿克苏,akesu")
subcat[10] = new Array("A","克孜勒苏柯尔克孜","克孜勒苏柯尔克孜,artux")
subcat[11] = new Array("A","阿勒泰","阿勒泰,altay")
subcat[12] = new Array("A","澳门","澳门,aomen")
subcat[13] = new Array("B","北京","北京,beijing")
subcat[14] = new Array("B","保定","保定,baoding")
subcat[15] = new Array("B","包头","包头,baotou")
subcat[16] = new Array("B","滨州","滨州,binzhou")
subcat[17] = new Array("B","蚌埠","蚌埠,bengbu")
subcat[18] = new Array("B","宝鸡","宝鸡,baoji")
subcat[19] = new Array("B","巴彦淖尔","巴彦淖尔,bayannaoer")
subcat[20] = new Array("B","本溪","本溪,benxi")
subcat[21] = new Array("B","白山","白山,baishan")
subcat[22] = new Array("B","白城","白城,baicheng")
subcat[23] = new Array("B","北海","北海,beihai")
subcat[24] = new Array("B","百色","百色,baise")
subcat[25] = new Array("B","巴中","巴中,bazhong")
subcat[26] = new Array("B","毕节","毕节,bijie")
subcat[27] = new Array("B","保山","保山,baoshan")
subcat[28] = new Array("B","白银","白银,baiyin")
subcat[29] = new Array("B","亳州","亳州,bozhou")
subcat[30] = new Array("B","博塔拉蒙古","博塔拉蒙古,boertalamongol")
subcat[31] = new Array("B","巴音郭楞蒙古","巴音郭楞蒙古,bayangolmongol")
subcat[32] = new Array("C","长沙","长沙,changsha")
subcat[33] = new Array("C","重庆","重庆,chongqing")
subcat[34] = new Array("C","成都","成都,chengdu")
subcat[35] = new Array("C","长春","长春,changchun")
subcat[36] = new Array("C","常州","常州,changzhou")
subcat[37] = new Array("C","承德","承德,chengde")
subcat[38] = new Array("C","沧州","沧州,cangzhou")
subcat[39] = new Array("C","长治","长治,changzhi")
subcat[40] = new Array("C","赤峰","赤峰,chifeng")
subcat[41] = new Array("C","朝阳","朝阳,chaoyang")
subcat[42] = new Array("C","滁州","滁州,chuzhou")
subcat[43] = new Array("C","巢湖","巢湖,chaohu")
subcat[44] = new Array("C","池州","池州,chizhou")
subcat[45] = new Array("C","郴州","郴州,chenzhou")
subcat[46] = new Array("C","潮州","潮州,chaozhou")
subcat[47] = new Array("C","楚雄","楚雄,chuxiong")
subcat[48] = new Array("C","昌都","昌都,changdu")
subcat[49] = new Array("C","昌吉回族","昌吉回族,changji")
subcat[50] = new Array("C","常德","常德,changde")
subcat[51] = new Array("C","崇左","崇左,chongzuo")
subcat[52] = new Array("C","慈溪","慈溪,cixi")
subcat[53] = new Array("D","大连","大连,dalian")
subcat[54] = new Array("D","东莞","东莞,dongguan")
subcat[55] = new Array("D","大庆","大庆,daqing")
subcat[56] = new Array("D","东营","东营,dongying")
subcat[57] = new Array("D","德州","德州,dezhou")
subcat[58] = new Array("D","大同","大同,datong")
subcat[59] = new Array("D","丹东","丹东,dandong")
subcat[60] = new Array("D","大兴安岭","大兴安岭,daxinganling")
subcat[61] = new Array("D","德阳","德阳,deyang")
subcat[62] = new Array("D","达州","达州,dazhou")
subcat[63] = new Array("D","大理","大理,dali")
subcat[64] = new Array("D","迪庆","迪庆,diqing")
subcat[65] = new Array("D","定西","定西,dingxi")
subcat[66] = new Array("D","德宏","德宏,dehong")
subcat[67] = new Array("E","鄂尔多斯","鄂尔多斯,eerduosi")
subcat[68] = new Array("E","峨眉山","峨眉山,emeishan")
subcat[69] = new Array("F","佛山","佛山,foshan")
subcat[70] = new Array("F","福州","福州,fuzhou")
subcat[71] = new Array("F","抚顺","抚顺,fushun")
subcat[72] = new Array("F","阜新","阜新,fuxin")
subcat[73] = new Array("F","阜阳","阜阳,fuyang")
subcat[74] = new Array("F","抚州","抚州,fuzhou1")
subcat[75] = new Array("F","防城港","防城港,fangchenggang")
subcat[76] = new Array("G","广州","广州,guangzhou")
subcat[77] = new Array("G","桂林","桂林,guilin")
subcat[78] = new Array("G","贵阳","贵阳,guiyang")
subcat[79] = new Array("G","赣州","赣州,ganzhou")
subcat[80] = new Array("G","贵港","贵港,guigang")
subcat[81] = new Array("G","甘南藏族","甘南藏族,gannan")
subcat[82] = new Array("G","果洛藏族","果洛藏族,guoluo")
subcat[83] = new Array("G","固原","固原,guyuan")
subcat[84] = new Array("G","广元","广元,guangyuan")
subcat[85] = new Array("G","广安","广安,guangan")
subcat[86] = new Array("G","甘孜藏族","甘孜藏族,ganzizhou")
subcat[87] = new Array("H","杭州","杭州,hangzhou")
subcat[88] = new Array("H","合肥","合肥,hefei")
subcat[89] = new Array("H","哈尔滨","哈尔滨,haerbin")
subcat[90] = new Array("H","呼和浩特","呼和浩特,hohhot")
subcat[91] = new Array("H","海口","海口,haikou")
subcat[92] = new Array("H","惠州","惠州,huizhou")
subcat[93] = new Array("H","邯郸","邯郸,handan")
subcat[94] = new Array("H","黄石","黄石,huangshi")
subcat[95] = new Array("H","湖州","湖州,huzhou")
subcat[96] = new Array("H","鹤岗","鹤岗,hegang")
subcat[97] = new Array("H","淮安","淮安,huaian")
subcat[98] = new Array("H","衡水","衡水,hengshui")
subcat[99] = new Array("H","呼伦贝尔","呼伦贝尔,hulunbeier")
subcat[100] = new Array("H","葫芦岛","葫芦岛,huludao")
subcat[101] = new Array("H","黑河","黑河,heihe")
subcat[102] = new Array("H","淮南","淮南,huainan")
subcat[103] = new Array("H","淮北","淮北,huaibei")
subcat[104] = new Array("H","鹤壁","鹤壁,hebi")
subcat[105] = new Array("H","衡阳","衡阳,hengyang")
subcat[106] = new Array("H","怀化","怀化,huaihua")
subcat[107] = new Array("H","河源","河源,heyuan")
subcat[108] = new Array("H","贺州","贺州,hezhou")
subcat[109] = new Array("H","河池","河池,hechi")
subcat[110] = new Array("H","红河哈尼族彝族","红河哈尼族彝族,honghe")
subcat[111] = new Array("H","汉中","汉中,hanzhong")
subcat[112] = new Array("H","海东","海东,haidong")
subcat[113] = new Array("H","海北藏族","海北藏族,haibei")
subcat[114] = new Array("H","黄南藏族","黄南藏族,huangnan")
subcat[115] = new Array("H","海西蒙古族藏族","海西蒙古族藏族,haixi")
subcat[116] = new Array("H","哈密","哈密,hami")
subcat[117] = new Array("H","菏泽","菏泽,heze")
subcat[118] = new Array("H","黄山","黄山,huangshan")
subcat[119] = new Array("H","海南藏族","海南藏族,hainantibetan")
subcat[120] = new Array("H","和田","和田,hetian")
subcat[121] = new Array("J","济南","济南,jinan")
subcat[122] = new Array("J","嘉兴","嘉兴,jiaxing")
subcat[123] = new Array("J","金华","金华,jinhua")
subcat[124] = new Array("J","江门","江门,jiangmen")
subcat[125] = new Array("J","济宁","济宁,jining")
subcat[126] = new Array("J","吉林","吉林,jilin")
subcat[127] = new Array("J","晋城","晋城,jincheng")
subcat[128] = new Array("J","晋中","晋中,jinzhong")
subcat[129] = new Array("J","锦州","锦州,jinzhou")
subcat[130] = new Array("J","鸡西","鸡西,jixi")
subcat[131] = new Array("J","佳木斯","佳木斯,jiamusi")
subcat[132] = new Array("J","吉安","吉安,jian")
subcat[133] = new Array("J","焦作","焦作,jiaozuo")
subcat[134] = new Array("J","荆门","荆门,jingmen")
subcat[135] = new Array("J","揭阳","揭阳,jieyang")
subcat[136] = new Array("J","嘉峪关","嘉峪关,jiayuguan")
subcat[137] = new Array("J","金昌","金昌,jinchang")
subcat[138] = new Array("J","酒泉","酒泉,jiuquan")
subcat[139] = new Array("J","景德镇","景德镇,jindezhen")
subcat[140] = new Array("J","九江","九江,jiujiang")
subcat[141] = new Array("K","昆明","昆明,kunming")
subcat[142] = new Array("K","昆山","昆山,kunshan")
subcat[143] = new Array("K","开封","开封,kaifeng")
subcat[144] = new Array("K","克拉玛依","克拉玛依,kelamayi")
subcat[145] = new Array("K","喀什","喀什,kashgar")
subcat[146] = new Array("L","兰州","兰州,lanzhou")
subcat[147] = new Array("L","临沂","临沂,linyi")
subcat[148] = new Array("L","洛阳","洛阳,luoyang")
subcat[149] = new Array("L","连云港","连云港,lianyungang")
subcat[150] = new Array("L","聊城","聊城,liaocheng")
subcat[151] = new Array("L","廊坊","廊坊,langfang")
subcat[152] = new Array("L","柳州","柳州,liuzhou")
subcat[153] = new Array("L","临汾","临汾,linfen")
subcat[154] = new Array("L","吕梁","吕梁,lvliang")
subcat[155] = new Array("L","辽阳","辽阳,liaoyang")
subcat[156] = new Array("L","辽源","辽源,liaoyuan")
subcat[157] = new Array("L","丽水","丽水,lishui")
subcat[158] = new Array("L","六安","六安,liuan")
subcat[159] = new Array("L","龙岩","龙岩,longyan")
subcat[160] = new Array("L","莱芜","莱芜,laiwu")
subcat[161] = new Array("L","漯河","漯河,luohe")
subcat[162] = new Array("L","娄底","娄底,loudi")
subcat[163] = new Array("L","泸州","泸州,luzhou")
subcat[164] = new Array("L","凉山彝族","凉山彝族,liangshan")
subcat[165] = new Array("L","六盘水","六盘水,liupanshui")
subcat[166] = new Array("L","丽江","丽江,lijiang")
subcat[167] = new Array("L","临沧","临沧,lincang")
subcat[168] = new Array("L","拉萨","拉萨,lasa")
subcat[169] = new Array("L","临夏回族","临夏回族,linxia")
subcat[170] = new Array("L","来宾","来宾,laibin")
subcat[171] = new Array("L","陇南","陇南,longnan")
subcat[172] = new Array("L","乐山","乐山,leshan")
subcat[173] = new Array("M","茂名","茂名,maoming")
subcat[174] = new Array("M","牡丹江","牡丹江,mudanjiang")
subcat[175] = new Array("M","马鞍山","马鞍山,maanshan")
subcat[176] = new Array("M","梅州","梅州,meizhou")
subcat[177] = new Array("M","绵阳","绵阳,mianyang")
subcat[178] = new Array("M","眉山","眉山,meishan")
subcat[179] = new Array("N","南京","南京,nanjing")
subcat[180] = new Array("N","宁波","宁波,ningbo")
subcat[181] = new Array("N","南昌","南昌,nanchang")
subcat[182] = new Array("N","南宁","南宁,nanning")
subcat[183] = new Array("N","南通","南通,nantong")
subcat[184] = new Array("N","南阳","南阳,nanyang")
subcat[185] = new Array("N","南平","南平,nanping")
subcat[186] = new Array("N","宁德","宁德,ningde")
subcat[187] = new Array("N","南充","南充,nanchong")
subcat[188] = new Array("N","怒江傈僳族","怒江傈僳族,nujianglisuzu")
subcat[189] = new Array("N","那曲","那曲,naqu")
subcat[190] = new Array("N","林芝","林芝,ningzhi")
subcat[191] = new Array("N","内江","内江,neijiang")
subcat[192] = new Array("P","莆田","莆田,putian")
subcat[193] = new Array("P","盘锦","盘锦,panjin")
subcat[194] = new Array("P","平顶山","平顶山,pingdingshan")
subcat[195] = new Array("P","濮阳","濮阳,puyang")
subcat[196] = new Array("P","攀枝花","攀枝花,panzhihua")
subcat[197] = new Array("P","平凉","平凉,pingliang")
subcat[198] = new Array("P","萍乡","萍乡,pingxiang")
subcat[199] = new Array("P","普洱","普洱,puer")
subcat[200] = new Array("Q","青岛","青岛,qingdao")
subcat[201] = new Array("Q","泉州","泉州,quanzhou")
subcat[202] = new Array("Q","秦皇岛","秦皇岛,qinhuangdao")
subcat[203] = new Array("Q","齐齐哈尔","齐齐哈尔,qiqihar")
subcat[204] = new Array("Q","忻州","忻州,qizhou")
subcat[205] = new Array("Q","七台河","七台河,qitaihe")
subcat[206] = new Array("Q","清远","清远,qingyuan")
subcat[207] = new Array("Q","钦州","钦州,qinzhou")
subcat[208] = new Array("Q","黔西南布依族苗族","黔西南布依族苗族,qianxinan")
subcat[209] = new Array("Q","黔南布依族苗族","黔南布依族苗族,qiannan")
subcat[210] = new Array("Q","曲靖","曲靖,qujing")
subcat[211] = new Array("Q","庆阳","庆阳,qingyang")
subcat[212] = new Array("Q","黔东南苗族侗族","黔东南苗族侗族,qiandongnanmiaodongautonomous")
subcat[213] = new Array("Q","衢州","衢州,quzhou")
subcat[214] = new Array("R","日照","日照,rizhao")
subcat[215] = new Array("R","日喀则","日喀则,rikaze")
subcat[216] = new Array("S","上海","上海,shanghai")
subcat[217] = new Array("S","深圳","深圳,shenzhen")
subcat[218] = new Array("S","苏州","苏州,suzhou")
subcat[219] = new Array("S","沈阳","沈阳,shenyang")
subcat[220] = new Array("S","三亚","三亚,sanya")
subcat[221] = new Array("S","汕头","汕头,shantou")
subcat[222] = new Array("S","石家庄","石家庄,shijiazhuang")
subcat[223] = new Array("S","绍兴","绍兴,shaoxing")
subcat[224] = new Array("S","朔州","朔州,shuozhou")
subcat[225] = new Array("S","四平","四平,siping")
subcat[226] = new Array("S","双鸭山","双鸭山,shuangyashan")
subcat[227] = new Array("S","绥化","绥化,suihua")
subcat[228] = new Array("S","宿迁","宿迁,suqian")
subcat[229] = new Array("S","宿州","宿州,suzhou1")
subcat[230] = new Array("S","三明","三明,sanming")
subcat[231] = new Array("S","上饶","上饶,shangrao")
subcat[232] = new Array("S","三门峡","三门峡,sanmenxia")
subcat[233] = new Array("S","商丘","商丘,shangqiu")
subcat[234] = new Array("S","十堰","十堰,shiyan")
subcat[235] = new Array("S","随州","随州,uizhou")
subcat[236] = new Array("S","邵阳","邵阳,shaoyang")
subcat[237] = new Array("S","韶关","韶关,shaoguan")
subcat[238] = new Array("S","汕尾","汕尾,shanwei")
subcat[239] = new Array("S","遂宁","遂宁,suining")
subcat[240] = new Array("S","山南","山南,shannan")
subcat[241] = new Array("S","石嘴山","石嘴山,shizuishan")
subcat[242] = new Array("S","商洛","商洛,shangluo")
subcat[243] = new Array("S","松原","松原,songyuan")
subcat[244] = new Array("T","天津","天津,tianjin")
subcat[245] = new Array("T","太原","太原,taiyuan")
subcat[246] = new Array("T","唐山","唐山,tangshan")
subcat[247] = new Array("T","台州","台州,taizhou")
subcat[248] = new Array("T","泰州","泰州,taizhoux")
subcat[249] = new Array("T","泰安","泰安,taian")
subcat[250] = new Array("T","通辽","通辽,tongliao")
subcat[251] = new Array("T","铁岭","铁岭,tieling")
subcat[252] = new Array("T","通化","通化,tonghua")
subcat[253] = new Array("T","铜陵","铜陵,tongling")
subcat[254] = new Array("T","铜仁","铜仁,tongren")
subcat[255] = new Array("T","铜川","铜川,tongchuan")
subcat[256] = new Array("T","天水","天水,tianshui")
subcat[257] = new Array("T","吐鲁番","吐鲁番,tulufan")
subcat[258] = new Array("T","塔城","塔城,tacheng")
subcat[259] = new Array("T","塘沽","塘沽,tanggu")
subcat[260] = new Array("W","武汉","武汉,wuhan")
subcat[261] = new Array("W","无锡","无锡,wuxi")
subcat[262] = new Array("W","温州","温州,wenzhou")
subcat[263] = new Array("W","威海","威海,weihai")
subcat[264] = new Array("W","潍坊","潍坊,weifang")
subcat[265] = new Array("W","芜湖","芜湖,wuhu")
subcat[266] = new Array("W","乌海","乌海,wuhai")
subcat[267] = new Array("W","乌兰察布","乌兰察布,wulanchabu")
subcat[268] = new Array("W","梧州","梧州,wuzhou")
subcat[269] = new Array("W","文山壮族苗族","文山壮族苗族,wenshan")
subcat[270] = new Array("W","渭南","渭南,weinan")
subcat[271] = new Array("W","武威","武威,wuwei")
subcat[272] = new Array("W","吴忠","吴忠,wuzhong")
subcat[273] = new Array("W","乌鲁木齐","乌鲁木齐,wulumuqi")
subcat[274] = new Array("X","西安","西安,xian")
subcat[275] = new Array("X","西宁","西宁,xining")
subcat[276] = new Array("X","厦门","厦门,xiamen")
subcat[277] = new Array("X","徐州","徐州,xuzhou")
subcat[278] = new Array("X","湘潭","湘潭,xiangtan")
subcat[279] = new Array("X","许昌","许昌,xuchang")
subcat[280] = new Array("X","咸阳","咸阳,xianyang")
subcat[281] = new Array("X","邢台","邢台,xingtai")
subcat[282] = new Array("X","兴安","兴安,xingan")
subcat[283] = new Array("X","锡林郭勒","锡林郭勒,xilinguole")
subcat[284] = new Array("X","宣城","宣城,xuancheng")
subcat[285] = new Array("X","新余","新余,xinyu")
subcat[286] = new Array("X","新乡","新乡,xinxiang")
subcat[287] = new Array("X","信阳","信阳,xinyang")
subcat[288] = new Array("X","襄樊","襄樊,xiangfan")
subcat[289] = new Array("X","孝感","孝感,xiaogan")
subcat[290] = new Array("X","湘西土家族苗族","湘西土家族苗族,xiangxi")
subcat[291] = new Array("X","西双版纳傣族","西双版纳傣族,xishuangbanna")
subcat[292] = new Array("X","香港","香港,xianggang")
subcat[293] = new Array("Y","银川","银川,yinchuan")
subcat[294] = new Array("Y","烟台","烟台,yantai")
subcat[295] = new Array("Y","盐城","盐城,yancheng")
subcat[296] = new Array("Y","扬州","扬州,yangzhou")
subcat[297] = new Array("Y","宜昌","宜昌,yichang")
subcat[298] = new Array("Y","岳阳","岳阳,yueyang")
subcat[299] = new Array("Y","阳泉","阳泉,yangquan")
subcat[300] = new Array("Y","运城","运城,yuncheng")
subcat[301] = new Array("Y","营口","营口,yingkou")
subcat[302] = new Array("Y","延边朝鲜族","延边朝鲜族,yanbian")
subcat[303] = new Array("Y","伊春","伊春,yichun")
subcat[304] = new Array("Y","鹰潭","鹰潭,yingtan")
subcat[305] = new Array("Y","宜春","宜春,yichun1")
subcat[306] = new Array("Y","益阳","益阳,yiyang")
subcat[307] = new Array("Y","永州","永州,yongzhou")
subcat[308] = new Array("Y","阳江","阳江,yangjiang")
subcat[309] = new Array("Y","云浮","云浮,yunfu")
subcat[310] = new Array("Y","玉林","玉林,yulin1")
subcat[311] = new Array("Y","宜宾","宜宾,yibin")
subcat[312] = new Array("Y","玉溪","玉溪,yuxi")
subcat[313] = new Array("Y","延安","延安,yanan")
subcat[314] = new Array("Y","榆林","榆林,yulin")
subcat[315] = new Array("Y","玉树藏族","玉树藏族,yushu")
subcat[316] = new Array("Y","伊犁哈萨克","伊犁哈萨克,yili")
subcat[317] = new Array("Y","雅安","雅安,yaan")
subcat[318] = new Array("Z","郑州","郑州,zhengzhou")
subcat[319] = new Array("Z","中山","中山,zhongshan")
subcat[320] = new Array("Z","舟山","舟山,zhoushan")
subcat[321] = new Array("Z","镇江","镇江,zhenjiang")
subcat[322] = new Array("Z","淄博","淄博,zibo")
subcat[323] = new Array("Z","漳州","漳州,zhangzhou")
subcat[324] = new Array("Z","株洲","株洲,zhuzhou")
subcat[325] = new Array("Z","湛江","湛江,zhanjiang")
subcat[326] = new Array("Z","枣庄","枣庄,zaozhuang")
subcat[327] = new Array("Z","张家口","张家口,zhangjiakou")
subcat[328] = new Array("Z","周口","周口,zhoukou")
subcat[329] = new Array("Z","驻马店","驻马店,zhumadian")
subcat[330] = new Array("Z","珠海","珠海,zhuhai")
subcat[331] = new Array("Z","肇庆","肇庆,zhaoqing")
subcat[332] = new Array("Z","自贡","自贡,zigong")
subcat[333] = new Array("Z","遵义","遵义,zunyi")
subcat[334] = new Array("Z","昭通","昭通,zhaotong")
subcat[335] = new Array("Z","张掖","张掖,zhangye")
subcat[336] = new Array("Z","张家界","张家界,zhangjiajie")
subcat[337] = new Array("Z","中卫","中卫,zhongwei")
subcat[338] = new Array("Z","资阳","资阳,ziyang")

function changeselect1(locationid)
{

document.form1.city.length = 0;
document.form1.city.options[0] = new Option("==select city ==","");
for (i=1; i<=subcat.length; i++)
{
if (subcat[i][0] == locationid)
{

document.form1.city.options[document.form1.city.length] = new Option(subcat[i][1], subcat[i][2]);}
}
}

function changeselect2(locationid)
{

var cityname1=locationid.value.split(",")[0];
changeall();
}

	  
</script>

 <link href="../extensions/EnhancedRetrieval/src/css/common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../extensions/EnhancedRetrieval/src/css/style.css" type="text/css" />
<link rel="stylesheet" href="../extensions/EnhancedRetrieval/src/css/widget.css" type="text/css" />

<script type="text/javascript" src="../extensions/EnhancedRetrieval/src/js/basic.js"></script>
<script type="text/javascript" src="../extensions/EnhancedRetrieval/src/js/widget.js"></script>
<script type="text/javascript">
$(function(){
	
	$(".sxli li em").toggle(function(){
	$(this).children("img").attr("src","../extensions/EnhancedRetrieval/src/images/array03.png");	
	},function(){
		$(this).children("img").attr("src","../extensions/EnhancedRetrieval/src/images/array02.png");
	});
	$(".sxli li em").click(function(){
		$(this).parent().next("div").toggle();
	});
	
	
	
	$(".show").toggle(function(){
		$(this).val("隐藏属性");
	},function(){
		$(this).val("显示属性");
	});
	$(".show").click(function(){
		$(this).next(".sxtable").toggle();
	});
	$(".maps .hd").click(function(){
		$(this).next(".bd").slideToggle();
	});
	
});
</script>

<div class="fll">
<div class="facets">
  <div class="hd">已选择的种类：</div>
	<div id="selection">
			
			</div>




<div class="interestor">
<div class="hd">
  <p>可选择的种类：</p></div>
<div class="bdd">
<div class="cuti">种类</div>
	<div id="field_categories1">
	<div><img src="/ccwiki/extensions/EnhancedRetrieval/skin/images/item.png"><span class="addFacet"><a href="#">团购</a> <span class="xfsMinor"></span></span></div>

			</div>


<div class="cuti">属性</div>
	<div id="field_properties">
			</div>

</div>

</div>

</div>
</div>

<div class="frr">
<div class="frtitle">
	<h2>团购全部页面</h2>
	
</div>
<div class="searchbox">
<div class="searchbox2">



<div class="searchb">

  	<input type="text" id="query" name="query"  class="slk" /><input type="image" id="search_button" name="search" src="../extensions/EnhancedRetrieval/src/images/search_btn03.gif" />
 <div class="fr lh30">
  	排序方式： <select id="search_order" name="search_order" size="1">
  	   					
  	  <option value="relevance">Relevance</option>
  	   					
  	  <option value="newest" selected="selected">Latest article first</option>
  	   					
  	  <option value="oldest">Oldest article first</option>
  	   					
  	  <option value="ascending">Title ascending</option>
  	   					
  	  <option value="descending">Title descending</option>
  	   				
  	</select>
  </div>
</div>


<div  class="panel">

 <input id="pagename" type="hidden" value=""/><br>
 
 
美团网<input id="meituan" type="radio" /> 拉手网<input id="lashou" type="radio" />
满座网<input id="manzuo" type="radio" />
窝窝团<input id="wowotuan" type="radio" />糯米
<input id="nuomi" type="radio" /><br>
选择城市<form name="form1">
<select name="letter" onChange="changeselect1(this.value)">
<option>==select first letter==</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
<option value="F">F</option>
<option value="G">G</option>
<option value="H">H</option>
<option value="I">I</option>
<option value="G">G</option>
<option value="K">K</option>
<option value="L">L</option>
<option value="M">M</option>
<option value="N">N</option>
<option value="O">O</option>
<option value="P">P</option>
<option value="Q">Q</option>
<option value="R">R</option>
<option value="S">S</option>
<option value="T">T</option>
<option value="U">U</option>
<option value="V">V</option>
<option value="W">W</option>
<option value="X">X</option>
<option value="Y">Y</option>
<option value="Z">Z</option>
</select>
<select name="city" id="cityname" onChange="changeselect2(this)">
<option>==select city==</option>
</select>
</form>
</form><br>
            <br>
              起始时间:
          
        
                <input id="f_rangeStart" />
                <button id="f_rangeStart_trigger">...</button>
                <button id="f_clearRangeStart" onclick="clearRangeStart()">清除</button>
                <script type="text/javascript">
                  RANGE_CAL_1 = new Calendar({
                          inputField: "f_rangeStart",
                          dateFormat: "%B %d, %Y",
                          trigger: "f_rangeStart_trigger",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
								   var date = Calendar.intToDate(this.selection.get());
							
								tmpfrom=this.selection.print("%Y%m%d");
								tmpfrom=tmpfrom+"000000"
									if(tmpto!="")
								  {changeall();
								  }
                                  LEFT_CAL.args.min = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                  function clearRangeStart() {
                          document.getElementById("f_rangeStart").value = "";
                          LEFT_CAL.args.min = null;
                          LEFT_CAL.redraw();
                  };
                </script>
             <br>
           截止时间:
             
                <input id="f_rangeEnd" />
                <button id="f_rangeEnd_trigger">...</button>
                <button id="f_clearRangeEnd" onclick="clearRangeEnd()">清除</button>
                <script type="text/javascript">
                  RANGE_CAL_2 = new Calendar({
                          inputField: "f_rangeEnd",
                          dateFormat: "%Y%m%d",
                          trigger: "f_rangeEnd_trigger",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
								tmpto=this.selection.print("%Y%m%d");
								tmpto=tmpto+"245959"
								if(tmpfrom!="")
								  {changeall();
								  }
                                  LEFT_CAL.args.max = date;
								     
                                  LEFT_CAL.redraw();
								
                                  this.hide();
                          }
                  });
				  
				  
                  function clearRangeEnd() {
                          document.getElementById("f_rangeEnd").value = "";
                          LEFT_CAL.args.max = null;
                          LEFT_CAL.redraw();
                  };
                </script>
			  <br>
			<input name="" type="button" value="完成" class="btn_submit1" id="addtuangou"/>&nbsp;&nbsp;<input name="" type="button" value="全选" class="btn_submit1" id="btn1"/>&nbsp;&nbsp;<input name="" type="button" value="取消全选" class="btn_submit1" id="btn2"/>
			 
			 </div>






<div id="create_article"/>
		</div>
		<hr class="xfsSeparatorLine">
		<div id="navigation">
			<div id="pager-header"></div>
		</div>

		<div id="docs">
			{{fs_search_results}}
		</div>
		<div id="xfsFooter">
			<ul id="pager"></ul>
		</div>
	</div>
</div>
<div class="xfsCurrentSearchLink">
	<hr class="xfsSeparatorLine">
	<div id="current_search_link"></div>
</div>










</div>
</div>



</div>
';
		

    public function __construct() {
//        parent::__construct('FacetedSearch');
		parent::__construct('ConfigureGB');
		global $wgHooks;
		$wgHooks['MakeGlobalVariablesScript'][] = "FSFacetedSearchSpecial::addJavaScriptVariables";
    }

    /**
     * Overloaded function that is responsible for the creation of the Special Page
     */
    public function execute($par) {

		global $wgOut, $wgRequest,$pagename;
		
		$wgOut->setPageTitle(wfMsg('团购数据页面名称'));
		
		$search = str_replace( "\n", " ", $wgRequest->getText( 'search', '' ) );
		$website = str_replace( "\n", " ", $wgRequest->getText( 'website', '' ) );
	   $order = str_replace( "\n", " ", $wgRequest->getText( 'order', '' ) );
		  $from = str_replace( "\n", " ", $wgRequest->getText( 'from', '' ) );
		 $to= str_replace( "\n", " ", $wgRequest->getText( 'to', '' ) );
	   $pagename = str_replace( "\n", " ", $wgRequest->getText( 'pagename', '' ) );
	    $state = str_replace( "\n", " ", $wgRequest->getText( 'state', '' ) );
		 $DealAskWhere = str_replace( "\n", " ", $wgRequest->getText( 'DealAskWhere', '' ) );
		 
		     $source = str_replace( "\n", " ", $wgRequest->getText( 'source', '' ) );
			     $city = str_replace( "\n", " ", $wgRequest->getText( 'city', '' ) );
	   if($pagename==""){
	   
	   $pagename="没输入正确pagename页面要跳转";
	   }
	 
	   if($state==1){
	  
	   $_SESSION["DealAskWhere"]=$DealAskWhere;
	
	   
	   $_SESSION["pagename"]=$pagename;
	 header("Location:../extensions/mashupwiki/Interface/MashupPageInterface.php?a=configPage&DealAskWhere=".$DealAskWhere."&pagename=".$pagename."");
	   
	   
	   }
	   
	      $fssearch = str_replace( "\n", " ", $wgRequest->getText( 'fssearch', '' ) );
		
		
		
	   if($fssearch==null)
	   {    
	      if($from!=null&&$to!=null){
		  
		   
		 if($city==null&&$source==null){
		   echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?from1='.$from.'&to1='.$to.'&fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&fq=smwh_attributes:smwh_Ontology_0/timestamp_xsdvalue_dt&fq=smwh_Ontology_0/timestamp_datevalue_l:['.$from.' TO '.$to.']&pagename='.$pagename.'"';
		    echo "</script>";
		
	
		}
		else if($city==null&&$source!=null){
	        echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?from1='.$from.'&to1='.$to.'&source1='.$source.'&fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&fq=smwh_attributes:smwh_Ontology_0/timestamp_xsdvalue_dt&fq=smwh_Ontology_0/timestamp_datevalue_l:['.$from.' TO '.$to.']&fq=smwh_attributes:smwh_Ontology_0/source_xsdvalue_t&fq=smwh_Ontology_0/source_xsdvalue_s:'.$source.'&pagename='.$pagename.'"';
		    echo "</script>";
			
			
			}
			
		else if($city!=null&&$source==null){
	           echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?from1='.$from.'&to1='.$to.'&city1='.$city.'&fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&fq=smwh_attributes:smwh_Ontology_0/timestamp_xsdvalue_dt&fq=smwh_Ontology_0/timestamp_datevalue_l:['.$from.' TO '.$to.']&fq=smwh_attributes:smwh_Ontology_0/city_xsdvalue_t&fq=smwh_Ontology_0/city_xsdvalue_s:'.$city.'&pagename='.$pagename.'"';
		    echo "</script>";
			
			
			}
		else if($city!=null&&$source!=null)
		{      echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?from1='.$from.'&to1='.$to.'&city1='.$city.'&source1='.$source.'&fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&fq=smwh_attributes:smwh_Ontology_0/timestamp_xsdvalue_dt&fq=smwh_Ontology_0/timestamp_datevalue_l:['.$from.' TO '.$to.']&fq=smwh_attributes:smwh_Ontology_0/source_xsdvalue_t&fq=smwh_Ontology_0/source_xsdvalue_s:'.$source.'&fq=smwh_attributes:smwh_Ontology_0/city_xsdvalue_t&fq=smwh_Ontology_0/city_xsdvalue_s:'.$city.'&pagename='.$pagename.'"';
		    echo "</script>";
		
		
		}
		  
		  
		  
		  
		  
		  
		  
		  }else
		  {
		  
		  
		  
		 if($city==null&&$source==null){
		   echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&pagename='.$pagename.'"';
		    echo "</script>";
		
	
		}
		else if($city==null&&$source!=null){
	        echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?source1='.$source.'&fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&fq=smwh_attributes:smwh_Ontology_0/source_xsdvalue_t&fq=smwh_Ontology_0/source_xsdvalue_s:'.$source.'&pagename='.$pagename.'"';
		    echo "</script>";
			
			
			}
			
		else if($city!=null&&$source==null){
	           echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?city1='.$city.'&fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&fq=smwh_attributes:smwh_Ontology_0/city_xsdvalue_t&fq=smwh_Ontology_0/city_xsdvalue_s:'.$city.'&pagename='.$pagename.'"';
		    echo "</script>";
			
			
			}
		else if($city!=null&&$source!=null)
		{      echo "<script>";
			echo 'location.href="../index.php/Special:ConfigureGB?city1='.$city.'&source1='.$source.'&fssearch=q=smwh_search_field:&facet=true&facet.field=smwh_categories&facet.field=smwh_attributes&facet.field=smwh_properties&facet.field=smwh_namespace_id&facet.field=smwh_Ontology_0/source_xsdvalue_t&facet.field=smwh_Ontology_0/city_xsdvalue_t&facet.mincount=1&json.nl=map&fl=smwh_Modification_date_xsdvalue_dt,smwh_categories,smwh_attributes,smwh_properties,id,smwh_title,smwh_namespace_id&hl=true&hl.fl=smwh_search_field&hl.simple.pre=<b>&hl.simple.post=</b>&hl.fragsize=250&sort=smwh_Modification_date_xsdvalue_d%20desc&fq=smwh_categories:Ontology_0/Deal&fq=smwh_attributes:smwh_Ontology_0/source_xsdvalue_t&fq=smwh_Ontology_0/source_xsdvalue_s:'.$source.'&fq=smwh_attributes:smwh_Ontology_0/city_xsdvalue_t&fq=smwh_Ontology_0/city_xsdvalue_s:'.$city.'&pagename='.$pagename.'"';
		    echo "</script>";
		
		
		}
		}
			
			}
			
		if ($search === wfMsg('smw_search_this_wiki')) {
			// If the help text of the search field is passed, assume an empty 
			// search string
			$search = '';
		}
		
		$restrict = $wgRequest->getText( 'restrict', '' );
		$specialPageTitle = $wgRequest->getText( 'title', '' );
		$t = Title::newFromText( $search );

		$fulltext = $wgRequest->getVal( 'fulltext', '' );
		$fulltext_x = $wgRequest->getVal( 'fulltext_x', '' );
		if ($fulltext == NULL && $fulltext_x == NULL) {
			
			# If the string cannot be used to create a title
			if(!is_null( $t ) ){

				# If there's an exact or very near match, jump right there.
				$t = SearchEngine::getNearMatch( $search );
				if( !is_null( $t ) ) {
					$wgOut->redirect( $t->getFullURL() );
					return;
				}

				# If just the case is wrong, jump right there.
//				$t = USStore::getStore()->getSingleTitle($search);
//				if (!is_null( $t ) ) {
//					$wgOut->redirect( $t->getFullURL() );
//					return;
//				}
			}
		}
     
		







		// Insert the search term into the input field of the UI
		$html = self::SPECIAL_PAGE_HTML;
		$html = str_replace('{{searchTerm}}', htmlspecialchars($search), $html);
		
		$wgOut->addHTML($this->replaceLanguageStrings($html));
	
		
		$wgOut->addModules('ext.facetedSearch.special');
    }

	/**
	 * Add a global JavaScript variable for the SOLR URL.
	 * @param $vars
	 * 		This array of global variables is enhanced with "wgFSSolrURL"
	 * 		and "wgFSCreateNewPageLink"
	 */
	public static function addJavaScriptVariables(&$vars) {
		global $fsgFacetedSearchConfig, $fsgCreateNewPageLink;
		$servlet = array_key_exists('proxyServlet', $fsgFacetedSearchConfig)
					? $fsgFacetedSearchConfig['proxyServlet']
					: '/solr/select';
		$port = array_key_exists('proxyPort', $fsgFacetedSearchConfig)
					? $fsgFacetedSearchConfig['proxyPort']
					: false;
					
		$solrURL = $fsgFacetedSearchConfig['proxyHost'];
		if ($port) {
			$solrURL .= ':' . $port;
		}
		
		$vars['wgFSSolrURL'] = $solrURL;
		$vars['wgFSSolrServlet'] = $servlet;
		$vars['wgFSCreateNewPageLink'] = $fsgCreateNewPageLink;
		
		return true;
	}
    
	/**
	 * Language dependent identifiers in $text that have the format {{identifier}}
	 * are replaced by the string that corresponds to the identifier.
	 * 
	 * @param string $text
	 * 		Text with language identifiers
	 * @return string
	 * 		Text with replaced language identifiers.
	 */
	private static function replaceLanguageStrings($text) {
		// Find all identifiers
		$numMatches = preg_match_all("/(\{\{(.*?)\}\})/", $text, $identifiers);
		if ($numMatches === 0) {
			return $text;
		}

		// Get all language strings
		$langStrings = array();
		foreach ($identifiers[2] as $id) {
			$langStrings[] = wfMsg($id);
		}
		
		// Replace all language identifiers
		$text = str_replace($identifiers[1], $langStrings, $text);
		return $text;
	}
    
}

