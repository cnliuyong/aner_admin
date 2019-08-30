### aner_admin2
aner_admin2 后台管理模板--内置通用模块

#### 使用框架
使用thinkphp5框架,框架版本为5.0.24;

#### 省略文件说明
vendor目录中省略三个目录（composer, topthink, workerman）

注：vendor目录下省略的三个目录为thinkphp完整版安装时自动安装的库（可自行下载）

#### 后台模块
- 登录模块 -- 管理员失败登录登录次数过多则冻结ip
- 个人中心 -- 管理员修改个人信息和修改密码
- 管理员列表 -- 添加，修改，删除管理员，并可为管理员修改角色
- 角色列表 -- 添加，修改，删除角色，并可为角色修改权限
- 基本设置 -- SEO最基本设置
- 网站设置 -- 自定义网站设置，通常用来设置业务逻辑中的一些可控参数。网站设置的分组是便于区分和管理
- 广告管理 -- 设置广告位后，可设置广告，广告中可填写标题，值，图片，内容。一般用于网站中固定展示位置的动态内容，当调试模式关闭后仅可修改已设置的部分
- 日志管理 -- 内置了管理员操作管理和管理员登录管理
- 开发者中心 -- 内置模块管理和方法管理，用来控制代码中的控制器和方法名。
- 后台目录 -- 动态管理后台左侧边栏的目录，可设置标题，图标，目录等级，路径，排序，备注等
- 静态资源 -- 此模板的静态样式，开发时可在此选择合适的样式
- 文章标签模块和文章分类模块 -- 两个模块基本相同，可添加图片和名称，是否添加图片可控；
- 文章模块 -- 中有标题，图片，作者，关键字，分类选择(单选)，标签选择(多选)，简介，文章类型，内容等组成；文章类型可选富文本编辑模式和markdown模块；作者，图片，关键字，简介，标签，文章类型可控制是否填写；
- 会员管理 -- 后台可添加会员，可修改会员登录权限、密码、二级密码、昵称、唯一标识等；有查看团队，查看详情功能；可删除会员信息；会员充值功能;

#### 第三方插件
- bootstrap
- ckeditor (删除了部分语言包)
- dcalendar.picker
- jquery
- layer

#### 功能介绍
- 系统设置
  - 在后台控制器(admin)中的 Contral.php 文件中，设置了以下配置参数：
  - debug -- 调试模式，true开false关，调试模式关闭后，一些模块的添加，删除，修改等功能将隐藏。
  - admin_error_login_maximum -- 管理员异常登录的最大次数
  - admin_freeze_time -- 管理员异常登录后的冻结时间
  - page_number -- 列表分页每页数据量
  - cms_tag_image_onoff -- 标签图片上传开关
  - cms_category_image_onoff -- 分类图片上传开关
  - cms_article -- 文章字段控制（数组，有多个参数）
      - tag_ids -- 文章标签
      - author -- 作者
      - intro -- 简介
      - keyword -- 关键字
      - image -- 图片
      - content_type -- 内容类型
  - user_identity -- 会员唯一标识，用于会员与其他表之间的关联标识（user_id是计算机识别的关联标识，此设置为会员识别的关联标识）
  - user_identity_text -- 会员唯一标识的说明
  - user_fund_type -- 会员资金种类，key为资金类型说明，value为字段名
  - user_delete_onoff -- 会员删除操作的开关
- 权限控制
  - 模块管理仅作为分类存在，方法管理中存放着方法的路径。角色管理中选择一些方法保存即为为此角色开启了这些选中方法的权限。执行没有权限的方法将跳转到首页（异步请求也相同，因此一些异步请求操作在没有权限时将没有任何通知）。
  - 后台控制器中，禁止使用 `index()` 方法，权限控制中，后台所有控制器的 `index()` 均不受角色权限控制。
- 管理员操作日志
  - 现有的所有修改数据库的操作都写上了操作日志，日志内容中大部分都是以标题为标识来识别操作了什么。修改内容时，如果没有修改标题，则在日志中会出现类似：`修改:title->title` 的情况。
- 管理员权限设置
  - 角色中设置这个角色的权限，管理员只能被设置成某一个角色。
- 方法模块添加信息和后台目录模块添加信息
  - 方法模块可添加名称，路径，路由等，路径为 `控制器/方法名`，路由为此方法对应的路由设置，为后台目录模块的展示做前置；
  - 后台目录模块在选择方法时只能选择填写了路由的方法（可通过这种方法将永远不可能在目录中展示的方法剔除），在展示时点击跳转也同样是使用路由路径跳转；
  - 同时保留路径和路由的原因是后台目录的默认展开和高亮是通过 `控制器/方法名`控制的。
- 会员模块的唯一标识符说明
  - 在系统设置中设置会员表的唯一标识符（phone, account, email 中的一个）,设置后，其他字段可为空，也可进行其他业务的实现。设置此字段后，前台展示和部分后台展示将会代替id，更加直观的分辨会员；设置三个选项是为了满足多种业务情况的需求。
  - 会员资金类型设置说明，当 idx_user_fund 表中增加资金类型时，需要在系统设置中添加已增的资金类型数据（例如: '积分'=> 'integral'）；在会员列表和详情中即出现增加的资金类型；

#### 未完待续
- [x] 会员管理
- [ ] SEO（现有一些基本功能）
- [ ] sql文件管理
- [x] 文章模块
- [ ] 文章评论模块

#### 版本更新说明
- 2.0.1
    - bug: 管理员添加密码加盐功能未实现；
    - 优化：管理员信息添加表单，密码和确认密码表单类型修改为 `password`；管理员信息修改表单类似；
- 2.0.2
    - 模块增加：文章管理模块，添加了文章分类，文章标签，文章列表系列功能，具体详见后台模块版块；
    - 功能增加：增加路由设置，框架配置已配置为强制路由，后台通用模块的路由均在 `application/admin/route.php` 文件中；
    - 优化：方法模块中增加了路由字段，为后台目录自定义功能做前置；
    - 优化：后台模块操作不变，选择模块中的方法时只能选择添加了路由路径的方法，侧边栏目录跳转链接使用路由
    - 优化：所有跳转路径修改为路由；
    - 优化：所有模块添加了模块说明；
- 2.0.3
    - 名称修改为 aner_admin；
    - 修改logo，数据库，静态文件中的名称；
- 2.0.4
    - 模块增加：会员管理模块
    - 优化：删除ckeditor第三方插件中的部分语言包
- 2.0.5
    - 优化：删除ckeditor第三方插件中的图片和ckeditor.map.js文件
    - bug：修复管理员修改个人信息成功后删除头像图片问题
    - bug：修复日志列表搜索功能
    - 优化：增加文章列表和会员列表的搜索功能
    - bug：修复会员列表的分页问题