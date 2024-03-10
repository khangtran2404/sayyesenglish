<?php

function render_our_roles_ajax() {
    $data = $_POST['data_id'];
    $data_page = $_POST['data_page'];
    $our_roles_field = get_field('our_roles',$data_page);
    $role_detail = $our_roles_field['phrase'][$data]['detail'];
    if ($role_detail){
        $html = '';
        foreach ($role_detail as $item ):
            $html .= '
        <div class="phrase-detail-item">
            <div class="group-phrase-item">
                <div class="cont-icon">
                    <img src="'.$item["image"]["url"].'" alt="icon">
                </div>
                <div class="item-description">
                   '.$item["title"].'
                </div>
            </div>
        </div>
        ';
            ?>
        <?php endforeach;
        echo $html;
    }
    exit;
}
add_action( 'wp_ajax_render_our_roles_ajax', 'render_our_roles_ajax' );
add_action( 'wp_ajax_nopriv_render_our_roles_ajax', 'render_our_roles_ajax' );