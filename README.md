# cdndetect #
**CDN detect tool**


##bind安装配置
1. yum install bind bind-chroot
2. 具体配置可以参考named中内容，要把/var/named目录权限赋值为770，`chmod 770 /var/named`
3. 配置一个域名的泛解析例如：

```cpp
$TTL 600
@ IN SOA bcetstool.com. admin.bcetstool.com. (
                              2         ; Serial
                         604800         ; Refresh
                          86400         ; Retry
                        2419200         ; Expire
                         604800 )       ; Negative Cache TTL
;
@           IN  NS   ns.bcetstool.com.
ns          IN  A    180.76.160.180
*.cdndetect IN  A    180.76.160.180
zhujiA      IN  A    192.168.0.3

``` 


##配置php环境部署脚本
1. 把html中文件部署到php环境的根目录


##示例
[http://cdndetect.bcets.com/](http://cdndetect.bcets.com/)