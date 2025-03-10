# 网易云音乐等级进度查询工具

![产品展示图](http://qiniucdn.ercer.cn/2025/03/1301854429.png)

基于网易云音乐官方API开发的等级进度查询工具，使用PHP实现。AGPL-3.0协议开源，轻松查看距离下一等级所需的听歌量和登录天数。

## ✨ 功能特性

- 🔍 实时查询当前等级信息
- 📈 显示升级所需的听歌量差值
- 📅 计算升级需要的登录天数
- 🔒 基于Cookie的安全验证机制
- 📱 自适应移动端/PC端显示

## 🛠️ 使用教程

### 获取Cookie步骤

1. **登录网易云音乐**
   - 访问[官网](https://music.163.com)并登录

2. **打开开发者工具**
   - Windows: `Ctrl + Shift + I`
   - Mac: `Command + Option + I`

3. **捕获网络请求**
   1. 切换到Network标签
   2. 刷新页面
   3. 点击任意接口请求
   4. 复制Request Headers中的Cookie值

### 配置Cookie

打开项目代码，替换以下字段：

```php
// 替换此行Cookie信息
$cookie = '你复制的cookie全部内容';
```

### 运行脚本

命令行执行：
```bash
php netease_level.php
```

### 输出示例

成功响应时显示：
```json
{
    "当前等级": "Lv8",
    "距离下一个等级": "Lv9",
    "还需听歌(首)": 1426,
    "还需登录(天)": 27
}
```

错误提示：
```json
{
    "error": "获取数据失败，请检查Cookie有效性"
}
```


## 📄 版权声明

本项目采用 **GNU Affero General Public License v3.0** 开源协议
[![AGPL-3.0](https://img.shields.io/badge/License-AGPL%203.0-blue.svg)](https://opensource.org/licenses/AGPL-3.0)

## ⚠️ 免责声明

本项目仅供学习交流使用，通过本工具获取的数据版权归属网易公司所有。请勿用于商业用途，开发者不承担任何因滥用本工具导致的法律责任。
```
欢迎访问我的博客 blog.ercer.cn

