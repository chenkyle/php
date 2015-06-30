/*
 * ʡ���У���������ʾ
 */
var xmlHttp;        //���ڱ���XMLHttpRequest�����ȫ�ֱ���
var targetSelId;    //���ڱ���Ҫ����ѡ����б�id
var selArray;       //���ڱ��漶���˵�id������

//���ڴ���XMLHttpRequest����
function createXmlHttp() {
    //����window.XMLHttpRequest�����Ƿ����ʹ�ò�ͬ�Ĵ�����ʽ
    if (window.XMLHttpRequest) {
       xmlHttp = new XMLHttpRequest();                  //FireFox��Opera�������֧�ֵĴ�����ʽ
    } else {
       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");//IE�����֧�ֵĴ�����ʽ
    }
}

//��ȡ�б�ѡ��ĵ��ú���
function buildSelect(selectedId, targetId,tb) {
    if (selectedId == "") {                             //selectedIdΪ�մ���ʾѡ����Ĭ����
        clearSubSel(targetId);                          //���Ŀ���б��¼��б��е�ѡ��
        return;                                         //ֱ�ӽ����������ã������������������Ϣ
    }
    targetSelId = targetId;                             //�������Ŀ���б�id��ֵ��targetSelId����
    createXmlHttp();                                    //����XmlHttpRequest����
    xmlHttp.onreadystatechange = buildSelectCallBack;   //���ûص�����
    xmlHttp.open("GET", "select_menu.php?selectedId=" + selectedId+"&tb="+tb, true);
    xmlHttp.send(null);
}

//��ȡ�б�ѡ��Ļص�����
function buildSelectCallBack() {
    if (xmlHttp.readyState == 4) {
        var optionsInfo = eval("("+xmlHttp.responseText+")");           //���ӷ�������õ��ı�תΪ����ֱ����
        //alert(optionsInfo);
        var targetSelNode = document.getElementById(targetSelId);
        clearSubSel(targetSelId);                                    //���Ŀ���б��е�ѡ��
        //��������ֱ�����еĳ�Ա
        for (var o in optionsInfo) {
            targetSelNode.appendChild(createOption(o, optionsInfo[o])); //��Ŀ���б�׷���µ�ѡ��
        }
    }
}

//���ݴ����value��text����ѡ��
function createOption(value, text) {
     var opt = document.createElement("option");                        //����һ��option�ڵ�
     opt.setAttribute("value", value);                                  //����value
     opt.setAttribute("id", value); 
     opt.appendChild(document.createTextNode(text));                    //���ڵ�����ı���Ϣ
     return opt;
}

//���������б�ڵ�������ѡ��
function clearOptions(selNode) {
	selNode.length = 1;                                                 //�����б���Ϊ1��������Ĭ��ѡ��
	selNode.options[0].selected = true;                                 //ѡ��Ĭ��ѡ��
}

//��ʼ���б����飨���ȼ���
function initSelArray() {
    selArray = arguments;                                               //arguments��������˴�������в���
}

//����¼����б�ѡ��
function clearSubSel(targetId) {
    var canClear = false;                                               //����������أ���ʼֵΪ��
    for (var i=0; i<selArray.length; i++) {                             //�����б�����
        if (selArray[i]==targetId) {                                    //��������Ŀ���б�ʱ�����������
            canClear = true;
        }
        if (canClear) {                                                 //��Ŀ���б�ʼ�����¼��б����������ʼ�ձ��ִ�
            clearOptions(document.getElementById(selArray[i]));         //����ü��б�ѡ��
        }
    }
}