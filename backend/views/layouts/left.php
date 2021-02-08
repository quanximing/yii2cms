<?PHP
use yii\helpers\Html;
use yii\bootstrap\Nav;
use common\widgets\Menu;
use common\components\MenuHelper;
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image text-center"><img src="/img/img1.jpg" class="img-circle" alt="User Image"> </div>
            <div class="info">
                <p><small><?php echo Yii::$app->user->identity->email;?></small></p>
                <a href="#"><i class="fa fa-cog"></i></a>
                <a href="#"><i class="fa fa-envelope-o"></i></a>
                <?= Html::a(
                    '<i class="fa fa-power-off"></i>',
                    ['/site/logout'],
                    ['data-method' => 'post']
                ) ?>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php /*
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">PERSONAL</li>
            <li class="active ">
                <a href="/">
                    <i class="fa fa-dashboard"></i>
                    <span>仪表板</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bullseye"></i><span>Apps</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="apps-calendar.html">Calendar</a></li>
                    <li><a href="apps-support-ticket.html">Support Ticket</a></li>
                    <li><a href="apps-contacts.html">Contact / Employee</a></li>
                    <li><a href="apps-contact-grid.html">Contact Grid</a></li>
                    <li><a href="apps-contact-details.html">Contact Detail</a></li>
                </ul>
            </li>

            <li class="header">EXTRA COMPONENTS</li>
            <li class="treeview">
                <a href="#"><i class="fa fa-bar-chart"></i> <span>Charts</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="chart-morris.html">Morris Chart</a></li>
                    <li><a href="chart-chartist.html">Chartis Chart</a></li>

                    <li><a href="chart-knob.html">Knob Chart</a></li>
                    <li><a href="chart-chart-js.html">Chartjs</a></li>
                    <li><a href="chart-peity.html">Peity Chart</a></li>
                </ul>
            </li>
        </ul>
        */?>
        <?php
        $callback = function($menu){
            $data = json_decode($menu['data'], true);
            $items = $menu['children'];
            $return = [
                'label' => $menu['name'],
                'url' => [$menu['route']],
            ];
            //处理我们的配置
            if ($data) {
                //visible
                isset($data['visible']) && $return['visible'] = $data['visible'];
                //icon
                isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon'];
                //other attribute e.g. class...
                $return['options'] = $data;
            }
            //没配置图标的显示默认图标
            (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'fa fa-circle-o';
            $items && $return['items'] = $items;
            return $return;
        };

        $menu = MenuHelper::getAssignedMenu(Yii::$app->user->id ,null, $callback);
        ?>
        <?= Menu::widget(
            [
                'options' => ['class' =>'sidebar-menu tree','data-widget'=>"tree"],
                'items' => $menu,
            ]
        ) ?>
    </div>
    <!-- /.sidebar -->
</aside>
