var xmlHttp;                        //���ڱ���XMLHttpRequest�����ȫ�ֱ���
var lastId = 0;                     //���ڱ�������ȡ�Ķ������
var newMsgTimer;                    //���ڱ���ˢ����Ϣ��ʱ��

//���ڴ���XMLHttpRequest����
function createXmlHttp() {
    //����window.XMLHttpRequest�����Ƿ����ʹ�ò�ͬ�Ĵ�����ʽ
    if (window.XMLHttpRequest) {
       xmlHttp = new XMLHttpRequest();                  //FireFox��Opera�������֧�ֵĴ�����ʽ
    } else {
       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");//IE�����֧�ֵĴ�����ʽ
    }
}

//��ȡ���¶���
function getNewMessage() {
    createXmlHttp();                                                //����XMLHttpRequest����
    xmlHttp.onreadystatechange = writeNewMessage;                   //���ûص�����
    xmlHttp.open("POST", "chatroom.php", true);                     //����POST����
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("action=get&lastId=" + lastId);
}

//��ȡ����
function getNewMessages() {
    createXmlHttp();                                                //����XMLHttpRequest����
    xmlHttp.onreadystatechange = writeNewMessage;                   //���ûص�����
    xmlHttp.open("POST", "chatroom.php", true);                     //����POST����
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("action=init&lastId=" + lastId);
}

//�����������ص����¶���д��ҳ��
function writeNewMessage(newMsg) {
    if (xmlHttp.readyState == 4) {
        var msgDiv = document.getElementById("msgDiv");             //��ȡ������Ϣdiv
        var newMsgObj = eval("("+xmlHttp.responseText+")");         //������������ӦΪJSON��ʽ
        //alert(newMsgObj);
        //����󶩵���Ŵ��ڵ�ǰlastIdʱ����ҳ��д��������
        if (newMsgObj.lastId > lastId) {
            lastId = newMsgObj.lastId;                              //����lastId
            msgDiv.innerHTML += newMsgObj.msg;                      //׷��������
            msgDiv.scrollTop = msgDiv.scrollHeight;                 //����div���ݵ��ײ�
//            msgDiv.scrollTop =0;
        }
        newMsgTimer = setTimeout("getNewMessage();", 5000);         //1����ȡ�¶���
    }
}