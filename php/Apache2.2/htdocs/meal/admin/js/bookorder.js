var xmlHttp;                        //用于保存XMLHttpRequest对象的全局变量
var lastId = 0;                     //用于保存最后读取的订单编号
var newMsgTimer;                    //用于保存刷新消息计时器

//用于创建XMLHttpRequest对象
function createXmlHttp() {
    //根据window.XMLHttpRequest对象是否存在使用不同的创建方式
    if (window.XMLHttpRequest) {
       xmlHttp = new XMLHttpRequest();                  //FireFox、Opera等浏览器支持的创建方式
    } else {
       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");//IE浏览器支持的创建方式
    }
}

//获取最新订单
function getNewMessage() {
    createXmlHttp();                                                //创建XMLHttpRequest对象
    xmlHttp.onreadystatechange = writeNewMessage;                   //设置回调函数
    xmlHttp.open("POST", "chatroom.php", true);                     //发送POST请求
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("action=get&lastId=" + lastId);
}

//获取订单
function getNewMessages() {
    createXmlHttp();                                                //创建XMLHttpRequest对象
    xmlHttp.onreadystatechange = writeNewMessage;                   //设置回调函数
    xmlHttp.open("POST", "chatroom.php", true);                     //发送POST请求
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("action=init&lastId=" + lastId);
}

//将服务器返回的最新订单写入页面
function writeNewMessage(newMsg) {
    if (xmlHttp.readyState == 4) {
        var msgDiv = document.getElementById("msgDiv");             //获取订单信息div
        var newMsgObj = eval("("+xmlHttp.responseText+")");         //解析服务器响应为JSON格式
        //alert(newMsgObj);
        //当最后订单编号大于当前lastId时，在页面写入新内容
        if (newMsgObj.lastId > lastId) {
            lastId = newMsgObj.lastId;                              //更新lastId
            msgDiv.innerHTML += newMsgObj.msg;                      //追加新内容
            msgDiv.scrollTop = msgDiv.scrollHeight;                 //滚动div内容到底部
//            msgDiv.scrollTop =0;
        }
        newMsgTimer = setTimeout("getNewMessage();", 5000);         //1秒后获取新订单
    }
}