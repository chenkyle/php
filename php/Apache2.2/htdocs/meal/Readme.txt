适用于所有选择博越订餐系统服务的客户

版权所有 (c) 2008-2010，广州博越信息科技有限公司

本授权协议适用且仅适用于博越订餐系统，广州博越信息科技有限公司拥有对本授权协议的最终解释权。

 

* 协议许可的权利

o 此版本为1.0版本，仅供交流学习用。

o 您可以在完全遵守本最终用户授权协议的基础上，购买本系统服务权应用于贵餐厅订餐商业用途。

o 您可以在协议规定的约束和限制范围内修改本系统源代码(如果被提供的话)或界面风格以适应您的网站要求。

o 您拥有使用本系统构建中全部会员资料、文章及相关信息的所有权，并独立承担与文章内容的相关法律义务。

o 获得商业授权之后，您可以将本系统应用于商业用途，同时依据所购买的授权类型中确定的技术支持期限、技术支持方式和技术支持内容，自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。

o 获得商业授权，不得将本系统用于除贵餐厅订餐外其他商业用途（包括不得对本系统或与之关联的商业授权进行出租、出售、抵押或发放子许可证灯）。购买商业授权服务请登陆 http://dc.bowos.com/参考相关说明，也可以致电020- 3792 4220了解详情。

o 无论如何，即无论用途如何、是否经过修改或美化、修改程度如何，只要使用我司订餐系统的整体或任何部分，未经书面许可，系统页面页脚处的广州博越信息科技有限公司下属网站（ http://dc.bowos.com）的链接都必须保留，且不能清除或修改。

o 禁止在本产品的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。

o 如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。

o 请尊重本系统开发人员的辛苦劳动成果,使用本系统请保留底部关于博越公司版权的超链接声明。

 

* 有限担保和免责声明

o 本系统及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。

o 用户出于自愿而使用本系统，您必须了解使用本系统的风险，在尚未购买产品技术服务之前，我们不承诺提供任何形式的技术支持、使用担保，也不承担任何因使用本系统而产生问题的相关责任。

o 用户一旦使用本系统进行买卖出现食物卫生、服务等纠纷与我司无相关责任；授权使用期间贵餐厅出现食物中毒等重大社会影响事件，我司有权随时终止用户授权，收回用户对本系统使用权利。

o 广州博越信息科技有限公司不对使用本系统构建的文章或信息承担责任。

 

有关博越订餐系统最终用户授权协议、商业授权与技术服务的详细内容，均由博越订餐系统官方网站独家提供。广州博越信息科技有限公司拥有在不事先通知的情况下，修改授权协议和服务价目表的权力，修改后的协议或价目表对自改变之日起的新授权用户生效。

电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。

*******************************************************************************
* 安装说明测试说明：
*******************************************************************************

服务器方要求:PHP5+MYSQL数据库+Apache
前台登陆地址：http://域名
账号：user/123456
后台登陆地址：http://域名/admin
帐户：admin/123456

数据库安装：
将项目打包发布到apache上后在浏览器中输入地址：http://您的域名/install.php
输入您的mysql用户名与密码后按安装即可安装数据库。默认数据库名称为：db_bowos_dc

apache虚拟主机配置：
NameVirtualHost *:80

<VirtualHost *:80>
    ServerAdmin liao_jin_hong@sina.com
    DocumentRoot 本地路径\程序根目录
    DirectoryIndex index.php index.php4 index.php3 index.cgi index.pl index.html index.htm index.shtml index.phtml
    ServerName demo.bowos.com
</VirtualHost>


