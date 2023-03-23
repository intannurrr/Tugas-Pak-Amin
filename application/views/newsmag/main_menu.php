<div class="td-header-row td-header-border td-header-main-menu">
    <div id="td-header-menu" role="navigation">
        <div id="td-top-mobile-toggle"><a href="#"><i class="td-icon-font td-icon-mobile"></i></a></div>
        <div class="td-main-menu-logo td-logo-in-header">
            <a class="td-header-logo td-sticky-mobile" href="#">
                <?php 
                  $logoo = $this->model_utama->view_ordering_limit('logo','id_logo','DESC',0,1);
                  foreach ($logoo->result_array() as $row) {
                    echo "<img class='td-retina-data' src='".base_url()."asset/logo/$row[gambar]'/>";
                  }
                ?>
            </a>
        </div>
        <div class="menu-td-demo-header-menu-container">
            <?php 
                function main_menu() {
                    $ci = & get_instance();
                    $query = $ci->db->query("SELECT id_menu, nama_menu, link, id_parent FROM menu where aktif='Ya' AND position='Bottom' order by urutan");
                    $menu = array('items' => array(),'parents' => array());
                    foreach ($query->result() as $menus) {
                        $menu['items'][$menus->id_menu] = $menus;
                        $menu['parents'][$menus->id_parent][] = $menus->id_menu;
                    }
                    if ($menu) {
                        $result = build_main_menu(0, $menu);
                        return $result;
                    }else{
                        return FALSE;
                    }
                }

                function build_main_menu($parent, $menu) {
                    $html = "";
                    if (isset($menu['parents'][$parent])) {
                        if ($parent=='0'){
                            $html .= "<ul id='menu-td-demo-header-menu-1' class='sf-menu'>";
                        }else{
                            $html .= "<ul class='sub-menu'>";
                        }
                        foreach ($menu['parents'][$parent] as $itemId) {
                            if (!isset($menu['parents'][$itemId])) {
                                if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
                                    $html .= "<li class='menu-item menu-item-type-custom menu-item-object-custom td-menu-item'><a target='_BLANK' href='".$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
                                }else{
                                    $html .= "<li class='menu-item menu-item-type-custom menu-item-object-custom td-menu-item'><a href='".base_url().''.$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
                                }
                            }
                            if (isset($menu['parents'][$itemId])) {
                                if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
                                    $html .= "<li class='menu-item menu-item-type-custom menu-item-object-custom current-menu-parent menu-item-has-children td-menu-item td-normal-menu'><a class='sf-with-ul' target='_BLANK' href='".$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span></a>";
                                }else{
                                    $html .= "<li class='menu-item menu-item-type-custom menu-item-object-custom current-menu-parent menu-item-has-children td-menu-item td-normal-menu'><a class='sf-with-ul' href='".base_url().''.$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span></a>";
                                }
                                $html .= build_main_menu($itemId, $menu);
                                $html .= "</li>";
                            }
                        }
                        $html .= "</ul>";
                    }
                    return $html;
                }
                echo main_menu();
            ?>
        </div>
    </div>

    <div class="td-search-wrapper">
        <div id="td-top-search">
            <!-- Search -->
            <div class="header-search-wrap">
                <div class="dropdown header-search">
                    <a id="td-header-search-button" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
                    <a id="td-header-search-button-mob" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="header-search-wrap">
        <div class="dropdown header-search">
            <div class="td-drop-down-search" aria-labelledby="td-header-search-button">
                <form method="POST" class="td-search-form" action="<?php echo base_url(); ?>berita/index">
                    <div role="search" class="td-head-form-search-wrap">
                        <input class="needsclick" id="td-header-search" type="text" name="kata" autocomplete="off" />
                        <input class="wpb_button wpb_btn-inverse btn" name='cari' type="submit" id="td-header-search-top" value="Search" />
                    </div>
                </form>
                <div id="td-aj-search"></div>
            </div>
        </div>
    </div>        
</div>