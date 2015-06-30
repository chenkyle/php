/*
 * 省，市，区级联显示
 */
var xmlHttp;        //用于保存XMLHttpRequest对象的全局变量
var targetSelId;    //用于保存要更新选项的列表id
var selArray;       //用于保存级联菜单id的数组

//用于创建XMLHttpRequest对象
function createXmlHttp() {
    //根据window.XMLHttpRequest对象是否存在使用不同的创建方式
    if (window.XMLHttpRequest) {
       xmlHttp = new XMLHttpRequest();                  //FireFox、Opera等浏览器支持的创建方式
    } else {
       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");//IE浏览器支持的创建方式
    }
}

//获取列表选项的调用函数
function buildSelect(selectedId, targetId,tb) {
    if (selectedId == "") {                             //selectedId为空串表示选中了默认项
        clearSubSel(targetId);                          //清除目标列表及下级列表中的选项
        return;                                         //直接结束函数调用，不必向服务器请求信息
    }
    targetSelId = targetId;                             //将传入的目标列表id赋值给targetSelId变量
    createXmlHttp();                                    //创建XmlHttpRequest对象
    xmlHttp.onreadystatechange = buildSelectCallBack;   //设置回调函数
    xmlHttp.open("GET", "select_menu.php?selectedId=" + selectedId+"&tb="+tb, true);
    xmlHttp.send(null);
}

//获取列表选项的回调函数
function buildSelectCallBack() {
    if (xmlHttp.readyState == 4) {
        var optionsInfo = eval("("+xmlHttp.responseText+")");           //将从服务器获得的文本转为对象直接量
        //alert(optionsInfo);
        var targetSelNode = document.getElementById(targetSelId);
        clearSubSel(targetSelId);                                    //清除目标列表中的选项
        //遍历对象直接量中的成员
        for (var o in optionsInfo) {
            targetSelNode.appendChild(createOption(o, optionsInfo[o])); //在目标列表追加新的选项
        }
    }
}

//根据传入的value和text创建选项
function createOption(value, text) {
     var opt = document.createElement("option");                        //创建一个option节点
     opt.setAttribute("value", value);                                  //设置value
     opt.setAttribute("id", value); 
     opt.appendChild(document.createTextNode(text));                    //给节点加入文本信息
     return opt;
}

//清除传入的列表节点内所有选项
function clearOptions(selNode) {
	selNode.length = 1;                                                 //设置列表长度为1，仅保留默认选项
	selNode.options[0].selected = true;                                 //选中默认选项
}

//初始化列表数组（按等级）
function initSelArray() {
    selArray = arguments;                                               //arguments对象包含了传入的所有参数
}

//清除下级子列表选项
function clearSubSel(targetId) {
    var canClear = false;                                               //设置清除开关，初始值为假
    for (var i=0; i<selArray.length; i++) {                             //遍历列表数组
        if (selArray[i]==targetId) {                                    //当遍历至目标列表时，打开清除开关
            canClear = true;
        }
        if (canClear) {                                                 //从目标列表开始到最下级列表结束，开关始终保持打开
            clearOptions(document.getElementById(selArray[i]));         //清除该级列表选项
        }
    }
}