 <?php
    //没有下级下拉菜单
     //创建菜单
    function  __setMenu(){
        $this->menu_array = array(
            array(
                'url' => U('Index/index'),
                'name' => '证券列表'
            ),
            array(
                'url' => U('Index/addGoods'),
                'name' => '添加证券'
            ),
            array(
                'url' => U('Index/scale'),
                'name' => '当日兑换率'
            ),
            array(
                'url' => U('UserCenter/setTeamSign'),
                'name' => '设置用户网络位置'
            ),
            array(
                'url' => U('UserCenter/userFinance'),
                'name' => '用户财务管理'
            ),
            array(
                'url' => U('Search/index'),
                'name' => '数据表检索'
            ),
        );
}

         function setMenu(){
            $this->menu_array = array(
                 array(
                     'name' => '数据检索',
                     array(
                      'name' => '检索',
                      'url' => U('Search/index')
                        ),
                      
                    )
      
         
                );
         }
        foreach($menu as $k => $v){
        ?>
        <li>
            <?php  
            $check = CONTROLLER_NAME . "/" . ACTION_NAME;
            $is_check = strstr($v['url'], $check);
            ?>
            <a href='<?php echo $v['url']; ?>' <?php if($is_check){ ?>style="color:#fff;"<?php } ?>>
               <i class="linecons-star"></i>
                <span class="title"><?php echo $v['name']; ?></span>
            </a>
        </li>
      <?php } ?>
//有下级下拉菜单的  

  <!-- 左侧菜单 -->
                    <ul id="main-menu" class="main-menu">
                        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                        <?php foreach($menu as $k => $v){ ?>
                        <li class="has-sub">
                            <a href='#' disabled>
                                <i class="linecons-star"></i>
                                <span class="title"><?php echo $v['name']; ?></span>
                            </a>
                            <ul id="<?php echo $v['id'];?>">
                                <?php foreach($v['list'] as $kk => $vv){ ?>
                                <li>
                                    <?php  
                                        $check = CONTROLLER_NAME . "/" . ACTION_NAME;
                                        $is_check = strstr($vv['url'], $check);
                                    ?>
                                    <?php if($is_check){ ?> 
                                    <style> #<?php echo $v['id']; ?>{display : block;} </style>
                                    <?php } ?>
                                    <a href='<?php echo $vv['url'] ?>' <?php if($is_check){ ?> style="color:#fff;"<?php } ?>>
                                        <span class="title"><?php echo $vv['name'] ?></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
    
    //创建菜单
    public function __setMenu(){
        $this->menu_array = array(
            array(
                'name' => '系统管理',
                'id' => 'xtgl',
                'list' => array(
                    array(
                        'url' => U('Index/index'),
                        'name' => '证券列表'
                    ),
                    array(
                        'url' => U('Index/addGoods'),
                        'name' => '添加证券'
                    ),
                    array(
                        'url' => U('Index/scale'),
                        'name' => '当日兑换率'
                    ),
                ),
            ),
            array(
                'name' => '用户管理',
                'id' => 'yhgl',
                'list' => array(
                    array(
                        'url' => U('UserCenter/setTeamSign'),
                        'name' => '设置用户网络位置'
                    ),
                ),
            ),
            array(
                'name' => '中孝证券',
                'id' => 'zxzq',
                'list' => array(
                    array(
                        'url' => U('UserCenter/userFinance'),
                        'name' => '用户证券账户'
                    ),
                ),
            ),
            array(
                'name' => '财务管理',
                'id' => 'cwgl',
                'list' => array(
                    array(
                        'url' => U('Financial/useRecharge'),
                        'name' => '用户充值订单'
                    ),
                    array(
                        'url' => U('Financial/userCashlist'),
                        'name' => '用户提现订单'
                    ),
                    array(
                        'url' => U('Financial/userWalletlist'),
                        'name' => '用户钱包明细'
                    ),
                ),
            ),
        );
    }

}