var xmlHttp;                        //���ڱ���XMLHttpRequest�����ȫ�ֱ���
var userName;                       //���ڱ��浱ǰ��¼�û���
var lastId = 0;                     //���ڱ�������ȡ�������¼���
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

//�����û���¼
function login() {
    userName = document.getElementById("userName").value;           //�����û���¼��

    //�û�δ����ʱ������ʾ
    if (userName=="") {
        alert("�����������ǳơ�");
    } else {
        document.getElementById("loginDiv").style.display = "none"; //���ص�¼div
        document.getElementById("chatDiv").style.display = "";      //��ʾ����div
        getNewMessage();                                            //��ȡ����Ϣ
    }
}

//�û�����
function sendMessage() {
    var msg = document.getElementById("msg").value;                 //��ȡ�û���������

    //������Ϊ��ʱ����ʾ�û�
    if (msg == "") {
        alert("���Բ���Ϊ�ա�");
    } else {
        document.getElementById("msg").value = "";                  //����û�����
        clearInterval(newMsgTimer);                                 //�����ȡ����Ϣ��ʱ��
        createXmlHttp();                                            //����XMLHttpRequest����
        xmlHttp.onreadystatechange = writeNewMessage;               //���ûص�����
        xmlHttp.open("POST", "chatroom.php", true);                 //����POST����
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("action=send" +
                     "&userName=" + encodeURIComponent(userName) + 
                     "&msg=" + encodeURIComponent(msg) +
                     "&lastId=" + lastId);                          //���������û���Ϣ�ͷ�������
    }
}

//��ȡ���·���
function getNewMessage() {
    createXmlHttp();                                                //����XMLHttpRequest����
    xmlHttp.onreadystatechange = writeNewMessage;                   //���ûص�����
    xmlHttp.open("POST", "chatroom.php", true);                     //����POST����
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("action=get&lastId=" + lastId);
}

//�����������ص����·���д��ҳ��
function writeNewMessage(newMsg) {
    if (xmlHttp.readyState == 4) {
        var msgDiv = document.getElementById("msgDiv");             //��ȡ������Ϣdiv
        var newMsgObj = eval("("+xmlHttp.responseText+")");         //������������ӦΪJSON��ʽ

        //������Ա�Ŵ��ڵ�ǰlastIdʱ����ҳ��д��������
        if (newMsgObj.lastId > lastId) {
            lastId = newMsgObj.lastId;                              //����lastId
            msgDiv.innerHTML += newMsgObj.msg;                      //׷��������
            msgDiv.scrollTop = msgDiv.scrollHeight;                 //����div���ݵ��ײ�
        }
        newMsgTimer = setTimeout("getNewMessage();", 1000);         //1����ȡ�·���
    }
}

//�ж��û�����
function checkEnter(evt) {
    var code = evt.keyCode||evt.which;  //����IE��FireFox

    //����û�����س�������sendMessage����
    if (code == 13) {
        sendMessage();
    }
}