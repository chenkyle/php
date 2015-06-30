var xmlHttp;                        //用于保存XMLHttpRequest对象的全局变量
var userName;                       //用于保存当前登录用户名
var lastId = 0;                     //用于保存最后读取的聊天记录编号
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

//聊天用户登录
function login() {
    userName = document.getElementById("userName").value;           //设置用户登录名

    //用户未输入时发出提示
    if (userName=="") {
        alert("请输入您的昵称。");
    } else {
        document.getElementById("loginDiv").style.display = "none"; //隐藏登录div
        document.getElementById("chatDiv").style.display = "";      //显示聊天div
        getNewMessage();                                            //获取新信息
    }
}

//用户发言
function sendMessage() {
    var msg = document.getElementById("msg").value;                 //获取用户发言内容

    //当内容为空时，提示用户
    if (msg == "") {
        alert("发言不可为空。");
    } else {
        document.getElementById("msg").value = "";                  //清除用户发言
        clearInterval(newMsgTimer);                                 //清除获取新消息计时器
        createXmlHttp();                                            //创建XMLHttpRequest对象
        xmlHttp.onreadystatechange = writeNewMessage;               //设置回调函数
        xmlHttp.open("POST", "chatroom.php", true);                 //发送POST请求
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("action=send" +
                     "&userName=" + encodeURIComponent(userName) + 
                     "&msg=" + encodeURIComponent(msg) +
                     "&lastId=" + lastId);                          //参数包含用户信息和发言内容
    }
}

//获取最新发言
function getNewMessage() {
    createXmlHttp();                                                //创建XMLHttpRequest对象
    xmlHttp.onreadystatechange = writeNewMessage;                   //设置回调函数
    xmlHttp.open("POST", "chatroom.php", true);                     //发送POST请求
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("action=get&lastId=" + lastId);
}

//将服务器返回的最新发言写入页面
function writeNewMessage(newMsg) {
    if (xmlHttp.readyState == 4) {
        var msgDiv = document.getElementById("msgDiv");             //获取发言信息div
        var newMsgObj = eval("("+xmlHttp.responseText+")");         //解析服务器响应为JSON格式

        //当最后发言编号大于当前lastId时，在页面写入新内容
        if (newMsgObj.lastId > lastId) {
            lastId = newMsgObj.lastId;                              //更新lastId
            msgDiv.innerHTML += newMsgObj.msg;                      //追加新内容
            msgDiv.scrollTop = msgDiv.scrollHeight;                 //滚动div内容到底部
        }
        newMsgTimer = setTimeout("getNewMessage();", 1000);         //1秒后获取新发言
    }
}

//判断用户输入
function checkEnter(evt) {
    var code = evt.keyCode||evt.which;  //兼容IE和FireFox

    //如果用户输入回车，调用sendMessage函数
    if (code == 13) {
        sendMessage();
    }
}